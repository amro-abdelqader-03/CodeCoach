<?php
namespace App\Http\Controllers;
use App\Models\{Challenge,ShopItem};
use App\Services\OllamaChallengeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserPagesController extends Controller
{
    public function profile(Request $r){return view('pages.profile',['member'=>$r->user()]);}
    public function progress(Request $r){return view('pages.gamification',['member'=>$r->user(),'items'=>ShopItem::where('is_active',true)->get()]);}
    public function challenges(){return view('pages.challenges',['challenges'=>Challenge::with('user','tasks')->latest()->get()]);}
    public function challenge(Challenge $challenge){return view('pages.challenge_details',['challenge'=>$challenge->load('user','tasks')]);}

    public function storeChallenge(Request $request, OllamaChallengeService $covers)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:12000'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'tasks' => ['required', 'array', 'size:3'],
            'tasks.*.description' => ['required', 'string', 'max:1200'],
            'tasks.*.skills' => ['nullable', 'string', 'max:500'],
        ]);

        $challenge = DB::transaction(function () use ($request, $data): Challenge {
            $challenge = $request->user()->challenges()->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'difficulty' => $data['difficulty'],
                'image' => $request->hasFile('image') ? $request->file('image')->store('challenges', 'public') : $covers->storeGeneratedCover($data['title'], $data['difficulty']),
            ]);

            foreach ($data['tasks'] as $task) {
                $challenge->tasks()->create([
                    'description' => $task['description'],
                    'skills' => array_values(array_filter(array_map('trim', explode(',', $task['skills'] ?? '')))),
                    'status' => 'incomplete',
                ]);
            }

            return $challenge;
        });

        return redirect()->route('challenges.show', $challenge)->with('success', 'Your challenge is ready.');
    }
}
