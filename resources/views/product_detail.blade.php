@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
      <li class="breadcrumb-item"><a href="/san-pham">Sản phẩm</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
    </ol>
  </div>
</nav>

<div class="container my-5">
  <div class="row g-4">
    <!-- Hình ảnh sản phẩm -->
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
          <img src="{{ asset($product->product_img) }}" class="img-fluid rounded" alt="{{ $product->product_name }}" style="width: 100%; height: auto;">
        </div>
      </div>
    </div>
    <!-- Thông tin sản phẩm và mô tả (sắp xếp lại để mô tả dưới ảnh) -->
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body d-flex flex-column">
          <h1 class="card-title mb-3">{{ $product->product_name }}</h1>
          <p class="text-muted mb-3">
            <i class="fas fa-tag me-2"></i>Danh mục: <strong>{{ $product->category_name }}</strong>
          </p>
          <h3 class="text-danger mb-4">
            <i class="fas fa-dollar-sign me-2"></i>{{ number_format($product->product_price, 0) }}₫
          </h3>
          
          <!-- Form thêm vào giỏ -->
          <div class="mb-4">
            <form action="/add-cart/{{ $product->product_id }}" method="POST" class="d-flex align-items-center gap-3 mb-3">
              @csrf
              <div class="input-group" style="max-width: 150px;">
                <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                <input type="number" name="quantity" class="form-control" value="1" min="1" required>
              </div>
              <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                <i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ hàng
              </button>
            </form>
            <a href="/san-pham" class="btn btn-outline-secondary">
              <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
            </a>
          </div>
          
          <!-- Mô tả sản phẩm (dưới ảnh sản phẩm) -->
          <div class="mt-4">
            <h5>Mô tả sản phẩm</h5>
            <p class="text-muted" id="product-description" style="max-height: 100px; overflow: hidden;">
              {{ $product->product_description }}
            </p>
            <!-- Nút xem thêm -->
            <button id="toggleDescription" class="btn btn-link p-0" style="text-decoration: underline; font-size: 14px;">
              Xem thêm
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin/template/footer')

<!-- Thêm JavaScript để toggle mô tả -->
<script>
  document.getElementById('toggleDescription').addEventListener('click', function() {
    var description = document.getElementById('product-description');
    if (description.style.maxHeight === '100px') {
      description.style.maxHeight = 'none';
      this.innerHTML = 'Thu gọn';
    } else {
      description.style.maxHeight = '100px';
      this.innerHTML = 'Xem thêm';
    }
  });
</script>

</body>
