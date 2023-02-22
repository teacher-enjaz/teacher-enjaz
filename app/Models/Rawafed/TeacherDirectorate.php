<?php

namespace App\Models\Rawafed;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TeacherDirectorate extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = "teacher_directorate";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'teacher_id',
        'directorate_id'
    ];

    /**
     * user HasMany user
     */
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }


    public function directorate() {
        return $this->belongsTo(Directorate::class);
    }


}
