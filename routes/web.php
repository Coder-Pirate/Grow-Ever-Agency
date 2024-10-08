<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\IndexController;

use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\SiteinfoController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
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


    //=================================Team Rote group ===============

    Route::controller(TeamController::class)->group(function () {
        Route::get('/admin/team/all', 'TeamAll')->name('admin.team');
        Route::get('/admin/team/add', 'TeamAdd')->name('team.add');
        Route::post('/admin/team/store', 'TeamStore')->name('store.team');
        Route::get('/admin/team/edit/{id}', 'TeamEdit')->name('team.edit');
        Route::post('/admin/team/update', 'TeamUpdate')->name('team.update');
        Route::get('/admin/team/delete/{id}', 'TeamDelete')->name('team.delete');
    });


    //=================================About Route group ===============

    Route::controller(AboutController::class)->group(function () {
        Route::get('/admin/about', 'AboutInfo')->name('admin.about');
        Route::get('/admin/about/eiit/{id}', 'AboutEdit')->name('admin.about.edit');
        Route::post('/admin/update/about', 'AboutUpdateinfo')->name('update.about');
        Route::post('/admin/about/image', 'AboutUpdateimage')->name('about.image');
    });


    //=================================Faq Route group ===============

    Route::controller(FaqController::class)->group(function () {
        Route::get('/admin/faq', 'FaqAll')->name('admin.faq');
        Route::get('/admin/faq/add', 'FaqAdd')->name('faq.add');
        Route::post('/admin/faq/store', 'FaqStore')->name('store.faq');
        Route::get('/admin/faq/eiit/{id}', 'FaqEdit')->name('admin.faq.edit');
        Route::post('/admin/update/faq', 'FaqUpdateinfo')->name('faq.update');
        Route::get('/admin/faq/delete/{id}', 'FaqDelete')->name('faq.delete');
    });

    //=================================Testimonial Route group ===============

    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/admin/testimonial', 'TestimonialAll')->name('admin.testimonial');
        Route::get('/admin/testimonial/add', 'TestimonialAdd')->name('add.testimonial');
        Route::post('/admin/testimonial/store', 'TestimonialStore')->name('store.testimonial');
        Route::get('/admin/testimonial/eiit/{id}', 'TestimonialEdit')->name('admin.testimonial.edit');
        Route::post('/admin/update/testimonial', 'TestimonialUpdateinfo')->name('update.testimonial');
        Route::get('/admin/testimonial/delete/{id}', 'TestimonialDelete')->name('testimonial.delete');
    });

    //=================================Testimonial Route group ===============

    Route::controller(PageController::class)->group(function () {
        Route::get('/admin/pages', 'PagesAll')->name('admin.pages');
        Route::get('/admin/edit/pages/{id}', 'PagesInfoedit')->name('edit.pages');
        Route::post('/admin/update/pagesinfo', 'PagesUpdateinfo')->name('update.pages');


        // Route::post('/admin/update/image', 'HomeUpdateimage')->name('update.image');
    });


     //=================================Contact Route group ===============

     Route::controller(ContactController::class)->group(function () {
        Route::get('/admin/contact', 'ContactAll')->name('admin.contact');
        Route::get('/admin/contact/info/{id}', 'ContactInfo')->name('contact.info');
        Route::get('/admin/contact/edit/{id}', 'ContactEdit')->name('contact.edit');
        Route::post('/admin/contact/update', 'ContactUpdate')->name('contact.update');
        Route::get('/admin/contact/delete/{id}', 'ContactlDelete')->name('contact.delete');

    });


     //=================================Siteinfo Route group ===============


    Route::controller(SiteinfoController::class)->group(function () {
        Route::get('/admin/siteinfo', 'SiteInfo')->name('admin.siteinfo');
        Route::post('/admin/sitefabicon/update', 'SiteInfoIconUpdate')->name('admin.siteicon.update');
        Route::post('/admin/sitelogo/update', 'SiteInfoLogoUpdate')->name('admin.sitelogo.update');
        Route::post('/admin/siteothesinfo/update', 'SiteInfoOthersUpdate')->name('admin.siteothersinfo.update');
        // Route::get('/admin/edit/pages/{id}', 'PagesInfoedit')->name('edit.pages');
        // Route::post('/admin/update/pagesinfo', 'PagesUpdateinfo')->name('update.pages');


        // Route::post('/admin/update/image', 'HomeUpdateimage')->name('update.image');
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
// Route::get('/login', [UserController::class, 'UserLogin'])->name('user.login')->middleware(RedirectIfAuthenticated::class);




//======================== Access All Frontend ========================




Route::controller(IndexController::class)->group(function () {

    Route::get('/', 'Index')->name('index');

    //==================Service ================

    Route::get('/services', 'Services')->name('home.servce');
    Route::get('/services/details/{id}/{slug}', 'ServicesDetails')->name('service.details');

    // ==================Blog ================

    Route::get('/blogs', 'Blogs')->name('home.blog');
    Route::get('/categoty/{id}/{slug}', 'BlogCategory')->name('category.blog');
    Route::get('/blog/details/{id}/{slug}', 'BlogDetails')->name('details.blog');

    // =============== Portfolio===============

    Route::get('/portfolios', 'Portfolio')->name('home.portfolio');
    Route::get('/portfolios/categoty/{id}/{slug}', 'PortfolioCategory')->name('category.portfilio');
    Route::get('/portfolio/details/{id}/{slug}', 'PortfolioDetails')->name('details.portfolio');

    // =============== About ===============

    Route::get('/about', 'About')->name('home.about');
    // =============== Faq ===============

    Route::get('/faq', 'Faq')->name('home.faq');

    // =============== Footer Menu ===============

    Route::get('/datails/{id}/{slug}', 'Pages')->name('home.pages');

    // =============== Contact Submit Menu ===============


    Route::get('/contact', 'Contact')->name('home.contact');
    Route::post('/submit', 'ContactSubmit')->name('submit.contact');
    // Route::get('/datails/{id}/{slug}', 'Pages')->name('home.pages');


});





//======================== Editor Image  All Frontend ========================
Route::post('/upload_image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');
Route::delete('delete-image', [ImageUploadController::class, 'deleteImage'])->name('delete.image');
