<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::post('/create', [TaskController::class, 'assignTask']);
Route::post('/show', [TaskController::class, 'show']);

Route::delete('/delete/{id}', [TaskController::class, 'destroy']);

Route::put('/update/{id}', [TaskController::class, 'Update_task']); // for updating complete start
Route::put('/reassign/{id}', [TaskController::class, 'reassign_task']); // for reassigning the task
//Route::resource('teams', TeamController::class);

// '/api/team-members' -> this endpoint is for TeamMember

//Route::resource('teammembers', TeamMemberController::class);


// Routes for TeamController
Route::get('/teamindex', [TeamController::class, 'index']);

Route::post('/teamcreate', [TeamController::class, 'store']);

Route::get('/teamshow/{id}', [TeamController::class, 'show']);

Route::put('/teamupdate', [TeamController::class, 'update']);

Route::delete('/teamdestroy/{id}', [TeamController::class, 'destroy']);

// Routes for TeamMemberController
Route::get('/memberindex', [TeamMemberController::class, 'index']);

Route::post('/membercreate', [TeamMemberController::class, 'store']);

Route::get('/membershow/{id}', [TeamMemberController::class, 'show']);

Route::put('/memberupdate/{id}', [TeamMemberController::class, 'update']);

Route::delete('/memberdestroy/{id}', [TeamMemberController::class, 'destroy']);



Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
