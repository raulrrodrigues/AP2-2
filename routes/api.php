<?php

use App\Http\Controllers\ClienteController;
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

route::get('/cliente', [ClienteController::class, 'listarTodos']);
route::post('/cliente', [ClienteController::class, 'criar']);
route::put('/cliente/{id}', [ClienteController::class, 'editar']);
route::delete('/cliente/{id}', [ClienteController::class, 'remover']);
route::get('/cliente/{id}', [ClienteController::class, 'listarPeloId']);
