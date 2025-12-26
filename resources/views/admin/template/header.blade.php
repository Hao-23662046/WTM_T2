<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Modern Website</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    .fakeimg { height: 200px; background: #aaa; }

    .navbar-nav .nav-link {
      transition: all 0.3s;
      color: black;
    }

    .navbar-nav .nav-link.active {
      color: #ffd6ff !important;
      font-weight: bold;
      text-shadow: 0 0 5px #ffd700;
    }

    .navbar-nav .nav-link:hover {
      color: #ffd700 !important;
      text-shadow: 0 0 5px #ffd700;
    }

    .hero-section {
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      border-radius: 10px;
    }

    .navbar {
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 1000;
      transition: background-color 0.3s ease, opacity 0.3s ease;
      background: linear-gradient(90deg, #4facfe, #00f2fe);
    }

    body {
      padding-top: 65px;
    }
  </style>
</head>

<body>

<!-- ================= HEADER / NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="/">H Store</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Trang chủ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('san-pham') ? 'active' : '' }}" href="/san-pham">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
            href="/about">
            Giới thiệu
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
            href="/contact">
            Liên hệ
          </a>
        </li>
        @if(Session::get('user_role') == 1)
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/danh-sach-nguoi-dung*') ? 'active' : '' }}"
               href="/admin/danh-sach-nguoi-dung">Quản Lý Người dùng</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/quan-ly-san-pham*') ? 'active' : '' }}"
               href="/admin/quan-ly-san-pham">Quản Lý Sản phẩm</a>
          </li>
        @endif

        <li class="nav-item">
          <a class="nav-link position-relative" href="/gio-hang">
            <i class="fas fa-shopping-cart"></i> Giỏ hàng
            @php
              $count = session('cart.products') ? count(session('cart.products')) : 0;
            @endphp
            @if($count > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $count }}
              </span>
            @endif
          </a>
        </li>

        @if(Session::get('logged_in'))
          <li class="nav-item">
            <a class="nav-link {{ Request::is('don-hang*') ? 'active' : '' }}" href="/don-hang">
              <i class="fas fa-receipt"></i> Đơn hàng
            </a>
          </li>

          <li class="nav-item">
            <span class="nav-link">Xin chào, {{ Session::get('user_fullname') }}</span>
          </li>

          <li class="nav-item">
            <a class="nav-link btn btn-outline-danger btn-sm ms-2" href="/admin/logout">
              Đăng xuất
            </a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/login') ? 'active' : '' }}"
               href="/admin/login">Đăng nhập</a>
          </li>
        @endif

      </ul>
    </div>
  </div>
</nav>
