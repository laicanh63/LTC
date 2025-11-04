@extends('frontend.layouts.master')
@section('title', __('Product details'))

@section('style')
    <link rel="stylesheet" href="{{ asset('frontendcss/css/product-detail.css') }}">
    <style>
        .product-info-block {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: #fafbff;
            box-shadow: 0 2px 8px 0 rgba(60,60,100,0.04);
            padding: 20px 18px 18px 18px;
            margin-bottom: 18px;
        }
        .product-info-block .name-product {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .section {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        .container {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        .section-header {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
            border: none !important;
            box-shadow: none !important;
            background: none !important;
        }
        .product-price-old {
            color: #ee4d2d !important;
            text-decoration: line-through;
            font-size: 1.15rem;
            font-weight: 500;
            background: none;
        }
        .product-discount {
            color: #ee4d2d !important;
            background: #ffe6ea;
            border-radius: 6px;
            padding: 2px 10px;
            font-size: 1.08rem;
            font-weight: 600;
            margin-left: 8px;
            display: inline-block;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="news-title">
            <div>
                <h1 style="color:#B4B4B4;">
                    {{ __('PRODUCT CATALOG') }}
                </h1>
            </div>
            <div class="news-title-right">
                <a href="{{ route('web.index') }}">
                    <h2>{{ __('Home') }}</h2>
                </a>
                <p>></p>
                <p style="color:#333;">{{ __('Product catalog') }}</p>
            </div>
        </div>

    </div>
    <div class="section">
        <div class="container">
            <div class="section-header">
                <!-- Đã xóa phần tên sản phẩm ở đây -->
            </div>
            <div class="content">
                <div class="left">
                    <div class="gallery">
                        <img id="mainImage" src="{{asset($product->avatar)}}" class="img-fluid" alt="Main Image">
                        <div class="image-playlist-container mt-3">
                            <div class="image-playlist-wrapper">
                                <div class="image-playlist">
                                    <img src="{{asset($product->avatar)}}" class="thumb-img active" width="70"
                                        onclick="changeImage(this)" data-index="0">
                                    @foreach ($product->images as $index => $image)
                                        <img src="{{asset($image->path)}}" class="thumb-img" width="70"
                                            onclick="changeImage(this)" data-index="{{ $index + 1 }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($product->info != '')
                        <div class="supheading">
                            <div class="polygon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                    <path
                                        d="M12.299 2.75C12.0311 2.2859 11.5359 2 11 2C10.4641 2 9.96891 2.2859 9.70096 2.75L1.90673 16.25C1.63878 16.7141 1.63878 17.2859 1.90673 17.75C2.17468 18.2141 2.66987 18.5 3.20577 18.5H18.7942C19.3301 18.5 19.8253 18.2141 20.0933 17.75C20.3612 17.2859 20.3612 16.7141 20.0933 16.25L12.299 2.75Z"
                                        fill="#295BAE" stroke="#295BAE" stroke-width="3" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-information">{{ __('Product information') }}</p>
                        </div>
                        <div class="content-information">
                            <div>
                                {!! nl2br(e($product->info)) !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="right" style="flex:1;min-width:320px;">
                    <div class="product-info-block">
                        <h2 class="name-product mb-3">{{$product->name}}</h2>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Mã sản phẩm:</span> <span class="fw-bold">{{ $product->product_code ?? ('SP' . str_pad($product->id, 6, '0', STR_PAD_LEFT)) }}</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Tác giả:</span> <span class="fw-bold">{{ $product->author ?? 'Đang cập nhật' }}</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Dịch giả:</span> <span class="fw-bold">{{ $product->translator ?? 'Đang cập nhật' }}</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Nhà xuất bản:</span> <span class="fw-bold">{{ $product->publisher ?? 'Đang cập nhật' }}</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Năm xuất bản:</span> <span class="fw-bold">{{ $product->publish_year ?? 'Đang cập nhật' }}</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Giá:</span>
                            <span class="product-price-new" style="font-size:1.5rem">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            @if(isset($product->old_price) && $product->old_price > $product->price)
                                <span class="product-price-old ms-2">{{ number_format($product->old_price, 0, ',', '.') }}₫</span>
                                <span class="product-discount ms-2">-{{ round(100-($product->price/$product->old_price)*100) }}%</span>
                            @endif
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Số lượng:</span>
                            <input type="number" id="quantity" class="form-control d-inline-block" style="width:90px;max-width:100px;display:inline-block;" value="1" min="1" max="{{ $product->productInventories->quantity ?? 0 }}" onchange="updateTotalPrice()" oninput="updateTotalPrice()">
                            <span class="fw-bold ms-2">/ {{ $product->productInventories->quantity ?? 0 }} sản phẩm có sẵn</span>
                        </div>
                        <div class="product-meta mb-2">
                            <span class="text-muted">Thành tiền:</span>
                            <span id="total_price" class="fw-bold" style="color:#ee4d2d;font-size:1.2rem;">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                        </div>
                        <div class="product-meta mb-2">
                            @if(($product->productInventories->quantity ?? 0) > 0)
                                <button class="btn btn-primary" onclick="addCart()">{{ __('Add to Cart') }}</button>
                            @else
                                <div class="alert alert-danger p-2 m-0 d-inline-block">{{ __('Sold out') }}</div>
                            @endif
                        </div>
                        
                    </div>
                    <!-- supheading-1 -->
                    
                    <!-- supheading-2 -->
                    @if($product->features != '')
                        <div class="supheading" style="margin-top:32px;">
                            <div class="polygon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                    <path
                                        d="M12.299 2.75C12.0311 2.2859 11.5359 2 11 2C10.4641 2 9.96891 2.2859 9.70096 2.75L1.90673 16.25C1.63878 16.7141 1.63878 17.2859 1.90673 17.75C2.17468 18.2141 2.66987 18.5 3.20577 18.5H18.7942C19.3301 18.5 19.8253 18.2141 20.0933 17.75C20.3612 17.2859 20.3612 16.7141 20.0933 16.25L12.299 2.75Z"
                                        fill="#295BAE" stroke="#295BAE" stroke-width="3" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-information">{{ __('Dịch vụ của chúng tôi') }}</p>
                        </div>
                        <div class="content-information">
                            <div>
                                {!! nl2br(e($product->features)) !!}
                            </div>
                        </div>
                    @endif
                    <!-- supheading-3 -->
                    @if($product->applications != '')
                        <div class="supheading">
                            <div class="polygon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                    <path
                                        d="M12.299 2.75C12.0311 2.2859 11.5359 2 11 2C10.4641 2 9.96891 2.2859 9.70096 2.75L1.90673 16.25C1.63878 16.7141 1.63878 17.2859 1.90673 17.75C2.17468 18.2141 2.66987 18.5 3.20577 18.5H18.7942C19.3301 18.5 19.8253 18.2141 20.0933 17.75C20.3612 17.2859 20.3612 16.7141 20.0933 16.25L12.299 2.75Z"
                                        fill="#295BAE" stroke="#295BAE" stroke-width="3" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-information">{{ __('Applications') }}</p>
                        </div>
                        <div class="content-information">
                            <div>
                                {!! nl2br(e($product->applications)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="group-slide product-list">
                <div class="text-slide">
                    <h4 class="in-text-slide"> {{ __('Related products') }}</h4>
                </div>
                <div class="swiper mySwiper1">
                    <div class="swiper-wrapper product-grid" style="gap:18px;">
                        @foreach($relatedProducts->shuffle()->take(4) as $relateProduct)
                            <div class="swiper-slide" style="width:220px;display:flex;align-items:stretch;">
                                <a href="{{ route('web.product.detail', ['id' => $relateProduct->id]) }}" class="product-card-link" style="width:100%;height:100%;display:block;">
                                    @include('components.product-card', ['product' => $relateProduct])
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')
    <!-- Thay đổi hình ảnh -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // === Image gallery functionality ===
            const imagePlaylist = document.querySelector('.image-playlist');
            const prevBtn = document.getElementById('prevImage');
            const nextBtn = document.getElementById('nextImage');
            const thumbImages = document.querySelectorAll('.thumb-img');
            const currentImageSpan = document.getElementById('currentImage');
            const totalImagesSpan = document.getElementById('totalImages');
            
            let currentIndex = 0;
            const totalImages = thumbImages.length;
            const visibleThumbs = 5; // Number of visible thumbnails
            const thumbWidth = 86; // Width of each thumbnail including margin
            
            // Initialize totalImages display
            if (totalImagesSpan) {
                totalImagesSpan.textContent = totalImages;
            }
            
            // Function to navigate through thumbnails
            function navigatePlaylist(direction) {
                if (direction === 'next' && currentIndex < totalImages - 1) {
                    currentIndex++;
                } else if (direction === 'prev' && currentIndex > 0) {
                    currentIndex--;
                }
                
                // Update current image counter
                if (currentImageSpan) {
                    currentImageSpan.textContent = currentIndex + 1;
                }
                
                // Update active thumbnail
                thumbImages.forEach((img, index) => {
                    img.classList.toggle('active', index === currentIndex);
                });
                
                // Select the active thumbnail
                const activeThumb = document.querySelector('.thumb-img.active');
                if (activeThumb) {
                    // Update main image
                    let mainImage = document.getElementById("mainImage");
                    mainImage.style.opacity = 0;
                    setTimeout(() => {
                        mainImage.src = activeThumb.src;
                        mainImage.style.opacity = 1;
                    }, 200);
                    
                    // Scroll thumbnail into view
                    const scrollPosition = currentIndex * thumbWidth - 
                        (document.querySelector('.image-playlist-wrapper').offsetWidth - thumbWidth) / 2;
                    
                    imagePlaylist.style.transform = `translateX(${-Math.min(
                        Math.max(0, scrollPosition),
                        thumbWidth * totalImages - document.querySelector('.image-playlist-wrapper').offsetWidth
                    )}px)`;
                }
            }
            
            // Set up event listeners for navigation buttons
            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', () => navigatePlaylist('prev'));
                nextBtn.addEventListener('click', () => navigatePlaylist('next'));
            }
            
            // Function to change the main image when clicking on a thumbnail
            window.changeImage = function(element) {
                let mainImage = document.getElementById("mainImage");
                
                // Fade effect before changing image
                mainImage.style.opacity = 0;
                setTimeout(() => {
                    mainImage.src = element.src;
                    mainImage.style.opacity = 1;
                }, 200);
                
                // Update active state and current index
                thumbImages.forEach((img, index) => {
                    img.classList.remove("active");
                    if (img === element) {
                        currentIndex = index;
                        if (currentImageSpan) {
                            currentImageSpan.textContent = currentIndex + 1;
                        }
                    }
                });
                element.classList.add("active");
                
                // Scroll the thumbnail into view
                const scrollPosition = currentIndex * thumbWidth - 
                    (document.querySelector('.image-playlist-wrapper').offsetWidth - thumbWidth) / 2;
                
                imagePlaylist.style.transform = `translateX(${-Math.min(
                    Math.max(0, scrollPosition),
                    thumbWidth * totalImages - document.querySelector('.image-playlist-wrapper').offsetWidth
                )}px)`;
            }
            
            // Make the first thumbnail active by default
            if (thumbImages.length > 0) {
                thumbImages[0].classList.add('active');
            }
            
            // === Existing Swiper Initialization === 
            var swiper1 = new Swiper(".mySwiper1", {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                loopedSlides: 4, // Đảm bảo Swiper clone đúng số lượng slide
                watchOverflow: true, // Ngăn lỗi khi ít slide
                navigation: {
                    nextEl: ".mySwiper1 .swiper-button-next",
                    prevEl: ".mySwiper1 .swiper-button-prev",
                },
                pagination: {
                    el: ".mySwiper1 .swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    1200: {
                        slidesPerView: 4
                    },
                    992: {
                        slidesPerView: 3
                    },
                    576: {
                        slidesPerView: 2
                    },
                    0: {
                        slidesPerView: 1
                    },
                },
            });
        });
    </script>

    <!-- Add product to cart -->
    <script>
        function addCart() {
            @if(!Auth::check())
                // Redirect to login page if user is not authenticated
                window.location.href = "{{ route('web.login') }}";
                return;
            @endif
            let quantity = parseInt(document.getElementById('quantity').value);
            let maxQuantity = {{ $product->productInventories->quantity ?? 0 }};
            if (isNaN(quantity) || quantity < 1) quantity = 1;
            if (quantity > maxQuantity) quantity = maxQuantity;
            let totalPrice = quantity * {{ $product->price }};
            let formData = new FormData();
            formData.append('product_id', {{ $product->id }});
            formData.append('quantity', quantity);
            formData.append('total_price', totalPrice);
            formData.append('type', "{{ $product->type }}");
            $.ajax({
                url: "{{ route('api.cart.add') }}",
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content
                },
                contentType: false,
                processData: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __('Product added to cart successfully') }}',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    updateCartBadge();
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: "{{ __('Error adding to cart') }}",
                        text: xhr.responseJSON ? xhr.responseJSON.message : "{{ __('Unknown error') }}"
                    });
                }
            });
        }
        function updateTotalPrice() {
            let quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value, 10);
            let maxQuantity = {{ $product->productInventories->quantity ?? 0 }};
            let price = {{ $product->price }};
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
            } else if (quantity > maxQuantity) {
                quantity = maxQuantity;
            }
            quantityInput.value = quantity;
            let totalPrice = quantity * price;
            document.getElementById('total_price').textContent = totalPrice.toLocaleString('vi-VN') + "₫";
        }
    </script>
@endsection