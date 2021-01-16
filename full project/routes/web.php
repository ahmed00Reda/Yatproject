<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

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
    return view('index');
});
Route::get('/catagories',[MainController::class, 'catagories'])->name('catagories');



route::middleware(['admin'])->group(function(){

  Route::get('/admin',[MainController::class, 'admin'])->name('admin');

//  user controller
Route::get('/admin/users',[UserController::class, 'users'])->name('users');
Route::post('/admin/add_user',[UserController::class, 'add_user'])->name('add_user');
Route::post('/admin/update_user/{id}',[UserController::class, 'update_user'])->name('update_user');
Route::get('/admin/delete_user/{id}',[UserController::class, 'delete_user'])->name('delete_user');


  //  game controller
Route::get('/admin/games',[GameController::class, 'games'])->name('games');
Route::post('/admin/add_game',[GameController::class, 'add_game'])->name('add_game');
Route::post('/admin/update_game/{id}',[GameController::class, 'update_game'])->name('update_game');
Route::get('/admin/delete_game/{id}',[GameController::class, 'delete_game'])->name('delete_game');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/details/{id}',[GameController::class, 'details'])->name('details');
Route::get('/catagory_games/{id}',[GameController::class, 'catagory_games'])->name('catagory_games');
