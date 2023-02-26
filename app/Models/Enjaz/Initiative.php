<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;

    protected $table = "initiatives";

    protected $fillable = [
        'content_id',
        'target_group',
        'team',
        'description',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content(){
        return $this->belongsTo(Content::class);
    }
}
