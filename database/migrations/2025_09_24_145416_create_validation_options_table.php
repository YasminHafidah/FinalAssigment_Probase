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
        Schema::create('validation_options', function (Blueprint $table) {
            $table->id();
            $table->text('opsi');
            $table->boolean('IsTrue')->default(0);
            $table->foreignId('questionId')->constrained('validation_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validation_options');
    }
};
