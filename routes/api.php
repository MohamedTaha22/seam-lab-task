<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("/users", [UserController::class,'index']);
Route::post("/register", [UserController::class,'register']);
Route::delete("/user/{userid}", [UserController::class,'destroy']);
Route::get("/user/{userid}", [UserController::class,'show']);
Route::patch("/user/{userid}", [UserController::class,'update']);
Route::post("/login", [UserController::class,'login']);
