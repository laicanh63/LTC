@extends('frontend.layouts.master')
@section('title', 'Xác nhận đơn hàng')
@section('content')
<div class="container" style="max-width:700px;margin:40px auto;">
    <h2 class="mb-4">Xác nhận đơn hàng</h2>
    <form action="{{ route('api.payment') }}" method="POST" id="orderConfirmForm">
        <input type="hidden" name="ids" value="{{ request('ids') }}">
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="name" value="{{ trim((auth()->user()->first_name ?? ''). ' ' .(auth()->user()->last_name ?? '')  ) }}" required>
        </div>
        <div class="mb-3">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="{{ auth()->user()->address ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Phương thức thanh toán</label><br>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" value="cod" id="pm_cod" checked>
                <label class="form-check-label" for="pm_cod">Thanh toán khi nhận hàng (COD)</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" value="vnpay" id="pm_vnpay">
                <label class="form-check-label" for="pm_vnpay">VNPay (ATM, QR, Visa...)</label>
            </div>
        </div>
        <h5 class="mt-4 mb-2">Sản phẩm</h5>
        <div class="table-responsive mb-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $item)
                    <tr data-id="{{ $item->id }}" data-product-id="{{ $item->product_id }}" data-quantity="{{ $item->quantity }}" data-cost="{{ $item->price }}">
                        <td><img src="{{ asset($item->avatar) }}" style="width:60px;height:60px;object-fit:cover;"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end align-items-center mb-3" style="gap: 18px;">
            <div>
                <strong>Tổng tiền: </strong>
                <span style="font-size:1.15rem;color:#ee4d2d;">
                    {{ number_format($products->sum('price'), 0, ',', '.') }} đ
                </span>
            </div>
            <button type="submit" class="btn btn-primary ms-3">Xác nhận thanh toán</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    $('#orderConfirmForm').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        // Lấy thông tin sản phẩm từ bảng
        var items = [];
        $("table tbody tr").each(function(){
            var row = $(this);
            items.push({
                id: row.data('id'),
                product_id: row.data('product-id'),
                quantity: row.data('quantity'),
                cost: row.data('cost')
            });
        });
        // Lấy thông tin thanh toán
        var paymentInfo = {
            name: form.find('[name="name"]').val(),
            address: form.find('[name="address"]').val(),
            phone: form.find('[name="phone"]').val(),
            payment_method: form.find('[name="payment_method"]:checked').val()
        };
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                items: items,
                paymentInfo: paymentInfo,
                method: paymentInfo.payment_method
            }),
            success: function(res) {
                if(res.success && res.redirect) {
                    window.location.href = res.redirect;
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON?.message || 'Có lỗi xảy ra, vui lòng thử lại!');
            }
        });
    });
});
</script>
@endsection
