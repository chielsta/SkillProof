<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillRequirement extends Model
{
    protected $fillable = [
        'position_id',
        'skill_name',
        'category',
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(InternshipPosition::class, 'position_id');
    }

    public function evidenceMap(): HasMany
    {
        return $this->hasMany(SkillEvidenceMap::class, 'requirement_id');
    }
}
