<!DOCTYPE html>
<html lang="{{ $lang ?? 'en' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('name_company') }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="LTCSHOP" />
    <meta property="og:title" content="{{ __('name_company') }}" />
    <meta property="og:description" content="LTCSHOP" />
    <meta property="og:image" content="{{ asset('frontendcss/images/logo1.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <link rel="stylesheet" href="{{ asset('frontendcss/bootstrap_4.6/css/bootstrap.min.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="shortcut icon" href="{{ asset('frontendcss/images/logo1.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('frontendcss/bootstrap_4.6/css/bootstrap.min.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('frontendcss/css/style.css') }}?v={{ time() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
    @yield('style')
    <style>
        .header-blur {
            background: rgba(255, 255, 255, 0.7) !important;
            backdrop-filter: blur(6px);
            transition: background 0.3s, backdrop-filter 0.3s;
        }

        .header-hide {
            transform: translateY(-100%);
            transition: transform 0.3s;
        }
    </style>
</head>

<body>
    <x-header />
    <div>
        @yield('content')
    </div>

    <x-footer />
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('frontendcss/bootstrap_4.6/js/bootstrap.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.querySelector('header, .header, x-header, nav');
        var lastScroll = window.scrollY;
        window.addEventListener('scroll', function() {
            var currentScroll = window.scrollY;
            if (header) {
                if (currentScroll > lastScroll && currentScroll > 50) {
                    header.classList.add('header-hide'); // Ẩn khi kéo xuống
                } else {
                    header.classList.remove('header-hide'); // Hiện khi kéo lên
                }
            }
            lastScroll = currentScroll;
        });
    });
</script>
@yield('js')

</html>