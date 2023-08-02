<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>N1 | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    {{-- notify --}}
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    @if(App::getLocale() == 'ar')
        <link href="{{ asset('assets/css/style-ar.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/style-en.css') }}" rel="stylesheet">
    @endif
<body>

    <div class="navhead">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="dropdown">
            <button class="btn dropdown-toggle fw-bold border-0" dir="rtl" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-user fa-lg text-warning"></i> {{ __('staticpage.shopname') }}
            </button>

            <ul class="dropdown-menu text-center border-0" style="background: transparent;">
                <li><a class="dropdown-item" href="{{ route('personalInfo') }}">{{ __('staticpage.Profile') }}</a></li>
                <li><a class="dropdown-item text-danger" href="{{route('logOut')}}">{{ __('staticpage.logout') }}</a></li>
            </ul>
        </div>

            <nav id="navbar" class="navbar" dir="rtl">
            <img class="p-3" src="{{ asset('images/logo.png') }}" alt="logo">
            <ul>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'الرئيسية' ? 'active' : ''?>" href="/admin">{{ __('homepage.home') }}</a></li>

                @if(auth()->user()->department_id == 1)
                    <li><a class="nav-link text-black scrollto <?= 'title' == 'القائمة' ? 'active' : ''?>" href="{{route('foodMenu')}}">{{ __('staticpage.Menu') }}</a></li>
                @elseif(auth()->user()->department_id == 2)
                    <li><a class="nav-link text-black scrollto <?= 'title' == 'المنتجات' ? 'active' : ''?>" href="{{route('products')}}">{{ __('staticpage.Products') }}</a></li>
                @else
                    <li><a class="nav-link text-black scrollto <?= 'title' == 'الفعاليات' ? 'active' : ''?>" href="{{route('events')}}">{{ __('staticpage.Events') }}</a></li>
                @endif

                <li><a class="nav-link text-black scrollto <?= 'title' == 'العروض' ? 'active' : ''?>" href="/allOffers">{{ __('staticpage.Offers') }}</a></li>

                @if(auth()->user()->department_id == 1)
                    <li><a class="nav-link text-black scrollto <?= 'title' == 'عمليات الشراء' ? 'active' : ''?>" href="{{route('restaurantPurchases')}}">{{ __('staticpage.Purchases') }}</a></li>
                @elseif(auth()->user()->department_id == 2)
                <li><a class="nav-link text-black scrollto <?= 'title' == 'عمليات الشراء' ? 'active' : ''?>" href="{{route('shopPurchases')}}">{{ __('staticpage.Purchases') }}</a></li>
                @else
                <li><a class="nav-link text-black scrollto <?= 'title' == 'عمليات الحجز' ? 'active' : ''?>" href="{{route('entertainmentPurchases')}}">{{ __('staticpage.Reservations') }}</a></li>
                @endif

                <li><a class="nav-link text-black scrollto <?= 'title' == 'الفروع' ? 'active' : ''?>" href="/allBranches">{{ __('staticpage.Branches') }}</a></li>

                <li>
                    <div class="dropdown d-inline-block language-switch">
                        <button type="button" class="btn"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-black">{{ __('staticpage.lang') }}</span>
                        </button>

                        <ul>
                            <li>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a data-turbo="false" class="dropdown-item dropdown-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        wire:click="reloadPageContent">
                                        <div class="link-ico">
                                            <span class='{{$localeCode == 'en' ? 'us' : 'ar'}}'></span>
                                            <span class="title text-black">{{ $properties['native'] }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle" style="background-color: #ff8914"></i>
        </nav>
        </div>
    </div>




