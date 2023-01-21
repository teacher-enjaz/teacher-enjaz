<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;
    protected $fillable = [
        'target_audience',
        'team',
        'description',
        'start_date',
        'end_date',
        'status',
        'slug',
        'content_id',
        'classification_id',

    ];
    public function content(){
        return $this->belongsTo(Content::class, 'content_id','id');
    }
    public function classification(){
        return $this->belongsTo(Classification::class, 'content_id','id');
    }
}
