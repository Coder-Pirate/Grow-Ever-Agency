<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\IndexController;

use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\Role;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


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

    //=================================Home Info Rote group ===============

    Route::controller(HomeController::class)->group(function () {
        Route::get('/admin/homeinfo', 'HomeInfoAll')->name('admin.home.info');
        Route::get('/admin/edit/homeinfo/{id}', 'HomeInfoedit')->name('edit.info');
        Route::post('/admin/update/homeinfo', 'HomeUpdateinfo')->name('update.info');
        Route::post('/admin/update/image', 'HomeUpdateimage')->name('update.image');
    });

    //=================================Services Rote group ===============
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/admin/services', 'ServicesAll')->name('admin.services');
        Route::get('/admin/add/services', 'ServicesAdd')->name('admin.add.service');
        Route::post('/admin/add/services', 'AdminServicesAdd')->name('admin.service.add');
        Route::get('/admin/edit/services/{id}', 'AdminServicesEdit')->name('edit.services');
        Route::post('/admin/update/services', 'AdminServicesUpdate')->name('admin.service.update');
        Route::get('/admin/delete/services/{id}', 'AdminServicesDelete')->name('delete.setvices');
    });

    //=================================Category Rote group ===============

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/blog/category', 'BlogCategoryAll')->name('admin.blog.category');
        Route::get('/admin/blog/category/add', 'BlogCategoryAdd')->name('blog.category.add');
        Route::post('/admin/blog/category/store', 'BlogCategoryStore')->name('blog.category.store');
        Route::get('/admin/blog/category/edit/{id}', 'BlogCategoryEdit')->name('blog.category.edit');
        Route::post('/admin/blog/category/update', 'BlogCategoryUpdate')->name('blog.category.update');
        Route::get('/admin/blog/category/delete/{id}', 'BlogCategoryDelete')->name('blog.category.delete');

        //// ==================================Portfolio Category===============
        Route::get('/admin/portfoilo/category', 'PortfolioCategoryAll')->name('admin.portfolio.category');
        Route::get('/admin/portfoilo/category/add', 'PortfolioCategoryAdd')->name('blog.portfoilo.add');
        Route::post('/admin/portfoilo/category/store', 'PortfolioCategoryStore')->name('blog.portfoilo.store');
        Route::get('/admin/portfoilo/category/edit/{id}', 'PortfolioCategoryEdit')->name('blog.portfoilo.edit');
        Route::post('/admin/portfoilo/category/update', 'PortfolioCategoryUpdate')->name('blog.portfoilo.update');
        Route::get('/admin/blog/portfoilo/delete/{id}', 'PortfolioCategoryDelete')->name('blog.portfoilo.delete');
    });

    //=================================Blog Rote group ===============

    Route::controller(BlogController::class)->group(function () {
        Route::get('/admin/blog/all', 'BlogAll')->name('admin.blog.all');
        Route::get('/admin/blog/add', 'BlogAdd')->name('admin.blog.add');
        Route::post('/admin/blog/store', 'BlogStore')->name('store.blog');
        Route::get('/admin/blog/edit/{id}', 'BlogEdit')->name('blog.edit');
        Route::post('/admin/blog/update', 'BlogUpdate')->name('blog.update');
        Route::get('/admin/blog/delete/{id}', 'BlogDelete')->name('blog.delete');
    });

    //=================================Portfolio Rote group ===============

    Route::controller(PortfolioController::class)->group(function () {
        Route::get('/admin/portfolio/all', 'PortfolioAll')->name('admin.portfolio.all');
        Route::get('/admin/portfolio/add', 'PortfolioAdd')->name('admin.portfolio.add');
        Route::post('/admin/portfolio/store', 'PortfolioStore')->name('store.portfolio');
        Route::get('/admin/portfolio/edit/{id}', 'PortfolioEdit')->name('portfolio.edit');
        Route::post('/admin/portfolio/update', 'PortfolioUpdate')->name('portfolio.update');
        Route::get('/admin/portfolio/delete/{id}', 'PortfolioDelete')->name('portfolio.delete');

    });
});

// ======================== Manager Dashboard Route ========================

Route::middleware(['auth', 'roles:manager'])->group(function () {


    Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
    Route::get('/manager/logout', [ManagerController::class, 'ManagerLogout'])->name('manager.logout');
    Route::get('/manager/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
    Route::post('/manager/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
    Route::get('/manager/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
    Route::post('/manager/password/update', [ManagerController::class, 'ManagerPasswordUpdate'])->name('manager.password.update');


    //

});



//======================== Access All login Route ========================

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login')->middleware(RedirectIfAuthenticated::class);




//======================== Access All Frontend ========================




Route::controller(IndexController::class)->group(function () {

    Route::get('/', 'Index')->name('index');
    Route::get('/services', 'Services')->name('home.servce');
    Route::get('/services/details/{id}/{slug}', 'ServicesDetails')->name('service.details');
    Route::get('/blogs', 'Blogs')->name('home.blog');
    Route::get('/categoty/{id}/{slug}', 'BlogCategory')->name('category.blog');
    Route::get('/blog/details/{id}/{slug}', 'BlogDetails')->name('details.blog');
});





//======================== Editor Image  All Frontend ========================
Route::post('/upload_image', [ImageUploadController::class, 'upload'])->name('images.upload');
Route::get('/images', [ImageUploadController::class, 'loadImages'])->name('images.load');
Route::post('/delete_image', [ImageUploadController::class, 'delete'])->name('images.delete');
