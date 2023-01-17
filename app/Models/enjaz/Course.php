<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'course_hours',
        'training_center',
        'end_training_date',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
