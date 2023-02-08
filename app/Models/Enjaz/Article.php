<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'content_id',
        'details',
    ];
    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
    public function content_file(){
        return $this->hasMany(ContentFile::class,'content_id','id');
    }
}
