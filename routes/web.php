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
    // return view('welcome');
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/edit', 'HomeController@edit')->name('edit');

Route::post('/update', 'HomeController@update')->name('update');

Route::resource('user', 'UserController');

Route::resource('message', 'MessageController');

Route::get('/api/message/{id}', 'MessageController@getMessages');

Route::resource('classwork', 'ClassworkController');

Route::get('/classwork/{classwork}/download', 'ClassworkController@download')->name('classwork.download');

Route::resource('assignment', 'AssignmentController');

Route::get('/assignment/{assignment}/download', 'AssignmentController@download')->name('assignment.download');

Route::resource('challenge', 'ChallengeController');

Route::get('/challenge/{id}/submitChall', 'ChallengeController@submitChall')->name('challenge.submit');
