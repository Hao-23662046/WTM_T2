@include('admin/template/header')

<body style="background-color:#f8f9fa;">

<!-- ================= HERO SLIDER ================= -->
<section class="py-5">
  <div id="heroCarousel"
       class="carousel slide hero-carousel"
       data-bs-ride="carousel"
       data-bs-interval="3500"
       data-bs-pause="false">

    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="{{ asset('img/1.jpg') }}" class="d-block w-100 hero-img" alt="Slide 1">
        <div class="carousel-caption hero-caption">
          <h1 class="display-4 fw-bold">H Store – Điện thoại chính hãng</h1>
          <p class="lead">iPhone • Samsung • Xiaomi <br> Giá tốt – Bảo hành 12 tháng</p>
          <a href="/san-pham" class="btn btn-light btn-lg mt-3">Khám phá ngay</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('img/2.jpg') }}" class="d-block w-100 hero-img" alt="Slide 2">
        <div class="carousel-caption hero-caption">
          <h1 class="display-4 fw-bold">Ưu đãi hấp dẫn mỗi ngày</h1>
          <p class="lead">Giảm giá lên đến <span class="fw-bold text-warning">30%</span> <br> Nhiều quà tặng & khuyến mãi</p>
          <a href="/san-pham" class="btn btn-warning btn-lg mt-3">Xem ưu đãi</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('img/3.jpg') }}" class="d-block w-100 hero-img" alt="Slide 3">
        <div class="carousel-caption hero-caption">
          <h1 class="display-4 fw-bold">Mua sắm dễ dàng – Giao hàng nhanh</h1>
          <p class="lead">Thanh toán linh hoạt <br> Giao hàng toàn quốc</p>
          <a href="/gio-hang" class="btn btn-success btn-lg mt-3">Đi đến giỏ hàng</a>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

<!-- ================= SẢN PHẨM NỔI BẬT ================= -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Sản phẩm nổi bật</h2>
    <div class="row g-4 justify-content-center">
      @forelse($products->take(3) as $product)
      <div class="col-lg-4 col-md-6">
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
        <h4 class="text-muted">Không có sản phẩm nào</h4>
      </div>
      @endforelse
    </div>
    <div class="text-center mt-4">
      <a href="/san-pham" class="btn btn-primary">Xem tất cả sản phẩm</a>
    </div>
  </div>
</section>

<!-- ================= CSS ================= -->
<style>
.hero-carousel,
.hero-carousel .carousel-inner,
.hero-carousel .carousel-item { height: 400px; background: #000; }
.hero-carousel .carousel-item { transition: transform 0.9s ease-in-out; backface-visibility: hidden; }
.hero-img { height: 400px; width: 100%; object-fit: cover; transition: transform 1s ease; }
.carousel-item-next .hero-img,
.carousel-item-prev .hero-img { transform: scale(1.05); }
.hero-caption { color: #fff; animation: fadeUp 0.8s ease; }
@keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

.product-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }

.card-img-wrapper { height: 200px; overflow: hidden; position: relative; }
.card-img-top { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; }

/* Overlay */
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5); /* nền mờ */
  opacity: 0;
  transition: opacity 0.3s ease;
}
.product-card:hover .card-img-top { transform: scale(1.05); }
.product-card:hover .overlay { opacity: 1; }
.overlay .btn { margin: 5px; }
</style>

@include('admin/template/footer')

</body>
</html>
