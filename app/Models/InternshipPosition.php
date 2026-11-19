<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InternshipPosition extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'company',
        'description',
        'source_url',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skillRequirements(): HasMany
    {
        return $this->hasMany(SkillRequirement::class, 'position_id');
    }
}
