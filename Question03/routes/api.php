<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('student',[StudentController::class,'index']);
Route::post('student',[StudentController::class,'upload']);
Route::put('student/edit/{id}',[StudentController::class,'edit']);
Route::delete('student/edit/{id}',[StudentController::class,'delete']);