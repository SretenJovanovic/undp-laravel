<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\API\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/users', [UsersController::class, 'index']);
// Route::get('/users/{userid}', [UsersController::class, 'show']);


Route::resource('/users',UsersController::class)->only('index','show');



// Route::get('/posts', [PostsController::class, 'index']);
// Route::get('/posts/{postid}', [PostsController::class, 'show']);


Route::resource('/posts', PostsController::class)->only('index','show');
