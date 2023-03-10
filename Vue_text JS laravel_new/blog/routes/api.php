<?php

use App\Models\Currency;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::get("currency", function () {
    return Currency::first();
});

Route::post("send", [TestController::class, "send"]);

Route::post("change", [TestController::class, "change"]);

Route::post("text", [TestController::class, "text"]);

Route::get("update", [TestController::class, "update"]);

Route::delete("delete", [TestController::class, "delete"]);
