<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyApi;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\myBlogs;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data',[dummyApi::class,'getData']);
Route::get('list/{id?}',[myBlogs::class,'list']);

Route::post('store',[myBlogs::class,'store_blog']);
Route::put('update',[myBlogs::class,'update_blog']);
Route::get('search/{name}',[myBlogs::class,'search']);
Route::get('delete/{id}',[myBlogs::class,'delete']);
Route::get('test',[myBlogs::class,'test']);


Route::apiResource('member',MemberController::class);