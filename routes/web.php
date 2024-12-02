<?php

use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ItemCategoryController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
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
});




