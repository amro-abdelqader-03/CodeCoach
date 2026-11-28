<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeSubmission extends Model
{
    protected $fillable = [
        'challenge_id', 'challenge_task_id', 'user_id', 'html_code', 'css_code', 'js_code',
        'submission_file_path', 'submission_file_name', 'submission_file_content', 'submission_file_size', 'task_completed_at', 'status',
        'ai_score', 'ai_description', 'ai_strengths', 'ai_weaknesses', 'ai_evaluated_at',
    ];

    protected function casts(): array
    {
        return [
            'ai_strengths' => 'array',
            'ai_weaknesses' => 'array',
            'ai_evaluated_at' => 'datetime',
            'task_completed_at' => 'datetime',
            'submission_file_size' => 'integer',
        ];
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(ChallengeTask::class, 'challenge_task_id');
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class, 'submission_id');
    }
}
