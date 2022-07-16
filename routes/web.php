<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\BuilderController;
use App\Http\Controllers\Game\EloquentController;
use App\Http\Controllers\Home\MainPage;
use App\Http\Controllers\UserController;
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

//Users
Route::get('/users', [UserController::class, 'list'] )
    ->name('get.users');

Route::get('/users/{userId}', [UserController::class, 'show'])
    ->name('get.users.show');

Route::post('/users/{id}', [ProfileController::class, 'show'])
    ->name('get.users.profile');

Route::get('/users/{userId}', [UserController::class, 'show'])
    ->name('get.users.show');

//Games

Route::group([
    'prefix' => 'b/games',
    'namespace' => 'Game',
    'as' => 'games.b.'
], function() {
    Route::get('dashboard', [BuilderController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('', [BuilderController::class, 'index'])
        ->name('list');

    Route::get('{game}', [BuilderController::class, 'show'])
        ->name('show');
});

Route::group([
    'prefix' => 'e/games',
    'namespace' => 'Game',
    'as' => 'games.e.'
], function() {
    Route::get('dashboard', [EloquentController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('', [EloquentController::class, 'index'])
        ->name('list');

    Route::get('{game}', [EloquentController::class, 'show'])
        ->name('show');
});

// Route::prefix('/b/games/')->group(function () {
//     Route::get('dashboard', [BuilderController::class, 'dashboard'])
//         ->name('games.b.dashboard');

//     Route::get('', [BuilderController::class, 'index'])
//         ->name('games.b.list');

//     Route::get('{game}', [BuilderController::class, 'show'])
//         ->name('games.b.show');
// });
