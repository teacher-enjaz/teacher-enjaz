<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAward extends Model
{
    use HasFactory;
    protected $table = "user_award";

    protected $fillable = [
        'obtained_date',
        'image',
        'youtube_link',
        'status',
        'award_id',
        'user_id',
        'created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function award(){
        return $this->belongsTo(Award::class);
    }
}
