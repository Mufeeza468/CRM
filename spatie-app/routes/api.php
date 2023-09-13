<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [UserController::class, 'logout']);
});

// '/api/teams' -> this endpoint is for Team

Route::resource('teams', TeamController::class);

// '/api/team-members' -> this endpoint is for TeamMember

Route::resource('team-members', TeamMemberController::class);


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
