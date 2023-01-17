<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'status',
        'content_id',
        'sender_id',
        'parent_id',

    ];
    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
}
