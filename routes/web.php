<?php

use App\Http\Controllers\DispatchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::middleware("cache.headers:no_store")->group(function () {
    Route::redirect("/", "login");
    Route::get("login", function () {
        return view("login");
    })->name("login");
    Route::post("login", [LoginController::class, "login"]);
    Route::prefix("admin")->middleware("auth")->group(function () {
        Route::get("menu", function () {
            return view("menu");
        })->name("menu");
        Route::post("logout", [LoginController::class, "logout"])->name("logout");
        Route::resource("worker", WorkerController::class);
        Route::resource("event", EventController::class);
        Route::resource("dispatch", DispatchController::class);
    });
});