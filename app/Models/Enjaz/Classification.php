<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $table = "classifications";

    protected $fillable = [
        'name',
        'status',
        'content_type_id',
        'created_at', 'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function content_type(){
        return $this->belongsTo(ContentType::class);
    }

    public function content(){
        return $this->hasMany(Content::class);
    }

}
