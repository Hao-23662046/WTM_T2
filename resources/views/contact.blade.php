@include('admin/template/header')

<body style="background-color:#f8f9fa;">

<!-- ================= HERO ================= -->
<section class="py-5">
  <div class="hero-banner d-flex align-items-center justify-content-center text-center">
    <div class="hero-content">
      <h1 class="display-4 fw-bold text-white">Liên hệ với chúng tôi</h1>
      <p class="lead text-white mt-3">
        H Store – Luôn sẵn sàng hỗ trợ bạn
      </p>
    </div>
  </div>
</section>

<!-- ================= LIÊN HỆ ================= -->
<section class="py-5">
  <div class="container">
    <div class="row g-5">

      <!-- Thông tin -->
      <div class="col-lg-5">
        <h3 class="fw-bold mb-4">Thông tin liên hệ</h3>

        <p>
          <i class="fas fa-location-dot text-primary me-2"></i>
          123 Nguyễn Văn A, TP.HCM
        </p>
        <p>
          <i class="fas fa-phone text-primary me-2"></i>
          0901 234 567
        </p>
        <p>
          <i class="fas fa-envelope text-primary me-2"></i>
          hstore@gmail.com
        </p>

        <div class="mt-4">
          <iframe
            src="https://www.google.com/maps?q=Ho%20Chi%20Minh&output=embed"
            width="100%"
            height="250"
            style="border:0;"
            loading="lazy">
          </iframe>
        </div>
      </div>

      <!-- Form -->
      <div class="col-lg-7">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Gửi tin nhắn cho chúng tôi</h4>

            <form method="post">
              @csrf

              <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên">
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Nhập email">
              </div>

              <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea class="form-control" rows="4" placeholder="Nhập nội dung"></textarea>
              </div>

              <button class="btn btn-primary">
                <i class="fas fa-paper-plane me-1"></i> Gửi liên hệ
              </button>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
.hero-banner {
  height: 350px;
  background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
              url('{{ asset("img/2.jpg") }}') center/cover no-repeat;
}
</style>

@include('admin/template/footer')
</body>
</html>
