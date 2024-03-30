<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

//home
Route::get('/', [HomeController::class, 'home'])->name('HomePage');

//backend
Route::get('/backend', function () {
    return view('backend.index');
});
//category
Route::get('/backend/category', function () {
    return view('backend.category.index');
});

Route::get('/category/list', [CategoryController::class, 'list'])->name('CategoryList');
Route::get('/category/createPage', [CategoryController::class, 'createPage'])->name('CategoryCreatePage');
Route::post('/category/create', [CategoryController::class, 'create'])->name('CategoryCreate');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('CategoryEdit');
Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('CategoryUpdate');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('CategoryDelete');
Route::get('category/{category}',[CategoryController::class, 'show'])->name('Category');

//Item Section
Route::prefix('item')->group(function(){
    Route::get('list', [ItemController::class, 'list'])->name('ItemList');
    Route::get('createPage', [ItemController::class, 'createPage'])->name('ItemCreatePage');
    Route::post('create', [ItemController::class, 'create'])->name('ItemCreate');
});
//search
Route::get('/item', [ItemController::class, 'search'])->name('ItemSearch');
Route::get('/item/{id}', [ItemController::class, 'detail'])->name('ItemDetail');

//Brand Section
Route::prefix('brand')->group(function(){
    Route::get('createPage', [BrandController::class, 'createPage'])->name('BrandCreatePage');
    Route::post('create', [BrandController::class, 'create'])->name('BrandCreate');
    Route::get('list', [BrandController::class, 'list'])->name('BrandList');
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('BrandEdit');
    Route::post('update/{id}', [BrandController::class, 'update'])->name('BrandUpdate');
    Route::get('delete/{id}', [BrandController::class, 'delete'])->name('BrandDelete');
});

//authention
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user/register', [RegisterController::class, 'createpage'])->name('ShowUserRegister');
Route::get('/user/login', [LoginController::class, 'showuserlogin'])->name('ShowUserLogin');
Route::post('/login', [LoginController::class, 'userlogin'])->name('UserLogin');
Route::get('/user/logout', [LoginController::class, 'userlogout'])->name('UserLogout');
//profile
Route::get('profile', [ProfileController::class, 'profile'])->name('Profile');

//User section
Route::get('/admin/profile', [UserController::class, 'showadminprofile'])->name('ShowAdminProfile');
Route::post('/admin/prifile/update', [UserController::class, 'updateadminprofile'])->name('UpdateAdminProfile');
