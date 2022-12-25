<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// All diaries
Route::get('/', [DiaryController::class, 'index']);

// Create new diary
Route::get('/diaries/create', [DiaryController::class, 'create']);

// Store Diary Data
Route::post('/diaries', [DiaryController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/diaries/{diary}/edit', [DiaryController::class, 'edit'])->middleware('auth');

// Update Diary
Route::put('/diaries/{diary}', [DiaryController::class, 'update'])->middleware('auth');

// Delete Diary
Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy'])->middleware('auth');

// Manage diaries
Route::get('/diaries/manage', [DiaryController::class, 'manage'])->middleware('auth');

// Single Diary
Route::get('/diaries/{diary}', [DiaryController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

