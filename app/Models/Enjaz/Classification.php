<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'user_id',
        'content_type_id',

    ];
    public function contentType(){
        return $this->belongsTo(Classification::class,'content_type_id',id);
    }
    public function articles(){
        return $this->hasMany(Article::class,'classification_id',id);
    }
    public function achievements(){
        return $this->hasMany(Achievement::class,'classification_id',id);
    }
    public function initiative(){
        return $this->hasMany(Initiative::class,'classification_id',id);
    }
}
