<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";

    protected $fillable = [
        'title',
        'content_type_id',
        'user_id',
        'classification_id',
        'allow_comments',
        'views',
        'likes',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'allow_comments'=> 'boolean'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function content_type(){
        return $this->belongsTo(ContentType::class);
    }

    public function classification(){
        return $this->belongsTo(Classification::class);
    }

    public function content_file(){
        return $this->hasMany(ContentFile::class);
    }

    public function article(){
        return $this->hasOne(Article::class);
    }

    public function achievement(){
        return $this->hasOne(Achievement::class);
    }
    /*public function initiative(){
        return $this->hasOne(Initiative::class,'content_id','id');
    }*/

    /*public function comments(){
        return $this->hasMany(Comment::class,'content_id','id');
    }*/

}
