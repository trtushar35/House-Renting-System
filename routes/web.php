<?php

use App\Http\Controllers\Backend\ApplicantController;
use GuzzleHttp\Middleware;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\FlatController;
use App\Http\Controllers\Backend\homeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HouseController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\TenantController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ComplainController;
use App\Http\Controllers\Backend\HouseOwnerController;
use App\Http\Controllers\Backend\Review_RatingController;
use App\Http\Controllers\Frontend\ApplicantController as FrontendApplicantController;
use App\Http\Controllers\Frontend\ReviewController as FrontendReviewController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\Frontend\FavoriteController as FrontendFavoriteController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\HouseController as FrontendHouseController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\TenantController as FrontendTenantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// frontend routes
Route::group(['middleware' => 'locale'], function () {

    Route::get('/', [FrontendHomeController::class, 'home'])->name('home');
    Route::get('/change-lang/{locale}', [FrontendHomeController::class, 'changeLang'])->name('change.lang');
    Route::get('/search-house', [FrontendHomeController::class, 'search'])->name('house.search');
    Route::get('/browse-all/property', [FrontendHomeController::class, 'browseAllProperty'])->name('browse.all.property');
    Route::get('/dhaka-division/property', [FrontendHomeController::class, 'dhaka'])->name('dhaka.division');
    Route::get('/mymensingh-division/property', [FrontendHomeController::class, 'mymensingh'])->name('mymensingh.division');
    Route::get('/khulna-division/property', [FrontendHomeController::class, 'khulna'])->name('khulna.division');
    Route::get('/rajshahi-division/property', [FrontendHomeController::class, 'rajshahi'])->name('rajshahi.division');

    Route::get('/about-us', [FrontendHomeController::class, 'aboutUs'])->name('about');

    Route::get('/registration-form', [FrontendTenantController::class, 'registration'])->name('tenant.registration');
    Route::post('/regform-store', [FrontendTenantController::class, 'store'])->name('tenant.regform.store');

    Route::get('/login', [FrontendTenantController::class, 'login'])->name('tenant.login');
    Route::post('/login', [FrontendTenantController::class, 'dologin'])->name('tenant.do.login');

    Route::get('/single-house/{id}', [FrontendHouseController::class, 'singleHouseView'])->name('single.house');

    Route::get('/contact-us', [FrontendHomeController::class, 'contactUs'])->name('contact.us');
    Route::post('/contact-us/store', [FrontendHomeController::class, 'store'])->name('contact.us.store');
    Route::get('/privacy-policy', [FrontendHomeController::class, 'privacyPolicy'])->name('privacy.policy');
    Route::get('/terms-conditions', [FrontendHomeController::class, 'terms'])->name('terms.condition');

    Route::group(['middleware' => 'checkUser'], function () {

        Route::get('/logout', [FrontendTenantController::class, 'logout'])->name('tenant.logout');

        Route::get('/add/property', [FrontendHouseController::class, 'createProperty'])->name('add.property');
        Route::post('/store/property', [FrontendHouseController::class, 'storeProperty'])->name('store.property');
        Route::get('/post-house/list/{id}', [FrontendHouseController::class, 'houseList'])->name('post.house.list');
        Route::get('/post-house/edit/{id}', [FrontendHouseController::class, 'houseEdit'])->name('post.house.edit');
        Route::post('/post-house/update/{id}', [FrontendHouseController::class, 'houseUpdate'])->name('post.house.update');
        Route::get('/post-house/delete/{id}', [FrontendHouseController::class, 'delete'])->name('post.house.delete');

        Route::get('/profile/view', [FrontendTenantController::class, 'profile'])->name('profile.view');
        Route::get('/edit-profile/{id}', [FrontendTenantController::class, 'editProfile'])->name('edit.profile');
        Route::put('/update-profile/{id}', [FrontendTenantController::class, 'updateProfile'])->name('update.profile');

        Route::get('/profile/booking-list/{id}', [FrontendTenantController::class, 'bookingList'])->name('bookingList.profile');
        Route::get('/profile/booking-list/print/{id}', [FrontendTenantController::class, 'print'])->name('bookingList.print');
        Route::post('/book-now/{house_id}', [FrontendBookingController::class, 'booking'])->name('book.now');
        Route::get('/advanced-payment/{id}', [FrontendBookingController::class, 'payment'])->name('payment.now');
        Route::get('/book-cancel/{house_id}', [FrontendBookingController::class, 'cancelBooking'])->name('cancel.book');

        Route::get('applicant/list/{id}', [FrontendApplicantController::class, 'applicantList'])->name('list.applicant');
        Route::get('/applicant/view/{id}', [FrontendApplicantController::class, 'view'])->name('applicant.view');
        Route::get('/applicant/approve/{id}', [FrontendApplicantController::class, 'approve'])->name('applicant.approve');
        Route::get('/applicant/reject/{id}', [FrontendApplicantController::class, 'reject'])->name('applicant.do.reject');

        Route::get('/saved/favorite/list/{id}', [FrontendFavoriteController::class, 'favoriteList'])->name('favorite.list.view');
        Route::get('/add-to-favorite/list/{house_id}', [FrontendFavoriteController::class, 'addFavoriteList'])->name('addTofavorite.list');
        Route::get('/favoriteList-single-house/{id}', [FrontendFavoriteController::class, 'singleView'])->name('single.house.view');
        Route::get('/favoriteList-single-house/delete/{id}', [FrontendFavoriteController::class, 'delete'])->name('favoriteList.single.delete');

        Route::get('/give/review', [FrontendReviewController::class, 'review'])->name('review');
        Route::post('/store/review', [FrontendReviewController::class, 'storeReview'])->name('store.review');
        Route::get('/review/list/{id}', [FrontendReviewController::class, 'reviewList'])->name('review.list');
        Route::get('/review/delete/{id}', [FrontendReviewController::class, 'reviewDelete'])->name('review.delete');
        Route::get('/review/edit/{id}', [FrontendReviewController::class, 'reviewEdit'])->name('review.edit');
        Route::post('/review/update/{id}', [FrontendReviewController::class, 'reviewUpdate'])->name('review.update');

        Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
        Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

        Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
        Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

        Route::post('/success', [SslCommerzPaymentController::class, 'success']);
        Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
        Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

        Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    });
});



