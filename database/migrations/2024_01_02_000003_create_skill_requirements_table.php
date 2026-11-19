<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skill_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained('internship_positions')->cascadeOnDelete();
            $table->string('skill_name');
            $table->string('category')->nullable(); // e.g. "language", "framework", "tool"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_requirements');
    }
};
