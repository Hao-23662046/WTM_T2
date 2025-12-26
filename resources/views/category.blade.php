@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-list me-2"></i>Quản lý danh mục</h2>
        <div>
            <a href="{{ url('admin/them-danh-muc') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Thêm danh mục
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->category_id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ url('admin/sua-danh-muc/'.$category->category_id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="{{ url('admin/xoa-danh-muc/'.$category->category_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                <i class="fas fa-box-open fa-2x text-muted mb-2"></i>
                                <p class="text-muted mb-0">Không có danh mục nào</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin/template/footer')

</body>
