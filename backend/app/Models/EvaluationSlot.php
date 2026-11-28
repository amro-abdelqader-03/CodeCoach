<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationSlot extends Model
{
    protected $fillable = ['evaluator_id', 'start_date', 'end_date', 'status'];

    protected function casts(): array
    {
        return ['start_date' => 'datetime', 'end_date' => 'datetime'];
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
