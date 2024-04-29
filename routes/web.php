<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ShowLoginController;

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

//home section
Route::get('/', [HomeController::class, 'home'])->name('HomePage');
Route::get('about', [HomeController::class, 'showabout'])->name('AboutUs');

//backend
Route::get('/backend', function () {
    return view('backend.index');
});
//category
Route::get('/backend/category', function () {
    return view('backend.category.index');
});

Route::get('admin/register', [AdminController::class, 'showadminregister'])->name('ShowAdminRegister');
Route::post('admin/register', [AdminController::class, 'adminregister'])->name('AdminRegister');
Route::get('admin/login', [AdminController::class, 'showadminlogin'])->name('ShowAdminLogin');
Route::post('admin/login', [AdminController::class, 'adminlogin'])->name('AdminLogin');

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
    Route::get('edit/{id}', [ItemController::class, 'edit'])->name('ItemEdit');
    Route::post('update/{id}', [ItemController::class, 'update'])->name('ItemUpdate');
    Route::get('delete/{id}', [ItemController::class, 'delete'])->name('ItemDelete');
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
    Route::get('show/{brand}', [BrandController::class, 'show'])->name('Brand');
});


//profile
Route::post('/add-to-favorites/{item_id}', [ProfileController::class,'store'])->name('AddFavorite');
Route::get('/remove-from-favorites/{item_id}', [ProfileController::class, 'delete'])->name('DeleteFavorite');

Route::get('profile', [ProfileController::class, 'show'])->name('ShowProfile');

//User section
Route::get('changepassword', [UserController::class, 'showchangepassword'])->name('ShowChangePassword');
Route::post('changepassword', [UserController::class, 'changepassword'])->name('ChangePassword');
Route::get('customer/list', [UserController::class, 'list'])->name('CustomerList');


//Add to cart
Route::post('/add-to-cart', [AddToCartController::class, 'addItem']);
Route::get('cart', [AddToCartController::class, 'viewcart'])->name('cart');
Route::post('delete-cart-item', [AddToCartController::class, 'deleteitem']);
Route::post('update-cart', [AddToCartController::class, 'updatecart'])->name('UpdateCart');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkoutPage');
Route::post('place-order', [CheckoutController::class, 'placeorder'])->name('PlaceOrder');
Route::get('order/list', [OrderController::class, 'list'])->name('OrderList');
Route::get('order/{id}', [OrderController::class, 'delete'])->name('OrderDelete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showlogin'])->name('ShowLogin');
Route::post('/login', [LoginController::class, 'login'])->name('Login');
Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');
Route::get('/register', [RegisterController::class, 'register'])->name('ShowRegister');
Route::post('/register', [RegisterController::class, 'customerregister'])->name('Register');
