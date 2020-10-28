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

Route::get(
    '/', function () {
    return view('index');
}
);

Route::get(
    '/blank', function () {
    return view('blank');
}
);

Route::namespace('App\\Http\\Controllers\\Send')->prefix('send')->group(
    static function () {
        Route::any('callback', 'SendController@callback')->middleware([\App\Http\Middleware\Send\SendCallbackMiddleware::class])->name('send.callback');
        Route::any('order', 'SendController@order')->name('send.order');
    }
);
