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
Route::get('post/{id}', 'FrontController@show')->where(['id'=>'[0-9]+']);


//Route pour afficher les auteurs
Route::get('/stage', 'FrontController@showPostStage')->where(['id'=>'[0-9]+'])->name('stage');
//Route pour afficher les genres 
Route::get('/formation', 'FrontController@showPostFormation')->where(['id'=>'[0-9]+'])->name('formation');