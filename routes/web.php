<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return ("welcome");
});

//Crud with ajax
Route::get('/ajaxindex',[AjaxController::class,'index'])->name('ajaxindex');

Route::post('/ajaxaddproduct',[AjaxController::class,'addproduct'])->name('add.product');

Route::post('/ajaxupdateproduct',[AjaxController::class,'updateproduct'])->name('update.product');

Route::post('/ajaxdeleteproduct',[AjaxController::class,'deleteproduct'])->name('delete.product');

Route::get('/pagination/paginate-data',[AjaxController::class,'pagination']);

Route::get('/search-product',[AjaxController::class,'searchproduct'])->name('search.product');






// Crud with image

Route::get('/imageupload',[ImageController::class,'index'])->name('index');

Route::get('/imageshow',[ImageController::class,'display'])->name('imageshow');

Route::post('/imageupload',[ImageController::class,'store'])->name('image.store');
Route::put('/updateimage/{employee}}',[ImageController::class,'update'])->name('image.update');


Route::get('/editimage/{id}/edit',[ImageController::class,'edit'])->name('image.edit');

Route::delete('/image/{employee}/delete', [ImageController::class, 'delete'])->name('image.delete');







//Product routing
Route::get('/product',[ProductController::class,'index'])->name('product.index');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
