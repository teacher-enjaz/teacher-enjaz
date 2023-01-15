<?php

namespace App\Models\Rawafed;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisor extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = "supervisors";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'directorate_id'
    ];
    protected $dates = ["deleted_at"];

    /**
     * user HasMany user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     *  supervisor BelongsTo Directorate
     */
    public function directorate() {
        return $this->belongsTo(Directorate::class);
    }
    /**
     * user HasMany user
     */
    public function supervisor_directorate()
    {
        return $this->hasMany(SupervisorDirectorate::class);
    }

    public function getSupervisors($subjects)
    {
        return $this->whereHas('user',function ($q) use ($subjects)
            {
                $q->whereHas('subject',function ($q) use ($subjects){
                    $q->whereIn('subjects.id',$subjects);
                });
            })
            ->with('user.subject')
            ->whereHas('supervisor_directorate')
            ->with('supervisor_directorate')
            ->get();
    }

}
