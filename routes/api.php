<?php

use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function () {
    Route::get('/{item}', [ItemController::class, 'show']);
    Route::post('/', [ItemController::class, 'store']);
    Route::put('/{item}', [ItemController::class, 'update']);
    Route::delete('/{item}', [ItemController::class, 'destroy']);
});
