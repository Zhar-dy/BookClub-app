<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Roles Controller
Route::get('role',[RoleController::class, 'index'])->name('roles.index');
Route::get('role/create',[RoleController::class, 'create'])->name('roles.create');
Route::post('role',[RoleController::class, 'store'])->name('roles.store');
Route::get('role/show/{id}',[RoleController::class, 'show'])->name('roles.show');
Route::get('role/edit/{id}',[RoleController::class, 'edit'])->name('roles.edit');
Route::put('role/update/{id}',[RoleController::class, 'update'])->name('roles.update');

//Permissions Controller
Route::get('permission',[PermissionController::class, 'index'])->name('permission.index');
Route::get('permission/create',[PermissionController::class, 'create'])->name('permission.create');
Route::post('permission',[PermissionController::class, 'store'])->name('permission.store');

//Genre Controller
Route::resource('genre', GenreController::class);
