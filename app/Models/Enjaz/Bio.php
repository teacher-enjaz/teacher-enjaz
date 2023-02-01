<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;

    protected $table = "bios";

    protected $fillable = [
        'user_id',
        'info',
        'status',
        'created_at',
        'updated_at'
    ];
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
