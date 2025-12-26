@include('admin/template/header')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white text-center fs-5">
          Thay đổi tài khoản người dùng
        </div>

        <div class="card-body bg-light">
          <form action="{{ url('/admin/xu-ly-cap-nhat-nguoi-dung') }}" method="POST">
            @csrf
            @foreach ($users as $user)
              <input type="hidden" name="id" value="{{ $user->user_id }}">

              <!-- Tên tài khoản -->
              <div class="mb-3">
                <label for="username" class="form-label fw-bold text-dark">Tài khoản</label>
                <input type="text" id="username" name="username"
                       value="{{ $user->user_username }}"
                       class="form-control border-primary"
                       placeholder="Nhập tên tài khoản" required>
              </div>

              <!-- Họ tên -->
              <div class="mb-3">
                <label for="fullname" class="form-label fw-bold text-dark">Họ tên</label>
                <input type="text" id="fullname" name="fullname"
                       value="{{ $user->user_fullname }}"
                       class="form-control border-primary"
                       placeholder="Nhập họ và tên" required>
              </div>

              <!-- Địa chỉ -->
              <div class="mb-3">
                <label for="address" class="form-label fw-bold text-dark">Địa chỉ</label>
                <input type="text" id="address" name="address"
                       value="{{ $user->user_address }}"
                       class="form-control border-primary"
                       placeholder="Nhập địa chỉ" required>
              </div>
            @endforeach

            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
              <a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="btn btn-secondary px-4 ms-2">⬅ Quay lại</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin/template/footer')
