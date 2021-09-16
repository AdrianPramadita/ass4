<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthAPIController;
use App\Http\Controllers\Api\IncomeAPIController;
use App\Http\Controllers\Api\SpendingAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[AuthAPIController::class,'register']);
Route::post('/login_token', [AuthAPIController::class, 'login_token']);
Route::post('/proses_login_api',[AuthAPIController::class,'proses_login_api']);

Route::get('/incomes/paginate', [IncomeAPIController::class, 'paginate']);
Route::get('/spendings/paginate', [SpendingAPIController::class, 'paginate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function (){
    Route::get('/incomes', [IncomeAPIController::class, 'index']);
    Route::get('/incomes/{id}', [IncomeAPIController::class, 'show']);
    Route::get('/spendings', [SpendingAPIController::class, 'index']);
    Route::get('/spendings/{id}', [SpendingAPIController::class, 'show']);
    Route::post('/logout', [AuthAPIController::class, 'logout']);
});


// Route::middleware('auth:sanctum')->group(function (){
//     Route::get('/spendings', [SpendingAPIController::class, 'index']);
// });

// Route::middleware('auth:sanctum')->group(function (){
//     Route::get('/incomes', [IncomeAPIController::class, 'show']);
// });

// Route::group(['middleware' =>['auth:sanctum']], function()
// {
//     Route::post('/logout', [AuthAPIController::class, 'logout']);
// });





