<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model
{
    protected $fillable = ['start_date','end_date','evaluator_id','user_id'];
    protected function casts(): array { return ['start_date'=>'datetime','end_date'=>'datetime']; }
    public function evaluator() { return $this->belongsTo(User::class, 'evaluator_id'); }
    public function user() { return $this->belongsTo(User::class); }
}
