<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [AuthController::class, "login"]);
Route::post('logout', [AuthController::class, "logout"])->middleware('auth.jwt');
Route::post('me', [AuthController::class, "me"])->middleware('auth.jwt');
Route::post('refresh', [AuthController::class, "refresh"])->middleware('auth.jwt');

Route::get('usuarios', [UsuarioController::class, "usuarios"]);

//Route::get('user', [UserController::class, "index"])->middleware('auth.jwt');

Route::apiResource('user', UserController::class)->middleware('auth.jwt');

Route::any('/', function(){
    return response()->json([
        'error' => 'Bad Request'
    ], 400);
})->name('error');