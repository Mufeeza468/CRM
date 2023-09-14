<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

Route::post('/allusers', [UserController::class, 'user'])->middleware('permission:access_user');
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Routes for DepartmentController
Route::post('add', [DepartmentController::class, 'adding'])->middleware('permission:create_departments');
Route::put('update/{id}', [DepartmentController::class, 'updating'])->middleware('permission:update_departments');
Route::delete('delete/{id}', [DepartmentController::class, 'delete'])->middleware('permission:access_departments');
Route::get('get', [DepartmentController::class, 'getData'])->middleware('permission:access_departments');
;


// Routes for TeamController
Route::get('/teamindex', [TeamController::class, 'index'])->middleware('permission:view_team');
Route::post('/teamcreate', [TeamController::class, 'store'])->middleware('permission:add_team');
Route::get('/teamshow/{id}', [TeamController::class, 'show'])->middleware('permission:view_team');
Route::put('/teamupdate', [TeamController::class, 'update'])->middleware('permission:update_team');
Route::delete('/teamdestroy/{id}', [TeamController::class, 'destroy'])->middleware('permission:add_team');


// Routes for TeamMemberController
Route::post('/membercreate', [TeamMemberController::class, 'store'])->middleware('permission:add_team');
Route::post('/membershow', [TeamMemberController::class, 'index'])->middleware('permission:view_team');
Route::delete('/memberdestroy/{id}', [TeamMemberController::class, 'destroy'])->middleware('permission:add_team');


//Routes for TaskController
Route::post('/taskcreate', [TaskController::class, 'assignTask'])->middleware('permission:assign_task');
Route::post('/taskshow', [TaskController::class, 'show'])->middleware('permission:view_task');
Route::delete('/taskdelete/{id}', [TaskController::class, 'destroy'])->middleware('permission:create_task');
Route::put('/taskupdate/{id}', [TaskController::class, 'Update_task'])->middleware('permission:update_task'); // for updating complete start
Route::put('/taskreassign/{id}', [TaskController::class, 'reassign_task'])->middleware('permission:assign_task'); // for reassigning the task
