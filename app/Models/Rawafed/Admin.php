<?php

namespace App\Models\Rawafed;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = "admins";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'directorate_id'
    ];

    protected $dates = ["deleted_at"];
    /**
     * user HasMany user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     *  supervisor BelongsTo Directorate
     */
    public function directorate() {
        return $this->belongsTo(Directorate::class);
    }
}
