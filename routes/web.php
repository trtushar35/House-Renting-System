<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Backend\homeController;
use App\Http\Controllers\Backend\FlatController;
use App\Http\Controllers\Backend\HouseController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\TenantController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ComplainController;
use App\Http\Controllers\Backend\HouseOwnerController;
use App\Http\Controllers\Backend\Review_RatingController;
use App\Http\Controllers\Backend\RentCollectionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\HouseController as FrontendHouseController;
use App\Http\Controllers\Frontend\TenantController as FrontendTenantController;
use GuzzleHttp\Middleware;

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
Route::get('/', [FrontendHomeController::class, 'home'])->name('home');


Route::get('/registration-form', [FrontendTenantController::class, 'registration'])->name('tenant.registration');
Route::post('/regform-store', [FrontendTenantController::class, 'store'])->name('tenant.regform.store');

Route::get('/login', [FrontendTenantController::class, 'login'])->name('tenant.login');
Route::post('/login', [FrontendTenantController::class, 'dologin'])->name('tenant.do.login');

Route::get('/single-house/{id}', [FrontendHouseController::class, 'singleHouseView'])->name('single.house');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', [FrontendTenantController::class, 'logout'])->name('tenant.logout');

    Route::get('/profile/view', [FrontendTenantController::class, 'profile'])->name('profile.view');
});




//backend routes  all admin panel works

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'loginForm'])->name('admin.login');
    Route::post('/login-form-post', [UserController::class, 'loginPost'])->name('admin.login.post');

    Route::group(['middleware' => 'auth'], function () {

        Route::group(['middleware' => 'checkAdmin'], function() {

            Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');

            Route::get('/', [homeController::class, ('home')])->name('dashboard');

            Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
            Route::get('/users/addNew', [UserController::class, 'addNew'])->name('users.addNew');
            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');


            Route::get('/tenant/list', [TenantController::class, 'list'])->name('tenant.list');
            Route::get('/tenant/addNew', [TenantController::class, 'addNew'])->name('tenant.addNew');;
            Route::post('/tenant/store/', [TenantController::class, 'store'])->name('tenant.store');

            Route::get('/houseOwner/list', [HouseOwnerController::class, 'list'])->name('houseOwner.list');
            Route::get('/houseOwner/addNew', [HouseOwnerController::class, 'addNew'])->name('houseOwner.addNew');;
            Route::post('/houseOwner/store', [HouseOwnerController::class, 'store'])->name('houseOwner.store');

            Route::get('/house/list', [HouseController::class, 'list'])->name('house.list');
            Route::get('/house/addNew', [HouseController::class, 'addNew'])->name('house.addNew');
            Route::post('/house/store', [HouseController::class, 'store'])->name('house.store');
            Route::get('/house/delete/{id}', [HouseController::class, 'delete'])->name('house.delete');
            Route::get('/house/edit/{id}', [HouseController::class, 'edit'])->name('house.edit');
            Route::put('/house/update/{id}', [HouseController::class, 'update'])->name('house.update');
            Route::get('/house/view/{id}', [HouseController::class, 'view'])->name('house.view');


            Route::get('/rentCollection/list', [RentCollectionController::class, ('list')])->name('rentCollection.list');
            Route::get('/rentCollection/addNew', [RentCollectionController::class, 'addNew'])->name('rentCollection.addNew');
            Route::post('/rentCollection/store', [RentCollectionController::class, 'store'])->name('rentCollection.store');

            Route::get('/payment/list', [PaymentController::class, ('list')])->name('payment.list');

            Route::get('/complain/list', [ComplainController::class, 'list'])->name('complain.list');

            Route::get('/service/list', [ServiceController::class, 'list'])->name('service.list');

            Route::get('/review_rating/list', [Review_RatingController::class, 'list'])->name('review.rating.list');

            Route::get('/report/list', [ReportController::class, 'list'])->name('report.list');

            Route::get('/flat/list', [FlatController::class, 'list'])->name('flat.list');
        });
    });
});