//backend routes  all admin panel works

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'loginForm'])->name('admin.login');
    Route::post('/login-form-post', [UserController::class, 'loginPost'])->name('admin.login.post');

    Route::group(['middleware' => 'auth'], function () {

        Route::group(['middleware' => 'checkAdmin'], function () {

            Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');

            Route::get('/', [homeController::class, 'home'])->name('dashboard');

            Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
            Route::get('/users/addNew', [UserController::class, 'addNew'])->name('users.addNew');
            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
            Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::get('/users/view/{id}', [UserController::class, 'view'])->name('users.view');
            Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/users/view/{id}', [UserController::class, 'view'])->name('users.view');
            Route::get('/users/print', [UserController::class, 'print'])->name('users.print');

            Route::get('/tenant/list', [TenantController::class, 'list'])->name('tenant.list');
            Route::get('/tenant/addNew', [TenantController::class, 'addNew'])->name('tenant.addNew');
            Route::post('/tenant/store/', [TenantController::class, 'store'])->name('tenant.store');
            Route::get('/tenant/print/', [TenantController::class, 'tenantPrint'])->name('tenant.print');

            Route::get('/houseOwner/list', [HouseOwnerController::class, 'list'])->name('houseOwner.list');
            Route::get('/houseOwner/addNew', [HouseOwnerController::class, 'addNew'])->name('houseOwner.addNew');
            Route::post('/houseOwner/store', [HouseOwnerController::class, 'store'])->name('houseOwner.store');
            Route::get('/houseOwner/print', [HouseOwnerController::class, 'houseOwnerPrint'])->name('houseOwner.print');

            Route::get('/house/list', [HouseController::class, 'list'])->name('house.list');
            Route::get('/house/addNew', [HouseController::class, 'addNew'])->name('house.addNew');
            Route::post('/house/store', [HouseController::class, 'store'])->name('house.store');
            Route::get('/house/delete/{id}', [HouseController::class, 'delete'])->name('house.delete');
            Route::get('/house/edit/{id}', [HouseController::class, 'edit'])->name('house.edit');
            Route::put('/house/update/{id}', [HouseController::class, 'update'])->name('house.update');
            Route::get('/house/view/{id}', [HouseController::class, 'view'])->name('house.view');
            Route::get('/house/list/print', [HouseController::class, 'housePrint'])->name('house.list.print');

            Route::get('/applicant/list/', [ApplicantController::class, 'list'])->name('applicant.list');
            Route::get('/applicant/confirm/{id}', [ApplicantController::class, 'confirm'])->name('applicant.confirm');
            Route::get('/applicant/reject/{id}', [ApplicantController::class, 'reject'])->name('applicant.reject');
            Route::get('/applicant/print', [ApplicantController::class, 'applicantPrint'])->name('applicant.print');

            Route::get('/payment/list', [PaymentController::class, 'list'])->name('payment.list');
            Route::get('/payment/print', [PaymentController::class, 'paymentPrint'])->name('payment.print');

            Route::get('/complain/list', [ComplainController::class, 'list'])->name('complain.list');

            Route::get('/service/list', [ServiceController::class, 'list'])->name('service.list');
            Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');

            Route::get('/review/list', [Review_RatingController::class, 'list'])->name('review.rating.list');
            Route::get('/review/delete/{id}', [Review_RatingController::class, 'delete'])->name('review.rating.delete');
            Route::get('/review/print', [Review_RatingController::class, 'reviewPrint'])->name('review.rating.print');

            Route::get('/report/list', [ReportController::class, 'list'])->name('report.list');

            Route::get('/flat/list', [FlatController::class, 'list'])->name('flat.list');
            Route::get('/flat/view/{house_id}', [FlatController::class, 'view'])->name('flat.view');
            Route::get('/flat/print', [FlatController::class, 'flatPrint'])->name('flat.print');

            Route::get('/contacts/list', [FlatController::class, 'contact'])->name('contacts.list');
            Route::get('/contacts/delete/{id}', [FlatController::class, 'delete'])->name('contacts.delete');
        });
    });
});
