<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\userController;
use App\Http\Controllers\postController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/home',[InstagramController::class,'index']);

/// user

Route::middleware(['isLoggedIn'])->group(function(){

         Route::get(  '/User/profile/{id}' , [userController::class,'profile']);
         Route::post(  '/User/profile/{id}' , [postController::class,'createPost']);
         Route::get(  '/User/profile/post/{id}' , [postController::class,'showPost']);
         Route::post(  '/User/profile/post/{id}' , [postController::class,'commentPost']);
         Route::get(  '/User/Signout' , [userController::class,'logout']);
         Route::get(  '/' , [InstagramController::class,'index']);
         Route::post(  '/' , [InstagramController::class,'doOperation']);
});
Route::get(  '/User/create', [userController::class,'create']);
Route::post( '/User/create', [userController::class,'createPost']);
Route::get(  '/User/login' , [userController::class,'login']);

Route::post( '/User/login' , [userController::class,'loginPost']);



/// home

