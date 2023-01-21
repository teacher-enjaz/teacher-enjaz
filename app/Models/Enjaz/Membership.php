<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
        'membership_name',
        'organization',
        'membership_date',
        'membership_validity',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
