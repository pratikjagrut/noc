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
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Account deactivation routes
Route::get('deactivatedAccount', function () {
    return view('deactivatedAccount');
});

//Super admin routes
Route::get('/dashboard', 'super_admin\SuperAdminController@index');
Route::get('userList', 'super_admin\SuperAdminController@userList');

//user process routes
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController');

//NOC Department Routes
Route::get('/adminRights', 'noc\AdminRightsController@index');	
Route::get('/performAdminRights', 'noc\AdminRightsController@performAdminRights');
//Route::get('/grantAdminRights', 'noc\AdminRightsController@grantAdminRights');
//Route::get('/removeAdminRights', 'noc\AdminRightsController@removeAdminRights');
//Route::get('/deleteAccount', 'noc\AdminRightsController@deleteAccount');
//Route::get('/assignJob', 'noc\AdminRightsController@assignJob');
Route::get('/newJobEntry', 'noc\JobController@index');
Route::get('/selectConsumer', 'noc\JobController@selectConsumer');
Route::post('/submitNewJob', 'noc\JobController@newJobEntry');
Route::get('/listOnGoingJobs', 'noc\JobController@onGoingJobs');
Route::post('/closeJob', 'noc\JobController@finishedJob');
Route::get('/listFinishedJobs', 'noc\JobController@listFinishedJobs');
Route::get('/exportFinishedJobs', 'noc\JobController@exportFinishedJobs');
Route::get('/addNewConsumer', 'noc\ConsumerController@index');
Route::get('/setConsumer', 'noc\ConsumerController@setConsumer');
Route::post('/registerNewConsumer', 'noc\ConsumerController@registerNewConsumer');
Route::get('/listConsumer', 'noc\ConsumerController@listConsumer');
Route::post('/transferJob', 'noc\JobController@transferJob');

//Default password generator
Route::get('/pswd', function(){
	return Hash::make('123456');
});

