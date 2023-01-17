<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'extention',
        'size',
        'mime',
        'path',
        'content_id',

    ];

    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
}
