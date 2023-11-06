<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\HouseOwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\RentCollectionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Review_RatingController;
use App\Http\Controllers\ReportController;

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


Route::get('/',[homeController::class,('home')]);


Route::get('/tenant/list',[TenantController::class,'list'])->name('tenant.list');
Route::get('/tenant/addNew',[TenantController::class,'addNew'])->name('tenant.addNew');;
Route::post('/tenant/store/',[TenantController::class,'store'])->name('tenant.store');

Route::get('/houseOwner/list',[HouseOwnerController::class,'list'])->name('houseOwner.list');
Route::get('/houseOwner/addNew',[HouseOwnerController::class,'addNew'])->name('houseOwner.addNew');;
Route::post('/houseOwner/store',[HouseOwnerController::class,'store'])->name('houseOwner.store');

Route::get('/house/list',[HouseController::class, 'list'])->name('house.list');
Route::get('/house/addNew',[HouseController::class,'addNew'])->name('house.addNew');
Route::post('/house/store',[HouseController::class,'store'])->name('house.store');

Route::get('/rentCollection/list',[RentCollectionController::class,('list')])->name('rentCollection.list');
Route::get('/rentCollection/addNew',[RentCollectionController::class,'addNew'])->name('rentCollection.addNew');
Route::post('/rentCollection/store',[RentCollectionController::class,'store'])->name('rentCollection.store');

Route::get('/payment/list',[PaymentController::class,('list')]);

Route::get('/complain/list',[ComplainController::class,'list']);

Route::get('/service/list',[ServiceController::class,'list']);

Route::get('/review_rating/list',[Review_RatingController::class,'list']);

Route::get('/report/list',[ReportController::class,'list']);