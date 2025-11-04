<div class="header">
    <div class="header-content" style="padding-left: 0; margin-left: 0; margin-bottom: 0; padding-bottom: 0;">
        <div class="container" style="padding-left: 0; margin-left: 0; margin-bottom: 0; padding-bottom: 0;">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom: 0; padding-bottom: 0;">
                <!-- Logo bên trái, thu nhỏ và cách lề trái một chút -->
                <a class="logo" href="{{ route('web.index') }}" style="display: flex; align-items: center; text-decoration: none; min-width: 120px; max-width: 260px; margin-right: 36px; margin-left: 10px; padding-left: 0;">
                    <img class="img-logo" src="{{ asset('frontendcss/images/logo1.png')}}" alt="logo" style="height: 75px; width: auto; margin-right: 16px; margin-left: 0;">
                    <h2 class="text-logo" style="margin: 0; font-size: 1.1rem; color: #2256a2; font-weight: bold; white-space: nowrap;">{{ __('logo-text-ltc') }} <br> {{__('logo-text-ltc1')}}</h2>
                </a>
                <!-- Menu ở giữa, chiếm tối đa không gian còn lại -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex: 1; justify-content: center; padding: 0 10px 0 10px;">
                    <div class="collapse navbar-collapse show" id="navbarNav" style="width: 100%;">
                        <ul class="navbar-nav" style="display: flex; flex-direction: row; gap: 30px; align-items: center; margin-bottom: 0; justify-content: center; width: 100%;">
                            <!-- Trang chủ -->
                            <li class="nav-item {{(\Request::route()->getName() == 'web.index') ? 'active' : ''}}" style="white-space: nowrap;">
                                <a class="nav-link" href="{{ route('web.index') }}">{{ __('Home') }}<span class="sr-only">(current)</span></a>
                            </li>
                            <!-- Sản phẩm -->
                            <li class="nav-item {{ (\Request::route()->getName() == 'web.product' && \Request::route('type') == 'sale') ? 'active' : '' }}" style="white-space: nowrap;">
                                <a class="nav-link" href="{{ route('web.product', ['type' => 'sale']) }}">{{ __('Product_sale') }} <span class="sr-only">(current)</span></a>
                            </li>
                            <!-- <li class="nav-item {{ (\Request::route()->getName() == 'web.product' && \Request::route('type') == 'rental') ? 'active' : '' }}" style="white-space: nowrap;">
                                <a class="nav-link" href="{{ route('web.product', ['type' => 'rental']) }}">{{ __('Product_rental') }} <span class="sr-only">(current)</span></a>
                            </li> -->
                            <!-- Thanh tìm kiếm to hơn, dài hơn -->
                            <li class="nav-item search-bar" style="display: flex; align-items: center; flex: 1; min-width: 400px; max-width: 750px;">
                                <form action="{{ url('/product') }}" method="GET" style="position: relative; display: flex; align-items: center; width: 100%;">
                                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}" style="width: 100%; height: 44px; font-size: 1.18rem; padding-right: 48px; border-radius: 24px; border: 1.5px solid #65bef1;">
                                    <button type="submit" style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; height: 36px; width: 36px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-search" style="font-size: 1.4rem; color: #2256a2;"></i>
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item {{(\Request::route()->getName() == 'web.contact') ? 'active' : ''}}" style="white-space: nowrap;">
                                <a class="nav-link" href="{{ route('web.contact') }}">{{ __('Contact') }} <span class="sr-only">(current)</span></a>
                            </li>
                            <!-- User icon with dropdown -->
                            <li class="nav-item user-dropdown" style="position: relative; margin-left: 18px;">
                                <a href="#" class="nav-link user-dropdown-toggle" style="padding: 0; display: flex; align-items: center;">
                                    <i class="fa fa-user-circle" style="font-size: 2rem; color: #2256a2;"></i>
                                </a>
                                <div class="user-dropdown-menu" style="display: none; position: absolute; right: 0; top: 110%; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.15); border-radius: 6px; min-width: 160px; z-index: 1000;">
                                    @if(session()->has('user'))
                                        <a class="dropdown-item" href="{{ route('web.profile') }}"><i class="fa fa-user" style="margin-right: 8px;"></i> Tài khoản</a>
                                        <a class="dropdown-item" href="{{ route('api.logout') }}"><i class="fa fa-sign-out-alt" style="margin-right: 8px;"></i> Đăng xuất</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('web.login') }}"><i class="fa fa-sign-in-alt" style="margin-right: 8px;"></i> Đăng nhập</a>
                                        <a class="dropdown-item" href="{{ route('web.register') }}"><i class="fa fa-user-plus" style="margin-right: 8px;"></i> Đăng ký</a>
                                    @endif
                                </div>
                            </li>
                            <!-- Cart icon chuyển trang -->
                            <li class="nav-item cart-link" style="position: relative; margin-left: 18px;">
                                <a href="{{ session()->has('user') ? route('web.cart') : '#' }}" class="nav-link cart-icon-link" style="padding: 0; display: flex; align-items: center;">
                                    <i class="fa fa-shopping-cart" style="font-size: 2rem; color: #2256a2; position: relative;"></i>
                                    @if(isset($cartUniqueCount) && $cartUniqueCount > 0)
                                        <span class="cart-count" style="position: absolute; top: -7px; right: -7px; min-width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; background: #dc3545; color: #fff; border-radius: 50%; font-size: 0.85rem; font-weight: bold; box-shadow: 0 1px 4px rgba(0,0,0,0.12); border: 2px solid #fff; z-index: 2; padding: 0;">
                                            {{ $cartUniqueCount }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Ngôn ngữ ở ngoài cùng bên phải -->
                <div class="header-top-lang" style="margin-left: 20px; min-width: 60px;">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse show" id="navbarNav1">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if($lang == 'vi')
                                            <img src="{{ asset('frontendcss/images/co-vi.png')}}" alt="">
                                        @endif
                                        @if($lang == 'en')
                                            <img src="{{ asset('frontendcss/images/co-en.png')}}" alt="">
                                        @endif
                                        @if($lang == 'lo')
                                            <img src="{{ asset('frontendcss/images/co-lo.png')}}" alt="">
                                        @endif
                                        @if($lang == 'my')
                                            <img src="{{ asset('frontendcss/images/co-my.png')}}" alt="">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('web.language', ['lang' => 'vi'])}}" onclick="return switchLanguage('vi')">{{ __('Vietnamese') }}</a>
                                        <a class="dropdown-item" href="{{route('web.language', ['lang' => 'en'])}}" onclick="return switchLanguage('en')">{{ __('English') }}</a>
                                        <a class="dropdown-item" href="{{route('web.language', ['lang' => 'lo'])}}" onclick="return switchLanguage('lo')">{{ __('Laos') }}</a>
                                        <a class="dropdown-item" href="{{route('web.language', ['lang' => 'my'])}}" onclick="return switchLanguage('my')">{{ __('Myanmarr') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Banner chạy chữ khuyến mãi nằm trong container, ngay dưới header -->
        <div style="width: 100%; background: #65bef1; overflow: hidden; height: 50px; display: flex; align-items: center; margin: 0; padding: 0; position: relative; z-index: 10;">
            <div style="white-space: nowrap; display: inline-block; animation: marquee 12s linear infinite; font-weight: bold; color: #fff; font-size: 1.2rem; padding-left: 100%;">
                Khuyến mãi chào hè lên đến 40%    -     Thứ tư ngày vàng FREESHIP ngập tràn!!
            </div>
        </div>
        <!-- Xóa margin-bottom, padding-bottom của header-content và container, đảm bảo sát banner ảnh -->
        <style>
        .header-content, .header .container {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        </style>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var userDropdown = document.querySelector('.user-dropdown');
    if (!userDropdown) return;
    var toggle = userDropdown.querySelector('.user-dropdown-toggle');
    var menu = userDropdown.querySelector('.user-dropdown-menu');
    var timer;
    function showMenu() {
        clearTimeout(timer);
        menu.style.display = 'block';
    }
    function hideMenu() {
        timer = setTimeout(function() {
            menu.style.display = 'none';
        }, 150);
    }
    toggle.addEventListener('mouseenter', showMenu);
    toggle.addEventListener('mouseleave', hideMenu);
    menu.addEventListener('mouseenter', showMenu);
    menu.addEventListener('mouseleave', hideMenu);
    // Thêm click để mở/đóng trên mobile
    toggle.addEventListener('click', function(e) {
        e.preventDefault();
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    });
    document.addEventListener('click', function(e) {
        if (!userDropdown.contains(e.target)) {
            menu.style.display = 'none';
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var cartIcon = document.querySelector('.cart-icon-link');
    if(cartIcon) {
        cartIcon.addEventListener('click', function(e) {
            var isLoggedIn = {{ session()->has('user') ? 'true' : 'false' }};
            if(!isLoggedIn) {
                e.preventDefault();
                Swal.fire({
                    icon: 'info',
                    title: 'Xin hãy đăng nhập',
                    text: 'Bạn cần đăng nhập để sử dụng giỏ hàng!',
                    confirmButtonText: 'Đăng nhập',
                    showCancelButton: true,
                    cancelButtonText: 'Đóng',
                }).then((result) => {
                    if(result.isConfirmed) {
                        window.location.href = "{{ route('web.login') }}";
                    }
                });
            }
        });
    }
});
</script>