<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
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

Route::get('/', function() {
    return view('welcome');
});
 	
Route::get('/dash', function() {
    return view('dash');
});

// Ajax
Route::get('/viewlogs', [JobController::class, 'ShowJobs']) ;

// Vue.js blade view
Route::get('/fetchlogs', function () {
	return view('fetchlogs');
});

/* Vue.js NON blade view
Route::get('/fetchlog', function () {
	return view('fetchlog');
});
*/

// Vue.js ajax
Route::get('/vfetchlogs', [JobController::class, 'FetchLogs']);

Route::get('/createlog', function () {
	return view('createlog');
});

Route::post("savelog",[JobController::class, 'SaveLog']);

Route::get('/editlog/{id}', [JobController::class, 'EditLog']);

Route::patch('/patchlog', [JobController::class, 'UpdateLog']);

Route::get('/installer', function () {
	return view('installer');
});
 
 

 
