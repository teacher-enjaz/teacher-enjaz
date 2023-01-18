<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_link',
        'status',
        'platform_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
    public function platform(){
        return $this->belongsTo(Platform::class,'platform_id',id);
    }
}
