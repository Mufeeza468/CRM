<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create', [TaskController::class, 'assignTask']);
Route::post('/show', [TaskController::class, 'show']);

Route::delete('/delete/{id}', [TaskController::class, 'destroy']);

Route::put('/update/{id}', [TaskController::class, 'Update_task']); // for updating complete start
Route::put('/reassign/{id}', [TaskController::class, 'reassign_task']); // for reassigning the task
