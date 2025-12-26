@include('admin/template/header')

<body style="background-color:#f8f9fa;">

<!-- ================= HERO ================= -->
<section class="py-5">
  <div class="hero-banner d-flex align-items-center justify-content-center text-center">
    <div>
      <h1 class="display-4 fw-bold text-white">Giới thiệu H Store</h1>
      <p class="lead text-white mt-3">
        Điện thoại chính hãng – Uy tín – Chất lượng
      </p>
    </div>
  </div>
</section>

<!-- ================= NỘI DUNG ================= -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <img src="{{ asset('img/about.jpg') }}" class="img-fluid rounded shadow" alt="H Store">
      </div>

      <div class="col-lg-6">
        <h2 class="fw-bold mb-4">Về H Store</h2>
        <p>
          <strong>H Store</strong> là hệ thống bán lẻ điện thoại chính hãng như
          iPhone, Samsung, Xiaomi với mức giá cạnh tranh.
        </p>
        <p>Chúng tôi cam kết:</p>

        <ul class="list-unstyled">
          <li class="mb-2">
            <i class="fas fa-circle-check text-success me-2"></i>
            Sản phẩm chính hãng 100%
          </li>
          <li class="mb-2">
            <i class="fas fa-circle-check text-success me-2"></i>
            Bảo hành 12 tháng
          </li>
          <li class="mb-2">
            <i class="fas fa-circle-check text-success me-2"></i>
            Giao hàng toàn quốc
          </li>
          <li class="mb-2">
            <i class="fas fa-circle-check text-success me-2"></i>
            Hỗ trợ tận tâm
          </li>
        </ul>

        <a href="/san-pham" class="btn btn-primary mt-3">Xem sản phẩm</a>
      </div>

    </div>
  </div>
</section>

<style>
.hero-banner {
  height: 350px;
  background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
              url('{{ asset("img/1.jpg") }}') center/cover no-repeat;
}
</style>

@include('admin/template/footer')
</body>
</html>
