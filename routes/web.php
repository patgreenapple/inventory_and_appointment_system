<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\InventoryController;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ItemCategoryController;
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
    
    // $services = Service::get(); 
    // $contents = Content::first();
    
    return view('client.home.home'); 

});


Route::group(['middleware' => 'auth'], function(){
    // Route::get('/', function () {
    //     return view('/home');
    // });


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
});




