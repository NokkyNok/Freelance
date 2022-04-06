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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FreeController@index')->name('index');

// Authentication routes //
Route::get('/register', 'FreeController@register')->name('register');
Route::post('/register', 'FreeController@storeUser');
Route::post('/login', 'FreeController@authenticate');
Route::get('logout', 'FreeControllerController@logout')->name('logout');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function()
{
 
    Route::resource('/users','UsersController');
   
    
   
    

    
    
  
});
