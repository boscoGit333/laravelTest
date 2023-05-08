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
})->name('home');


Route::view('/singer/new','formNewSinger')->name('formNewSinger');

Route::controller(\App\Http\Controllers\SingSongController::class)->group(function(){
        
    Route::put('/singer/new','storeNewSinger')->name('storeNewSinger');
    Route::get('/song/list/get','postListaCanzoni')->name('listaCanzoniFilter');
    Route::get('/song/list/{singer?}','listaCanzoni')->name('listaCanzoni');
    
    Route::get('/song/new','formNewSong')->name('formNewSong');
    Route::put('/song/new','storeNewSong')->name('storeNewSong');
    Route::get('/song/edit/{song?}','formEditSong')->name('formEditSong');
    Route::put('/song/edit/{song?}','storeEditSong')->name('storeEditSong');
    Route::delete('/song/delete/{song?}','deleteSong')->name('deleteSong');
});
