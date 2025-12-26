@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-cogs me-2"></i>Quản lý sản phẩm</h2>
        <div>
            <a href="{{ url('admin/them-san-pham') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Thêm sản phẩm
            </a>
            <a href="{{ url('admin/quan-ly-danh-muc') }}" class="btn btn-info ms-2">
                <i class="fas fa-list me-2"></i>Quản lý danh mục
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
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>
                                <img src="{{ asset($product->product_img) }}" width="60" height="60" class="rounded" alt="{{ $product->product_name }}">
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td class="fw-bold text-danger">{{ number_format($product->product_price, 0) }}₫</td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <a href="{{ url('admin/thong-tin-san-pham/'.$product->product_id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="{{ url('admin/xoa-san-pham/'.$product->product_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-box-open fa-2x text-muted mb-2"></i>
                                <p class="text-muted mb-0">Không có sản phẩm nào</p>
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
