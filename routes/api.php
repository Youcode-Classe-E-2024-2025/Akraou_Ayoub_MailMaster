<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::apiResource('subscribers', SubscriberController::class);

Route::get('/docs', function () {
    return redirect('/vendor/swagger-ui/index.html?url=/docs/swagger.yaml');
});
