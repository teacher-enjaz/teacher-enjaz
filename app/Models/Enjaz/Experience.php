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
    protected $fillable=['organization','from','to','notes','status','is_present','job_id','user_id', 'created_at', 'updated_at'];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean',
        'is_present'=> 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
