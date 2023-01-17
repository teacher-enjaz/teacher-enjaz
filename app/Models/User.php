<?php

namespace App\Models;

use App\Models\enjaz\Content;
use App\Models\enjaz\Course;
use App\Models\enjaz\Experience;
use App\Models\enjaz\Language;
use App\Models\enjaz\Membership;
use App\Models\enjaz\ReceivedMessage;
use App\Models\enjaz\Skill;
use App\Models\enjaz\SocialSite;

use App\Models\enjaz\UserFlags;
use App\Models\enjaz\UserQualification;
use App\Models\Rawafed\Admin;
use App\Models\Rawafed\Permission;
use App\Models\Rawafed\Role;
use App\Models\Rawafed\Supervisor;
use App\Models\Rawafed\Teacher;
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
    /*
     * user hasOne admin
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
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
    /*public function hasAbility($permissions)
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
    }*/


    public function userQualifications(){
        return $this->hasMany(UserQualification::class,'user_id',id);
    }
    public function socialSites(){
        return $this->hasMany(SocialSite::class,'user_id',id);
    }
    public function memberships(){
        return $this->hasMany(Membership::class,'user_id',id);
    }
    public function skills(){
        return $this->hasMany(Skill::class,'user_id',id);
    }
    public function userFlags(){
        return $this->hasMany(UserFlags::class,'user_id',id);
    }
    public function experiences(){
        return $this->hasMany(Experience::class,'user_id',id);
    }
    public function courses(){
        return $this->hasMany(Course::class,'user_id',id);
    }
    public function languages(){
        return $this->hasMany(Language::class,'user_id',id);
    }
    public function contents(){
        return $this->hasMany(Content::class,'user_id',id);
    }
    public function receivedMessages(){
        return $this->hasMany(ReceivedMessage::class,'user_id',id);
    }

}
