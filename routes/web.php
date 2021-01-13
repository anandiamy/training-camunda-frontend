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

Route::get('pengajuan-reimburse/create', 'App\Http\Controllers\PengajuanReimburseController@create')
    ->name('pengajuan-reimburse.create');

Route::post('pengajuan-reimburse', 'App\Http\Controllers\PengajuanReimburseController@store')
    ->name('pengajuan-reimburse.store');

Route::get('review-reimburse', 'App\Http\Controllers\ReviewReimburseController@index')
    ->name('review-reimburse.index');

Route::get('review-reimburse/{id}/edit', 'App\Http\Controllers\ReviewReimburseController@edit')
    ->name('review-reimburse.edit');

Route::delete('review-reimburse/{id}', 'App\Http\Controllers\ReviewReimburseController@destroy')
    ->name('review-reimburse.destroy');

Route::put('review-reimburse/{id}', 'App\Http\Controllers\ReviewReimburseController@update')
    ->name('review-reimburse.update');
