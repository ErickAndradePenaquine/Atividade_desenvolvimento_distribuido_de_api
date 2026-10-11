<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsarEstoqueController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function (): void {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(ClienteController::class)->group(function (): void {
        Route::get('/clientes', 'get');
        Route::get('/clientes/{id}', 'details');
        Route::post('/clientes', 'store');
        Route::put('/clientes/{id}', 'update');
        Route::patch('/clientes/{id}', 'update');
        Route::delete('/clientes/{id}', 'destroy');
    });

    Route::controller(StatusController::class)->group(function (): void {
        Route::get('/status', 'get');
        Route::get('/status/{id}', 'details');
        Route::post('/status', 'store');
        Route::put('/status/{id}', 'update');
        Route::patch('/status/{id}', 'update');
        Route::delete('/status/{id}', 'destroy');
    });

    Route::controller(EstoqueController::class)->group(function (): void {
        Route::get('/estoques', 'get');
        Route::get('/estoques/{id}', 'details');
        Route::post('/estoques', 'store');
        Route::put('/estoques/{id}', 'update');
        Route::patch('/estoques/{id}', 'update');
        Route::delete('/estoques/{id}', 'destroy');
    });

    Route::controller(ChamadoController::class)->group(function (): void {
        Route::get('/chamados', 'get');
        Route::get('/chamados/{id}', 'details');
        Route::post('/chamados', 'store');
        Route::put('/chamados/{id}', 'update');
        Route::patch('/chamados/{id}', 'update');
        Route::delete('/chamados/{id}', 'destroy');
    });

    Route::controller(UsarEstoqueController::class)->group(function (): void {
        Route::get('/usar-estoques', 'get');
        Route::get('/usar-estoques/{id}', 'details');
        Route::post('/usar-estoques', 'store');
        Route::delete('/usar-estoques/{id}', 'destroy');
    });
});
