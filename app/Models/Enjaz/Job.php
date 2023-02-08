<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table="jobs";

    /**\
     * @var array
     */
    protected $fillable=['name','status', 'created_at', 'updated_at',];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
}
