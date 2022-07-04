<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\MainPage;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\ShowAddress;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', MainPage::class)
    ->name('home.mainPage');

Route::get('/users', [UserController::class, 'list'] )
    ->name('get.users');

Route::get('/users/{userId}', [UserController::class, 'show'])
    ->name('get.users.show');

Route::post('/users/{id}', [ProfileController::class, 'show'])
    ->name('get.users.profile');

Route::get('/users/{userId}', [UserController::class, 'show'])
    ->name('get.users.show');
