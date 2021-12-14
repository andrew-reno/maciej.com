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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dash');
});

Route::get('/viewlogs', function () {
    
	return view('viewlogs');
});

Route::get('/createlog', function () {
    
	return view('createlog');
});

Route::get('/installer', function () {
    
	return view('installer');
});
/*
Route::get('/installer', function () {
    return 'Hello World';
});
*/