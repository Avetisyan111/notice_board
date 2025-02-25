<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::post('/signup', [SignupController::class, 'run'])->name('signup');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'run'])->name('login');
Route::post('/logout', [LogoutController::class, 'run'])->name('logout');

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');

Route::get('/adminDashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/adminDashboard', [AdminController::class, 'addStory'])->name('story.create');
Route::get('/approveStory/{id}' , [AdminController::class, 'approve'])->name('story.approve');




