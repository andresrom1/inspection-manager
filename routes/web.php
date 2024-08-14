<?php

use App\Http\Controllers\InspectionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TakerController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

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
    return redirect(route('inspections.index'));
});

Route::get('/thankyou', function() {
    return view('photo.thankyou');
})->name('photo.thankyou');
Route::get('/expired', function() {
    return view('photo.linkExpirado');
})->name('link.expirado');

Route::get('/flowbite-test', function () {
    return view('flowbite.test');
});

Route::get('/no-tiene-permisos-suficientes', function () {
    return view('noTienePermisos');
})->name('no.tiene.permisos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','tiene.permisos'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/inspections', [InspectionController::class, 'index'])->middleware('auth','tiene.permisos')->name('inspections.index');
Route::post('/inspection', [InspectionController::class, 'store'])->middleware('auth','tiene.permisos')->name('inspection.store');
Route::post('/inspection/{inspection}/updateStatus', [InspectionController::class, 'changeStatus'])->name('inspection.updateStatus');
Route::get('/inspection/{inspection}/editStatus', [InspectionController::class, 'editStatus'])->middleware('auth','tiene.permisos')->name('inspection.editStatus');
Route::get('/inspection/create', [InspectionController::class, 'create'])->middleware('auth','tiene.permisos')->name('inspection.create');
Route::get('/inspection/{inspection}/ConfirmDelete', [InspectionController::class, 'destroyConfirm'])->middleware('auth','tiene.permisos')->name('inspection.destroyConfirm');
Route::get('/inspection/{inspection}', [InspectionController::class, 'show'])->middleware('auth','tiene.permisos')->name('inspection.show');
Route::get('/inspection/{inspection}/edit', [InspectionController::class, 'edit'])->middleware('auth','tiene.permisos')->name('inspection.edit');
Route::delete('/inspection/{inspection}', [InspectionController::class, 'destroy'])->middleware('auth','tiene.permisos')->name('inspection.destroy');
Route::patch('/inspection/{inspection}', [InspectionController::class, 'update'])->middleware('auth','tiene.permisos')->name('inspection.update');
Route::get('inspections.json', [InspectionController::class, 'indexTable'])->middleware('auth','tiene.permisos')->name('inspections.indexTable');

//Route::get('inspection/{inspection}/{token}/photo', [PhotoController::class, 'create'])->middleware('check.token','only.mobile')->name('photo.create');
Route::get('inspection/{inspection}/{token}/photo', [PhotoController::class, 'create'])->middleware('check.token','only.mobile')->name('photo.checkMail');
Route::post('inspection/validated', [PhotoController::class, 'checkmail'])->middleware('check.mail', 'check.status')->name('photo.performCheck');
Route::post('photo', [PhotoController::class, 'store'])->name('photo.store');
Route::post('photo/cloudinaryUpload/{inspection}', [PhotoController::class, 'storeCloudinary'])->name('photo.storeCloudinary');
Route::get('inspection/{inspection}/photo', [PhotoController::class, 'index'])->name('photo.index');


/*Esta ruta hay que cambiarla*/Route::get('/takers', [TakerController::class, 'search'])->name('takers.search');
Route::post('/takers', [TakerController::class, 'store'])->middleware('auth','tiene.permisos')->name('takers.store');
Route::get('/takers/create', [TakerController::class, 'create'])->middleware('auth','tiene.permisos')->name('takers.create');

Route::post('/policy', [PolicyController::class, 'store'])->middleware('auth','tiene.permisos')->name('policy.store');
Route::get('/policy', [PolicyController::class, 'search'])->name('takers.search');


Route::get('/notification/create', [NotificationController::class, 'create'])->middleware('auth','tiene.permisos')->name('notification.create');

Route::get('/payment/create', [PaymentMethodController::class, 'create'])->middleware('auth','tiene.permisos')->name('payment.create');