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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dash');
});

Route::get('/viewlogs', [JobController::class, 'ShowJobs']) ;

Route::get('/createlog', function () {
	return view('createlog');
});

Route::post("savelog",[JobController::class, 'SaveLog']);

Route::get('/installer', function () {
	return view('installer');
});

Route::get('/installer', function () {
    return view('installer');
});
