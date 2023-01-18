<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'language',
        'reading_level',
        'speaking_level',
        'writing_level',
        'listening_level',
        'is_native',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
