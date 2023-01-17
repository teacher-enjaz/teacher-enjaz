<?php

namespace App\Models\enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionFlags extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function userFlags(){
        return $this->hasMany(UserFlags::class,'section_flag_id',id);
    }
}
