<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function get_all() {
        $users = User::all();
        return view('admin/user_list', ['users' => $users]);
    }

    public function insert_form() {
        return view('admin/user_insert_form');
    }

    public function action_insert(Request $request) {
        $data = [
            'user_username' => $request->input('username'),
            'user_password' => $request->input('password'),
            'user_fullname' => $request->input('fullname'),
            'user_address'  => $request->input('address'),
            'user_role'     => $request->input('user_role') ?? 0,
        ];

        User::create($data);

        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Thêm người dùng thành công!');
    }

    public function show($id) {
        $users = User::where('user_id', $id)->get();
        return view('admin/user_info_form', ['users' => $users]);
    }

    public function action_update(Request $request) {
        $id = $request->input('id');

        $data = [
            'user_username' => $request->input('username'),
            'user_fullname' => $request->input('fullname'),
            'user_address'  => $request->input('address'),
        ];

        User::where('user_id', $id)->update($data);
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Cập nhật người dùng thành công!');
    }

    public function del($id) {
        User::where('user_id', $id)->delete();
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Xóa người dùng thành công!');
    }
}
