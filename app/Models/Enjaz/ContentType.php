<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function contents(){
        return $this->hasMany(Content::class,'type_id',id);
    }

    public function classifications(){
        return $this->hasMany(Classification::class,'content_type_id',id);
    }
}
