<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
<<<<<<< HEAD
use App\Http\Controllers\TagController;
=======

>>>>>>> 775915a10e0960580191c6575c34615d82d029e4
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('category',CategoryController::class);

<<<<<<< HEAD
Route::resource('Article',ArticleController::class);

Route::resource('Tag',TagController::class);
=======

  Route::resource('comment',CommentController::class);


>>>>>>> 775915a10e0960580191c6575c34615d82d029e4

