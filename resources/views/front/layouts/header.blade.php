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
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/cfe6bc4ca1.css" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
<body>

    <div class="loader_bg">
        <div class="loader"></div>
    </div>

    <div class="container d-flex align-items-center justify-content-between">
        @auth
            <p>logout</p>
        @else
            <a class="btn px-4" id="login" data-bs-toggle="modal" href="#exampleModalToggle" role="button">تسجيل الدخول <i class="fa-solid fa-circle-user"></i></i></a>
        @endauth

        <nav id="navbar" class="navbar" dir="rtl">
            <img class="p-3" src="{{ asset('images/logo.png') }}" alt="logo">
            <ul>
                <li><a class="nav-link text-black  active" href="/">الرئيسية</a></li>
                <li><a class="nav-link text-black scrollto" href="{{ route('contact_us') }}">اتصل بنا</a></li>
                <li><a class="nav-link text-black scrollto" href="/about">عن N1</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle" style="background-color: #ff8914"></i>
        </nav><!-- .navbar -->
    </div>

@guest
{{-- loging modal --}}
<div class="modal fade border-0" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
        </div>

        <div class="modal-body d-flex justify-content-center">
            <div class="col-lg-6 mt-5 mt-lg-0 text-end" data-aos-delay="100">
                <h2 class="text-bold text-center" style="color: #ff8000">تسجيل الدخول</h2>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mt-3">
                        <label class="mb-3">البريد الالكتروني</label>
                        <input type="email" class="form-control rounded-0" name="email">
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">كلمة المرور</label>
                        <input type="password" class="form-control rounded-0" name="password">
                    </div>

                    {{-- <div class="form-group mt-3">
                        <input type="checkbox"> تذكرني
                    </div> --}}

                    <div class="form-group mt-4 text-center mx-auto">
                        {{-- <button type="submit" class="btn px-5 mb-3" id="">تسجيل الدخول</button><br> --}}
                        <input type="submit" value="تسجيل الدخول" class="btn px-5 mb-3" id="login"><br>
                        <a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="cursor: pointer;">لا تمتلك حسابا بعد؟ <span class="text-danger text-decoration-underline">انشاء حساب تاجر</span></a>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </div>
</div>
@endguest

