<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="courses";

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'hours',
        'training_center',
        'end_date',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
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
