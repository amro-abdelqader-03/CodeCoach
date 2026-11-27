<?php

use App\Http\Controllers\{AdminDashboardController,AuthController,ChallengeGenerationController,UserPagesController};
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'loginForm'])->name('login');
Route::post('/login',[AuthController::class,'login'])->middleware('throttle:10,1')->name('login.store');
Route::get('/admin/login',[AuthController::class,'adminLoginForm'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'adminLogin'])->middleware('throttle:10,1')->name('admin.login.store');
Route::get('/register',[AuthController::class,'registerForm'])->name('register');
Route::post('/register',[AuthController::class,'register'])->middleware('throttle:5,1')->name('register.store');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::view('/', 'pages.home')->name('home');
Route::view('/how-it-works', 'pages.how_it_works')->name('how-it-works');
Route::get('/gamification',[UserPagesController::class,'progress'])->middleware(['auth','role:user'])->name('gamification');
Route::get('/challenges',[UserPagesController::class,'challenges'])->name('challenges.index');
Route::view('/challenges/create', 'pages.create_challenge')->middleware(['auth','role:user'])->name('challenges.create');
Route::post('/challenges/generate', ChallengeGenerationController::class)->middleware(['auth','role:user|admin','throttle:5,1'])->name('challenges.generate');
Route::post('/challenges', [UserPagesController::class, 'storeChallenge'])->middleware(['auth','role:user'])->name('challenges.store');
Route::get('/challenges/{challenge}',[UserPagesController::class,'challenge'])->name('challenges.show');
Route::view('/ai-evaluation', 'pages.ai_evaluation')->middleware(['auth','role:user'])->name('ai-evaluation');
Route::get('/profile',[UserPagesController::class,'profile'])->middleware(['auth','role:user'])->name('profile');

Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function (): void {
    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
    Route::get('/users',[AdminDashboardController::class,'users'])->name('users');
    Route::get('/users/create',[AdminDashboardController::class,'createUser'])->name('users.create');
    Route::get('/users/{user}',[AdminDashboardController::class,'showUser'])->name('users.show');
    Route::get('/users/{user}/edit',[AdminDashboardController::class,'editUser'])->name('users.edit');
    Route::post('/users',[AdminDashboardController::class,'saveUser'])->name('users.store');
    Route::put('/users/{user}',[AdminDashboardController::class,'saveUser'])->name('users.update');
    Route::delete('/users/{user}',[AdminDashboardController::class,'deleteUser'])->name('users.destroy');
    Route::get('/challenges',[AdminDashboardController::class,'challenges'])->name('challenges');
    Route::get('/challenges/create',[AdminDashboardController::class,'createChallenge'])->name('challenges.create');
    Route::get('/challenges/{challenge}',[AdminDashboardController::class,'showChallenge'])->name('challenges.show');
    Route::get('/challenges/{challenge}/edit',[AdminDashboardController::class,'editChallenge'])->name('challenges.edit');
    Route::post('/challenges',[AdminDashboardController::class,'saveChallenge'])->name('challenges.store');
    Route::put('/challenges/{challenge}',[AdminDashboardController::class,'saveChallenge'])->name('challenges.update');
    Route::delete('/challenges/{challenge}',[AdminDashboardController::class,'deleteChallenge'])->name('challenges.destroy');
    Route::get('/appointments',[AdminDashboardController::class,'appointments'])->name('appointments');
    Route::get('/appointments/create',[AdminDashboardController::class,'createAppointment'])->name('appointments.create');
    Route::get('/appointments/{appointment}',[AdminDashboardController::class,'showAppointment'])->name('appointments.show');
    Route::get('/appointments/{appointment}/edit',[AdminDashboardController::class,'editAppointment'])->name('appointments.edit');
    Route::post('/appointments',[AdminDashboardController::class,'saveAppointment'])->name('appointments.store');
    Route::put('/appointments/{appointment}',[AdminDashboardController::class,'saveAppointment'])->name('appointments.update');
    Route::delete('/appointments/{appointment}',[AdminDashboardController::class,'deleteAppointment'])->name('appointments.destroy');
    Route::get('/shop-items',[AdminDashboardController::class,'items'])->name('items');
    Route::get('/shop-items/create',[AdminDashboardController::class,'createItem'])->name('items.create');
    Route::get('/shop-items/{item}',[AdminDashboardController::class,'showItem'])->name('items.show');
    Route::get('/shop-items/{item}/edit',[AdminDashboardController::class,'editItem'])->name('items.edit');
    Route::post('/shop-items',[AdminDashboardController::class,'saveItem'])->name('items.store');
    Route::put('/shop-items/{item}',[AdminDashboardController::class,'saveItem'])->name('items.update');
    Route::delete('/shop-items/{item}',[AdminDashboardController::class,'deleteItem'])->name('items.destroy');
    Route::view('/evaluations','admin.evaluations')->name('evaluations');
    Route::view('/reports','admin.reports')->name('reports');
    Route::view('/settings','admin.settings')->name('settings');
});
