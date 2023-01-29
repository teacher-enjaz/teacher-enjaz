<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduatedCountry extends Model
{
    use HasFactory;
    protected $table = "graduated_countries";

    protected $fillable = [
        'name',
        'status',
        'created_at', 'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    /**
     * return subject status
     */
    public function getActive()
    {
        return  $this->status == 1 ? __('enjaz.published') : __('enjaz.unpublished') ;
    }

    public function user_qualification()
    {
        return $this->hasMany(UserQualification::class);
    }

}
