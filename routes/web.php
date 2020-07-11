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


Route::get('/search', 'SearchController@index');

Route::get('/scrapper', 'ScrappersController@index');
Route::get('/scrapper/{name}/{projectToken}/{authToken}', 'ScrappersController@scrapper');

Route::get('/projectRun/{projectToken}/{authToken}', 'ScrappersController@projectRun');

Route::get('/refine/{name}/{authToken}/{runToken}/Brabys', 'ScrappersController@Brabys');

Route::get('/scrape/{runToken}/{authToken}/subaru', 'ScrappersController@subaru');
Route::post('/scrapper/{id}/create', 'ScrappersController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
