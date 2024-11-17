<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("events", [ApiController::class, "get_events"]);
Route::post("events", [ApiController::class, "set_approval"]);