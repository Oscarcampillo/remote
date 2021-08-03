<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\empleadoController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;

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
    return view('auth.login');
});

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [empleadoController::class, 'index'])->name('home');
Route::Group(['Middleware'=>'auth'], function(){
    route::resource('empleado',empleadoController::class)->middleware('auth');
});