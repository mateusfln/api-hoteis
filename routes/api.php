<?php

use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospedeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;

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

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::resource('hoteis', HotelController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('hospedes', HospedeController::class);
    Route::resource('apartamentos', ApartamentoController::class);
    Route::resource('reservas', ReservaController::class);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth.jwt');

Route::middleware(['auth.jwt'])->group(function () {
    Route::get('/hoteis', [HotelController::class, 'index']);
    Route::post('/hoteis', [HotelController::class, 'store']);
    // Outras rotas protegidas
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
