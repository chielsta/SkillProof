<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skill_evidence_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_id')->constrained('skill_requirements')->cascadeOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['proven', 'partial', 'none'])->default('none');
            $table->timestamps();

            $table->unique(['requirement_id', 'project_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_evidence_map');
    }
};
