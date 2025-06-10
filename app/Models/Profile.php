<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'last_name',
        'title',
        'bio',
        'profile_image',
        'resume_file',
        'availability_status',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
