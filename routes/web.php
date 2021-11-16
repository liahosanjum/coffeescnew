<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AssignRoleToUserController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AssignPermissionToRoleController;



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


/*
Route::get('/', function () {
    return view('welcome');
});
*/




/*
Route::get('/', function () {
    return view('home/home');
});
*/

 

Route::post('/updateUser',[UserController::class,'updateUser'])->name('update_user');


Route::get('/',[ProductController::class,'index']);
Route::get('cart', [ProductController::class, 'cart'])->middleware('checkcart')->name('cart');
Route::get('product-detail/{id}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');


Route::get('/login', [UserController::class, 'login'])->middleware('guest:web')->name('login');
Route::post('/getuserinfo' , [UserController::class, 'getUserInfo'])->name('getuserinfo');


Route::get('/register',[UserController::class,'register'])->middleware('guest:web');
Route::post('/create',[UserController::class,'create'])->middleware('SanitizeData')->name('create');


Route::get('/verifyMobile',[UserController::class,'verifyMobile']);
Route::get('/verifyMobileSuccess',[UserController::class,'verifyMobileSuccess']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:web')->name('profile');

Route::post('/update', [UserController::class, 'updateUser'])->name('updateAccount');


Route::group([ 
    'middleware' => 'auth:web'], function() {

    Route::get('/getupdshipaddress', [UserController::class, 'getShippingAddress'])->name('getupdshipaddress');
    Route::post('/updshipaddress', [UserController::class, 'updateShippingAddress'])->name('updateShippingAddress');
    Route::get('/myorder',[UserController::class,'myOrder'])->name('myorder');
    
    
    Route::get('/checkout',[CheckOutController::class,'index'])->name('checkout');
    Route::get('/shipaddress',[CheckOutController::class,'shipAddress']);
    Route::get('/placeorder',[ProductController::class,'placeOrder']);
    Route::get('/orderdetail/{id}',[OrderController::class,'orderDetail'])->name('orderdetails');
});


Route::get('/setcurrency',[ProductController::class,'setCurrency'])->name('setcurrency');
Route::get('/getcurrency',[ProductController::class,'getCurrency'])->name('getcurrency');




Route::get('/getcities/{id}',[UserController::class, 'getCities']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/admin/adminlogin', [AdminController::class, 'adminlogin'])->middleware('guest:admin')->name('adminlogin');
Route::post('/admin/admingetuserinfo', [AdminController::class, 'adminGetUserInfo'])->name('admingetuserinfo');

Route::group([
                'prefix' => '/admin/',
                'middleware' => ['auth:admin' , 'checkauthadmin'] ], function() 
            {
    Route::get('adminprofile', [AdminController::class, 'adminProfile'])->name('adminprofile');
    Route::get('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
    Route::get('addproduct', [AdminProductController::class, 'addProduct'])->name('addproduct');
    Route::post('saveproduct', [AdminProductController::class, 'saveProduct'])->name('saveproduct');
    Route::get('productlist', [AdminProductController::class, 'productList'])->name('productlist');
    Route::get('productdetail/{id}', [AdminProductController::class, 'productDetail'])->name('productdetail');
    Route::delete('productdelete', [AdminProductController::class, 'destroy'])->name('product.delete');
    Route::get('orderlist', [AdminOrderController::class, 'index'])->name('order.orderlist');
    Route::get('/orderdetail/{id}',[AdminOrderController::class,'orderDetail'])->name('order.orderdetails');

    Route::get('assignrole', [AssignRoleToUserController::class, 'index'])->name('assignrole.index');
    Route::get('assignrole/edit/{id}', [AssignRoleToUserController::class, 'edit'])->name('assignrole.edit');
    Route::put('assignrole/update/{id}', [AssignRoleToUserController::class, 'update'])->name('assignrole.update');
    Route::get('assignrole/create', [AssignRoleToUserController::class, 'create'])->name('assignrole.create');
    Route::post('assignrole/store', [AssignRoleToUserController::class, 'store'])->name('assignrole.store');

    Route::get('assignpermissionrole', [AssignPermissionToRoleController::class, 'index'])->name('assignpermrole.index');
    Route::get('assignpermissionrole/edit/{id}', [AssignPermissionToRoleController::class, 'edit'])->name('assignpermrole.edit');
    Route::put('assignpermissionrole/update/{id}', [AssignPermissionToRoleController::class, 'update'])->name('assignpermrole.update');
    Route::get('assignpermissionrole/create', [AssignPermissionToRoleController::class, 'create'])->name('assignpermrole.create');
    Route::post('assignpermissionrole/store', [AssignPermissionToRoleController::class, 'store'])->name('assignpermrole.store');
    

});

 
Route::resource('admin/roles', RoleController::class)->only([
    'index', 'show' , 'create','edit','store'
]);
Route::post('admin/roles/update/{id}', [RoleController::class, 'update'])->middleware('auth:admin')->name('roles.update');
Route::delete('admin/roles/delete', [RoleController::class, 'destroy'])->middleware('auth:admin')->name('roles.delete');


Route::resource('admin/permissions', PermissionsController::class)->only([
    'index', 'show' , 'create','edit','store'
]);
Route::post('admin/permissions/update/{id}', [PermissionsController::class, 'update'])->middleware('auth:admin')->name('permissions.update');
Route::delete('admin/permissions/delete', [PermissionsController::class, 'destroy'])->middleware('auth:admin')->name('permissions.delete');





Route::resource('admin/pages', PagesController::class
)->only([
    'index', 'show' , 'create','edit','store'
]);
Route::put('admin/pages/update/{id}', [PagesController::class, 'update'])->middleware('auth:admin')->name('pages.update');
Route::delete('admin/pages/delete', [PagesController::class, 'destroy'])->middleware('auth:admin')->name('pages.delete');


Route::resource('admin/menu', MenuController::class)->only([
    'index', 'show' , 'create','edit','store'
]);
Route::post('admin/menu/update/{id}', [MenuController::class, 'update'])->middleware('auth:admin')->name('menu.update');
Route::delete('admin/menu/delete', [MenuController::class, 'destroy'])->middleware('auth:admin')->name('menu.delete');



Route::group([
    'prefix' => 'page'],
     function() {
    Route::get('/{id}', [PageController::class, 'index'])->name('page.index');
});

Route::get('/admin/accessdenied', [AdminController::class, 'noAccess'])->name('admin.accessdenied');

