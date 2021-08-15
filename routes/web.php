<?php

use App\Http\Controllers\RoleAssign;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [ HomeController::class, 'index' ])->name('home');

Route::get('/profile', [ HomeController::class, 'profile' ])->name('profile');
Route::get('/profile/edit', [ HomeController::class, 'profileEdit' ])->name('profile.edit');
Route::put('/profile/update', [ HomeController::class, 'profileUpdate' ])->name('profile.update');
Route::get('/profile/changepassword', [ HomeController::class, 'changePasswordForm' ])->name('profile.change.password');
Route::post('/profile/changepassword', [ HomeController::class, 'changePassword' ])->name('profile.changepassword');

Route::group(['middleware' => ['auth','role:Admin']], function ()
{
    Route::get('/roles-permissions', [ RolePermissionController::class, 'roles' ])->name('roles-permissions');
    Route::get('/role-create', [ RolePermissionController::class, 'createRole' ])->name('role.create');
    Route::post('/role-store', [ RolePermissionController::class, 'storeRole' ])->name('role.store');
    Route::get('/role-edit/{id}', [ RolePermissionController::class, 'editRole' ])->name('role.edit');
    Route::put('/role-update/{id}', [ RolePermissionController::class, 'updateRole' ])->name('role.update');

    Route::get('/permission-create', [ RolePermissionController::class, 'createPermission' ])->name('permission.create');
    Route::post('/permission-store', [ RolePermissionController::class, 'storePermission' ])->name('permission.store');
    Route::get('/permission-edit/{id}', [ RolePermissionController::class, 'editPermission' ])->name('permission.edit');
    Route::put('/permission-update/{id}', [ RolePermissionController::class, 'updatePermission' ])->name('permission.update');

    Route::resource('assignrole', RoleAssign::class);
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/', [ StudentController::class, 'index' ])->name('index');
        Route::get('/show/{student}', [ StudentController::class, 'show' ])->name('show');
        Route::get('/edit/{student}', [ StudentController::class, 'edit' ])->name('edit');
        Route::put('/update/{student}', [ StudentController::class, 'update' ])->name('update');
        Route::delete('/destroy/{student}', [ StudentController::class, 'destroy' ])->name('delete');
    });
    Route::resource('groups', GroupController::class);
});
