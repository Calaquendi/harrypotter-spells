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

$router = app()->make('router');
$types = App\Type::all();
if ($types->count() > 0) {
    foreach ($types as $type) {
        $router->get($type->type_url, 'TypeController@index')->name($type->type_url);
        Route::get('/' . $type->type_url . '/{spell_url}', 'SpellController@index');
    }
}

Route::post('search/{search?}', 'SearchController@postSearch');
Route::get('search/{search?}', 'SearchController@getSearch');

Auth::routes(
    [
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]
);

Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/types', 'AdminTypeController');
    Route::resource('admin/spells', 'AdminSpellController');
    Route::resource('admin/users', 'AdminUsersController');
});
