<?php

use App\Http\Controllers\ItemCategoryController;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
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
});




