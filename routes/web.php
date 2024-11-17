<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\loginController;

Route::get('admin/logout',function () {
    Session::forget('user');
    return redirect('admin/adminlogin');
});
// Admin Routes
Route::view('/admin/admin', 'admin/admin')->name('admin.index');


Route::view('/admin/addproduct', 'admin/addproduct');
Route::get('/admin/dcustomar',[ProductController::class,'customar']);
Route::get('admin/dcategory',[ProductController::class,'dcategory']);
Route::get('admin/dorder',[ProductController::class,'dorder']);

Route::post('/admin/insertproduct', [ProductController::class, 'insertProduct']);
Route::get('admin/viewproduct', [ProductController::class, 'findData']);
Route::get('admin/product_images/{id}', [ProductController::class, 'viewImages'])->name('admin.product_images');
Route::get('admin/update/{id}', [ProductController::class, 'update'])->name('admin.update');
Route::post('admin/update', [ProductController::class, 'edit'])->name('admin.edit');
Route::get('/admin/product/{id}/addsize', [ProductController::class, 'showAddSizeForm'])->name('admin.showAddSizeForm');
Route::post('/admin/product/{id}/addsize', [ProductController::class, 'addSize'])->name('admin.addsize');
Route::get('admin/delete/{id}', [ProductController::class, 'delete'])->name('admin.delete');
Route::get('admin/deletes/{id}',[ProductController::class,'deletes'])->name('admin.deletes');
Route::get('admin/product/{id}/color',[ProductController::class,'showcolor'])->name('admin.showcolor');
Route::post('admin/product/{id}/color',[ProductController::class,'addcolor'])->name('admin.color');
Route::get('admin/deletecolor/{id}',[ProductController::class,'deletecolor'])->name('admin.deletecolor');
Route::get('admin/addimage/{id}',[ProductController::class,'showimage'])->name('admin.showimage');
Route::post('admin/addimage/{id}',[ProductController::class,'addimage'])->name('admin.addimage');
Route::get('admin/deleteimg/{id}',[ProductController::class,'deleteimg'])->name('admin.deleteimg');
Route::get('admin/adminlogin',[Usercontroller::class,'showlogin']);
Route::post('admin/adminlogin',[Usercontroller::class,'adminlogin'])->name('admin.adminlogin');
Route::get('/admin/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/insertproduct',[ProductController::class,'insertproducts']);
Route::get('admin/contactus',[ContactusController::class,'contact']);

// User Routes
Route::get('logout', function(){
    session::forget('login');
    return redirect('login');
});
Route::view('index','index');
Route::get('index',[ProductController::class,'index'])->name('index');
Route::get('product',[ProductController::class,'showproduct'])->name('showproduct');
Route::get('productid/{id}',[ProductController::class,'showview'])->name('productid');
Route::get('search',[ProductController::class,'search']);

Route::get('shoping-cart',[ProductController::class,'shopingcart']);
Route::view('blog','blog');
Route::view('about','about');
Route::view('contact','contact');
Route::view('order','order');
Route::get('signup',[loginController::class,'signup']);

Route::get('login',[loginController::class,'loginget'])->name('login');

Route::get('cart/{id}',[ProductController::class,'cart'])->name('cart');
Route::post('addq/{id}',[ProductController::class,'addquantity'])->name('addq');
Route::post('removecart/{id}',[ProductController::class,'removecart'])->name('removecart');
Route::get('womenproduct',[ProductController::class,'womenproduct'])->name('womenproduct');
Route::get('mensproduct',[ProductController::class,'mensproduct'])->name('mensproduct');
Route::get('asso',[ProductController::class,'asso'])->name('asso');
Route::post('contactus',[ContactusController::class,'contactus']);
Route::post('login',[loginController::class,'login'])->name('name');
Route::post('signup',[loginController::class,'signupp'])->name('signup');
Route::post('order',[ProductController::class,'order'])->name('order');
