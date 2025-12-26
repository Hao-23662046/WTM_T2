<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container {
            width: 400px;
            margin: 100px auto;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #c99200;
        }

        .btn-login {
            background: #fff;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #00aaff, #00e5ff);
            transform: scale(1.05);
            color: white;
        }

        .alert {
            margin-bottom: 15px;
        }

        /* Thêm CSS cho liên kết đăng ký */
        .login-container a {
            color: white;
            text-decoration: none;
        }
        .login-container a:hover {
            color: #ffd700;
            text-decoration: underline;
        }
    </style>
</head>

@include('admin.template.header')

<body>
    <div class="login-container">
        <h3>ĐĂNG NHẬP</h3>

        <!-- Hiển thị thông báo lỗi hoặc thành công -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf

            <!-- Tên đăng nhập -->
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mật khẩu -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-login w-100">Đăng nhập</button>
        </form>

        <!-- Thêm liên kết đến trang đăng ký nếu chưa có tài khoản -->
        <div class="mt-3 text-center">
            <a href="{{ url('/admin/dang-ky') }}" class="text-decoration-none">Chưa có tài khoản? Đăng ký ngay</a>
        </div>
    </div>
</body>

@include('admin.template.footer')
</html>
