<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="user_social_accounts";

    protected $fillable = [
        'user_id',
        'social_platform_id',
        'link',
        'status',
        'created_at','updated_at'
    ];
    public function social_platform(){
        return $this->belongsTo(SocialPlatform::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];
}
