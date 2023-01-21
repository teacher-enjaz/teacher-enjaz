<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFlags extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'section_flag_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
    public function sectionFlag(){
        return $this->belongsTo(SectionFlags::class,'section_flag_id',id);
    }
}
