<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'status',
        'slug',
        'content_id',
        'classification_id',

    ];
    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
    public function classification(){
        return $this->belongsTo(Classification::class, 'content_id','id');
    }
}
