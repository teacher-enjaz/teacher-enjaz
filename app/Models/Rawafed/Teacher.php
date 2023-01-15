<?php

namespace App\Models\Rawafed;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = "teachers";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'directorate_id',
        'school_id'
    ];
    protected $dates = ["deleted_at"];

    /**
     * user HasMany user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    /**
     *  teacher BelongsTo Directorate
     */
    public function directorate() {
        return $this->belongsTo(Directorate::class);
    }

    /**
     * teacher BelongsTo
     */
    public function school() {
        return $this->belongsTo(School::class);
    }

    public function teacher_directorate()
    {
        return $this->hasMany(TeacherDirectorate::class);
    }

    public function getSupervisorTeachers($subjects)
    {
        return $this->whereHas('user',function ($q) use ($subjects)
        {
            $q->whereHas('subject',function ($q) use ($subjects){
                $q->whereIn('subjects.id',$subjects);
            });
        })
            ->with('user.subject')
            ->whereHas('teacher_directorate')
            ->with('teacher_directorate')
            ->get();
    }
}
