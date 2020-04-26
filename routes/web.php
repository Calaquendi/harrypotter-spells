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

Route::get('/kerai', function() {
    return view('charm');
})->name('charm');

Route::get('/fransfiguracija', function() {
    return view('transfiguration');
})->name('transfiguration');

Route::get('/sukurimo-kerai', function() {
    return view('conjuration');
})->name('conjuration');

Route::get('/transfiguraciniai-kerai', function() {
    return view('transformation');
})->name('transformation');

Route::get('/uzkalbejimai', function() {
    return view('jinx');
})->name('jinx');

Route::get('/uzkeikimai', function() {
    return view('hex');
})->name('hex');

Route::get('/prakeiksmai', function() {
    return view('curse');
})->name('curse');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('types', 'TypeController');
    Route::resource('spells', 'SpellController');
});
