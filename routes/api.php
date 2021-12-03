<?php

use App\Http\Controllers\ApiAuthController;
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


Route::post('/tasks',[ApiAuthController::class, 'createTask']);
Route::get('/tasks',[ApiAuthController::class, 'getAllTasks']);
Route::get('/tasks/{taskId}',[ApiAuthController::class, 'getTaskById']);
Route::put('/tasks/{taskId}',[ApiAuthController::class, 'updateTask']);
Route::delete('/tasks/{taskId}',[ApiAuthController::class, 'deleteTask']);

