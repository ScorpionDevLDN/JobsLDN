<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGetContactUsController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\Currency\CurrencyController;
use App\Http\Controllers\Admin\DynamicController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PaymentConteroller;
use App\Http\Controllers\Admin\Per\PerController;
use App\Http\Controllers\Admin\Type\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\User\RegisterAndLoginController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('changeStatus', [CategoryController::class,'updateCategoryStatus'])->name('changeStatus');
Route::get('changeCityStatus', [CityController::class,'updateCityStatus'])->name('changeCityStatus');
Route::get('changeCurrencyStatus', [CurrencyController::class,'changeCurrencyStatus'])->name('changeCurrencyStatus');
Route::get('changePerStatus', [PerController::class,'changePerStatus'])->name('changePerStatus');
Route::get('changeTypeStatus', [TypeController::class,'changeTypeStatus'])->name('changeTypeStatus');


//admin routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::view('/login', 'dashboard.admin.login')->name('login');
    Route::post('/check', [AdminController::class, 'check'])->name('check');

    Route::middleware('auth:admins')->group(callback: function () {
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::resource('categories', CategoryController::class)->middleware(['permission:category-list']);

        Route::resource('cities', CityController::class)->middleware(['permission:city-list']);

        Route::resource('pers', PerController::class)->middleware(['permission:per-list']);

        Route::resource('currencies', CurrencyController::class)->middleware(['permission:currency-list']);

        Route::resource('types', TypeController::class)->middleware(['permission:type-list']);

        Route::resource('pages', DynamicController::class);
        Route::post('update_page_status/{page}', [DynamicController::class,'updateCategoryStatus'])->name('update_page_status');

        Route::get('contacts',[AdminGetContactUsController::class,'getContactUs'])->name('contacts');
        Route::resource('settings', SettingController::class);

        Route::resource('get_companies',CompanyController::class)->middleware(['permission:user-list']);
//        Route::resource('jobseekers',CompanyController::class)->middleware(['permission:user-list']);

        Route::get('get_job_seekers',[UserController::class,'getJobSeekers'])->name('get_job_seekers')->middleware(['permission:user-list']);
        Route::resource('get-jobs', JobController::class);
        Route::resource('newsletter', NewsletterController::class);
        Route::resource('get-payments', PaymentConteroller::class);

        Route::resource('roles', RoleController::class)->middleware(['permission:role-list']);
        Route::resource('admins', UserController::class)->middleware(['permission:user-list']);
    });

});

//login and register
//Route::prefix('auth')->name('auth')->group(function (){
//    Route::post('register',[RegisterAndLoginController::class,'register']);
//    Route::post('login',[RegisterAndLoginController::class,'login']);
//});

//home page
//Route::get('')

Route::view('/', 'dashboard.admin.login');
Route::view('/a', 'dashboard.crud.index');

Route::get('aya',function(){
    set_time_limit(0);
//    Artisan::call('storage:link');
//    Artisan::call('migrate:fresh --seed');
    return 'success db_seed';
});

Route::prefix('job_seeker')->name('job_seeker.')->group(function () {

    Route::view('/register', 'dashboard.jobSeekers.register')->name('register');
    Route::post('/create', [JobSeekerController::class, 'create'])->name('create');

    Route::view('/login', 'dashboard.jobSeekers.login')->name('login');
    Route::post('/check', [JobSeekerController::class, 'check'])->name('check');

    Route::middleware('auth:job_seekers')->group(function () {
        Route::view('/home', 'dashboard.jobSeekers.home')->name('home');
        Route::post('/logout', [JobSeekerController::class, 'logout'])->name('logout');
    });

});

//Route::prefix('company')->name('company.')->group(function () {
//
//    Route::view('/register', 'dashboard.companies.register')->name('register');
//    Route::post('/create', [CompanyController::class, 'create'])->name('create');
//
//    Route::view('/login', 'dashboard.companies.login')->name('login');
//    Route::post('/check', [CompanyController::class, 'check'])->name('check');
//
//    Route::middleware('auth:companies')->group(function () {
//        Route::view('/home', 'dashboard.companies.home')->name('home');
//        Route::post('logout', [CompanyController::class, 'logout'])->name('logout');
//    });

//});

