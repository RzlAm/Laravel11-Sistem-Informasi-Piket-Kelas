<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/jadwal', function () {
    return view('Jadwal', [
        "title" => "Jadwal",
        "active" => "jadwal"
    ]);
});
Route::get('/piket', function () {
    return view('piket', [
        "title" => "Piket",
        "active" => "piket"
    ]);
});
Route::get('/login', [AuthController::class, "login"])->middleware('guest');
Route::post('/login', [AuthController::class, "authenticate"])->middleware('guest');
