@include('admin/template/header')

<div class="container my-4">
    <h4>📦 Chi tiết đơn hàng #{{ $order->order_id }}</h4>

    <p>Ngày đặt: {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</p>
    <p><strong>Khách hàng:</strong> {{ $customer->user_fullname }}</p>
    <p><strong>Địa chỉ:</strong> {{ $customer->user_address }}</p>
    <p><strong>Ghi chú:</strong> {{ $order->order_note }}</p>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($details as $d)
                @php 
                    $subtotal = $d->order_product_quantity * $d->product_price; 
                    $total += $subtotal; 
                @endphp
                <tr>
                    <td>{{ $d->product_name }}</td>
                    <td>{{ number_format($d->product_price,0) }}₫</td>
                    <td>{{ $d->order_product_quantity }}</td>
                    <td>{{ number_format($subtotal,0) }}₫</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                <td class="fw-bold text-danger">{{ number_format($total,0) }}₫</td>
            </tr>
        </tbody>
    </table>

    {{-- Admin có thể chỉnh trạng thái và ghi chú --}}
    @if(session('user_role') == 1)
        <h5 class="mt-4">✏️ Chỉnh sửa đơn hàng</h5>
        <form action="{{ url('/don-hang/sua/'.$order->order_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Trạng thái</label>
                <select name="order_status" class="form-select">
                    <option value="0" {{ $order->order_status==0?'selected':'' }}>Mới đặt</option>
                    <option value="1" {{ $order->order_status==1?'selected':'' }}>Đang xử lý</option>
                    <option value="2" {{ $order->order_status==2?'selected':'' }}>Đang giao</option>
                    <option value="3" {{ $order->order_status==3?'selected':'' }}>Đã giao</option>
                    <option value="4" {{ $order->order_status==4?'selected':'' }}>Đã huỷ</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Ghi chú</label>
                <textarea name="order_note" class="form-control">{{ $order->order_note }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>

    {{-- User bình thường có thể hủy đơn hàng nếu chưa giao hoặc chưa huỷ --}}
    @elseif(session('user_role') == 0 && in_array($order->order_status, [0,1,2]))
        <form action="{{ url('/don-hang/huy/'.$order->order_id) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                Hủy đơn hàng
            </button>
        </form>
    @endif
</div>

@include('admin/template/footer')
