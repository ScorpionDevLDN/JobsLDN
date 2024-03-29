<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGetContactUsController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\Currency\CurrencyController;
use App\Http\Controllers\Admin\DynamicController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PaymentConteroller;
use App\Http\Controllers\Admin\Per\PerController;
use App\Http\Controllers\Admin\Type\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CompanyJobController;
use App\Http\Controllers\Front\CompanyJobsController;
use App\Http\Controllers\Front\CompanyNotificationController;
use App\Http\Controllers\Front\CompanyPostJobController;
use App\Http\Controllers\Front\CompanyProfileController;
use App\Http\Controllers\Front\ContactfrontController;
use App\Http\Controllers\Front\HomeFrontController;
use App\Http\Controllers\Front\JobSeekerProfileController;
use App\Http\Controllers\Front\PagefrontController;
use App\Http\Controllers\Front\SingleJobController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialShareButtonsController;

use App\Http\Controllers\SendEmailVerificationController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
/*change status for admin*/

Route::get('changeStatus', [CategoryController::class, 'updateCategoryStatus'])->name('changeStatus');
Route::get('changeCityStatus', [CityController::class, 'updateCityStatus'])->name('changeCityStatus');
Route::get('changeCurrencyStatus', [CurrencyController::class, 'changeCurrencyStatus'])->name('changeCurrencyStatus');
Route::get('changePerStatus', [PerController::class, 'changePerStatus'])->name('changePerStatus');
Route::get('changeTypeStatus', [TypeController::class, 'changeTypeStatus'])->name('changeTypeStatus');
Route::get('changePostStatusTest', [JobController::class, 'changePostStatusTest'])->name('changePostStatusTest');
Route::get('changeSliderStatus', [SliderController::class, 'changeSliderStatus'])->name('changeSliderStatus');
Route::get('changePageStatus', [DynamicController::class, 'changePageStatus'])->name('changePageStatus');
Route::get('changePartnerStatus', [PartnerController::class, 'changePartnerStatus'])->name('changePartnerStatus');
Route::get('updateAdvertiseStatus', [AdvertiseController::class, 'updateAdvertiseStatus'])->name('updateAdvertiseStatus');


//admin routes
Route::prefix('manage')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::view('/login', 'dashboard.admin.login')->name('login');
    Route::post('/check', [AdminController::class, 'check'])->name('check');

    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::middleware('auth:admins')->group(callback: function () {
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::resource('categories', CategoryController::class)->middleware(['permission:category-list']);

        Route::resource('cities', CityController::class)->middleware(['permission:city-list']);

        Route::resource('pers', PerController::class)->middleware(['permission:per-list']);

        Route::resource('currencies', CurrencyController::class)->middleware(['permission:currency-list']);

        Route::resource('types', TypeController::class)->middleware(['permission:type-list']);

        Route::resource('pages', DynamicController::class);
        Route::post('update_page_status/{page}', [DynamicController::class, 'updateCategoryStatus'])->name('update_page_status');

        Route::get('contacts', [AdminGetContactUsController::class, 'getContactUs'])->name('contacts');
        Route::resource('settings', SettingController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('partners', PartnerController::class);

        Route::resource('get_companies', CompanyController::class)->middleware(['permission:user-list']);
        //        Route::resource('jobseekers',CompanyController::class)->middleware(['permission:user-list']);

        Route::get('get_job_seekers', [UserController::class, 'getJobSeekers'])->name('get_job_seekers')->middleware(['permission:user-list']);
        Route::delete('job-seeker/{id}', [UserController::class, 'DeleteJobSeekers'])->name('DeleteJobSeekers');
        Route::delete('company/{id}', [UserController::class, 'DeleteCompany'])->name('DeleteCompany');
        Route::resource('get-jobs', JobController::class);
        Route::get('accept/{id}', [JobController::class, 'accept'])->name('accept');
        Route::get('reject/{id}', [JobController::class, 'reject'])->name('reject');
        Route::resource('newsletter', NewsletterController::class);
        Route::resource('get-payments', PaymentConteroller::class);
        Route::get('transactions', [PaymentConteroller::class, 'transactions'])->name('transactions');

        Route::resource('roles', RoleController::class)->middleware(['permission:role-list']);
        Route::resource('admins', UserController::class)->middleware(['permission:user-list']);
        Route::get("profile", [UserController::class, 'editProfile'])->name("profile.edit");
        Route::put("profile", [UserController::class, 'updateProfile'])->name("profile.update");
        Route::put("updatePassword", [UserController::class, 'updatePassword'])->name("updatePassword");

        Route::resource('advertises', AdvertiseController::class);
    });
});


