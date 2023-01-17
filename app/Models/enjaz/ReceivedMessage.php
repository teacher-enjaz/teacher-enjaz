<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_text',
        'date_time',
        'status',
        'sender_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
    public function sender(){
        return $this->belongsTo(User::class,'sender_id',id);
    }
}
