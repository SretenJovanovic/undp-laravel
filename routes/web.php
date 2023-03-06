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
    return view('welcome');
});

Route::get('/blog',[PostsController::class,'index']); //prikazuje sve 
Route::get('/blog/{id}',[PostsController::class,'show']); //prikazuje jedan blog iz baze
Route::get('/blog/create/post', [PostsController::class,'create']); // prikazuje create formu
Route::post('/blog/create/post', [PostsController::class,'store']); // cuva kreirani post u bazu
Route::get('/blog/{id}/edit', [PostsController::class,'edit']); // prikazuje edit formu
Route::put('/blog/{id}/edit', [PostsController::class,'update']); // cuva azurirani post u bazu
Route::delete('/blog/{id}',[PostsController::class,'delete']); // brise post iz baze

