<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controller\LoginController;
use Modules\User\Controller\LogRegisterController;
use Modules\User\Controller\MainController;

Route::get('user/login',[LoginController:: class, 'login'])->name('login');
Route::get('register', [LogRegisterController:: class, 'index']);
Route::post('register',[LogRegisterController:: class, 'store']);

Route::post('user/main',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix("user")->group(
        function () {
            Route::get('main',[MainController::class,'index'])->name('main');
            //Route::post('main',[LoginController::class,'store'])->name('main');
        }
    );
});


