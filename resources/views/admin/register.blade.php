@include('admin.template.header')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border: none; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1), 0 0 25px 5px rgba(79, 172, 254, 0.6);">
                <div class="card-header" style="background: linear-gradient(90deg, #4facfe, #00f2fe); color: white; text-align: center; font-size: 1.25rem;">
                    Đăng ký tài khoản người dùng
                </div>

                <div class="card-body bg-light">
                    <form action="{{ url('/admin/xu-ly-dang-ky') }}" method="POST">
                        @csrf

                        <!-- Tài khoản -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold text-dark">Tài khoản</label>
                            <input type="text" id="username" name="username" 
                                   class="form-control" 
                                   placeholder="Nhập tên đăng nhập" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mật khẩu -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold text-dark">Mật khẩu</label>
                            <input type="password" id="password" name="password" 
                                   class="form-control" 
                                   placeholder="Nhập mật khẩu" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Họ tên -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label fw-bold text-dark">Họ tên</label>
                            <input type="text" id="fullname" name="fullname" 
                                   class="form-control" 
                                   placeholder="Nhập họ và tên" required>
                            @error('fullname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Địa chỉ -->
                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold text-dark">Địa chỉ</label>
                            <input type="text" id="address" name="address" 
                                   class="form-control" 
                                   placeholder="Nhập địa chỉ" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nút -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5">Đăng ký</button>
                            <a href="{{ url('/admin/login') }}" class="btn btn-secondary px-4 ms-2">⬅ Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.template.footer')
