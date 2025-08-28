<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function(){
    Route::post('register',[UserController::class,'register'])->name('users.register');
});
