{{-- Component hiển thị 1 sản phẩm chuẩn layout, giống y hệt product.blade.php --}}
<div class="product-card">
    <img src="{{ asset($product->avatar) }}" alt="{{ $product->name }}">
    <div class="product-title">{{ $product->name }}</div>
    <div class="product-price-group" style="display:flex;flex-direction:column;align-items:flex-start;gap:2px;width:100%;">
        <div style="display:flex;align-items:center;gap:6px;width:100%;">
            <span class="product-price-new">{{ number_format(isset($product->discount_price) ? $product->discount_price : $product->price, 0, ',', '.') }} đ</span>
            @if(isset($product->discount_percent) && $product->discount_percent > 0)
                <span class="product-discount">-{{ $product->discount_percent }}%</span>
            @endif
        </div>
        @if(isset($product->old_price) && $product->old_price > (isset($product->discount_price) ? $product->discount_price : $product->price))
            <span class="product-price-old">{{ number_format($product->old_price, 0, ',', '.') }} đ</span>
        @elseif(isset($product->price) && isset($product->discount_price) && $product->price > $product->discount_price)
            <span class="product-price-old">{{ number_format($product->price, 0, ',', '.') }} đ</span>
        @endif
    </div>
    <div class="product-meta">Đã bán {{ $product->sold ?? 0 }}</div>
</div>
<style>
.product-title {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 2.6em;
    max-height: 2.7em;
    font-size: 1.08rem;

    margin: 8px 0 4px 0;
    line-height: 1.3;
}
.product-price-new {
    color: #ee4d2d;
    font-size: 1.15rem;
    font-weight: 700;
}
.product-price-old {
    color: #cccccc;
    font-size: 0.98rem;
    text-decoration: line-through;
    margin-top: 1px;
    margin-left: 2px;
}
.product-discount {
    color: #ee4d2d;
    background: #ffe6ea;
    border-radius: 6px;
    padding: 2px 8px;
    font-size: 0.98rem;
    font-weight: 600;
    margin-left: 2px;
    display: inline-block;
}
</style>
