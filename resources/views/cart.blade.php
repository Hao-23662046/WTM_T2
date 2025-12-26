@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
    </ol>
  </div>
</nav>

<div class="container my-5">
    {{-- ALERT THÔNG BÁO --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Giỏ hàng của bạn</h4>
                </div>
                <div class="card-body">
                    @php
                        $cart = session('cart.products', []);
                        $total = 0;
                    @endphp

                    @if (count($cart) == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Giỏ hàng trống</h5>
                            <p class="text-muted">Hãy thêm sản phẩm vào giỏ hàng của bạn.</p>
                            <a href="/san-pham" class="btn btn-primary">Mua sắm ngay</a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        @php
                                            $subtotal = $item['item'] * $item['price'];
                                            $total += $subtotal;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($item['img']) }}" width="60" height="60" class="rounded me-3" alt="{{ $item['name'] }}">
                                                    <div>
                                                        <h6 class="mb-0">{{ $item['name'] }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">{{ number_format($item['price'], 0) }}₫</td>
                                            <td>
                                                <div class="input-group input-group-sm" style="width: 120px;">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity('{{ $item['id'] }}', -1)">-</button>
                                                    <input type="text" class="form-control text-center" value="{{ $item['item'] }}" readonly>
                                                    <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity('{{ $item['id'] }}', 1)">+</button>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-primary">{{ number_format($subtotal, 0) }}₫</td>
                                            <td>
                                                <a href="{{ url('/cart/delete/'.$item['id']) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ url('/cart/clear') }}" class="btn btn-outline-danger" onclick="return confirm('Xóa toàn bộ giỏ hàng?')">
                                <i class="fas fa-trash me-2"></i>Xóa tất cả
                            </a>
                            <h5 class="mb-0">Tổng: <span class="text-primary fw-bold">{{ number_format($total, 0) }}₫</span></h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Thanh toán</h5>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-success w-100 mb-3" data-bs-toggle="modal" data-bs-target="#orderModal">
                        <i class="fas fa-check me-2"></i>Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Đặt hàng -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="orderModalLabel"><i class="fas fa-shopping-bag me-2"></i>Xác nhận đặt hàng</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/order') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="fullname" class="form-label fw-bold"><i class="fas fa-user me-2"></i>Họ tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label fw-bold"><i class="fas fa-phone me-2"></i>Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Địa chỉ</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="order_note" class="form-label fw-bold"><i class="fas fa-sticky-note me-2"></i>Ghi chú</label>
            <textarea class="form-control" id="order_note" name="order_note" rows="2" placeholder="Ghi chú giao hàng..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Hủy</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane me-2"></i>Xác nhận đặt hàng</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function changeQuantity(id, delta) {
    if (delta > 0) {
        window.location.href = '/cart/increase/' + id;
    } else {
        window.location.href = '/cart/decrease/' + id;
    }
}
</script>

@include('admin/template/footer')

</body>
