<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function myOrders()
    {
        $userId = Session::get('user_id');
        $role   = Session::get('user_role');

        $orders = $role == 1
            ? DB::table('orders')->orderBy('order_id', 'desc')->get()
            : DB::table('orders')->where('order_customer', $userId)->orderBy('order_id', 'desc')->get();

        return view('order', compact('orders'));
    }

    // Xem chi tiết đơn hàng
    public function orderDetail($id)
    {
        $userId = Session::get('user_id');
        $role   = Session::get('user_role');

        $order = DB::table('orders')->where('order_id', $id)->first();
        if (!$order) return redirect('/don-hang')->with('error', 'Đơn hàng không tồn tại!');

        // Kiểm tra quyền truy cập
        if ($role != 1 && $order->order_customer != $userId) {
            return redirect('/don-hang')->with('error', 'Bạn không có quyền xem đơn hàng này!');
        }

        $details = DB::table('order_detail')
            ->join('product', 'order_detail.order_product_id', '=', 'product.product_id')
            ->where('order_id', $id)
            ->get();

        $customer = DB::table('user')->where('user_id', $order->order_customer)->first();

        return view('order_detail', compact('order', 'details', 'customer', 'role'));
    }

    // Cập nhật đơn hàng (chỉ admin)
    public function update(Request $request, $id)
    {
        if (Session::get('user_role') != 1) {
            return redirect('/don-hang')->with('error', 'Bạn không có quyền sửa đơn hàng này!');
        }

        $orderExists = DB::table('orders')->where('order_id', $id)->exists();
        if (!$orderExists) {
            return redirect('/don-hang')->with('error', 'Đơn hàng không tồn tại!');
        }

        DB::table('orders')->where('order_id', $id)->update([
            'order_status' => $request->input('order_status'),
            'order_note'   => $request->input('order_note')
        ]);

        return redirect('/don-hang')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    // Xóa đơn hàng (chỉ admin)
    public function delete($id)
    {
        if (Session::get('user_role') != 1) {
            return redirect('/don-hang')->with('error', 'Bạn không có quyền xóa đơn hàng này!');
        }

        $orderExists = DB::table('orders')->where('order_id', $id)->exists();
        if (!$orderExists) {
            return redirect('/don-hang')->with('error', 'Đơn hàng không tồn tại!');
        }

        DB::table('order_detail')->where('order_id', $id)->delete();
        DB::table('orders')->where('order_id', $id)->delete();

        return redirect('/don-hang')->with('success', 'Đã xóa đơn hàng!');
    }

    // Hủy đơn hàng (user)
    public function cancel($id)
    {
        $userId = Session::get('user_id');
        $role   = Session::get('user_role');

        $order = DB::table('orders')->where('order_id', $id)->first();
        if (!$order) {
            return redirect('/don-hang')->with('error', 'Đơn hàng không tồn tại!');
        }

        // Chỉ user bình thường mới hủy được và trạng thái chưa giao hoặc chưa hủy
        if($role == 0 && $order->order_customer == $userId && in_array($order->order_status, [0,1,2])) {
            DB::table('orders')->where('order_id', $id)->update([
                'order_status' => 4 // 4 = Đã hủy
            ]);

            return redirect('/don-hang')->with('success', 'Bạn đã hủy đơn hàng thành công!');
        }

        return redirect('/don-hang')->with('error', 'Bạn không thể hủy đơn hàng này!');
    }
}
