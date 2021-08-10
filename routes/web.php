<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [ HomeController::class, 'index' ])->name('index');

/**
 * The Group routes
 */
Route::get('/groups/create', [ GroupController::class, 'create' ])->name('groups.create');
Route::get('/groups', [ GroupController::class, 'index' ])->name('groups.index');
Route::post('/groups', [ GroupController::class, 'store' ])->name('groups.store');
Route::get('/groups/{group}', [ GroupController::class, 'show' ])->name('groups.show');
Route::patch('/groups/{group}', [ GroupController::class, 'edit' ])->name('groups.edit');
Route::put('/groups/{group}', [ GroupController::class, 'update' ])->name('groups.update');
Route::delete('/groups/{group}', [ GroupController::class, 'destroy' ])->name('groups.destroy');
