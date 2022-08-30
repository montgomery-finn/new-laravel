<?php

use App\Http\Controllers\PostsController;
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

    // str() equivale a Str::of
    // cria um objeto com funções de string
    // upper, apend, slug...

    return str('hello world')->upper();

    //return view('welcome');
})->name('home');

Route::get('/endpoint', function () {
    return to_route('home');

    // equivalente à:
    // return redirect()->route('home');
});

//Controller route groups 

Route::controller(PostsController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts', 'store');
});