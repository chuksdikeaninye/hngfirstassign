<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
    return view('welcome');
});
Route::get('data',[ApiController::class, 'index']);

Route::group(['prefix' => 'v1'], function (){


    Route::post('/create/data',[DataController::class, 'create']);
    Route::get('/show/data',[DataController::class, 'show']);

});