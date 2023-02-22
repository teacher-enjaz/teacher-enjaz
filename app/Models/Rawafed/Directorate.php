<?php

namespace App\Models\Rawafed;

use App\Models\Laboratories\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorate extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "directorates";

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'status',
        'geo_place_id',
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
     * show directorate status
     */
    public function getActive()
    {
        return  $this->status == 1 ? __('dashboard.active') : __('dashboard.inactive') ;
    }

    /**
     * directorate BelongsTo GeoPlace
     */
    public function geographic_place()
    {
        return $this->belongsTo(GeoPlace::class,'geo_place_id','id');
    }

    /**
     * directorate HasMany school
     */
    public function school()
    {
        return $this->hasMany(School::class);
    }

    /**
     * directorate HasMany supervisor
     */
    public function supervisor()
    {
        return $this->hasMany(Supervisor::class);
    }

    /**
     * directorate HasMany lab_monitor
     */
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * directorate HasMany teacher
     */
    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    /**
     * directorate HasMany school
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function classroom_support()
    {
        $this->hasMany(ClassroomSupport::class);
    }

    public function teacher_directorate()
    {
        return $this->hasMany(TeacherDirectorate::class);
    }
}
