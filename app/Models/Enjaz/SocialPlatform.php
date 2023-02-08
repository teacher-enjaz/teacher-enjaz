<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="social_platforms";

    protected $fillable = [
        'name',
        'image',
        'status',
        'created_at','updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function user_social_account(){
        return $this->hasMany(UserSocialAccount::class);
    }
}
