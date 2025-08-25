<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/contacts/{contact}',[ContactsController::class,'show']);
Route::post('/contacts', [ContactsController::class, 'store']);
Route::delete('/contacts/{contact}',[ContactsController::class, 'delete']);

