<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'experience_name',
        'organization',
        'from',
        'to',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
