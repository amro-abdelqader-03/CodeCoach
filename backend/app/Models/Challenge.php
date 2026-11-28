<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Challenge extends Model
{
    protected $fillable = ['title','description','difficulty','user_id','image','status'];
    public function user() { return $this->belongsTo(User::class); }
    public function tasks() { return $this->hasMany(ChallengeTask::class); }
    public function submissions() { return $this->hasMany(ChallengeSubmission::class); }
}
