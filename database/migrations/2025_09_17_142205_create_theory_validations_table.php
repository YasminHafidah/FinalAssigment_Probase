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
        Schema::create('theory_validations', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->string('opsi1');
            $table->string('opsi2');
            $table->string('opsi3');
            $table->string('opsi4');
            $table->foreignId('projectId')->constrained('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theory_validations');
    }
};