/*frontend routes*/
Route::prefix('')->group(function () {

    Route::resource('home', HomeFrontController::class)->only('index', 'store');
    Route::get('set-cookie', [HomeFrontController::class, 'setCookies'])->name('cookie');
    Route::get('privacy-policy', [HomeFrontController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('terms-and-conditions', [HomeFrontController::class, 'termsAndConditions'])->name('termsAndConditions');
    Route::post('logout', [HomeFrontController::class, 'logout'])->name('logoutFront');

    Route::resource('posts', CompanyJobsController::class);
    Route::get('download/{id}', [CompanyJobsController::class, 'download'])->name('download');
    Route::resource('pages', PagefrontController::class);
    Route::get('page/{slug}', [PagefrontController::class, 'page'])->name('page');

    Route::resource('contacts', ContactfrontController::class);
    Route::resource('job_seeker-profile', JobSeekerProfileController::class);
    Route::resource('my-profile', CompanyProfileController::class);
    Route::post('update-password', [CompanyProfileController::class, 'updatePassword'])->name('updatePasswordFront');
    Route::post('update-company', [CompanyProfileController::class, 'updateCompanyFront'])->name('updateCompanyFront');
    Route::resource('single-job', SingleJobController::class);
    Route::resource('company-jobs', CompanyJobController::class)->middleware('auth:companies');
    Route::resource('company-notifications', CompanyNotificationController::class)->middleware('auth:companies');
    Route::resource('company-post-job', CompanyPostJobController::class)->middleware('auth:companies');
});

Route::get('/', [HomeFrontController::class, 'home'])->name('myHome');
Route::post('forget-password', [HomeFrontController::class, 'submitForgetPasswordForm'])->name('frontend.forget.password.post');
Route::get('reset-password/{token}', [HomeFrontController::class, 'showResetPasswordForm'])->name('frontend.reset.password.get');
Route::post('reset-password', [HomeFrontController::class, 'submitResetPasswordForm'])->name('frontend.reset.password.post');

Route::prefix('job_seeker')->name('job_seeker.')->group(function () {

    Route::post('/createJobSeeker', [JobSeekerController::class, 'createJobSeeker'])->name('createJobSeeker');
    Route::post('/createCompany', [JobSeekerController::class, 'createCompany'])->name('createCompany');
    Route::post('/check', [JobSeekerController::class, 'check'])->name('check');
});
Route::prefix('posts')->middleware('auth:job_seekers')->group(function () {
    // checkTestMail
    // Route::post('checkTestMail', [CompanyJobsController::class, 'checkTestMail']);

    Route::get('job/{id}',      [CompanyJobsController::class, 'jobDetails'])->name('job_details_old')->withoutMiddleware('auth:job_seekers');
    Route::get('job/{id}/{slug}',      [CompanyJobsController::class, 'jobDetails'])->name('job_details')->withoutMiddleware('auth:job_seekers');

    Route::post('apply/{job_id}', [CompanyJobsController::class, 'apply'])->name('apply');
    Route::post('upload_apply/{job_id}', [CompanyJobsController::class, 'uploadApply'])->name('uploadApply');
    Route::get('retract/{job_id}', [CompanyJobsController::class, 'retract'])->name('retract');
    Route::get('bookmark/{id}',    [CompanyJobsController::class, 'bookmark'])->name('bookmark');
    Route::get('un_bookmark/{id}', [CompanyJobsController::class, 'un_bookmark'])->name('un_bookmark');
    Route::post('upload_cv',       [CompanyJobsController::class, 'uploadCv'])->name('uploadCv');
    Route::get('download_cv/{id}', [CompanyJobsController::class, 'downloadCv'])->name('downloadCv');
    Route::post('delete_cv/{id}',  [CompanyJobsController::class, 'deleteCv'])->name('deleteCv');
});
Route::get('myJobs', [CompanyJobsController::class, 'myAppliedJobs'])->name('myJobs')->middleware('auth:job_seekers');
Route::get('myBookmarks', [CompanyJobsController::class, 'myBookmarks'])->name('myBookmarks')->middleware('auth:job_seekers');

Route::prefix('jobs')->middleware('auth:companies')->group(function () {
    Route::get('job_details/{slug}', [CompanyJobsController::class, 'job_details_company'])->name('job_details_company');
    Route::delete('job/{id}', [CompanyJobsController::class, 'deleteJob'])->name('deleteJob');
    Route::get('edit_job/{id}', [CompanyJobsController::class, 'editJob'])->name('editJob');
    Route::post('edit_job_update/{id}', [CompanyJobsController::class, 'editJobUpdate'])->name('editJobUpdate');
});

Route::get('go-payment', [PaymentController::class, 'goPayment'])->name('payment.go');

Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('cancel/{id}', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget'])->name('ShareWidget');
Route::get('how-to-enable-s3', [SettingController::class, 'guideS3'])->name('s3')->middleware('auth:admins');



// Route::get('sendEmail', [SendEmailVerificationController::class, 'checkmail']);
// Route::get('resendEmail', [SendEmailVerificationController::class, 'checkmail']);
Route::get('company-resend-email', [SendEmailVerificationController::class, 'resendCompanyVerfication'])->name('resendCompanyVerfication')->middleware('auth:companies');
Route::get('seeker-resend-email',  [SendEmailVerificationController::class, 'resendSeekerVerfication'])->name('resendSeekerVerfication')->middleware('auth:job_seekers');



Route::get('verification/callback/{hash}', [SendEmailVerificationController::class, 'verify'])->name('verification.callback');
