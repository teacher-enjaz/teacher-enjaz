<?php

namespace App\Models\Rawafed;

use App\Models\Laboratories\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "schools";

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'status',
        'directorate_name',
        'directorate_id',
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
     * get school status
     */
    public function getActive()
    {
        return  $this->status == 1 ? __('dashboard.active') : __('dashboard.inactive') ;
    }

    /**
     * school BelongsTo directorate
     */
    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    /**
     * school HasMany teacher
     */
    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
    /**
     * school HasMany student
     */
    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
