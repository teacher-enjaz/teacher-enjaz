<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content_type_id',
        'user_id',
        'classification_id',
        'comments_allowed',
        'views',
        'likes',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contentType(){
        return $this->belongsTo(ContentType::class,'content_type_id','id');
    }
    public function achievement(){
        return $this->hasOne(Achievement::class,'content_id','id');
    }
    public function initiative(){
        return $this->hasOne(Initiative::class,'content_id','id');
    }
    public function award(){
        return $this->hasOne(Award::class,'content_id','id');
    }
    public function article(){
        return $this->hasOne(Article::class,'content_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'content_id','id');
    }
    public function contentFiles(){
        return $this->hasMany(ContentFile::class,'content_id','id');
    }
}
