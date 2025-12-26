<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Hiển thị form thêm sản phẩm
    public function insert_form()
    {
        $categories = CategoryModel::all(); // Lấy tất cả danh mục
        return view('admin.product_insert_form', ['categories' => $categories]);
    }

    // Xử lý khi thêm sản phẩm mới
    public function action_insert(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');

        // Xử lý ảnh
        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name = 'img/' . $request->file('img')->getClientOriginalName();
        } else {
            $img_name = 'img/default.png';
        }

        // Dữ liệu để lưu vào cơ sở dữ liệu
        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        // Thêm sản phẩm vào cơ sở dữ liệu
        ProductModel::insert($result);

        // Chuyển hướng về trang danh sách sản phẩm
        return redirect()->to('san-pham')->with('success', 'Thêm sản phẩm thành công!');
    }

    // Xử lý khi cập nhật sản phẩm
    public function action_update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');

        // Lấy sản phẩm cũ để giữ ảnh nếu không upload mới
        $product = ProductModel::where('product_id', $id)->first();

        // Xử lý ảnh
        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name = 'img/' . $request->file('img')->getClientOriginalName();
        } else {
            $img_name = $product->product_img;
        }

        // Dữ liệu để cập nhật
        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        // Cập nhật sản phẩm vào cơ sở dữ liệu
        ProductModel::where('product_id', $id)->update($result);

        // Chuyển hướng về trang quản lý sản phẩm
        return redirect()->to('admin/quan-ly-san-pham')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Lấy tất cả sản phẩm và danh mục
    public function get_all()
    {
        $products = ProductModel::join('category', 'product_category', '=', 'category_id')->get();

        $manage = request('manage', false);

        return view('products', ['products' => $products, 'manage' => $manage]);
    }

    // Xóa sản phẩm
    public function del($id)
    {
        ProductModel::where('product_id', $id)->delete();
        return redirect()->to('admin/quan-ly-san-pham')->with('success', 'Xóa sản phẩm thành công!');
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = ProductModel::join('category', 'product_category', '=', 'category_id')
            ->where('product_id', $id)
            ->first();
        $categories = CategoryModel::all();
        return view('admin.product_info_form', ['product' => $product, 'categories' => $categories]);
    }

    // Danh sách sản phẩm cho khách hàng
    public function customerProducts()
    {
        $products = ProductModel::all();
        return view('products', ['products' => $products]);
    }

    // Chi tiết sản phẩm cho khách hàng
    public function detail($id)
    {
        $product = ProductModel::join('category', 'product_category', '=', 'category_id')
            ->where('product_id', $id)
            ->first();
        return view('product_detail', ['product' => $product]);
    }

    // Quản lý sản phẩm cho admin
    public function manage()
    {
        $products = ProductModel::join('category', 'product_category', '=', 'category_id')->get();
        return view('admin.product_manage', ['products' => $products]);
    }

    public function directOrder(Request $request)
    {
        $user = session()->get('user_id');
        if (!$user) return redirect('/admin/login')->with('error', 'Bạn cần đăng nhập để đặt hàng!');

        $product_id = $request->input('product_id');
        $fullname = $request->input('fullname');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $quantity = $request->input('quantity', 1);

        $product = ProductModel::where('product_id', $product_id)->first();

        $order_data = [
            'order_date' => Carbon::now(),
            'order_customer' => $user,
            'order_status' => 0,
            'order_note' => "Họ tên: $fullname, SĐT: $phone, Địa chỉ: $address",
        ];

        $order_id = DB::table('orders')->insertGetId($order_data);

        DB::table('order_detail')->insert([
            'order_id' => $order_id,
            'order_product_id' => $product_id,
            'order_product_quantity' => $quantity,
            'order_product_price' => $product->product_price,
        ]);

        return redirect('/don-hang')->with('success', 'Đặt hàng thành công!');
    }
}
