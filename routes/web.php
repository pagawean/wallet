<?php

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

Route::group(['prefix' => 'admin', 'middleware' => ['menu','auth'], 'namespace' => 'Backend'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    Route::post('role_menus/mass_store', 'RoleMenusController@mass_store')->name('role_menus.mass_store');
    Route::get('roles/{id}/access', 'RolesController@access')->name('role.access');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('menus', 'MenusController');
    Route::resource('role_menus', 'RoleMenusController', [
        'names' => [
            'store'   => 'role_menus.store'
        ],
    ]);
   Route::resource('settings', 'SettingsController');


});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();
