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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/chefs', 'ChefController@index')->name('chefs');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/menu', 'MenuController@index')->name('menu');

Route::get('/admin/categories', 'Admin\AdminController@categories')
    ->name('edit-categories');
Route::get('/admin/edit-menu/{any?}', 'Admin\AdminController@editMenu')
    ->name('edit-menu')->middleware('can:edit-menu')
    ->where('any', '.*');
