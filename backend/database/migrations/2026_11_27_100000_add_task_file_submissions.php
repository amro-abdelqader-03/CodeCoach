<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('challenge_submissions', function (Blueprint $table): void {
            $table->foreignId('challenge_task_id')->nullable()->constrained('challenge_tasks')->nullOnDelete();
            $table->string('submission_file_path')->nullable();
            $table->string('submission_file_name')->nullable();
            $table->longText('submission_file_content')->nullable();
            $table->unsignedBigInteger('submission_file_size')->nullable();
            $table->timestamp('task_completed_at')->nullable();
            $table->index(['challenge_task_id', 'user_id', 'task_completed_at'], 'task_submissions_progress_index');
        });
    }

    public function down(): void
    {
        Schema::table('challenge_submissions', function (Blueprint $table): void {
            $table->dropIndex('task_submissions_progress_index');
            $table->dropForeign(['challenge_task_id']);
            $table->dropColumn([
                'challenge_task_id',
                'submission_file_path',
                'submission_file_name',
                'submission_file_content',
                'submission_file_size',
                'task_completed_at',
            ]);
        });
    }
};
