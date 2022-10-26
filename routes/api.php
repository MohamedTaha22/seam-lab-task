<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Problem1Controller;
use App\Http\Controllers\Problem2Controller;
use App\Http\Controllers\Problem3Controller;

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


Route::get('problem1', [Problem1Controller::class, 'index']);
Route::get('problem2', [Problem2Controller::class, 'index']);
Route::get('problem3', [Problem3Controller::class, 'index']);
