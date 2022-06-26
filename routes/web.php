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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::resource('videos', 'App\Http\Controllers\VideoController');
Route::resource('comentarios', 'App\Http\Controllers\CommentController');

Route::get('/delete-video/{video_id}', array(
    'as' => 'delete-video',
    'middleware' => 'auth',
    'uses' => 'App\Http\Controllers\VideoController@delete_video'
))->middleware('auth');

Route::get('/miniatura/{filename}', array(
    'as'=> 'imageVideo',
    'uses' => 'App\Http\Controllers\VideoController@getImage'
))->middleware('auth');


Route::get('/video-file/{filename}', array(
    'as'=> 'fileVideo',
    'uses' => 'App\Http\Controllers\VideoController@getVideo'
))->middleware('auth');

