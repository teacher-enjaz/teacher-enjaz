<?php

namespace App\Models\enjaz;

use App\Models\User;
use App\Models\User\UserQualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function userQualification(){
        return $this->hasMany(UserQualification::class,'qualification_id',id);
    }
}
