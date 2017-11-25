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
Route::post('/inbox/add-public-comment', 'InboxController@add_comment_pub');
Route::post('/inbox/add-private-comment', 'InboxController@add_private_pub');
Route::post('/inbox/get-private-comments', 'InboxController@get_private_pubs');
Route::post('/inbox/send-ps-msg', 'InboxController@send_ps_msg');
Route::post('/inbox/read-mail', 'InboxController@read_mail');
Route::post('/inbox/send-mail', 'InboxController@send_mail');
Route::post('/inbox/read-chat', 'InboxController@read_chat');

//service controller
Route::get('/service', 'ServiceController@index');
Route::get('/add-new-service', 'ServiceController@add_new_service');
Route::get('/find-service', 'ServiceController@find_service');
Route::get('/service/onload-job', 'ServiceController@onload_job');

Route::post('/service/submit-job', 'ServiceController@submit_job');
Route::post('/service/view-job', 'ServiceController@view_job');
Route::post('/service/find-job', 'ServiceController@find_job');
Route::post('/service/validate-img', 'ServiceController@validate_img');
Route::post('/service/view-profile', 'ServiceController@view_profile');
Route::post('/service/request-job', 'ServiceController@request_job');
Route::post('/service/accept-job', 'ServiceController@accept_job');
Route::post('/service/reject-job', 'ServiceController@reject_job');
Route::post('/service/refund-job', 'ServiceController@refund_job');
Route::post('/service/update-job-progress', 'ServiceController@update_job_progress');

//payment
Route::post('/service/add-payment', 'ServiceController@add_payment');

//jobsuggest controller
Route::get('/post-service', 'JobSuggestController@index');
Route::post('/post-service/suggest-job', 'JobSuggestController@add_suggest_job');

//others misc. controller
Route::get('/settings', 'SettingController@index');
Route::get('/help', 'HelpController@index');
Route::get('/contact-feedback', 'ContactFeedbackController@index');

//upload images/ files
//Route::get('/', ['as' => 'upload', 'uses' => 'ServiceController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ServiceController@postUpload']);
//Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ServiceController@deleteUpload']);
