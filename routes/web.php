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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/cruds', [App\Http\Controllers\CrudController::class, 'save'])->name('add');
    Route::post('/edit/{id}', [App\Http\Controllers\CrudController::class, 'show'])->name('read');
    Route::post('/edit_save', [App\Http\Controllers\CrudController::class, 'update'])->name('editSave');

    Route::post('/delete', [App\Http\Controllers\CrudController::class, 'remove'])->name('delete');


});