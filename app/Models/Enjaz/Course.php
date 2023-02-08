<?php

namespace App\Models\Enjaz;

use App\Models\User;
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


    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
