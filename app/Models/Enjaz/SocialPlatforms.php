<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPlatforms extends Model
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
    public function socialAccounts(){
        return $this->hasMany(SocialAccounts::class);
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
