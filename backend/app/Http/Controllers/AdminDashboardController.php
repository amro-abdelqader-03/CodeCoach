<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Challenge;
use App\Models\ChallengeSubmission;
use App\Models\ShopItem;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'userCount' => User::where('role', 'user')->count(),
            'challengeCount' => Challenge::count(),
            'appointmentCount' => Appointment::count(),
            'itemCount' => ShopItem::count(),
            'appointments' => Appointment::with(['user', 'evaluator'])->latest()->take(5)->get(),
            'recentUsers' => User::where('role', 'user')->latest()->take(4)->get(),
        ]);
    }

    public function users(): View
    {
        return view('admin.users', ['users' => User::latest()->paginate(15)]);
    }

    public function createUser(): View
    {
        return view('admin.user-form');
    }

    public function editUser(User $user): View
    {
        return view('admin.user-form', compact('user'));
    }

    public function showUser(User $user): View
    {
        return view('admin.record', ['title' => 'User', 'record' => $user]);
    }

    public function challenges(): View
    {
        return view('admin.challenges', [
            'challenges' => Challenge::with(['user', 'tasks'])->latest()->paginate(15),
            'users' => User::where('role', 'user')->get(),
        ]);
    }

    public function createChallenge(): View
    {
        return view('admin.challenge-form', ['users' => User::where('role', 'user')->get()]);
    }

    public function editChallenge(Challenge $challenge): View
    {
        return view('admin.challenge-form', [
            'challenge' => $challenge->load('tasks'),
            'users' => User::where('role', 'user')->get(),
        ]);
    }

    public function showChallenge(Challenge $challenge): View
    {
        return view('admin.challenge-show', ['challenge' => $challenge->load(['user', 'tasks'])]);
    }

    public function appointments(): View
    {
        return view('admin.appointments', [
            'appointments' => Appointment::with(['user', 'evaluator'])->latest()->paginate(15),
            'users' => User::all(),
        ]);
    }

    public function evaluations(): View
    {
        return view('admin.evaluations', [
            'submissions' => ChallengeSubmission::with(['challenge', 'task', 'user', 'appointment.evaluator'])
                ->latest()
                ->paginate(15),
            'evaluationCount' => ChallengeSubmission::count(),
            'peerReviewCount' => ChallengeSubmission::whereIn('status', ['peer_review', 'completed'])->count(),
            'averageScore' => round((float) ChallengeSubmission::whereNotNull('ai_score')->avg('ai_score'), 1),
            'pendingCount' => ChallengeSubmission::whereIn('status', ['ai_pending', 'ai_failed'])->count(),
        ]);
    }

    public function createAppointment(): View
    {
        return view('admin.appointment-form', ['users' => User::all()]);
    }

    public function editAppointment(Appointment $appointment): View
    {
        return view('admin.appointment-form', ['appointment' => $appointment, 'users' => User::all()]);
    }

    public function showAppointment(Appointment $appointment): View
    {
        return view('admin.record', [
            'title' => 'Appointment',
            'record' => $appointment->load(['user', 'evaluator']),
        ]);
    }

    public function items(): View
    {
        return view('admin.shop-items', ['items' => ShopItem::latest()->paginate(15)]);
    }

    public function createItem(): View
    {
        return view('admin.item-form');
    }

    public function editItem(ShopItem $item): View
    {
        return view('admin.item-form', compact('item'));
    }

    public function showItem(ShopItem $item): View
    {
        return view('admin.record', ['title' => 'Shop item', 'record' => $item]);
    }
}
