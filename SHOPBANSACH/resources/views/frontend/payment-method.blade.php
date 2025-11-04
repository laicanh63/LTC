@extends('frontend.layouts.master')
@section('title', 'Chọn phương thức thanh toán')
@section('content')
<div class="container" style="max-width:600px;margin:40px auto;">
    <h2 class="mb-4">Chọn phương thức thanh toán</h2>
    <form action="{{ route('api.payment') }}" method="POST">
        @csrf
        <input type="hidden" name="ids" value="{{ request('ids') }}">
        <div class="form-group mb-3">
            <label><input type="radio" name="payment_method" value="cod" checked> Thanh toán khi nhận hàng (COD)</label>
        </div>
        <div class="form-group mb-3">
            <label><input type="radio" name="payment_method" value="vnpay"> VNPay (ATM, QR, Visa...)</label>
        </div>
        <button type="submit" class="btn btn-primary">Tiếp tục thanh toán</button>
    </form>
</div>
@endsection
