<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFile extends Model
{
    use HasFactory;

    protected $table = "content_files";

    protected $fillable = [
        'name',
        'description',
        'extension',
        'size',
        'mime',
        'path',
        'content_id',
        'created_at', 'updated_at'
    ];

    public function content(){
        return $this->belongsTo(Content::class);
    }
}
