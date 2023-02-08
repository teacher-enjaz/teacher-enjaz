<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";

    protected $fillable = [
        'content_id',
        'details',
        'created_at', 'updated_at'
    ];

    public function content(){
        return $this->belongsTo(Content::class);
    }

}
