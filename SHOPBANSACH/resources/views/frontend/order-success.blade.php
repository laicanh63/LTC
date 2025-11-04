@extends('frontend.layouts.master')
@section('title', 'Đặt hàng thành công')
@section('content')
<div class="container" style="max-width:700px;margin:40px auto;">
    <div class="alert alert-success text-center" style="font-size:1.2rem;">Đặt hàng thành công!</div>
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Thông tin đơn hàng</div>
        <div class="card-body">
            <div class="mb-2"><strong>Họ tên:</strong> {{ $order->user ? trim($order->user->first_name . ' ' . $order->user->last_name) : '' }}</div>
            <div class="mb-2"><strong>Địa chỉ:</strong> {{ $order->address ?? ($order->user->address ?? '') }}</div>
            <div class="mb-2"><strong>Số điện thoại:</strong> {{ $order->phone ?? ($order->user->phone ?? '') }}</div>
            <div class="mb-2"><strong>Phương thức thanh toán:</strong> {{ $order->payment_method == 'vnpay' ? 'VNPay' : 'Thanh toán khi nhận hàng (COD)' }}</div>
            <div class="mb-2"><strong>Thời gian đặt:</strong> {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : '' }}</div>
            <h5 class="mt-3">Sản phẩm</h5>
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
                    @foreach($order->details as $item)
                        <tr>
                            <td><img src="{{ asset($item->product->avatar ?? '') }}" style="width:60px;height:60px;object-fit:cover;"></td>
                            <td>{{ $item->product->name ?? '' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->cost, 0, ',', '.') }} đ</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end align-items-center" style="gap: 18px;">
                <div>
                    <strong>Tổng tiền: </strong>
                    <span style="font-size:1.15rem;color:#ee4d2d;">{{ number_format($order->total, 0, ',', '.') }} đ</span>
                </div>
                <a href="{{ url('/') }}" class="btn btn-success ms-3">Tiếp tục mua hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection
