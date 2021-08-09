<?php

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

// Take the User by default to the Login Page
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

// Disable Registration
// Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices', 'InvoicesController');

Route::resource('sections', 'SectionsController');

Route::resource('supply', 'SupplyController');

Route::get('/section/{id}', 'InvoicesController@getproducts');

Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');

Route::get('/{page}', 'AdminController@index');



