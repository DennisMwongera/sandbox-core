<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApplicationStatusController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Login


// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('posts', [PostController::class, 'index']);
Route::group(['prefix' => 'post'], function () {
	Route::post('add', [PostController::class, 'add']);
	Route::get('edit/{id}', [PostController::class, 'edit']);
	Route::post('update/{id}', [PostController::class, 'update']);
	Route::delete('delete/{id}', [PostController::class, 'delete']);
});


// Applications
Route::get('applications', [ApplicationController::class, 'index']);
Route::post('add/application', [ApplicationController::class, 'add']);
Route::get('edit/{id}', [ApplicationController::class, 'edit']);



// Programmes
Route::get('programmes', [ProgrammeController::class, 'index']);
Route::post('programmes', [ProgrammeController::class, 'store']);
Route::get('programme/{id}', [ProgrammeController::class, 'show']);
Route::put('programme/{id}', [ProgrammeController::class, 'update']);
Route::delete('programmes/{programme}', [ProgrammeController::class, 'destroy']);


//status
Route::get('/statuses', [ApplicationStatusController::class, 'index']);

