<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model
{
    protected $fillable = ['start_date','end_date','evaluator_id','user_id','submission_id','evaluation_slot_id','status','human_score','feedback','completed_at'];
    protected function casts(): array { return ['start_date'=>'datetime','end_date'=>'datetime','completed_at'=>'datetime']; }
    public function evaluator() { return $this->belongsTo(User::class, 'evaluator_id'); }
    public function user() { return $this->belongsTo(User::class); }
    public function submission() { return $this->belongsTo(ChallengeSubmission::class); }
    public function slot() { return $this->belongsTo(EvaluationSlot::class, 'evaluation_slot_id'); }
}
