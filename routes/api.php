<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ForceJsonResponse;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//========Contacts Routes============

Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/contacts/phone/{phoneContact}', [ContactsController::class, 'phoneFind']);
Route::get('/contacts/{contact}', [ContactsController::class, 'show']);
Route::post('/contacts', [ContactsController::class, 'store']);
Route::delete('/contacts/{contact}',[ContactsController::class, 'delete']);

//========Users Routes============

Route::post('/register', [AuthController::class,'register']);









