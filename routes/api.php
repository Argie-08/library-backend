<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

Route::post("/uploadFile", [LibraryController::class, "uploadFile"]);
Route::get("/getFile", [LibraryController::class, "getFile"]);
Route::get("/getFiles", [LibraryController::class, "getFiles"]);
Route::get("/getFilesReact", [LibraryController::class, "getFilesReact"]);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
