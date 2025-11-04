@extends('frontend.layouts.master')
@section('title', __('Cart'))
@section('style')
<style>
.cart-container-custom {
    max-width: 1200px;
    margin: 32px auto 0 auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 16px 0 rgba(0,0,0,0.06);
    padding: 0 0 32px 0;
}
.table-responsive {
    overflow-x: auto;
}
/* Shopee-like cart table layout */
.cart-table {
    border: none;
    border-radius: 8px;
    background: #fff;
    min-width: 900px;
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
}
.cart-table th, .cart-table td {
    vertical-align: middle;
    text-align: center;
    font-size: 1.08rem;
    padding: 16px 6px;
    border: none;
    background: #fff;
    border-bottom: 1px solid #f6f6f6;
}
.cart-table th {
    background: #fafafa;
    color: #888;
    font-weight: 600;
    border-radius: 8px 8px 0 0;
    letter-spacing: 0.02em;
}
.cart-table th:first-child, .cart-table td:first-child {
    width: 36px;
    min-width: 32px;
    max-width: 40px;
    text-align: center;
    padding-left: 0;
    padding-right: 0;
}
.cart-table th:nth-child(2), .cart-table td:nth-child(2) {
    width: 90px;
    min-width: 80px;
    max-width: 100px;
    text-align: center;
}
.cart-table th:nth-child(3), .cart-table td:nth-child(3) {
    max-width: 220px;
    width: 180px;
    min-width: 120px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-all;
    line-height: 1.3;
    text-align: left;
    padding-left: 8px;
}
.cart-table th:nth-child(4), .cart-table td:nth-child(4) {
    width: 110px;
    min-width: 90px;
    max-width: 120px;
    text-align: center;
    color: #ee4d2d;
    font-weight: 600;
    padding-right: 8px;
}
.cart-table th:nth-child(5), .cart-table td:nth-child(5) {
    width: 90px;
    min-width: 70px;
    max-width: 110px;
    text-align: left;
}
.cart-table th:nth-child(6), .cart-table td:nth-child(6) {
    width: 120px;
    min-width: 100px;
    max-width: 140px;
    text-align: center;
    color: #ee4d2d;
    font-weight: 700;
    padding-right: 8px;
}
.cart-table th:nth-child(7), .cart-table td:nth-child(7) {
    width: 90px;
    min-width: 80px;
    max-width: 110px;
    text-align: center;
    white-space: nowrap;
}
.cart-img {
    width: 72px;
    height: 72px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #f2f2f2;
    background: #fafafa;
}
.cart-qty-group {
    display: flex;
    align-items: center;
    border: 1.5px solid #e0e0e0;
    border-radius: 6px;
    overflow: hidden;
    width: 110px;
    height: 38px;
    background: #fafafa;
}
.cart-qty-btn {
    width: 36px;
    height: 100%;
    border: none;
    background: none;
    font-size: 1.3rem;
    color: #333;
    cursor: pointer;
    transition: background 0.15s;
    user-select: none;
    display: flex;
    align-items: center;
    justify-content: center;
}
.cart-qty-btn:disabled {
    color: #ccc;
    cursor: not-allowed;
}
.cart-qty-btn:not(:disabled):hover {
    background: #f5f5f5;
}
.cart-qty-value {
    width: 38px;
    text-align: center;
    font-size: 1.08rem;
    font-weight: 500;
    border: none;
    background: transparent;
    outline: none;
    pointer-events: none;
}
.cart-total-price, .cart-price { font-size: 1.2rem; font-weight: 600; }
.cart-footer { position: sticky; bottom: 0; background: #fff; box-shadow: 0 -2px 8px #eee; padding: 20px 32px; z-index: 10; font-size: 1.15rem; border-radius: 0 0 10px 10px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; margin-top: 24px; }
.cart-total-label { font-size: 1.15rem; font-weight: 600; color: #222; }
.cart-total-value { font-size: 1.7rem; color: #ee4d2d; font-weight: bold; margin-left: 10px; }
.cart-pay-btn { background: linear-gradient(90deg, #ff7337 0%, #ee4d2d 100%); color: #fff; font-size: 1.15rem; font-weight: 700; border: none; border-radius: 6px; padding: 12px 38px; transition: 0.2s; box-shadow: 0 2px 8px 0 rgba(238,77,45,0.08); }
.cart-pay-btn:disabled { background: #ccc; color: #fff; box-shadow: none; }
.btn-link.text-danger.delete-btn {
    font-size: 1.05rem;
    padding: 0 10px;
    color: #ee4d2d !important;
    font-weight: 500;
    background: none;
    border: none;
    transition: color 0.15s;
}
.btn-link.text-danger.delete-btn:hover {
    color: #d0021b !important;
    text-decoration: underline;
}
#deleteSelectedBtn {
    border-radius: 6px;
    border: 1.5px solid #ee4d2d;
    color: #ee4d2d;
    background: #fff;
    font-weight: 500;
    padding: 8px 18px;
    transition: background 0.15s, color 0.15s;
}
#deleteSelectedBtn:disabled {
    color: #ccc;
    border-color: #ccc;
    background: #f7f7f7;
}
#deleteSelectedBtn:hover:not(:disabled) {
    background: #fff0eb;
    color: #d0021b;
    border-color: #d0021b;
}
.cart-title-center {
    text-align: center;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 24px;
}
@media (max-width: 1200px) {
  .cart-container-custom { padding-left: 4px; padding-right: 4px; }
  .cart-table { min-width: 700px; }
  .cart-footer { padding: 12px 8px; }
}
@media (max-width: 768px) {
  .cart-table th, .cart-table td { font-size: 0.98rem; padding: 8px 2px; }
  .cart-img { width: 48px; height: 48px; }
  .cart-qty-group { width: 80px; height: 28px; }
  .cart-qty-btn { width: 24px; font-size: 1.1rem; }
  .cart-qty-value { width: 28px; font-size: 0.95rem; }
  .cart-footer { font-size: 0.98rem; padding: 8px 2px; }
  .cart-total-label { font-size: 1rem; }
  .cart-total-value { font-size: 1.1rem; }
  .cart-pay-btn { font-size: 1rem; padding: 8px 18px; }
  .cart-table { min-width: 500px; }
}
</style>
@endsection
@section('content')
<div class="container py-4 cart-container-custom">
    <h2 class="cart-title-center">{{ __('Cart') }}</h2>
    @if($cartItems && count($cartItems) > 0)
    <form id="cartForm">
    <div class="table-responsive">
        <table class="table cart-table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Product') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Thành tiền') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr data-id="{{ $item->id }}" data-price="{{ $item->cost }}">
                    <td><input type="checkbox" class="selectItem" value="{{ $item->id }}"></td>
                    <td><img src="{{ asset($item->product->avatar) }}" class="cart-img" alt=""></td>
                    <td class="text-start">
                        <div class="fw-bold" title="{{ $item->product->name }}">
                            {{ \Illuminate\Support\Str::limit($item->product->name, 40) }}
                        </div>
                    </td>
                    <td class="cart-price">{{ number_format($item->cost, 0, ',', '.') }} đ</td>
                    <td>
                        <input type="number" class="form-control cart-qty-input" min="1" max="{{ $item->max_quantity }}" value="{{ $item->quantity }}" data-id="{{ $item->id }}" style="width:80px;">
                    </td>
                    <td class="cart-total-price">{{ number_format($item->cost * $item->quantity, 0, ',', '.') }} đ</td>
                    <td>
                        <button class="btn btn-link text-danger delete-btn p-0" data-id="{{ $item->id }}">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </form>
    <div class="cart-footer d-flex flex-wrap align-items-center justify-content-between mt-4">
        <div>
            <input type="checkbox" id="selectAllFooter"> <span class="ms-2">{{ __('Select All') }}</span>
            <button id="deleteSelectedBtn" class="btn btn-outline-danger ms-3" disabled><i class="bi bi-trash"></i> {{ __('Delete Selected') }}</button>
        </div>
        <div>
            <span class="cart-total-label">{{ __('Total') }}:</span>
            <span class="cart-total-value" id="cartTotalValue">0 đ</span>
            <button id="bulkPaymentBtn" class="cart-pay-btn ms-4" disabled>{{ __('Pay') }}</button>
        </div>
    </div>
    @else
    <span>{{ __('The cart is empty') }}</span>
    @endif
</div>
@endsection
@section('js')
<script>
function updateCartTotal() {
    let total = 0;
    $(".selectItem:checked").each(function() {
        let row = $(this).closest("tr");
        let price = parseInt(row.data('price'));
        // Lấy số lượng từ input number mới
        let qty = parseInt(row.find('.cart-qty-input').val());
        if (isNaN(price)) price = 0;
        if (isNaN(qty) || qty < 1) qty = 1;
        total += price * qty;
    });
    $("#cartTotalValue").text((total > 0 ? total.toLocaleString('vi-VN') : '0') + ' đ');
    $("#bulkPaymentBtn").prop('disabled', total === 0);
}
$(document).ready(function() {
    // Checkbox chọn tất cả
    $("#selectAll, #selectAllFooter").on("change", function() {
        let checked = $(this).is(":checked");
        $(".selectItem").prop("checked", checked);
        $("#selectAll, #selectAllFooter").prop("checked", checked);
        updateCartTotal();
        $("#deleteSelectedBtn").prop("disabled", $(".selectItem:checked").length === 0);
    });
    // Checkbox từng dòng
    $(document).on("change", ".selectItem", function() {
        let all = $(".selectItem").length;
        let checked = $(".selectItem:checked").length;
        $("#selectAll, #selectAllFooter").prop("checked", all === checked && checked > 0);
        updateCartTotal();
        $("#deleteSelectedBtn").prop("disabled", checked === 0);
    });
    // Nút xóa từng dòng
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.post("{{ route('api.cart.delete') }}", { ids: [id], _token: "{{ csrf_token() }}" }, function(res) {
            location.reload();
        });
    });
    // Xóa nhiều dòng
    $("#deleteSelectedBtn").on('click', function() {
        let ids = $(".selectItem:checked").map(function(){ return $(this).val(); }).get();
        if(ids.length === 0) return;
        $.post("{{ route('api.cart.delete') }}", { ids: ids, _token: "{{ csrf_token() }}" }, function(res) {
            location.reload();
        });
    });
    // Cập nhật số lượng AJAX (custom control)
    $(document).on('change', '.cart-qty-input', function() {
        let input = $(this);
        let row = input.closest('tr');
        let price = parseInt(row.data('price'));
        let qty = parseInt(input.val());
        let max = parseInt(input.attr('max'));
        if(isNaN(qty) || qty < 1) qty = 1;
        if(qty > max) qty = max;
        input.val(qty);
        let total = price * qty;
        row.find('.cart-total-price').text(total.toLocaleString('vi-VN') + ' đ');
        // Gửi AJAX cập nhật
        $.ajax({
            url: "{{ route('api.cart.update') }}",
            type: "POST",
            data: { id: row.data('id'), quantity: qty, _token: "{{ csrf_token() }}" },
        });
        updateCartTotal();
    });
    // Tính tổng tiền ban đầu
    updateCartTotal();
    // Thanh toán
    $("#bulkPaymentBtn").on('click', function() {
        let ids = $(".selectItem:checked").map(function(){ return $(this).val(); }).get();
        if(ids.length === 0) return;
        // Chuyển hướng sang trang xác nhận đơn hàng
        window.location.href = "{{ url('order-confirm') }}?ids=" + ids.join(',');
    });
});
</script>
@endsection
