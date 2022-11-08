<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('starting_page');
});

Route::get('/info', function () {
    return view('info');
});

//Route::get('/test/{name}/{age}', [HobbyController::class, 'index']);

Route::resource('hobby', HobbyController::class);

Route::resource('tag', TagController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
