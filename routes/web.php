<?php

use App\Http\Controllers\InspectionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/flowbite-test', function () {
    return view('flowbite.test');
});

Route::get('/no-tiene-permisos-suficientes', function () {
    return view('noTienePermisos');
})->name('no.tiene.permisos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/inspection', [InspectionController::class, 'store'])->middleware('auth','tiene.permisos')->name('inspection.store');
Route::get('/inspection', [InspectionController::class, 'create'])->middleware('auth','tiene.permisos')->name('inspection.create');

Route::get('/inspection/{inspection}/photo', [PhotoController::class, 'create'])->name('photo.create');

require __DIR__.'/auth.php';
