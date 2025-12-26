@include('admin/template/header')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white text-center fs-5">
          Đăng ký tài khoản người dùng
        </div>

        <div class="card-body bg-light">
          <form action="{{ url('/admin/xu-ly-them-nguoi-dung') }}" method="POST">
            @csrf

            <!-- Tài khoản -->
            <div class="mb-3">
              <label for="fname" class="form-label fw-bold text-dark">Tài khoản</label>
              <input type="text" id="fname" name="username" 
                     class="form-control border-primary" 
                     placeholder="Nhập tên đăng nhập" required>
            </div>

            <!-- Mật khẩu -->
            <div class="mb-3">
              <label for="fpass" class="form-label fw-bold text-dark">Mật khẩu</label>
              <input type="password" id="fpass" name="password" 
                     class="form-control border-primary" 
                     placeholder="Nhập mật khẩu" required>
            </div>

            <!-- Họ tên -->
            <div class="mb-3">
              <label for="lname" class="form-label fw-bold text-dark">Họ tên</label>
              <input type="text" id="lname" name="fullname" 
                     class="form-control border-primary" 
                     placeholder="Nhập họ và tên" required>
            </div>

            <!-- Địa chỉ -->
            <div class="mb-3">
              <label for="laddress" class="form-label fw-bold text-dark">Địa chỉ</label>
              <input type="text" id="laddress" name="address" 
                     class="form-control border-primary" 
                     placeholder="Nhập địa chỉ" required>
            </div>

            <!-- Nút -->
            <div class="text-center">
              <button type="submit" class="btn btn-success px-5">Thêm</button>
              <a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="btn btn-secondary px-4 ms-2">⬅ Quay lại</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin/template/footer')
