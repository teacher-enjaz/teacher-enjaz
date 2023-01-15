<?php

namespace App\Models\Rawafed;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = "permissions";

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'created_at',
        'updated_at'
    ];

    protected $hidden = ['pivot'];
    /**
     * permission BelongsToMany role
     */
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * permission BelongsToMany user
     */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Permission hasMany UserPermissionCache
     */
    public function user_permission_cache()
    {
        return $this->hasMany(UserPermissionCache::class);
    }
}
