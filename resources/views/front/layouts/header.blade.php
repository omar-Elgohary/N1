<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>N1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@5.2.3/font/bootstrap-icons.css" rel="stylesheet">

    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/cfe6bc4ca1.css" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
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

    <div class="loader_bg">
        <div class="loader"></div>
    </div>

    <div class="navhead">
        <div class="container d-flex align-items-center justify-content-between">
            @auth
                <p>logout</p>
            @else
                <a class="btn px-4" id="login" data-bs-toggle="modal" href="#exampleModalToggle" role="button">{{ __('homepage.login') }}  <i class="fa-solid fa-circle-user"></i></i></a>
            @endauth

            <nav id="navbar" class="navbar" dir="rtl">
                <img class="p-3" src="{{ asset('images/logo.png') }}" alt="logo">
                <ul>
                    <li><a class="nav-link text-black active" href="/">{{ __('homepage.home') }}</a></li>
                    <li><a class="nav-link text-black scrollto" href="{{ route('contact_us') }}">{{ __('homepage.contactus') }}</a></li>
                    <li><a class="nav-link text-black scrollto" href="/about">{{ __('homepage.aboutus') }}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle" style="background-color: #ff8914"></i>

                <li style="z-index: 100;">
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
            </nav><!-- .navbar -->
        </div>
    </div>

