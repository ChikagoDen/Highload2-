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
Route::get('/redis', function () {
    Cache::store('redis')->put('Name', 'Привет из Редис');
    $value = Cache::get('Name');
    dd($value);
});
Route::get('/memcache', function () {
    Cache::put('Name', 'Привет из memcache');
    $value = Cache::get('Name');
    dd($value);
});

Route::get('/file', function () {
    Cache::store('file')->put('Names', 'Привет файловый кэш');
    $value = Cache::get('Names');
    dd($value);
});
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Cache::flush();
    return "Кэш очищен.";});
