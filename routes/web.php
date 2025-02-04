<?php

use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkRoomController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/dashboard', [DashController::class, 'index'])->name('admin.dashboard');
//Specialties
Route::get('/admin/specialties', [SpecialtiesController::class, 'index'])->name('admin.specialties.index');
Route::get('/admin/specialties/create', [SpecialtiesController::class, 'create'])->name('admin.specialties.create');
//Workrooms
Route::get('/admin/workrooms', [WorkRoomController::class, 'index'])->name('admin.workrooms.index');
Route::get('/admin/workrooms/create', [WorkroomController::class, 'create'])->name('admin.workrooms.create');
//Users
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
//Menus
Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus/store', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/edit/{slug}', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/edit/{slug}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/destroy/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
