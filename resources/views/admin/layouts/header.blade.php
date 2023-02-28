<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>N1 | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-between">
        <div class="dropdown">
            <button class="btn dropdown-toggle fw-bold border-0" dir="rtl" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-user fa-lg text-warning"></i> اسم المتجر
            </button>
            <ul class="dropdown-menu text-center border-0" style="background: transparent;">
                <li><a class="dropdown-item" href="personalInfo">الملف الشخصي</a></li>
                <li><a class="dropdown-item text-danger" href="/">تسجيل الخروج</a></li>
            </ul>
        </div>

        <nav id="navbar" class="navbar" dir="rtl">
            <img class="p-3" src="{{ asset('images/logo.png') }}" alt="logo">
            <ul>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'الرئيسية' ? 'active' : ''?>" href="/admin">الرئيسية</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'اتصل بنا' ? 'active' : ''?>" href="/contact">اتصل بنا</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'عن N1' ? 'active' : ''?>" href="/about">عن N1</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'المنتجات' ? 'active' : ''?>" href="/products">المنتجات</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'العروض' ? 'active' : ''?>" href="/allOffers">العروض</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'عمليات الشراء' ? 'active' : ''?>" href="/restaurantPurchases">عمليات الشراء</a></li>
                <li><a class="nav-link text-black scrollto <?= 'title' == 'الفروع' ? 'active' : ''?>" href="/allBranches">الفروع</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle" style="background-color: #ff8914"></i>
        </nav><!-- .navbar -->
    </div>


{{-- loging modal --}}
<div class="modal fade border-0" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
        </div>

        <div class="modal-body">
            <div class="col-lg-6 mt-5 mt-lg-0 text-end" data-aos-delay="100">
                <h2 class="text-bold" style="color: #ff8000">تسجيل الدخول</h2>
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                    <div class="form-group mt-3">
                        <label class="mb-3">البريد الالكتروني</label>
                        <input type="email" class="form-control rounded-0" name="email" id="email" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">كلمة المرور</label>
                        <input type="text" class="form-control rounded-0" name="subject" id="subject" required>
                    </div>

                    <div class="form-group mt-3">
                        <input type="checkbox"> تذكرني
                    </div>
                </form>
            </div>

            <div class="form-group mt-3 text-center">
                <a class="btn px-5 mb-3" id="login" href="#">تسجيل الدخول</a> <br>
                <a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="cursor: pointer;">لا تمتلك حسابا بعد؟ <span class="text-danger text-decoration-underline">انشاء حساب تاجر</span></a>
            </div>
        </div>
        </div>
    </div>
</div>


{{-- انشاء حساب تاجر --}}
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
        </div>

        <div class="modal-body mt-5 mt-lg-0 text-end">
            <h2 class="text-bold" style="color: #ff8000">انشاء حساب تاجر</h2>
            <form action="forms/contact.php" method="post" role="form" class="php-email-form" autocomplete="off">

                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <label class="mb-3">اسم الشركة</label>
                        <input type="text" class="form-control rounded-0" name="CompanyName" id="CompanyName" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">رقم السجل التجاري/ معروف</label>
                        <input type="text" class="form-control rounded-0" name="number" id="number" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">رقم الجوال</label>
                        <input type="text" class="form-control rounded-0" name="phone" id="phone" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">كلمة المرور</label>
                        <input type="password" class="form-control rounded-0" name="password" id="password" required>
                    </div>
                </div> <!-- col-6 -->

                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <label class="mb-3">نوع النشاط</label>
                        <select class="form-control rounded-0" name="ActiveType">
                            <option value="">اختر نوع النشاط</option>
                            <option value=""> </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">صورة السجل التجاري/ معروف</label>
                        <input type="file" class="form-control rounded-0" name="image" id="image" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">البريد الالكتروني</label>
                        <input type="email" class="form-control rounded-0" name="email" id="email" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control rounded-0" name="confirmPassword" id="confirmPassword" required>
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->
            </form>

            <div class="form-group mt-4 text-center">
                <a class="btn px-5 mb-3" id="login" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">انشاء الحساب</a> <br>
                <a data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="cursor: pointer;"> تمتلك حسابا؟ <span class="text-danger text-decoration-underline">تسجيل الدخول</span></a>
            </div>
        </div>
    </div> <!-- modal-content -->
</div> <!-- modal-dialog -->
</div> <!-- modal-fade -->





{{-- Confirm Number --}}
<div class="modal fade border-0" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        <div class="modal-body">
            <div class="mt-5 mt-lg-0 text-end" data-aos-delay="100">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                    <div class="form-group mt-3">
                        <div class="container height-100 d-flex justify-content-center align-items-center">
                            <div class="position-relative">
                                    <h2 class="text-bold" style="color: #ce6700">التحقق من رقم الجوال</h2>
                                    <div> <span class="mb-3">ادخل الكود المرسل الى</span> <small>+*******9897</small>
                                    </div>

                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                        <input class="m-2 text-center form-control" type="text" id="first" maxlength="1" />
                                        <input class="m-2 text-center form-control" type="text" id="second" maxlength="1" />
                                        <input class="m-2 text-center form-control" type="text" id="third" maxlength="1" />
                                        <input class="m-2 text-center form-control" type="text" id="fourth" maxlength="1" />
                                    </div>
                            </div> <!-- position-relative -->
                        </div> <!-- container -->
                    </div> <!-- form-group -->

                </form>
            </div>
        </div>
        </div>
    </div>
</div>

