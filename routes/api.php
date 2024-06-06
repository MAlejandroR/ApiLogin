<?php

use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource("students", \App\Http\Controllers\StudentController::class)
    ->middleware("auth:sanctum");
Route::resource("teachers", \App\Http\Controllers\TeacherController::class);

Route::post("login", [LoginController::class,"login"]);

Route::post("register", [LoginController::class,"register"]);
