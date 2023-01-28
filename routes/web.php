<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\IndexAdministrators;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\ProfileAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/foo', function () {
	Artisan::call('storage:link');
});


Route::get('membresias', [HomeController::class, 'membresias'])->name('memberships');

Route::group(['middleware' => ['auth']], function () {

	Route::get('profile', [ProfileController::class, 'profile'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('password', [ProfileController::class, 'password'])->name('profile.password');
});


Route::group(['middleware' => ['role:administrador']], function () {

	Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
	Route::get('dashboard/profile', [ProfileAdminController::class, 'edit'])->name('dashboard.edit');
	Route::put('dashboard/profile', [ProfileAdminController::class, 'update'])->name('dashboard.update');
	Route::put('dashboard/password', [ProfileAdminController::class, 'password'])->name('dashboard.password');

	Route::resource('dashboard/users', UserController::class)->except(['show']);
	Route::resource('dashboard/membresias', MembershipController::class)->except(['show']);
	
	Route::get('dashboard/administradores', [IndexAdministrators::class, '__invoke'])->name('administradores.index');

	Route::resource('dashboard/users', UserAdminController::class)->except(['delete']);
});
