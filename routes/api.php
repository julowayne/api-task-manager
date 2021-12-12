<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[ApiAuthController::class, 'register']);
Route::post('/login',[ApiAuthController::class, 'login']);


Route::middleware('auth:sanctum')->post('/tasks',[ApiTaskController::class, 'createTask']);
Route::middleware('auth:sanctum')->get('/tasks',[ApiTaskController::class, 'getAllTasks']);
Route::middleware('auth:sanctum')->get('/tasks/{taskId}',[ApiTaskController::class, 'getTaskById']);
Route::middleware('auth:sanctum')->put('/tasks/{taskId}',[ApiTaskController::class, 'updateTaskById']);
Route::middleware('auth:sanctum')->delete('/tasks/{taskId}',[ApiTaskController::class, 'deleteTaskById']);

