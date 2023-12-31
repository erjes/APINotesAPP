<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\RegisterController;
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

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::post('getimage', [NotesController::class, 'showimage']);
Route::post('getnote', [NotesController::class, 'showdata']);
Route::post('postnote', [NotesController::class, 'create']);
Route::post('updatenote', [NotesController::class, 'update']);
Route::post('deletenote', [NotesController::class, 'destroy']);

