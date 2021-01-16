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

Route::get('/','HomePageController@index')->name('indexpage');

Route::get('/single',"CommentsController@page")->name('postcomment');
Route::get('/category', function () {
    return view('/TechSite/category');
});
Route::get('/blog',"NewsController@page")->name('blog');


Route::get('/add_news','NewsController@add_news')->name('add_news');

Route::post('/add_news','NewsController@store')->name('storenews');


Route::post("/",'CommentsController@store')->name('storecomments');

Route::post("/admindestroy",'NewsController@destroy')->name('admindestroy');

Route::get('single={id}','NewsController@show')->name('showmore');


Route::get('/edit={id}','NewsController@edit')->name('adminedit');

