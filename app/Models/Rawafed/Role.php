<?php

namespace App\Models\Rawafed;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "roles";

    protected $hidden= ['pivot'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'created_at',
        'updated_at'
        ];

    /**
     * Role BelongsToMany user
     */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Role BelongsToMany permission
     */
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
}
