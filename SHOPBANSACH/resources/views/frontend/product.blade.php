@extends('frontend.layouts.master')
@section('title', __('Sản phẩm'))

@section('style')
    <link rel="stylesheet" href="{{ asset('frontendcss/css/product.css') }}?v={{ time() }}">
@endsection

@section('content')
<div class="product-page-main">
    <aside class="sidebar-category">
        <div class="sidebar-title">
            <a href="?" style="color:#222; font-weight:bold; text-decoration:none; cursor:pointer;"> <i class="fas fa-list"></i> Tất Cả Danh Mục </a>
        </div>
        <ul class="sidebar-category-list">
            @foreach($categories as $category)
                <li class="{{ request('category') == $category->id ? 'active' : '' }}">
                    <a href="?category={{ $category->id }}" style="font-weight:400;">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
        <div class="sidebar-filter-title">
            <i class="fas fa-filter"></i> BỘ LỌC TÌM KIẾM
        </div>
        <form action="" method="GET" class="price-filter">
            <div class="price-filter-row">
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="₫ TỪ">
                <span>-</span>
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="₫ ĐẾN">
            </div>
            <button type="submit" class="btn-apply-price">ÁP DỤNG</button>
        </form>
    </aside>
    <div class="product-page-content">
        @php
            $currentPage = request('page', 1);
            $perPage = 16;
            $totalProducts = $products->count();
            $totalPages = ceil($totalProducts / $perPage);
            $productsToShow = $products->forPage($currentPage, $perPage);
        @endphp
        <div class="product-toolbar" style="display:flex;align-items:center;justify-content: flex-end;gap:18px;margin-bottom:4px;">
            <form method="GET" style="margin:0;display:flex;align-items:center;gap:10px;">
                <span style="font-size:15px;">Sắp xếp theo</span>
                <select name="sort_price" class="btn btn-sort" onchange="this.form.submit()">
                    <option value="">Giá</option>
                    <option value="asc" {{ request('sort_price')=='asc'?'selected':'' }}>Thấp đến cao</option>
                    <option value="desc" {{ request('sort_price')=='desc'?'selected':'' }}>Cao đến thấp</option>
                </select>
                {{-- Giữ lại các tham số filter khác khi sort --}}
                @foreach(request()->except(['sort_price','page']) as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                @endforeach
            </form>
            <div class="pagination-toolbar" style="background:#f5f5f5;padding:8px 18px;border-radius:8px;display:flex;align-items:center;gap:10px;">
                <span style="color:#ee4d2d;font-weight:500;font-size:18px;">{{ $currentPage }}</span>
                <span style="color:#222;font-size:16px;">/ {{ $totalPages }}</span>
                <a href="?{{ http_build_query(array_merge(request()->except('page'), ['page' => max(1, $currentPage-1)]) ) }}" class="page-btn" style="pointer-events:{{ $currentPage==1?'none':'auto' }};opacity:{{ $currentPage==1?'0.5':'1' }};background:#fff;border:1px solid #eee;padding:6px 12px;border-radius:6px;">
                    <span style="font-size:18px;">&#60;</span>
                </a>
                <a href="?{{ http_build_query(array_merge(request()->except('page'), ['page' => min($totalPages, $currentPage+1)]) ) }}" class="page-btn" style="pointer-events:{{ $currentPage==$totalPages?'none':'auto' }};opacity:{{ $currentPage==$totalPages?'0.5':'1' }};background:#fff;border:1px solid #eee;padding:6px 12px;border-radius:6px;">
                    <span style="font-size:18px;">&#62;</span>
                </a>
            </div>
        </div>
        <div class="product-grid">
            @forelse($productsToShow as $product)
                <a href="{{ route('web.product.detail', ['id' => $product->id]) }}" class="product-card-link">
                    @include('components.product-card', ['product' => $product])
                </a>
            @empty
                <div>Không có sản phẩm nào phù hợp.</div>
            @endforelse
        </div>
        <nav style="margin-top:18px;">
            {{-- Phần phân trang giữ nguyên --}}
            @yield('pagination')
        </nav>
    </div>
</div>
@endsection

@section('js')
<script>
document.querySelector('.price-filter').addEventListener('submit', function(e) {
    let minInput = document.getElementById('min_price');
    let maxInput = document.getElementById('max_price');
    if (minInput.value && parseInt(minInput.value) < 1000) {
        minInput.value = parseInt(minInput.value) * 1000;
    }
    if (maxInput.value && parseInt(maxInput.value) < 1000) {
        maxInput.value = parseInt(maxInput.value) * 1000;
    }
});
</script>
@endsection