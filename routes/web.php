<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('post', 'App\Http\Controllers\PostController');
Route::resource('page', 'App\Http\Controllers\PageController');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
/*
Auth::routes();

Route::group([

        'middleware' => 'auth.role',
        'prefix' => 'admin',
        'role' => 'admin',
        ],function(){
                Route::get('/home', 'HomeController@index')->name('home');
            
                 Route::get('/page', 'PageController@index');
                 Route::get('/post', 'PostController@index');
        }

);

Route::group([

        'middleware' => 'auth.role',
        'role' => 'user',
        ],function(){
                Route::get('/home', 'HomeController@index')->name('home');
            
        }

);
*/
