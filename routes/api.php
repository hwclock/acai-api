<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PixKeyController;
use App\Http\Controllers\UserController;
use App\Models\PixKey;
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

Route::group([], function() {
    Route::apiResource('users', UserController::class);

    Route::apiResource('pessoas', PessoaController::class);

    Route::apiResource('chaves', PixKeyController::class);
    Route::get('chaves/get-by-pessoa/{pessoa}', [PixKeyController::class, 'getByPessoa'])->where('pessoa', '^\d*[0-9]$');

    Route::apiResource('/pedido', PedidosController::class);
});
