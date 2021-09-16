<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DateRangeController;
use App\Htpp\Controllers\DateSpendingController;
use App\Http\Controllers\orderListController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\OwnerController;



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

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/register',[AuthController::class,'register']);
Route::post('/registerProses',[AuthController::class,'registerProses']);
Route::get('/login',[AuthController::class,'index']);
Route::post('/proses_login',[AuthController::class,'proses_login']);
Route::get('/logout',[AuthController::class,'logout']);

//auth -> admin || owner

Route::group(['middleware' => ['auth']], function (){
    Route::group(['middleware' => ['cek_login:admin']], function (){
        Route::get('/home',[HomeController::class,'index']);
        // resource untuk income dan spending
        Route::resource('income', 'IncomeController');
        Route::resource('spending', 'SpendingController');
        Route::resource('orderlist', 'orderListController');
        //end income,spending, orderlist 

        // searching dan pagination 
        Route::get('/searchSpending', [SpendingController::class, 'searchSpending'])->name('searchSpending');
        Route::get('/searchIncome', [SpendingController::class, 'searchIncome'])->name('searchIncome');
        Route::get('/income/paginateIncome', [IncomeController::class, 'paginateIncome'])->name('paginateIncome');
        // end searching dan pagination 

        //untuk range data 
        Route::get('/daterange', [DateRangeController::class,'index']);
        Route::post('/daterange', [DateRangeController::class,'fetch_data'])->name('income.date_range.fetch_data');
        Route::get('/datespending', [DateSpendingController::class,'index']);
        Route::post('/datespending', [DateSpendingController::class,'fetch_data'])->name('spending.date_range.fetch_data');
        //end range

        Route::get('/charts',[ChartController::class,'index']);
        

    });

    Route::group(['midleware' => ['cek_login:owner']], function(){
        Route::get('/home',[HomeController::class,'index']);
        // Route::get('/owner',[OwnerController::class,'index']);
        //untuk admin
        Route::get('/admin',[AdminController::class,'index']);
        Route::get('/admin/add',[AdminController::class,'add']);
        Route::post('/admin',[AdminController::class,'addProses']);
        Route::get('/admin/edit/{id}',[AdminController::class,'edit']);
        Route::patch('/admin/{id}',[AdminController::class,'editProses']);
        Route::delete('/admin/{id}',[AdminController::class,'delete']);
        //end admin

         // resource untuk income dan spending
        Route::resource('income', 'IncomeController');
        Route::resource('spending', 'SpendingController');
        Route::resource('orderlist', 'orderListController');
         //end income, spending, order list

        //seaching 
        Route::get('/searchSpending', [SpendingController::class, 'searchSpending'])->name('searchSpending');
        Route::get('/searchIncome', [IncomeController::class, 'searchIncome'])->name('searchIncome');
        Route::get('/income/paginateIncome', [IncomeController::class, 'paginateIncome'])->name('paginateIncome');
        //end searching

        //untuk range data 
        Route::get('/daterange', [DateRangeController::class,'index']);
        Route::post('/daterange', [DateRangeController::class,'fetch_data'])->name('income.date_range.fetch_data');
        Route::get('/datespending', [DateSpendingController::class,'index']);
        Route::post('/datespending', [DateSpendingController::class,'fetch_data'])->name('spending.date_range.fetch_data');
        //end range
        
        Route::get('/charts',[ChartController::class,'index']);


    });
});
    

// Route::resource('datarange', 'DateRangeController');
// Route::get('/chart',[ChartController::class,'index']);
// Route::get('/income',[IncomeController::class,'index']);
// Route::get('/spending',[SpendingController::class,'index']);
// Route::get('/financial',[FinancialController::class,'index']);
// Route::post('/TambahAkun',[AkunController::class],'Tambah');
// Route::post('/UbahAkun',[AkunController::class],'Ubah');

// Route::get('/',[HomeController::class,'index']);
// Route::get('/home',[HomeController::class,'index']);
// Route::get('/admin',[AdminController::class,'index']);
// Route::get('/chart',[ChartController::class,'index']);
// Route::get('/income',[IncomeController::class,'index']);
// Route::get('/spending',[SpendingController::class,'index']);
// Route::get('/financial',[FinancialController::class,'index']);
// Route::post('/TambahAkun', 'AkunController@Tambah');
// Route::post('/Ubah', 'AkunController@Ubah');

        // Route::get('/income',[IncomeController::class,'index']);
        // Route::get('/spending',[SpendingController::class,'index']);
        // Route::get('/financial',[FinancialController::class,'index']);  
