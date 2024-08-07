<?php

use App\Http\Controllers\depositController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserCreateController;
use App\Http\Controllers\WithdrawController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');

Route::get('/', [UserController::class, 'create'])->name('create');
Route::post('/create', [UserCreateController::class, 'doCreate'])->name('doCreate');

// Route::post('/depositPage', [depositController::class, 'depositPage'])->name('depositPage');

Route::middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/deposit', [UserController::class, 'deposit'])->name('deposit');
    Route::post('/depositPage', [depositController::class, 'depositPage'])->name('depositPage');
    Route::get('/withdraw', [UserController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdrawPage', [WithdrawController::class, 'withdrawPage'])->name('withdrawPage');
    Route::get('/transfer', [UserController::class, 'transfer'])->name('transfer');
    Route::post('/transferPage', [TransferController::class, 'transferPage'])->name('transferPage');
    Route::get('/statement', [UserController::class, 'statement'])->name('statement');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
