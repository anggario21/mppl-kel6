<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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



Route::get('/online-product', function () {
    return view('online-product');
});

Route::get('/offline-product', function () {
    return view('offline-product');
});

Route::get('/sign-up-success', function () {
    return view('sign-up-success');
});

Route::get('/transaction-success', function () {
    return view('transaction-success');
});

Route::get('/product', function () {
    return view('adminproduct');
});

Route::get('/transaction', function () {
    return view('admintransaction');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/details', function () {
    return view('details');
});

Route::post('/register', [RegisterController::class, 'store']);

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');

Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

//auth
Route::group(['middleware' => ['auth:user']], function(){
    Route::get('/', function () {
        return view('landing');
    });
});

Route::group(['middleware' => ['auth:admin']], function(){
    Route::get('/admin', function () {
        return view('admindashboard');
    });
});