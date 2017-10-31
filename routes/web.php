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
    return view('auth/login');
})->middleware('authenticated');
Route::get('/profile', 'ProfileController@getProfile');
Route::post('/profile', 'ProfileController@editProfile');
Route::get('/contact-us', 'HomeController@contact');
Route::post('/contact-us', 'HomeController@postContact');
Route::get('/{userId}/your-contents', 'ProfileController@yourContents');
Route::get('/{user_id}/your-contents/delete/{id}', 'ProfileController@destroy');
Route::get('/edit-house/{id}', 'ProfileController@editYourContent');
Route::post('/edit-house/{id}', 'ProfileController@updateYourContent');


Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@addHouse');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Route::get('/{id}', 'HomeController@getHouseDetails');



