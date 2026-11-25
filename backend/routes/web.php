<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/how-it-works', 'pages.how_it_works')->name('how-it-works');
Route::view('/gamification', 'pages.gamification')->name('gamification');
Route::view('/challenges', 'pages.challenges')->name('challenges.index');
Route::view('/challenges/create', 'pages.create_challenge')->name('challenges.create');
Route::view('/challenges/{challenge}', 'pages.challenge_details')->name('challenges.show');
Route::view('/ai-evaluation', 'pages.ai_evaluation')->name('ai-evaluation');
Route::view('/profile', 'pages.profile')->name('profile');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::view('/users', 'admin.users')->name('users');
    Route::view('/challenges', 'admin.challenges')->name('challenges');
    Route::view('/evaluations', 'admin.evaluations')->name('evaluations');
    Route::view('/appointments', 'admin.appointments')->name('appointments');
    Route::view('/reports', 'admin.reports')->name('reports');
    Route::view('/settings', 'admin.settings')->name('settings');
});
