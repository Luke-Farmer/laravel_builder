<?php
use App\Models\Settings;
use App\Models\Themes;
use App\Services\NavigationService;

$navigationService = new NavigationService();
$navigation = $navigationService->getNavigation();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="icon" type="image/png" href="/img/favicon.svg"/>
        @if(url()->current() == env('APP_URL'))
        <link rel="canonical" href="https://lukefarmer.uk" />
        @else
        <link rel="canonical" href="https://lukefarmer.uk/@yield('slug')" />
        @endif
        {!! htmlScriptTagJsApi() !!}
    </head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QY9J59N2M3"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-67LKNECFX4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-67LKNECFX4');
    </script>
    <style>
        {!! Themes::where('active', '=', '1')->first()->theme_css !!}
    </style>
    <body>
        <header class="navbar-fixed-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light mw-100 px-1">
                    <a class="navbar-brand m-0" href="/"><img src="/img/logo.svg" alt="Logo" class="img-responsive main-logo m-0" style="padding-top: 10px;padding-bottom: 10px;"></a>
                    <ul class="social-icons visible-mobile d-none">
                        <li>
                            <a href="#">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.1561 14.9119C14.9561 14.9119 15.6041 15.5119 15.5894 16.2452C15.5894 16.9785 14.9574 17.5785 14.1561 17.5785C13.3694 17.5785 12.7214 16.9785 12.7214 16.2452C12.7214 15.5119 13.3548 14.9119 14.1561 14.9119ZM19.2868 14.9119C20.0881 14.9119 20.7214 15.5119 20.7214 16.2452C20.7214 16.9785 20.0881 17.5785 19.2868 17.5785C18.5001 17.5785 17.8534 16.9785 17.8534 16.2452C17.8534 15.5119 18.4854 14.9119 19.2868 14.9119ZM25.9094 2.91187C27.4601 2.91187 28.7214 4.19987 28.7214 5.79587V30.9119L25.7734 28.2519L24.1134 26.6839L22.3574 25.0172L23.0854 27.6079H7.53344C5.98277 27.6079 4.72144 26.3199 4.72144 24.7239V5.79587C4.72144 4.19987 5.98277 2.91187 7.53344 2.91187H25.9081H25.9094ZM20.6161 21.1959C23.6468 21.0985 24.8134 19.0679 24.8134 19.0679C24.8134 14.5599 22.8374 10.9052 22.8374 10.9052C20.8641 9.39453 18.9841 9.43587 18.9841 9.43587L18.7921 9.65987C21.1241 10.3879 22.2068 11.4385 22.2068 11.4385C20.9335 10.7212 19.5303 10.2643 18.0788 10.0945C17.158 9.99054 16.228 9.99949 15.3094 10.1212C15.2268 10.1212 15.1574 10.1359 15.0761 10.1492C14.5961 10.1919 13.4294 10.3732 11.9628 11.0319C11.4561 11.2692 11.1534 11.4385 11.1534 11.4385C11.1534 11.4385 12.2921 10.3319 14.7601 9.60387L14.6228 9.43587C14.6228 9.43587 12.7441 9.39453 10.7694 10.9065C10.7694 10.9065 8.79477 14.5599 8.79477 19.0679C8.79477 19.0679 9.94677 21.0972 12.9774 21.1959C12.9774 21.1959 13.4841 20.5665 13.8974 20.0345C12.1548 19.5012 11.4974 18.3812 11.4974 18.3812C11.4974 18.3812 11.6334 18.4799 11.8801 18.6199C11.8934 18.6332 11.9068 18.6479 11.9348 18.6612C11.9761 18.6905 12.0174 18.7039 12.0588 18.7319C12.4014 18.9279 12.7441 19.0812 13.0588 19.2079C13.6214 19.4319 14.2934 19.6559 15.0761 19.8105C16.2485 20.0403 17.454 20.0449 18.6281 19.8239C19.312 19.7018 19.9792 19.5 20.6161 19.2225C21.0961 19.0399 21.6308 18.7732 22.1934 18.3959C22.1934 18.3959 21.5081 19.5439 19.7108 20.0625C20.1228 20.5945 20.6174 21.1959 20.6174 21.1959H20.6161Z" fill="white"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.2708 7.78635C29.2529 8.23661 28.1735 8.53232 27.0682 8.66369C28.2332 7.96693 29.1051 6.87037 29.5215 5.57835C28.4282 6.22902 27.2295 6.68502 25.9802 6.93169C25.141 6.03379 24.0286 5.4383 22.8161 5.2378C21.6036 5.03729 20.3588 5.24301 19.2752 5.82296C18.1916 6.40291 17.33 7.3246 16.8243 8.44474C16.3186 9.56489 16.1972 10.8207 16.4788 12.017C14.2616 11.9059 12.0926 11.3297 10.1126 10.3259C8.13249 9.32209 6.38568 7.91308 4.98551 6.19035C4.48989 7.04162 4.22945 8.00932 4.23084 8.99435C4.23084 10.9277 5.21484 12.6357 6.71084 13.6357C5.82552 13.6078 4.95968 13.3687 4.18551 12.9384V13.0077C4.18577 14.2953 4.63133 15.5432 5.44664 16.5398C6.26194 17.5364 7.39681 18.2203 8.65884 18.4757C7.83699 18.6984 6.97525 18.7312 6.13884 18.5717C6.49466 19.68 7.18818 20.6493 8.12229 21.3438C9.05641 22.0384 10.1843 22.4234 11.3482 22.445C10.1915 23.3535 8.86707 24.025 7.45068 24.4212C6.03428 24.8175 4.55368 24.9307 3.09351 24.7543C5.64244 26.3936 8.60963 27.2638 11.6402 27.261C21.8975 27.261 27.5068 18.7637 27.5068 11.3944C27.5068 11.1544 27.5002 10.9117 27.4895 10.6744C28.5813 9.88524 29.5236 8.90771 30.2722 7.78769L30.2708 7.78635Z" fill="white"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7215 2.91187C20.3442 2.91187 20.7962 2.9252 22.2175 2.99187C23.6375 3.05853 24.6042 3.2812 25.4549 3.61187C26.3349 3.95053 27.0762 4.4092 27.8175 5.1492C28.4955 5.81573 29.0201 6.62198 29.3549 7.51187C29.6842 8.3612 29.9082 9.3292 29.9749 10.7492C30.0375 12.1705 30.0549 12.6225 30.0549 16.2452C30.0549 19.8679 30.0415 20.3199 29.9749 21.7412C29.9082 23.1612 29.6842 24.1279 29.3549 24.9785C29.0211 25.8689 28.4964 26.6754 27.8175 27.3412C27.1508 28.019 26.3446 28.5435 25.4549 28.8785C24.6055 29.2079 23.6375 29.4319 22.2175 29.4985C20.7962 29.5612 20.3442 29.5785 16.7215 29.5785C13.0989 29.5785 12.6469 29.5652 11.2255 29.4985C9.80552 29.4319 8.83885 29.2079 7.98818 28.8785C7.09795 28.5445 6.29155 28.0198 5.62552 27.3412C4.94739 26.6748 4.42276 25.8685 4.08818 24.9785C3.75752 24.1292 3.53485 23.1612 3.46818 21.7412C3.40552 20.3199 3.38818 19.8679 3.38818 16.2452C3.38818 12.6225 3.40152 12.1705 3.46818 10.7492C3.53485 9.32787 3.75752 8.36253 4.08818 7.51187C4.42183 6.62144 4.94659 5.81496 5.62552 5.1492C6.29175 4.47084 7.09809 3.94617 7.98818 3.61187C8.83885 3.2812 9.80419 3.05853 11.2255 2.99187C12.6469 2.9292 13.0989 2.91187 16.7215 2.91187ZM16.7215 9.57853C14.9534 9.57853 13.2577 10.2809 12.0075 11.5312C10.7572 12.7814 10.0549 14.4771 10.0549 16.2452C10.0549 18.0133 10.7572 19.709 12.0075 20.9592C13.2577 22.2095 14.9534 22.9119 16.7215 22.9119C18.4896 22.9119 20.1853 22.2095 21.4356 20.9592C22.6858 19.709 23.3882 18.0133 23.3882 16.2452C23.3882 14.4771 22.6858 12.7814 21.4356 11.5312C20.1853 10.2809 18.4896 9.57853 16.7215 9.57853V9.57853ZM25.3882 9.2452C25.3882 8.80317 25.2126 8.37925 24.9 8.06669C24.5875 7.75413 24.1636 7.57853 23.7215 7.57853C23.2795 7.57853 22.8556 7.75413 22.543 8.06669C22.2304 8.37925 22.0549 8.80317 22.0549 9.2452C22.0549 9.68723 22.2304 10.1112 22.543 10.4237C22.8556 10.7363 23.2795 10.9119 23.7215 10.9119C24.1636 10.9119 24.5875 10.7363 24.9 10.4237C25.2126 10.1112 25.3882 9.68723 25.3882 9.2452ZM16.7215 12.2452C17.7824 12.2452 18.7998 12.6666 19.5499 13.4168C20.3001 14.1669 20.7215 15.1843 20.7215 16.2452C20.7215 17.3061 20.3001 18.3235 19.5499 19.0736C18.7998 19.8238 17.7824 20.2452 16.7215 20.2452C15.6607 20.2452 14.6432 19.8238 13.8931 19.0736C13.1429 18.3235 12.7215 17.3061 12.7215 16.2452C12.7215 15.1843 13.1429 14.1669 13.8931 13.4168C14.6432 12.6666 15.6607 12.2452 16.7215 12.2452V12.2452Z" fill="white"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler collapsed border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="/img/menu_icon.svg" alt="Menu" class="img-responsive" style="height: 25px;">
                    </button>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="/img/x_icon.svg" alt="Menu" class="img-responsive" style="height: 25px;">
                        </button>
                        <div class="navbar-wrapper d-flex align-items-center">
                            <a class="navbar-brand" href="/"><img src="/img/logo.svg" alt="Logo" class="img-responsive visible-mobile w-50"></a>
                            <style>
                                @media all and (min-width: 992px) {
                                    .navbar .nav-item .menu-level-0{ display: none; }
                                    .navbar .nav-item:hover .nav-link{   }
                                    .navbar .nav-item:hover .menu-level-0{ display: block; }
                                    /*.navbar .nav-item .dropdown-menu{ margin-top:0; }*/
                                    /*.navbar .nav-item { position: relative; }*/
                                    /*.navbar .nav-item .dropdown-menu { margin-left: 100%; }*/
                                    /*.navbar .nav-item .dropdown-toggle { margin-left: 0!important; }*/
                                }
                                .dropdown-menu li {
                                    position: relative;
                                }
                                .dropdown-menu .dropdown-submenu {
                                    display: none;
                                    position: absolute;
                                    left: 100%;
                                    top: -7px;
                                }
                                .dropdown-menu .dropdown-submenu-left {
                                    right: 100%;
                                    left: auto;
                                }
                                .dropdown-menu > li:hover > .dropdown-submenu {
                                    display: block;
                                }
                            </style>
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                @foreach($navigation as $link)
                                    <li class="nav-item">
                                        @if(empty($link['children']))
                                            @if($link['is_link'] == 1)
                                                <a href="{{ $link['url'] }}" class="nav-link">{{ $link['text'] }}</a>
                                            @else
                                                <p class="nav-link">{{ $link['text'] }}</p>
                                            @endif
                                        @else
                                            @if($link['is_link'] == 1)
                                                <a href="{{ $link['url'] }}" class="nav-link dropdown-toggle"  id="dropdown-{{ $link['text'] }}">{{ $link['text'] }}</a>
                                            @else
                                                <p class="nav-link dropdown-toggle"  id="dropdown-{{ $link['text'] }}">{{ $link['text'] }}</p>
                                            @endif
                                        @endif
                                        @if(!empty($link['children']))
                                            <ul class="dropdown-menu menu-level-0 ms-0" aria-labelledby="dropdown-{{ $link['text'] }}">
                                                @foreach($link['children'] as $child)
                                                    <li class="nav-item">
                                                        <a href="{{ $child['url'] }}" class="dropdown-item" id="dropdown-{{ $link['text'] }}">{{ $child['text'] }}</a>
                                                        @if(!empty($child['children']))
                                                            @include('partials.navigation', ['navigation' => $child['children']])
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
{{--                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="/about" class="link-hover">About</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="/services" class="link-hover">Services</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="/portfolio" class="link-hover">Portfolio</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="/contact" class="link-hover">Contact</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                            <ul class="social-icons d-none d-lg-flex">
                                <li>
                                    <a href="#" target="_blank" class="link-hover">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.1561 14.9119C14.9561 14.9119 15.6041 15.5119 15.5894 16.2452C15.5894 16.9785 14.9574 17.5785 14.1561 17.5785C13.3694 17.5785 12.7214 16.9785 12.7214 16.2452C12.7214 15.5119 13.3548 14.9119 14.1561 14.9119ZM19.2868 14.9119C20.0881 14.9119 20.7214 15.5119 20.7214 16.2452C20.7214 16.9785 20.0881 17.5785 19.2868 17.5785C18.5001 17.5785 17.8534 16.9785 17.8534 16.2452C17.8534 15.5119 18.4854 14.9119 19.2868 14.9119ZM25.9094 2.91187C27.4601 2.91187 28.7214 4.19987 28.7214 5.79587V30.9119L25.7734 28.2519L24.1134 26.6839L22.3574 25.0172L23.0854 27.6079H7.53344C5.98277 27.6079 4.72144 26.3199 4.72144 24.7239V5.79587C4.72144 4.19987 5.98277 2.91187 7.53344 2.91187H25.9081H25.9094ZM20.6161 21.1959C23.6468 21.0985 24.8134 19.0679 24.8134 19.0679C24.8134 14.5599 22.8374 10.9052 22.8374 10.9052C20.8641 9.39453 18.9841 9.43587 18.9841 9.43587L18.7921 9.65987C21.1241 10.3879 22.2068 11.4385 22.2068 11.4385C20.9335 10.7212 19.5303 10.2643 18.0788 10.0945C17.158 9.99054 16.228 9.99949 15.3094 10.1212C15.2268 10.1212 15.1574 10.1359 15.0761 10.1492C14.5961 10.1919 13.4294 10.3732 11.9628 11.0319C11.4561 11.2692 11.1534 11.4385 11.1534 11.4385C11.1534 11.4385 12.2921 10.3319 14.7601 9.60387L14.6228 9.43587C14.6228 9.43587 12.7441 9.39453 10.7694 10.9065C10.7694 10.9065 8.79477 14.5599 8.79477 19.0679C8.79477 19.0679 9.94677 21.0972 12.9774 21.1959C12.9774 21.1959 13.4841 20.5665 13.8974 20.0345C12.1548 19.5012 11.4974 18.3812 11.4974 18.3812C11.4974 18.3812 11.6334 18.4799 11.8801 18.6199C11.8934 18.6332 11.9068 18.6479 11.9348 18.6612C11.9761 18.6905 12.0174 18.7039 12.0588 18.7319C12.4014 18.9279 12.7441 19.0812 13.0588 19.2079C13.6214 19.4319 14.2934 19.6559 15.0761 19.8105C16.2485 20.0403 17.454 20.0449 18.6281 19.8239C19.312 19.7018 19.9792 19.5 20.6161 19.2225C21.0961 19.0399 21.6308 18.7732 22.1934 18.3959C22.1934 18.3959 21.5081 19.5439 19.7108 20.0625C20.1228 20.5945 20.6174 21.1959 20.6174 21.1959H20.6161Z" fill="white"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="link-hover">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.2708 7.78635C29.2529 8.23661 28.1735 8.53232 27.0682 8.66369C28.2332 7.96693 29.1051 6.87037 29.5215 5.57835C28.4282 6.22902 27.2295 6.68502 25.9802 6.93169C25.141 6.03379 24.0286 5.4383 22.8161 5.2378C21.6036 5.03729 20.3588 5.24301 19.2752 5.82296C18.1916 6.40291 17.33 7.3246 16.8243 8.44474C16.3186 9.56489 16.1972 10.8207 16.4788 12.017C14.2616 11.9059 12.0926 11.3297 10.1126 10.3259C8.13249 9.32209 6.38568 7.91308 4.98551 6.19035C4.48989 7.04162 4.22945 8.00932 4.23084 8.99435C4.23084 10.9277 5.21484 12.6357 6.71084 13.6357C5.82552 13.6078 4.95968 13.3687 4.18551 12.9384V13.0077C4.18577 14.2953 4.63133 15.5432 5.44664 16.5398C6.26194 17.5364 7.39681 18.2203 8.65884 18.4757C7.83699 18.6984 6.97525 18.7312 6.13884 18.5717C6.49466 19.68 7.18818 20.6493 8.12229 21.3438C9.05641 22.0384 10.1843 22.4234 11.3482 22.445C10.1915 23.3535 8.86707 24.025 7.45068 24.4212C6.03428 24.8175 4.55368 24.9307 3.09351 24.7543C5.64244 26.3936 8.60963 27.2638 11.6402 27.261C21.8975 27.261 27.5068 18.7637 27.5068 11.3944C27.5068 11.1544 27.5002 10.9117 27.4895 10.6744C28.5813 9.88524 29.5236 8.90771 30.2722 7.78769L30.2708 7.78635Z" fill="white"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="link-hover">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.7215 2.91187C20.3442 2.91187 20.7962 2.9252 22.2175 2.99187C23.6375 3.05853 24.6042 3.2812 25.4549 3.61187C26.3349 3.95053 27.0762 4.4092 27.8175 5.1492C28.4955 5.81573 29.0201 6.62198 29.3549 7.51187C29.6842 8.3612 29.9082 9.3292 29.9749 10.7492C30.0375 12.1705 30.0549 12.6225 30.0549 16.2452C30.0549 19.8679 30.0415 20.3199 29.9749 21.7412C29.9082 23.1612 29.6842 24.1279 29.3549 24.9785C29.0211 25.8689 28.4964 26.6754 27.8175 27.3412C27.1508 28.019 26.3446 28.5435 25.4549 28.8785C24.6055 29.2079 23.6375 29.4319 22.2175 29.4985C20.7962 29.5612 20.3442 29.5785 16.7215 29.5785C13.0989 29.5785 12.6469 29.5652 11.2255 29.4985C9.80552 29.4319 8.83885 29.2079 7.98818 28.8785C7.09795 28.5445 6.29155 28.0198 5.62552 27.3412C4.94739 26.6748 4.42276 25.8685 4.08818 24.9785C3.75752 24.1292 3.53485 23.1612 3.46818 21.7412C3.40552 20.3199 3.38818 19.8679 3.38818 16.2452C3.38818 12.6225 3.40152 12.1705 3.46818 10.7492C3.53485 9.32787 3.75752 8.36253 4.08818 7.51187C4.42183 6.62144 4.94659 5.81496 5.62552 5.1492C6.29175 4.47084 7.09809 3.94617 7.98818 3.61187C8.83885 3.2812 9.80419 3.05853 11.2255 2.99187C12.6469 2.9292 13.0989 2.91187 16.7215 2.91187ZM16.7215 9.57853C14.9534 9.57853 13.2577 10.2809 12.0075 11.5312C10.7572 12.7814 10.0549 14.4771 10.0549 16.2452C10.0549 18.0133 10.7572 19.709 12.0075 20.9592C13.2577 22.2095 14.9534 22.9119 16.7215 22.9119C18.4896 22.9119 20.1853 22.2095 21.4356 20.9592C22.6858 19.709 23.3882 18.0133 23.3882 16.2452C23.3882 14.4771 22.6858 12.7814 21.4356 11.5312C20.1853 10.2809 18.4896 9.57853 16.7215 9.57853V9.57853ZM25.3882 9.2452C25.3882 8.80317 25.2126 8.37925 24.9 8.06669C24.5875 7.75413 24.1636 7.57853 23.7215 7.57853C23.2795 7.57853 22.8556 7.75413 22.543 8.06669C22.2304 8.37925 22.0549 8.80317 22.0549 9.2452C22.0549 9.68723 22.2304 10.1112 22.543 10.4237C22.8556 10.7363 23.2795 10.9119 23.7215 10.9119C24.1636 10.9119 24.5875 10.7363 24.9 10.4237C25.2126 10.1112 25.3882 9.68723 25.3882 9.2452ZM16.7215 12.2452C17.7824 12.2452 18.7998 12.6666 19.5499 13.4168C20.3001 14.1669 20.7215 15.1843 20.7215 16.2452C20.7215 17.3061 20.3001 18.3235 19.5499 19.0736C18.7998 19.8238 17.7824 20.2452 16.7215 20.2452C15.6607 20.2452 14.6432 19.8238 13.8931 19.0736C13.1429 18.3235 12.7215 17.3061 12.7215 16.2452C12.7215 15.1843 13.1429 14.1669 13.8931 13.4168C14.6432 12.6666 15.6607 12.2452 16.7215 12.2452V12.2452Z" fill="white"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{ $slot }}
        <footer>
            <div class="container">
                <div class="row">

                </div>
            </div>
            <div class="container py-5">
                <div class="row py-5 align-items-center">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="img-wrap d-flex justify-content-center">
                            <img src="/img/logo.svg" class="" style="height:75px;">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column align-items-center mb-4 mb-lg-0">
                        <div class="">
                            <p class="white mb-0 text-center">{{ Settings::where('setting', '=', 'site_email')->first()->value }}</p>
                            <p class="white mb-0 text-center">Instagram @instagram</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column align-items-center mb-4 mb-lg-0">
                        <div class="">
                            <p class="white mb-0 text-center">{{ Settings::where('setting', '=', 'company_name')->first()->value }}</p>
                            <p class="white mb-0 text-center">{{ Settings::where('setting', '=', 'business_number')->first()->value }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="container">
                    <div class="d-flex justify-content-start py-3">
                        <p class="mb-0 white">&copy; {{ Settings::where('setting', '=', 'company_name')->first()->value }} {{ date("Y") }}</p>
                        <a href="#" class="white ms-3">Terms</a>
                        <a href="#" class="white ms-3">Privacy</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/e44c6e790f.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        <script>
            $(function () {
                $(document).scroll(function () {
                    var $nav = $(".navbar-fixed-top");
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                });
            });
        </script>
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);

    </script>
    <script>
        function update(text) {
            let result_element = document.querySelector("#highlighting-content");
            // Handle final newlines (see article)
            if(text[text.length-1] == "\n") {
                text += " ";
            }
            // Update code
            result_element.innerHTML = text.replace(new RegExp("&", "g"), "&amp;").replace(new RegExp("<", "g"), "&lt;"); /* Global RegExp */
            // Syntax Highlight
            Prism.highlightElement(result_element);
        }

        function sync_scroll(element) {
            /* Scroll result to scroll coords of event - sync with textarea */
            let result_element = document.querySelector("#highlighting");
            // Get and set x and y
            result_element.scrollTop = element.scrollTop;
            result_element.scrollLeft = element.scrollLeft;
        }

        function check_tab(element, event) {
            let code = element.value;
            if(event.key == "Tab") {
                /* Tab key pressed */
                event.preventDefault(); // stop normal
                let before_tab = code.slice(0, element.selectionStart); // text before tab
                let after_tab = code.slice(element.selectionEnd, element.value.length); // text after tab
                let cursor_pos = element.selectionStart + 1; // where cursor moves after tab - moving forward by 1 char to after tab
                element.value = before_tab + "\t" + after_tab; // add tab char
                // move cursor
                element.selectionStart = cursor_pos;
                element.selectionEnd = cursor_pos;
                update(element.value); // Update text to include indent
            }
        }
    </script>
        <script>
            // function getContent(){
            //     document.getElementById("my-textarea").value = document.getElementById("highlighting-content").innerHTML;
            // }
        </script>
        <script>
            $('.editable').each(function(){
                this.contentEditable = true;
            });
        </script>
        <script src="https://kit.fontawesome.com/e44c6e790f.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js"></script>
    </body>