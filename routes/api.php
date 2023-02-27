<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {

  Route::post('register', [AuthController::class,'register']);
  Route::post('login', [AuthController::class,'login']);
  Route::post('logout', [AuthController::class,'logout']);
  Route::post('refresh', [AuthController::class,'refresh']);
  Route::post('me', [AuthController::class,'me']);
});



Route::resource('category',CategoryController::class);

Route::resource('Article',ArticleController::class);

Route::resource('Tag',TagController::class);

// Route::resource('comment',CommentController::class);

Route::resource('user',UserController::class);



Route::get('/Article/{article}/comments',[ CommentController::class,'index']);
Route::post('/Article/{article}/comment', [CommentController::class,'store']);
Route::get('/Article/{article}/comment/my', [CommentController::class,'show']);
Route::put('/Article/{article}/comment/{comment}', [CommentController::class,'update']);
Route::delete('/Article/{article}/comment/{comment}', [CommentController::class,'destroy']);



  



  


Route::get('profile/{id}', [UserController::class, 'show']);

Route::put('profile/{id}', [UserController::class, 'update']);

Route::delete('profile/{id}', [UserController::class, 'destroy']);
