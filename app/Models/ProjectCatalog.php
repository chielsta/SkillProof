<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCatalog extends Model
{
    protected $table = 'project_catalog';

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'skills',
        'references',
        'thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'skills' => 'array',
            'references' => 'array',
        ];
    }
}
