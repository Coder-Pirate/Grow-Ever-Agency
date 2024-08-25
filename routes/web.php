<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//  ================== User Dashboard Route ==================


Route::get('/dashboard', function () {
    return view('user.user_dashboard');
})->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// ======================== Admin Dashboard Route ========================
Route::middleware(['auth', 'roles:admin'])->group(function () {

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

});

// ======================== Manager Dashboard Route ========================

Route::middleware(['auth', 'roles:manager'])->group(function () {


Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');


});
