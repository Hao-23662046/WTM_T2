<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function index()
    {
        $message = Session::get('message');
        return view('admin.login', compact('message'));
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        // Tìm user theo tên đăng nhập
        $user = User::where('user_username', $request->username)->first();

        if ($user && $user->user_password === $request->password) { // So sánh mật khẩu plain text
            // Lưu thông tin vào session
            Session::put('user_id', $user->user_id);
            Session::put('user_fullname', $user->user_fullname);
            Session::put('logged_in', true);
            Session::put('user_role', $user->user_role); 


            // Dùng push để lưu roles
            Session::push('roles', $user->user_role ?? 'user');

            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
    }

    // Đăng xuất
    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_fullname');
        Session::forget('logged_in');
        Session::forget('roles');
        Session::forget('user_role');

        return redirect('/admin/login')->with('success', 'Đăng xuất thành công!');
    }

    // Hiển thị form đăng ký
    public function registerForm()
    {
        return view('admin.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,user_username',
            'password' => 'required|min:4',
            'fullname' => 'required',
            'address'  => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 4 ký tự',
            'fullname.required' => 'Vui lòng nhập họ tên',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);

        // Tạo user mới (mật khẩu không mã hóa)
        $user = new User;
        $user->user_username = $request->username;
        $user->user_password = $request->password;
        $user->user_fullname = $request->fullname;
        $user->user_address = $request->address;

        // Đặt vai trò mặc định là 'user' (0), bạn có thể thay đổi nếu có lựa chọn role
        $user->user_role = 0;  // Mặc định là user

        // Lưu user vào cơ sở dữ liệu
        $user->save();

        return redirect('/admin/login')->with('success', 'Đăng ký thành công!');
    }
}
