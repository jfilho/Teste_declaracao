<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('/carta', function () {
    return view('carta');
});

Route::get('/', function () {
    return view('welcome');
});

//rota para os dois usuários
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    });

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard/GerarDeclaracao', 'App\Http\Controllers\DashBoardController@GerarDeclaracao')->name('dashboard.GerarDeclaracao');

    Route::post('/dashboard/Conteudo', 'App\Http\Controllers\ContentsController@Conteudo')->name('dashboard.Conteudo');
    //Route::get('/dashboard/Conteudo', 'App\Http\Controllers\DashBoardController@Conteudo')->name('dashboard.Conteudo');
    //Route::post('/dashboard/GerarDeclaracao', 'App\Http\Controllers\Declaracao@EnviarAoBanco')->name('dashboard.EnviarAoBanco');

});

    Route::post('/index',[PdfController::class,"CDF"]);
    


    

require __DIR__.'/auth.php';

