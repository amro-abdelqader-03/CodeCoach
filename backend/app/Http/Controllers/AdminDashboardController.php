<?php
namespace App\Http\Controllers;
use App\Models\{User, Challenge, Appointment, ShopItem};
use Illuminate\Http\Request;
use Carbon\Carbon;
class AdminDashboardController extends Controller
{
    public function index() { return view('admin.dashboard', ['userCount'=>User::where('role','user')->count(),'challengeCount'=>Challenge::count(),'appointmentCount'=>Appointment::count(),'itemCount'=>ShopItem::count(),'appointments'=>Appointment::with(['user','evaluator'])->latest()->take(5)->get(),'recentUsers'=>User::where('role','user')->latest()->take(4)->get()]); }
    public function users() { return view('admin.users', ['users'=>User::latest()->paginate(15)]); }
    public function createUser() { return view('admin.user-form'); }
    public function editUser(User $user) { return view('admin.user-form', compact('user')); }
    public function showUser(User $user) { return view('admin.record', ['title'=>'User','record'=>$user]); }
    public function saveUser(Request $r, ?User $user=null) { $d=$r->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email'.($user?','.$user->id:''),'password'=>$user?'nullable|min:8':'required|min:8','role'=>'required|in:user,admin','level'=>'required|integer|min:1','xp'=>'required|integer|min:0','coins'=>'required|integer|min:0','evaluation_points'=>'sometimes|integer|min:0','plan'=>'required|string|max:40','profile_pic'=>'nullable|image|max:2048']); if(! $user && ! array_key_exists('evaluation_points',$d)) $d['evaluation_points']=5; if($r->hasFile('profile_pic')) $d['profile_pic']=$r->file('profile_pic')->store('profiles','public'); elseif($user) unset($d['profile_pic']); if(empty($d['password'])) unset($d['password']); $user ? $user->update($d) : User::create($d); return redirect()->route('admin.users')->with('success','User saved.'); }
    public function deleteUser(User $user) { abort_if($user->is(auth()->user()),403); $user->delete(); return back()->with('success','User deleted.'); }
    public function challenges() { return view('admin.challenges', ['challenges'=>Challenge::with('user','tasks')->latest()->paginate(15),'users'=>User::where('role','user')->get()]); }
    public function createChallenge() { return view('admin.challenge-form', ['users'=>User::where('role','user')->get()]); }
    public function editChallenge(Challenge $challenge) { return view('admin.challenge-form', ['challenge'=>$challenge->load('tasks'),'users'=>User::where('role','user')->get()]); }
    public function showChallenge(Challenge $challenge) { return view('admin.challenge-show', ['challenge'=>$challenge->load('user','tasks')]); }
    public function saveChallenge(Request $r, ?Challenge $challenge=null) { $d=$r->validate(['title'=>'required|string|max:255','description'=>'required|string','difficulty'=>'required|in:easy,medium,hard','user_id'=>'nullable|exists:users,id','image'=>'nullable|image|max:4096','tasks'=>'required|array|size:3','tasks.*.description'=>'required|string','tasks.*.skills'=>'nullable|string','tasks.*.status'=>'required|in:incomplete,complete,publish']); if($r->hasFile('image')) $d['image']=$r->file('image')->store('challenges','public'); elseif($challenge) unset($d['image']); else $d['image']=app(\App\Services\OllamaChallengeService::class)->storeGeneratedCover($d['title'],$d['difficulty']); $tasks=$d['tasks']; unset($d['tasks']); if($challenge){$challenge->update($d);$challenge->tasks()->delete();} else $challenge=Challenge::create($d); foreach($tasks as $t)$challenge->tasks()->create(['description'=>$t['description'],'skills'=>array_filter(array_map('trim',explode(',',$t['skills']??''))),'status'=>$t['status']]); return redirect()->route('admin.challenges')->with('success','Challenge saved.'); }
    public function deleteChallenge(Challenge $challenge) { $challenge->delete(); return back()->with('success','Challenge deleted.'); }
    public function appointments() { return view('admin.appointments', ['appointments'=>Appointment::with(['user','evaluator'])->latest()->paginate(15),'users'=>User::all()]); }
    public function createAppointment() { return view('admin.appointment-form',['users'=>User::all()]); }
    public function editAppointment(Appointment $appointment) { return view('admin.appointment-form',['appointment'=>$appointment,'users'=>User::all()]); }
    public function showAppointment(Appointment $appointment) { return view('admin.record',['title'=>'Appointment','record'=>$appointment->load('user','evaluator')]); }
    public function saveAppointment(Request $r, ?Appointment $appointment=null)
    {
        $data = $r->validate([
            'date' => 'required|date|after:today',
            'start_time' => ['required','date_format:H:i','regex:/^(?:[01]\\d|2[0-3]):(?:00|30)$/'],
            'end_time' => ['required','date_format:H:i','regex:/^(?:[01]\\d|2[0-3]):(?:00|30)$/'],
            'evaluator_id' => 'required|exists:users,id|different:user_id',
            'user_id' => 'required|exists:users,id',
        ]);
        $start = Carbon::parse($data['date'].' '.$data['start_time']);
        $end = Carbon::parse($data['date'].' '.$data['end_time']);
        if ($end->lessThanOrEqualTo($start)) {
            return back()->withErrors(['end_time' => 'End time must be after the start time.'])->withInput();
        }
        $busy = Appointment::query()
            ->when($appointment, fn ($query) => $query->where('id', '!=', $appointment->getKey()))
            ->where(function ($query) use ($data) {
                $query->whereIn('evaluator_id', [$data['evaluator_id'], $data['user_id']])
                    ->orWhereIn('user_id', [$data['evaluator_id'], $data['user_id']]);
            })
            ->where('start_date', '<', $end)
            ->where('end_date', '>', $start)
            ->exists();
        if ($busy) {
            return back()->withErrors(['start_time' => 'The evaluator or evaluated user already has an appointment during this time.'])->withInput();
        }
        $values = ['start_date'=>$start, 'end_date'=>$end, 'evaluator_id'=>$data['evaluator_id'], 'user_id'=>$data['user_id']];
        $appointment ? $appointment->update($values) : Appointment::create($values);
        return redirect()->route('admin.appointments')->with('success','Appointment saved.');
    }
    public function deleteAppointment(Appointment $appointment) { $appointment->delete(); return back()->with('success','Appointment deleted.'); }
    public function items() { return view('admin.shop-items', ['items'=>ShopItem::latest()->paginate(15)]); }
    public function createItem() { return view('admin.item-form'); }
    public function editItem(ShopItem $item) { return view('admin.item-form', compact('item')); }
    public function showItem(ShopItem $item) { return view('admin.record',['title'=>'Shop item','record'=>$item]); }
    public function saveItem(Request $r, ?ShopItem $item=null) { $d=$r->validate(['name'=>'required|string|max:255','type'=>'required|in:sticker,avatar','image'=>'nullable|image|max:4096','currency'=>'required|in:coins,xp','price'=>'required|integer|min:0','is_active'=>'nullable|boolean']); if($r->hasFile('image'))$d['image']=$r->file('image')->store('shop','public'); elseif($item)unset($d['image']); else $r->validate(['image'=>'required|image|max:4096']); $d['is_active']=$r->boolean('is_active'); $item ? $item->update($d) : ShopItem::create($d); return redirect()->route('admin.items')->with('success','Shop item saved.'); }
    public function deleteItem(ShopItem $item) { $item->delete(); return back()->with('success','Shop item deleted.'); }
}
