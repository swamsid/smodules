<?php

use __defaultNamespace__\Controllers\__childModuleName__Controller;
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

Route::get('modules/__moduleName__', function(){
    return view('__moduleNameReal__::index');
});
