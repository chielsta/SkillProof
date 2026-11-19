<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'bio',
        'field',
        'avatar',
        'github_url',
        'linkedin_url',
        'website_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function internshipPositions()
    {
        return $this->hasMany(InternshipPosition::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function portfolioProjects()
    {
        return $this->hasMany(PortfolioProject::class);
    }

    public function activePosition()
    {
        return $this->hasOne(InternshipPosition::class)->where('status', 'active')->latestOfMany();
    }
}
