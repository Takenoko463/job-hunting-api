<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/greeting', 
[GreetingController::class, 'index']);

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\JobHuntingStatusController;
Route::apiResource('user.job_hunting_statuses',JobHuntingStatusController::class)->only('index');
Route::apiResource('job_hunting_statuses',JobHuntingStatusController::class)->except('index');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);