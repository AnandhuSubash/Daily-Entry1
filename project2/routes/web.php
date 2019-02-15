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

Route::get('/home', function () {//url of the page
    return view('welcome');//view
});
Route::get('/user/{id}', function ($id) {//url of the page
    return "my id is".$id;//displays the function value
});

Route::get('/about', function () {//url of the page
    return view('pages.about');//view
});
 Route::get('/index','PagesController@index');// display the return value of function from PagesController
Route::get('/about','PagesController@about');
Route::get('/service','PagesController@service');
Route::get('/click','PagesController@click');
Route::get('/register','PagesController@register');
Route::get('/login','PagesController@login');
Route::resource('/shares','SharesController');
