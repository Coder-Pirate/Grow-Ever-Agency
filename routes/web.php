<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\Role;
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

require __DIR__ . '/auth.php';




// ======================== Admin Dashboard Route ========================
Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});

// ======================== Manager Dashboard Route ========================

Route::middleware(['auth', 'roles:manager'])->group(function () {


    Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
    Route::get('/manager/logout', [ManagerController::class, 'ManagerLogout'])->name('manager.logout');
    Route::get('/manager/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
    Route::post('/manager/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
    Route::get('/manager/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
    Route::post('/manager/password/update', [ManagerController::class, 'ManagerPasswordUpdate'])->name('manager.password.update');

});



//======================== Access All ========================

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login')->middleware(RedirectIfAuthenticated::class);
