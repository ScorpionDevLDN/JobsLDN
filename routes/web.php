<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGetContactUsController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\Currency\CurrencyController;
use App\Http\Controllers\Admin\DynamicController;
use App\Http\Controllers\Admin\Per\PerController;
use App\Http\Controllers\Admin\Type\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\User\RegisterAndLoginController;
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


//admin routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::view('/login', 'dashboard.admin.login')->name('login');
    Route::post('/check', [AdminController::class, 'check'])->name('check');

    Route::middleware('auth:admins')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
//        Route::view('/home', 'dashboard.admin.home')->name('home')->middleware('admin');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::resource('categories', CategoryController::class);

        Route::post('update_city_status/{city}', [CityController::class,'updateCategoryStatus'])->name('update_city_status');
        Route::resource('cities', CityController::class);

        Route::post('update_per_status/{per}', [PerController::class,'updateCategoryStatus'])->name('update_per_status');
        Route::resource('pers', PerController::class);

        Route::post('update_currency_status/{currency}', [CurrencyController::class,'updateCategoryStatus'])->name('update_currency_status');
        Route::resource('currencies', CurrencyController::class);

        Route::post('update_type_status/{type}', [TypeController::class,'updateCategoryStatus'])->name('update_type_status');
        Route::resource('types', TypeController::class);

        Route::resource('pages', DynamicController::class);
        Route::post('update_page_status/{page}', [DynamicController::class,'updateCategoryStatus'])->name('update_page_status');
        Route::get('contacts',[AdminGetContactUsController::class,'getContactUs'])->name('contacts');
        Route::resource('settings', SettingController::class);

        Route::get('get_companies',[UserController::class,'getCompanies'])->name('get_companies');
        Route::get('get_job_seekers',[UserController::class,'getJobSeekers'])->name('get_job_seekers');
    });

});

//login and register
//Route::prefix('auth')->name('auth')->group(function (){
//    Route::post('register',[RegisterAndLoginController::class,'register']);
//    Route::post('login',[RegisterAndLoginController::class,'login']);
//});

//home page
//Route::get('')

Route::view('/', 'index');
Route::view('/a', 'dashboard.crud.index');

Route::get('aya',function(){
return 5;
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

