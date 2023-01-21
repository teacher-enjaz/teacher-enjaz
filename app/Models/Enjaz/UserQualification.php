<?php

namespace App\Models\Enjaz;
namespace App\Models\User;
use App\Models\Enjaz\Qualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'specialization',
        'university',
        'graduation_country',
        'graduation_date',
        'status',
        'qualification_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
    public function qualifications(){
    return $this->belongsTo(Qualification::class,'qualification_id',id);
}

}
