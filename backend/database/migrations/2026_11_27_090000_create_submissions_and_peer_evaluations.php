<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenge_submissions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('challenge_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->longText('html_code');
            $table->longText('css_code')->nullable();
            $table->longText('js_code')->nullable();
            $table->enum('status', ['ai_pending', 'ai_failed', 'evaluated', 'peer_review', 'completed'])->default('ai_pending');
            $table->unsignedTinyInteger('ai_score')->nullable();
            $table->text('ai_description')->nullable();
            $table->json('ai_strengths')->nullable();
            $table->json('ai_weaknesses')->nullable();
            $table->timestamp('ai_evaluated_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status']);
            $table->index(['challenge_id', 'user_id']);
        });

        Schema::create('evaluation_slots', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('evaluator_id')->constrained('users')->cascadeOnDelete();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('status', ['open', 'booked', 'completed', 'cancelled'])->default('open');
            $table->timestamps();
            $table->index(['status', 'start_date']);
            $table->index(['evaluator_id', 'start_date']);
        });

        Schema::table('appointments', function (Blueprint $table): void {
            $table->foreignId('submission_id')->nullable()->unique()->constrained('challenge_submissions')->nullOnDelete();
            $table->foreignId('evaluation_slot_id')->nullable()->unique()->constrained('evaluation_slots')->nullOnDelete();
            $table->enum('status', ['booked', 'completed', 'cancelled'])->default('booked');
            $table->unsignedTinyInteger('human_score')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamp('completed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table): void {
            $table->dropForeign(['submission_id']);
            $table->dropUnique(['submission_id']);
            $table->dropUnique(['evaluation_slot_id']);
            $table->dropForeign(['evaluation_slot_id']);
            $table->dropColumn(['submission_id', 'evaluation_slot_id', 'status', 'human_score', 'feedback', 'completed_at']);
        });

        Schema::dropIfExists('evaluation_slots');
        Schema::dropIfExists('challenge_submissions');
    }
};
