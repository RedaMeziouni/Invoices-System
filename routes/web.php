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

Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');

Route::get('/section/{id}', 'InvoicesController@getproducts');

Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');

Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');

Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');

Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

Route::get('/edit_invoice/{id}', 'InvoicesController@edit');

Route::get('/{page}', 'AdminController@index');



