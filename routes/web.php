<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/','PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Route::get('/wel', function () {
//     return view('wel');
// });

// Route::get('/{name}/{id}', function ($name, $id){
//     return "My name is : " .$name. " and id is : ".$id;
// });

// Route::get('/abc','PageController@abc');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/contact', 'PagesController@contact');
Route::get('/blog', 'PagesController@blog');


Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard','DashboardController@index');
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']) ;

Route::resource('category', 'CategoryController');



Route::get('/destination','DestinationsController@index');
Route::get('/destination/create','DestinationsController@create');
Route::get('/destination/edit/{id}','DestinationsController@edit');

Route::post('/destination','DestinationsController@store');
Route::put('/destination/{id}','DestinationsController@update');
Route::delete('/destination/{id}','DestinationsController@delete');

Route::get('/test',[PagesController::class,'test']);