<?php

use App\Models\Package;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReservController;
use App\Http\Controllers\PackageController;

Route::get('/', [homeController::class,'index'])->name('welcome');

Route::get('/about', [homeController::class,'About']);

Route::get('/services', [homeController::class,'Service']);

Route::get('/package', [homeController::class,'Package']);

Route::get('/contact', [homeController::class,'Contact']);



Route::get('/login_register',[AuthController::class,'LoginRegisterForm'])->name('login_register');


Route::post('/register',[AuthController::class,'registerUser'])->name('registerUser');
Route::get('/login',[AuthController::class,'loginUser'])->name('loginUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [adminController::class, 'admin'])->name('admin');
Route::get('/ListeClient',[adminController::class,'ListeClient'])->name('ListeClient');
Route::get('/deleteClient/{id}',[adminController::class,'deleteClient'])->name('deleteClient');

Route::resource('packages', PackageController::class);
Route::get('/ListePackage',[PackageController::class,'index'])->name('ListePackage');
Route::get('/AddPackage',[PackageController::class,'create']);
Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{id}', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');

Route::get('/package', [PackageController::class, 'showPackagesForClients'])->name('showPackagesForClients');



Route::get('/description/{id}', [PackageController::class,'description']);
Route::get('/reserve/{id}', [ReservController::class,'reservation']);
Route::resource('reservations', ReservController::class);
Route::post('/reserve/{id}/store', [ReservController::class, 'store'])->name('reservations.store');


Route::resource('coupons', CouponController::class);
Route::get('/ListCoupon',[CouponController::class,'index'])->name('ListCoupon');
Route::get('/AddCoupon',[CouponController::class,'create']);
Route::post('/coupons',[CouponController::class,'store'])->name('coupons.store');
Route::get('/coupons/{id}/edit',[CouponController::class,'edit'])->name('coupons.edit');
Route::put('/coupons/{id}',[CouponController::class,'update'])->name('coupons.update');
Route::delete('/coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');



Route::get('/facture', [ReservController::class, 'showInvoice'])->name('facture.show');


Route::get('/ListReservation', [ReservController::class, 'showReservationsForAdmin'])->name('ListReservation');
Route::delete('/ListReservation/{id}', [ReservController::class, 'destroy'])->name('reservations.destroy');






?>



