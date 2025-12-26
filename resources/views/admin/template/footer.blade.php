<footer class="footer mt-5" style="background: linear-gradient(90deg, #4facfe, #00f2fe); color: black; padding: 40px 0; border-top: 2px solid #ffd700;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>Về chúng tôi</h5>
        <p>Cửa hàng điện thoại uy tín hàng đầu — nơi bạn tìm thấy sản phẩm chất lượng với giá tốt nhất.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Liên kết nhanh</h5>
        <p><a href="{{ url('/') }}" class="footer-link">Trang Chủ</a></p>
        <p><a href="{{ url('admin/danh-sach-san-pham') }}" class="footer-link">Sản phẩm</a></p>
        <p><a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="footer-link">Người dùng</a></p>
        <p><a href="{{ url('/admin/login') }}" class="footer-link">Đăng nhập</a></p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Liên hệ</h5>
        <p>Email: <a href="mailto:support@computerstore.com" style="color: #ffd700;">support@computerstore.com</a></p>
        <p>Hotline: <span style="color: #ffd700;">0123 456 789</span></p>
      </div>
    </div>
    <hr style="border-top: 1px solid rgba(255,255,255,0.2);">
    <div class="text-center">&copy; 2025. All rights reserved.</div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
  footer a {
    color: black;
    text-decoration: none;
  }
  
  footer a:hover {
    color: #ffd700; /* Màu vàng khi hover */
    text-decoration: underline;
  }

  footer h5 {
    color: blue;
  }
</style>
