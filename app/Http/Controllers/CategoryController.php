<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    // Phương thức quản lý danh mục
    public function index()
    {
        $categories = CategoryModel::all();  
        return view('category', compact('categories'));
    }

    // Phương thức thêm danh mục
    public function create()
    {
        return view('admin.category_insert_info');
    }

    // Phương thức lưu danh mục
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new CategoryModel();  
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('admin.quan-ly-danh-muc')->with('success', 'Danh mục đã được thêm thành công!');
    }

    // Phương thức sửa danh mục
    public function edit($category_id)
    {
        $category = CategoryModel::where('category_id', $category_id)->firstOrFail();  
        return view('admin.category_insert_info', compact('category'));
    }

    // Phương thức cập nhật danh mục
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Tìm danh mục theo category_id
        $category = CategoryModel::where('category_id', $category_id)->firstOrFail();
        $category->category_name = $request->category_name;
        $category->save();  // Lưu thay đổi

        return redirect()->route('admin.quan-ly-danh-muc')->with('success', 'Danh mục đã được cập nhật!');
    }

    // Phương thức xóa danh mục
    public function destroy($category_id)
    {
        $category = CategoryModel::where('category_id', $category_id)->firstOrFail();
        $category->delete();

        return redirect()->route('admin.quan-ly-danh-muc')->with('success', 'Danh mục đã được xóa!');
    }
}
