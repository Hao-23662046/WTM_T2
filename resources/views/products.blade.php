@include('admin/template/header')

<body style="background-color:#f8f9fa;">

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
    </ol>
  </div>
</nav>

<!-- Hero Section -->
<section>
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Danh sách sản phẩm</h1>
    <p class="lead">Khám phá các sản phẩm chất lượng của chúng tôi!</p>
  </div>
</section>

<!-- Danh sách sản phẩm -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 justify-content-center"> <!-- Thêm lớp justify-content-center vào đây -->
      @forelse($products as $product)
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0 product-card">
          <div class="card-img-wrapper position-relative">
            <img src="{{ asset($product->product_img) }}" class="card-img-top" alt="{{ $product->product_name }}">

            <!-- Overlay -->
            <div class="overlay d-flex justify-content-center align-items-center">
              <div class="text-center">
                <a href="/chi-tiet-san-pham/{{ $product->product_id }}" class="btn btn-outline-light btn-sm me-2">
                  <i class="fas fa-eye me-1"></i>Xem chi tiết
                </a>
                <a href="/add-cart/{{ $product->product_id }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-cart-plus me-1"></i>Thêm vào giỏ
                </a>
              </div>
            </div>

          </div>
          <div class="card-body text-center mt-3">
            <h6 class="card-title fw-bold">{{ $product->product_name }}</h6>
            <p class="text-danger fw-bold fs-5 mb-0">{{ number_format($product->product_price, 0) }}₫</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center py-5">
        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
        <h4 class="text-muted">Không có sản phẩm nào</h4>
      </div>
      @endforelse
    </div>
  </div>
</section>

<style>
.row {
  display: flex;
  justify-content: center;
}

/* Thẻ card */
.product-card { 
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.3s ease, 
  box-shadow 0.3s ease;
}

.product-card:hover { 
  transform: translateY(-5px); 
  box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
}

.card-img-wrapper { 
  height: 200px; 
  overflow: hidden; 
  position: relative; 
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-img-top { 
  width: 100%; 
  height: 100%; 
  object-fit: cover; 
  transition: transform 0.3s ease; 
}

/* Overlay */
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.product-card:hover .card-img-top { 
  transform: scale(1.05); 
}

.product-card:hover .overlay { 
  opacity: 1; 
}

.overlay .btn { 
  margin: 5px; 
}
</style>

@include('admin/template/footer')

</body>
</html>
