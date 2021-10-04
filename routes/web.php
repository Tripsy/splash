<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CategoryController;

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
    //return view('welcome');
    return redirect()->action([CommercialController::class, 'index']);
});

Route::resource('commercial', CommercialController::class);
Route::resource('category', CategoryController::class);
