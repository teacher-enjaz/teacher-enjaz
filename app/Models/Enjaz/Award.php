<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'description',
        'status',
        'slug',
        'content_id',

    ];
    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
}
