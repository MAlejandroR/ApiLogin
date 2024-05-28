<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource("students", \App\Http\Controllers\StudentController::class);
Route::resource("teachers", \App\Http\Controllers\TeacherController::class);
