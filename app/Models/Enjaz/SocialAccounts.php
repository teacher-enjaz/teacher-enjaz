<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccounts extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="social_accounts";

    protected $fillable = [
        'user_id',
        'social_platforms_id',
        'link',
        'status',
        'created_at','updated_at'
    ];
    public function socialPlatforms(){
        return $this->belongsTo(SocialPlatforms::class);
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

    /**
     * return subject status
     */
    public function getActive()
    {
        return  $this->status == 1 ? __('enjaz.published') : __('enjaz.unpublished') ;
    }
}
