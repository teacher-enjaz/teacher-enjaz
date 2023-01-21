<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'status',
    ];
    public function socialSites(){
        return $this->hasMany(SocialSite::class,'platform_id',id);
    }
}
