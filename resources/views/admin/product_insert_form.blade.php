@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<nav aria-label="breadcrumb" class="bg-light py-3">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
      <li class="breadcrumb-item"><a href="/admin/quan-ly-san-pham">Quản lý sản phẩm</a></li>
      <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
    </ol>
  </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-plus me-2"></i>Thêm sản phẩm mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/xu-ly-them-san-pham') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-bold">Giá sản phẩm</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label fw-bold">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label fw-bold">Danh mục</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="img" class="form-label fw-bold">Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Thêm sản phẩm
                            </button>
                            <a href="{{ url('/admin/quan-ly-san-pham') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/template/footer')

</body>