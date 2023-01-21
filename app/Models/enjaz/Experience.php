<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="experiences";

    /**\
     * @var array
     */
    protected $fillable=['name','organization','from','to','status','user_id', 'created_at', 'updated_at',];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
