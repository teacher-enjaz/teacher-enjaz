<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="languages";

    protected $fillable = ['name','status','created_at','updated_at'];
    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];
    public function user_language(){
        return $this->hasMany(UserLanguage::class);
    }
}
