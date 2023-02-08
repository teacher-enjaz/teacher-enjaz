<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    use HasFactory;
    protected $table = "user_qualifications";

    protected $fillable = [
        'graduation_year',
        'status',
        'user_id',
        'qualification_id',
        'specialization_id',
        'university_id',
        'graduated_country_id',
        'created_at', 'updated_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'status'=> 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function graduated_country()
    {
        return $this->belongsTo(GraduatedCountry::class);
    }
}
