<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

// Người dùng
Route::get('admin/them-nguoi-dung', [UserController::class, 'insert_form']);
Route::post('admin/xu-ly-them-nguoi-dung', [UserController::class, 'action_insert']);
Route::get('admin/danh-sach-nguoi-dung', [UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}', [UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}', [UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung', [UserController::class, 'action_update']);

// Sản phẩm
Route::get('admin/them-san-pham', [ProductController::class, 'insert_form']);
Route::post('admin/xu-ly-them-san-pham', [ProductController::class, 'action_insert']);
Route::get('admin/danh-sach-san-pham', [ProductController::class, 'get_all']);
Route::get('admin/quan-ly-san-pham', [ProductController::class, 'manage']);
Route::get('admin/xoa-san-pham/{id}', [ProductController::class, 'del']);
Route::get('admin/thong-tin-san-pham/{id}', [ProductController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-san-pham', [ProductController::class, 'action_update']);

// Home
Route::get('/', [HomeController::class, 'index']);
Route::get('san-pham', [ProductController::class, 'customerProducts']);

// Đăng nhập
Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::get('admin/logout', [LoginController::class, 'logout']);   
Route::get('/admin/dang-ky', [LoginController::class, 'registerForm']);
Route::post('/admin/xu-ly-dang-ky', [LoginController::class, 'register']);

Route::prefix('greeting')->group(function () {
    Route::get('vn', function () {
        return "Xin chào!";
    });

    Route::get('en', function () {
        return "Hello!";
    });

    Route::get('cn', function () {
        return "你好!";
    });
});

Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});

Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});
Route::get('/chi-tiet-san-pham/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
// Cart
Route::match(['get', 'post'], '/add-cart/{id}', [CartController::class, 'add_cart']);
Route::get('/gio-hang', [CartController::class, 'cart']);

Route::get('/cart/increase/{id}', [CartController::class, 'increase']);
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease']);
Route::get('/cart/delete/{id}', [CartController::class, 'delete']);
Route::get('/cart/clear', [CartController::class, 'clear']);
Route::get('/order', [CartController::class, 'order']);
Route::match(['get', 'post'], '/order', [CartController::class, 'order']);
Route::get('/don-hang', [OrderController::class, 'myOrders']);
Route::get('/don-hang/{id}', [OrderController::class, 'orderDetail']);
Route::put('/don-hang/sua/{id}', [OrderController::class, 'update']);
Route::get('/don-hang/xoa/{id}', [OrderController::class, 'delete']);
Route::put('/don-hang/huy/{id}', [OrderController::class, 'cancel']);
Route::post('/dat-hang-truc-tiep', [ProductController::class, 'directOrder']);
// Routes cho Quản lý danh mục
Route::get('admin/quan-ly-danh-muc', [CategoryController::class, 'index'])->name('admin.quan-ly-danh-muc');
Route::get('admin/them-danh-muc', [CategoryController::class, 'create']);
Route::post('admin/them-danh-muc', [CategoryController::class, 'store']);
Route::get('admin/sua-danh-muc/{category_id}', [CategoryController::class, 'edit']);
Route::put('admin/sua-danh-muc/{category_id}', [CategoryController::class, 'update']);
Route::get('admin/xoa-danh-muc/{category_id}', [CategoryController::class, 'destroy']);


