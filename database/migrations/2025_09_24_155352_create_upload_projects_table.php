<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('upload_projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('path');
            $table->timestamps();
            $table->foreignId('userId')->constrained('users');
            $table->foreignId('projectId')->constrained('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_projects');
    }
};
