<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('difficulty');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('challenge_tasks', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('challenge_id')->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->json('skills');
            $table->enum('status', ['incomplete', 'complete', 'publish'])->default('incomplete');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenge_tasks');
        Schema::dropIfExists('challenges');
    }
};
