<?php

use Illuminate\Http\Request;

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
Route::get("category", "CategoryController@index");
Route::post("category", "CategoryController@create");
Route::get("category/{id}", "CategoryController@show");
Route::put("category/{id}", "CategoryController@update");
Route::delete("category/{id}", "CategoryController@destroy");

Route::get("product", "ProductController@index");
Route::post("product", "ProductController@create");
Route::get("product/{id}", "ProductController@show");
Route::put("product/{id}", "ProductController@update");
Route::delete("product/{id}", "ProductController@destroy");

Route::post("upload", "UploadController@upload");
