<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'repo_url',
        'demo_url',
        'doc_url',
        'thumbnail',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(ProjectSkill::class);
    }

    public function evidenceMap(): HasMany
    {
        return $this->hasMany(SkillEvidenceMap::class);
    }

    public function getSkillNamesAttribute(): array
    {
        return $this->skills->pluck('skill_name')->toArray();
    }
}
