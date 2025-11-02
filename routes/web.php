<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[SiteController::class,'index']);

Route::post('/login',[AuthController::class,'login'])->name('login');

//Rotas do cadastro

Route::get('/cadastro', function(){
    return view('auth/cadastro');
});

Route::post('/cadastro',[AuthController::class, 'cadastrar']);



Route::prefix('/dashboard')->middleware(['auth'])->group(function(){
    Route::get('/',[SiteController::class,'dashboard'] );
});