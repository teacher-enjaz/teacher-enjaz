<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = "achievements";

    protected $fillable = [
        'description',
        'start_date',
        'end_date',
        'content_id',
        'created_at',
        'updated_at',

    ];
    public function content(){
        return $this->belongsTo(Content::class);
    }
}
