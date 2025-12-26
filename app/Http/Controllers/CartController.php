<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_cart(Request $request, $id)
    {
        $product = ProductModel::where('product_id', $id)->first();
        $cart = session('cart.products', []);
        $quantity = $request->input('quantity', 1);

        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['item'] += $quantity;
                $found = true;
            }
        }

        if (!$found) {
            $cart[] = [
                'id'    => $id,
                'item'  => $quantity,
                'img'   => $product->product_img,
                'price' => $product->product_price,
                'name'  => $product->product_name
            ];
        }

        session(['cart.products' => $cart]);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function cart()
    {
        return view('cart');
    }

    public function increase($id)
    {
        $cart = session('cart.products', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $id) $item['item']++;
        }
        session(['cart.products' => $cart]);
        return back();
    }

    public function decrease($id)
    {
        $cart = session('cart.products', []);
        foreach ($cart as $key => &$item) {
            if ($item['id'] == $id) {
                if ($item['item'] > 1) $item['item']--;
                else unset($cart[$key]);
            }
        }
        session(['cart.products' => $cart]);
        return back();
    }

    public function delete($id)
    {
        $cart = session('cart.products', []);
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) unset($cart[$key]);
        }
        session(['cart.products' => $cart]);
        return back();
    }

    public function clear()
    {
        session()->forget('cart.products');
        return back();
    }

    public function order(Request $request)
    {
        $user = session()->get('user_id');
        if (!$user) return redirect('/admin/login')->with('error', 'Bạn cần đăng nhập để đặt hàng!');

        $cart = session()->get('cart.products', []);
        if (empty($cart)) return redirect()->back()->with('error', 'Giỏ hàng đang trống!');

        $order_data = [
            'order_date'     => Carbon::now(),
            'order_customer' => $user,
            'order_status'   => 0,
            'order_note'     => 'Họ tên: ' . $request->input('fullname') . ', SĐT: ' . $request->input('phone') . ', Địa chỉ: ' . $request->input('address') . '. Ghi chú: ' . $request->input('order_note', ''),
        ];

        $order_id = DB::table('orders')->insertGetId($order_data);

        foreach ($cart as $item) {
            DB::table('order_detail')->insert([
                'order_id'               => $order_id,
                'order_product_id'       => $item['id'],
                'order_product_quantity' => $item['item'],
                'order_product_price'    => $item['price'],
            ]);
        }

        session()->forget('cart.products');

        return redirect('/don-hang')->with('success', 'Đặt hàng thành công!');
    }
}
