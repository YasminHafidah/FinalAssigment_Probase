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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('validation_attemp_id')->constrained('validation_attemps')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('validation_questions')->onDelete('cascade');
            $table->foreignId('option_choice_id')->nullable()->constrained('validation_options')->onDelete('cascade');
            $table->text('essay_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
