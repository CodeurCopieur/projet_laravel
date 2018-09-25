<?php

use App\Mail\ContactMessageCreated;
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

Route::get('posts', function() {
    return App\Post::all();
});

Route::get('post/{id}', function($id) {
    return App\Post::find($id);
});

/*
Route::get('/', function () {
    return view('welcome');
});*/

//page d'accueil
Route::get('/', 'FrontController@index')->name('home');
// Route pour afficher un livre, route sécurisé
Route::get('post/{id}', 'FrontController@show')->name('post')->where(['id'=>'[0-9]+']);
//Route pour afficher les auteurs
Route::get('stage', 'FrontController@showPostStage')->name('stage');
//Route pour afficher les genres 
Route::get('formation', 'FrontController@showPostFormation')->name('formation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// routes sécurisées

Route::resource('admin/post', 'PostController')->middleware('auth');


Route::get('/search', 'FrontController@searchPost')->name('search');

Route::get('/contact', 'FrontController@formContact')->name('contact');

Route::post('/contact', 'FrontController@store')->name('contact');

Route::get('/test-mail', function() { return new ContactMessageCreated('Inconnu dev', 'ID@gmail.com', 'Merci'); });