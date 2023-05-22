<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ServiceController;

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

 Route::get('contact', [ContactUsController::class, 'index']);
// Route::get('categories',[CategoryController::class,'index']);
// Route::get('categories/create',[CategoryController::class,'create']);
// Route::get('categories/{id}',[CategoryController::class,'show']);
// Route::post('categories',[CategoryController::class,'store']);
// Route::get('categories/edit/{id}',[CategoryController::class,'edit']);
// Route::put('categories/{id}',[CategoryController::class,'update']);
// Route::delete('categories/{id}',[CategoryController::class,'destroy']);

Route::get('categories',[HomeController::class,'index']);
Route::get('categories/create',[HomeController::class,'create']);
Route::get('categories/{id}',[HomeController::class,'show']);
Route::post('categories',[HomeController::class,'store']);
Route::get('categories/edit/{id}',[HomeController::class,'edit']);
Route::put('categories/{id}',[HomeController::class,'update']);
Route::delete('categories/{id}',[HomeController::class,'destroy']);

// Route::get('products',[ProductController::class,'index']);
// Route::get('products/create',[ProductController::class,'create']);
// Route::get('products/{id}',[ProductController::class,'show']);
// Route::post('products',[ProductController::class,'store']);
// Route::get('products/edit/{id}',[ProductController::class,'edit']);
// Route::put('products/{id}',[ProductController::class,'update']);
// Route::delete('products/{id}',[ProductController::class,'destroy']);

Route::get('products',[ServiceController::class,'index']);
Route::get('products/create',[ServiceController::class,'create']);
Route::get('products/{id}',[ServiceController::class,'show']);
Route::post('products',[ServiceController::class,'store']);
Route::get('products/edit/{id}',[ServiceController::class,'edit']);
Route::put('products/{id}',[ServiceController::class,'update']);
Route::delete('products/{id}',[ServiceController::class,'destroy']);

