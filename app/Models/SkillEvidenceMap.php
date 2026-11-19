<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkillEvidenceMap extends Model
{
    protected $table = 'skill_evidence_map';

    protected $fillable = [
        'requirement_id',
        'project_id',
        'status',
    ];

    public function requirement(): BelongsTo
    {
        return $this->belongsTo(SkillRequirement::class, 'requirement_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
