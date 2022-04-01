<?php

use Illuminate\Support\Facades\Auth;
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
    if(Auth::guest()) {
        return view('index');
    }

    //return view('cabinet');
    return \App\Http\Controllers\CabinetController::index();
});

Auth::routes();

Route::name('cabinet.')->group(function (){

    Route::get('/cabinet', [App\Http\Controllers\CabinetController::class, 'index'])->middleware('auth')->name('index');
    Route::post('/cabinet', [App\Http\Controllers\CabinetController::class, 'feedbackStore'])->middleware('auth')->name('feedbackStore');

});
