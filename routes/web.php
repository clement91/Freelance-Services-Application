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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//dashboard controller
Route::get('/dashboard', 'DashboardController@index');

//profile controller
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/update', 'ProfileController@update');
Route::post('/profile/update-password', 'ProfileController@update_password');
Route::post('/profile/validate-img', 'ProfileController@validate_img');

//inbox controller
Route::get('/inbox', 'InboxController@index');

//service controller
Route::get('/service', 'ServiceController@index');
Route::get('/add-new-service', 'ServiceController@add_new_service');
Route::get('/find-service', 'ServiceController@find_service');

Route::post('/service/submit-job', 'ServiceController@submit_job');
Route::post('/service/validate-img', 'ServiceController@validate_img');

//others misc. controller
Route::get('/settings', 'SettingController@index');
Route::get('/help', 'HelpController@index');
Route::get('/contact-feedback', 'ContactFeedbackController@index');

//upload images/ files
Route::get('/', ['as' => 'upload', 'uses' => 'ServiceController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ServiceController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ServiceController@deleteUpload']);
