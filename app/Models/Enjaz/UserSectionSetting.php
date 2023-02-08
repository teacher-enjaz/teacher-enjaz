<?php

namespace App\Models\Enjaz;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSectionSetting extends Model
{
    use HasFactory;
    protected $table = "user_section_settings";

    protected $fillable = [
        'user_id',
        'qualifications_section',
        'experiences_section',
        'courses_section',
        'skills_section',
        'languages_section',
        'memberships_section',
        'social_accounts_section',
        'articles_section',
        'initiatives_section',
        'achievements_section',
        'awards_section',
        'created_at',
        'updated_at'
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
