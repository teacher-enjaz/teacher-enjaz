<?php

namespace App\Models;

use App\Models\Enjaz\Course;
use App\Models\Enjaz\Experience;
use App\Models\Rawafed\Admin;
use App\Models\Rawafed\Book;
use App\Models\Rawafed\ECard;
use App\Models\Rawafed\ECardFavourite;
use App\Models\Rawafed\FileFavourite;
use App\Models\Rawafed\FileMaterial;
use App\Models\Rawafed\FileReport;
use App\Models\Rawafed\FollowUser;
use App\Models\Rawafed\Grade;
use App\Models\Rawafed\InteractiveBook;
use App\Models\Rawafed\Level;
use App\Models\Rawafed\Permission;
use App\Models\Rawafed\Rating;
use App\Models\Rawafed\Resource;
use App\Models\Rawafed\ResourceFile;
use App\Models\Rawafed\Role;
use App\Models\Rawafed\SocialAccount;
use App\Models\Rawafed\Student;
use App\Models\Rawafed\Subject;
use App\Models\Rawafed\Supervisor;
use App\Models\Rawafed\Teacher;
use App\Models\Rawafed\UserType;
use App\Models\Rawafed\VideoFavourite;
use App\Models\Rawafed\VideoLesson;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SerializesModels, HasApiTokens;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name_ar',
        'name_en',
        'first_name_ar',
        'first_name_en',
        'second_name_ar',
        'second_name_en',
        'third_name_ar',
        'third_name_en',
        'last_name_ar',
        'last_name_en',
        'email',
        'identity_no',
        'mobile',
        'image',
        'image_flag',
        'gender',
        'birth_date',
        'password',
        'complete',
        'user_type_id',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
    ];
    protected $dates = ["deleted_at"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'complete' => 'boolean',
    ];

    /**
     * user HasMany account
     */
    public function account() {
        return $this->hasMany(SocialAccount::class);
    }


    /**
     * user BelongsTo user_type
     */
    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    /**
     * user hasOne supervisor
     */
    public function supervisor()
    {
        return $this->hasOne(Supervisor::class);
    }

    /**
     * user hasOne supervisor
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    /**
     * user hasOne supervisor
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * user hasOne admin
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * user BelongsToMany level
     */
    public function level()
    {
        return $this->belongsToMany(Level::class);
    }

    /**
     * user BelongsToMany class
     */
    public function grade()
    {
        return $this->belongsToMany(Grade::class);
    }

    /**
     * user BelongsToMany subject
     */
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }

    /**
     * user HasMany resource
     */
    public function resource()
    {
        return $this->hasMany(Resource::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * user BelongsToMany role
     */
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * user BelongsToMany permission
     */
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * followSubject BelongsToMany user
     */
    public function followSubject()
    {
        return $this->hasMany(FollowUser::class);
    }

    public function file_favourite()
    {
        return $this->hasMany(FileFavourite::class);
    }
    public function file_report()
    {
        return $this->hasMany(FileReport::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function followers()
    {
        return $this->hasMany(FollowUser::class);
    }

    /*public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

    public function routeNotificationForFcm($notification = null)
    {
        return $this->deviceTokens()->pluck('token')->toArray();
    }*/
    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

    public function routeNotificationForFcm($driver ,$notification = null)
    {
        return $this->deviceTokens()->pluck('token')->toArray();
    }


    /**
     * @param $permissions
     * @return bool
     */
    public function hasAbility($permissions)
    {
        $user = Auth::user();
        $role = $user->role->first();
        $userPermissions = $user->permission;

        if(!$role)
            return false;

        foreach ($userPermissions as $permission)
        {
            if(is_array($permission->slug) && in_array($permission->slug,$permissions))
            {
                return true;
            }
            elseif(is_string($permissions) && strcmp($permissions,$permission->slug) == 0)
            {
                return true;
            }
        }
        return false;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user)
        {
            if($user->account())
                $user->account()->delete();
            if($user->supervisor())
                $user->supervisor()->delete();
            if($user->teacher())
                $user->teacher()->delete();
            if($user->student())
                $user->student()->delete();
            if($user->admin())
                $user->admin()->delete();
            if($user->resource())
            {
                ResourceFile::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                FileMaterial::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                ECard::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                Book::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                InteractiveBook::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                VideoLesson::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->delete();
                $user->resource()->delete();
            }
            if($user->followers())
                $user->followers()->delete();
        });
        static::restoring(function($user)
        {
            if($user->account())
                SocialAccount::withTrashed()->where('user_id',$user->id)->restore();
            if($user->supervisor())
                $user->supervisor()->restore();
            if($user->teacher())
                $user->teacher()->restore();
            if($user->student())
                $user->student()->restore();
            if($user->admin())
                $user->admin()->restore();
            if($user->resource())
            {
                Resource::withTrashed()->where('user_id',$user->id)->restore();
                ResourceFile::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
                FileMaterial::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
                ECard::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
                Book::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
                InteractiveBook::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
                VideoLesson::whereIn('resource_id',Resource::where('user_id',$user->id)->pluck('id')->toArray())->restore();
            }
        });
        static::forceDeleted(function($user)
        {
            if($user->account())
                SocialAccount::withTrashed()->where('user_id',$user->id)->forceDelete();
            if($user->supervisor())
                $user->supervisor()->forceDelete();
            if($user->teacher())
                $user->teacher()->forceDelete();
            if($user->student())
                $user->student()->forceDelete();
            if($user->admin())
                $user->admin()->forceDelete();
            if($user->resource())
            {
                ResourceFile::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                FileMaterial::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                ECard::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                Book::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                InteractiveBook::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                VideoLesson::whereIn('resource_id', Resource::withTrashed()->where('user_id', $user->id)->pluck('id')->toArray())->forceDelete();
                Resource::withTrashed()->where('user_id', $user->id)->forceDelete();
            }
        });
    }

    /*************************** Enjaz *******************/

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
