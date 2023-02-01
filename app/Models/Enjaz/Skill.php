<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="skills";

    protected $fillable = ['name','user_id','skill_level','status','created_at','updated_at'];
    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
