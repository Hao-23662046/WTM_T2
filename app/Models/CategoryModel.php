<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    // Chỉ định tên bảng là 'category' thay vì 'category_models'
    protected $table = 'category';  // Đảm bảo tên bảng đúng

    // Chỉ định khóa chính là 'category_id'
    protected $primaryKey = 'category_id';

    // Nếu không cần sử dụng created_at và updated_at, có thể tắt chúng
    public $timestamps = true;
}
