<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ChallengeTask extends Model
{
    protected $fillable = ['challenge_id','description','skills','status'];
    protected function casts(): array { return ['skills' => 'array']; }
    public function challenge() { return $this->belongsTo(Challenge::class); }
    public function submissions() { return $this->hasMany(ChallengeSubmission::class, 'challenge_task_id'); }
}
