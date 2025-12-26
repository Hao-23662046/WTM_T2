@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
    </ol>
  </div>
</nav>

<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-box me-2"></i>Đơn hàng của tôi</h4>
        </div>
        <div class="card-body">
            @forelse($orders as $order)
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h5 class="text-primary mb-0">#{{ $order->order_id }}</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Ngày đặt</small>
                                <p class="mb-0 fw-bold">{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col-md-2">
                                <small class="text-muted">Trạng thái</small>
                                <p class="mb-0">
                                    @if($order->order_status == 0)
                                        <span class="badge bg-warning">Mới đặt</span>
                                    @elseif($order->order_status == 1)
                                        <span class="badge bg-info">Đang xử lý</span>
                                    @elseif($order->order_status == 2)
                                        <span class="badge bg-primary">Đang giao</span>
                                    @elseif($order->order_status == 3)
                                        <span class="badge bg-success">Đã giao</span>
                                    @else
                                        <span class="badge bg-danger">Đã huỷ</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-3">
                                <a href="/don-hang/{{ $order->order_id }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>Xem chi tiết
                                </a>
                            </div>
                            @if(session('user_role') == 1)
                                <div class="col-md-2">
                                    <a href="/don-hang/xoa/{{ $order->order_id }}" 
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');"
                                       class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>Xóa
                                    </a>
                                </div>
                            {{-- User có thể hủy đơn hàng nếu chưa giao hoặc chưa hủy --}}
                            @elseif(session('user_role') == 0 && in_array($order->order_status, [0,1,2]))
                                <div class="col-md-2">
                                    <form action="{{ url('/don-hang/huy/'.$order->order_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                                            <i class="fas fa-times me-1"></i>Hủy
                                        </button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có đơn hàng nào</h5>
                    <p class="text-muted">Hãy đặt hàng để xem lịch sử ở đây.</p>
                    <a href="/san-pham" class="btn btn-primary">Mua sắm ngay</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

@include('admin/template/footer')

</body>
