<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\HobbyTagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::resource('user', UserController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Filtered View
Route::get('/hobby/tag/{tag_id}', [HobbyTagController::class, 'getFilteredHobbies'])->name('hobby_tag');

// Attach tags to hobbies
Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', [HobbyTagController::class, 'attachTag']);

// Detach tags from hobbies
Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', [HobbyTagController::class, 'detachTag']);

// Delete images of hobby
Route::get('/delete-images/hobby/{hobby_id}', [HobbyController::class, 'deleteImages']);
