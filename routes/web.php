<?php

use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Services;
use App\Models\Inventory;
use App\Models\Appointments;
use App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PaymentMethodsController;

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

Route::prefix('contact_us')->group(function() {
    Route::get('/', [ContactUsController::class,'index_without_user']);
    Route::post('/store_without_user', [ContactUsController::class, 'store_without_user'])->name('contact_us.store_without_user');
});


Route::get('/payment', function () { 
    
    return view('client.payment.payment'); 

});
Route::prefix('appointment_front')->group(function() { 
    Route::get('/appointment_with_out_user', function () { 
        $services = Services::all();
        $today = Carbon::today(); // Gets today's date
        $nextDay = $today->addDay()->toDateString(); // Adds 1 day to today's date
        $time_checker = Appointments::where('preferred_date', $nextDay)
        ->pluck('time') // Get only the 'time' column as an array
        ->toArray();
        $schedule = Schedule::first();
    
        $opening_time = $schedule['opening_time'];
        $closing_time = $schedule['closing_time'];
        
      
        $opening_hour = (int) date('G', strtotime($opening_time)); 
        $closing_hour = (int) date('G', strtotime($closing_time));
        
        $even_hours = [];
        
        for ($i = $opening_hour; $i <= $closing_hour; $i++) {
            // Check if the hour is even
            if ($i % 2 == 0) {
                // Add the hour with ":00" to the array
                $even_hours[] = sprintf("%02d:00", $i);  // Format hour as "HH:00"
            }
        }

        $available_hours = array_filter($even_hours, function ($time) use ($time_checker) {
            return !in_array($time, $time_checker); // Check if the time is not in the time_checker array
        });
        
        $available_hours = array_values($available_hours); // Reindex the array to reset keys
    
        return view('client.appointment.appointment', compact('available_hours', 'services')); 
    
    });

    

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
        Route::post('/appointment_store_with_out_user', [AppointmentsController::class, 'store_without_user'])->name('appointment_store_with_out_user');
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

    Route::prefix('services')->group(function() {
        Route::get('/', [ServicesController::class, 'index']);
        Route::get('/getrecords', [ServicesController::class, 'getrecords']);
        Route::post('/store', [ServicesController::class, 'store']);
        Route::get('/edit/{id}', [ServicesController::class, 'edit']);
        Route::get('/destroy/{id}', [ServicesController::class, 'destroy']);
    });

    Route::prefix('roles')->group(function() {
        Route::get('/', [RolesController::class, 'index']);
        Route::get('/getrecords', [RolesController::class, 'getrecords']);
        Route::post('/store', [RolesController::class, 'store']);
        Route::get('/edit/{id}', [RolesController::class, 'edit']);
        Route::get('/destroy/{id}', [RolesController::class, 'destroy']);
    });


    Route::prefix('users')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/getrecords', [UserController::class, 'getrecords']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::get('/destroy/{id}', [UserController::class, 'destroy']);
        Route::post('/store_changepassword', [UserController::class, 'change_password']);
    });
    

});




