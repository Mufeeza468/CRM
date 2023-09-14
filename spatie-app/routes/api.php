<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {

    //Routes for User Controller
    Route::get('/users', [UserController::class, 'show'])->middleware('permission:admin access|owner access'); //working
    Route::post('/logout', [UserController::class, 'logout']);

    Route::group(['middleware' => ['can:owner access']], function () {

        //Routes for Department Controller
        Route::post('/add', [DepartmentController::class, 'adding']); //working
        Route::put('/update/{id}', [DepartmentController::class, 'updating']); //working
        Route::delete('/delete/{id}', [DepartmentController::class, 'delete']); //working
        Route::get('/alldept', [DepartmentController::class, 'getData']); //working

        // Routes for Team Controller
        Route::get('/teamindex', [TeamController::class, 'index']); //working
        Route::post('/teamcreate', [TeamController::class, 'store']); //working
        Route::get('/teamshow/{id}', [TeamController::class, 'show']); //working
        Route::put('/teamupdate/{id}', [TeamController::class, 'update']); //working
        Route::delete('/teamdestroy/{id}', [TeamController::class, 'destroy']); //working

        Route::post('/membercreate', [TeamMemberController::class, 'store']); //working
    });

    Route::group(['middleware' => ['can:team lead access']], function () {

        Route::delete('/memberdelete/{id}', [TeamMemberController::class, 'destroy']); //working
        Route::get('/membershow', [TeamMemberController::class, 'index']); //working
        Route::post('/taskcreate', [TaskController::class, 'assignTask']); //working
        Route::get('/taskshow', [TaskController::class, 'show']); //working
        Route::delete('/taskdelete/{id}', [TaskController::class, 'destroy']); //working
        Route::put('/taskupdate/{id}', [TaskController::class, 'Update_task']); //working  //for updating complete start
        Route::put('/taskreassign/{id}', [TaskController::class, 'reassign_task']); //working //for reassigning the task
    });

    Route::post('/logout', [UserController::class, 'logout']);

});