<?php

namespace App\Models\Rawafed;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{

    use HasFactory;

    /**
     * @var string
     */
    protected $table = "follow_user";

    /**
     * @var string[]
     */
    protected $fillable = [
        'status',
        'user_follower_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    /**
     * return active geoPlaces
     */
    public function getStatus()
    {
        return  $this->status  == 1 ? __('dashboard.follow') : __('dashboard.unFollow') ;
    }

    /**
     * geoPlace HasMany directorate
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
