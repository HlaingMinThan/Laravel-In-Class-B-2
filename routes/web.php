<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\MustBeAuthUser;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAuthUser::class)->group(function () {
    Route::get("/", [BlogController::class, 'index']);
    Route::post("/logout", [LogoutController::class, 'destroy']);
    Route::get("/blogs/{blog:slug}", [BlogController::class, 'show']);
});

Route::get("/login", [LogInController::class, 'create']);
Route::post("/user-login", [LogInController::class, 'store']);
Route::get("/register", [RegisterController::class, 'create']);
Route::post("/user-store", [RegisterController::class, 'store']);
