<?php

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
Route::group( ['middleware' => 'auth' ], function()
{
Route::get('/',function(){
    return view('index');
});

Route::resource('support', 'SupportsController');
Route::resource('company', 'CompaniesController');
Route::resource('pcs', 'PccodeController');

Route::resource('users', 'UsersController');




Route::get('/PcsNotRegister','PccodeController@PcNotRegister');

Route::get('/companyfeedback','CompanyFeedbackController@index');

Route::get('/companyerror','ErrorMapController@index');


Route::get('/pccode/{post}','PostsController@show');



});

