<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $table = "specializations";

    protected $fillable = [
        'name',
        'status',
        'created_at', 'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function user_qualification()
    {
        return $this->hasMany(UserQualification::class);
    }

}
