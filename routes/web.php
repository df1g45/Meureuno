<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PeulajaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('masuk', [AuthenticationController::class, 'login']);
Route::post('masuk', [AuthenticationController::class, 'authentication']);
Route::get('keluar', [AuthenticationController::class, 'logout']);
Route::get('daftar', [AuthenticationController::class, 'halaman_register']);
Route::post('daftar', [AuthenticationController::class, 'register']);

// Route::resources(['peulajaran' => PeulajaranController::class]);
Route::get('peulajaran', [PeulajaranController::class, 'index']);
Route::get('peulajaran/buat', [PeulajaranController::class, 'create']);
Route::post('peulajaran', [PeulajaranController::class, 'store']);
Route::get('peulajaran/{id}', [PeulajaranController::class, 'show']);
Route::get('peulajaran/{id}/edit', [PeulajaranController::class, 'edit']);
Route::patch('peulajaran/{id}', [PeulajaranController::class, 'update']);
Route::delete('peulajaran/{id}', [PeulajaranController::class, 'destroy']);
