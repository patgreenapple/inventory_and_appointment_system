<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\InventoryController;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PaymentMethodsController;
use App\Models\Inventory;

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
Auth::routes();
// Route::get('/home', function () {
//     return view('landingpage');
// });

Route::get('/', function () { 
    
    return view('client.home.home'); 

});

Route::get('/services', function () { 
    
    return view('client.service.service'); 

});

Route::get('/product', function () { 
    
    return view('client.product.product'); 

});

// Route::get('/contact_us', function () { 
    
//     return view('client.contact_us.contact_us'); 

// });

Route::prefix('contact_us')->group(function() {
    Route::get('/', [ContactUsController::class,'index_without_user']);
    Route::post('/store_without_user', [ContactUsController::class, 'store'])->name('contact_us.store_without_user');
});


Route::get('/payment', function () { 
    
    return view('client.payment.payment'); 

});




Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function () {
        return view('/home');
    });


    Route::prefix('item_category')->group(function() {
        Route::get('/', [ItemCategoryController::class, 'index']);
        Route::get('/getrecords', [ItemCategoryController::class, 'getrecords']);
        Route::post('/store', [ItemCategoryController::class, 'store']);
        Route::get('/edit/{id}', [ItemCategoryController::class, 'edit']);
        Route::get('/destroy/{id}', [ItemCategoryController::class, 'destroy']);
    });

    Route::prefix('item')->group(function() {
          Route::get('/', [ItemController::class,'index']);
          Route::get('/getrecords', [ItemController::class, 'getrecords']);
          Route::post('/store', [ItemController::class, 'store']);
          Route::get('/edit/{id}', [ItemController::class, 'edit']);
          Route::get('/destroy/{id}', [ItemController::class, 'destroy']);
          
    });


    Route::prefix('schedule')->group(function() {
        Route::get('/', [ScheduleController::class, 'index']);
        Route::get('/getrecords', [ScheduleController::class, 'getrecords']);
        Route::post('/store', [ScheduleController::class, 'store']);
        Route::get('/edit/{id}', [ScheduleController::class, 'edit']);
        Route::get('/destroy/{id}', [ScheduleController::class, 'destroy']);
    });


    Route::prefix('inventory')->group(function() {
        Route::get('/', [InventoryController::class,'index']);
        Route::get('/getrecords', [InventoryController::class, 'getrecords']);
        Route::post('/store', [InventoryController::class, 'store']);
        Route::get('/edit/{id}', [InventoryController::class, 'edit']);
        Route::get('/destroy/{id}', [InventoryController::class, 'destroy']);
        Route::get('/getitemsbyitemcategories/{id}', [InventoryController::class, 'getitemsbyitemcategories']);
    });

    Route::prefix('appointments')->group(function() {
        Route::get('/', [AppointmentsController::class,'index']);
        Route::get('/getrecords', [AppointmentsController::class, 'getrecords']);
        Route::post('/store', [AppointmentsController::class, 'store']);
        Route::get('/edit/{id}', [AppointmentsController::class, 'edit']);
        Route::get('/destroy/{id}', [AppointmentsController::class, 'destroy']);
    });

    Route::prefix('payment_method')->group(function() {
        Route::get('/', [PaymentMethodsController::class,'index']);
        Route::get('/getrecords', [PaymentMethodsController::class, 'getrecords']);
        Route::post('/store', [PaymentMethodsController::class, 'store']);
        Route::get('/edit/{id}', [PaymentMethodsController::class, 'edit']);
        Route::get('/destroy/{id}', [PaymentMethodsController::class, 'destroy']);
    });


    Route::prefix('contact_us_login')->group(function() {
        Route::get('/', [ContactUsController::class,'index']);
        Route::get('/getrecords', [ContactUsController::class, 'getrecords']);
        Route::post('/store', [ContactUsController::class, 'store']);
        Route::get('/edit/{id}', [ContactUsController::class, 'edit']);
        Route::get('/destroy/{id}', [ContactUsController::class, 'destroy']);
    });
    

});




