<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill_name',
        'skill_level',
        'platform_id',
        'status',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
