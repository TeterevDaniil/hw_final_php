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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\ShopController@index');
Route::get('/category/{id}', 'App\Http\Controllers\ShopController@category');
Route::get('/product/{id}', 'App\Http\Controllers\ShopController@product');
Route::get('/buy/{id}', 'App\Http\Controllers\ShopController@buyProduct')->middleware(['auth'])->name('dashboard');;
Route::post('/order', 'App\Http\Controllers\ShopController@addOrder')->middleware(['auth'])->name('dashboard');;
Route::get('/myorder', 'App\Http\Controllers\ShopController@myOrder')->middleware(['auth'])->name('dashboard');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
