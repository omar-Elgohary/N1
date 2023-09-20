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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@5.2.3/font/bootstrap-icons.css" rel="stylesheet"> --}}

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

                    <li style="z-index: 100;">
                        <div class="dropdown d-inline-block language-switch">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-black">{{ __('staticpage.lang') }}</span>
                            </button>

                            <ul style="z-index: 9999">
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
            </nav><!-- .navbar -->
        </div>
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
                <div class="col-lg-6 mt-5 mt-lg-0 text-center" data-aos-delay="100">
                    <h2 class="text-bold text-center" style="color: #ff8000">{{ __('homepage.login') }}</h2>

                    <form action="{{ route('login') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('homepage.email') }}</label>
                            <input type="email" class="form-control rounded-0" name="email" @if(isset($_COOKIE['email'])) value="{{$_COOKIE['email']}}" @endif>
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('homepage.password') }}</label><br>
                            <div class="position-relative">
                                <input type="password" class="form-control rounded-0" name="password" id="password" @if(isset($_COOKIE['password'])) value="{{$_COOKIE['password']}}" @endif>
                                <i class="bi bi-eye-slash" style="position: absolute; left: 10px; top: 30%;" id="togglePassword"></i>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('homepage.Remember_Me')}}</label>
                        </div>

                        <div class="form-group mt-4 text-center mx-auto">
                            <input type="submit" value="{{ __('homepage.login') }}" class="btn px-5 mb-3" id="login"><br>
                            <a data-bs-target="#exampleModalToggle2" type="button" data-bs-toggle="modal" style="cursor: pointer;">{{ __('homepage.smalldesc1') }} <span class="text-danger text-decoration-underline">{{ __('homepage.smalldesc2') }}  </span></a>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </div>
    </div>
    @endguest

    {{-- انشاء حساب تاجر --}}
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggle2Label" tabindex="-1" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
            </div>

            <div id="createsellermodal" class="modal-body mt-5 mt-lg-0">
                <h2 class="fw-bold" style="color: #ff8000">{{ __('homepage.createSeller') }}</h2>
                <form action="{{ route('register') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.companyName') }}</label>
                                <input type="text" class="form-control rounded-0" name="company_name">
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.commercialNumber') }}</label>
                                <input type="text" class="form-control rounded-0" name="commercial_registration_number">
                            </div>

                            <div class="form-group mt-3">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label class="mb-3">{{ __('homepage.phone') }}</label>
                                        <input type="text" class="form-control rounded-0" name="phone" id="phone">
                                    </div>

                                    <div class="col-lg-3">
                                        <select name="country_code" id="inputState" class="form-control rounded-0 mt-2">
                                            <option selected="" value="+20">20+</option>
                                            <option value="+966">966+</option>
                                            <option value="+971">971+</option>
                                            <option value="+968">968+</option>
                                            <option value="+965">965+</option>
                                            <option value="+974">974+</option>
                                            <option value="+973">973+</option>
                                            <option value="+970">970+</option>
                                            <option value="+962">962+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.password') }}</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control rounded-0" name="password" id="re_password">
                                    <i class="bi bi-eye-slash" style="position: absolute; left: 10px; top: 30%;" id="togglePassword2"></i>
                                </div>
                            </div>
                        </div> <!-- col-6 -->

                        <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.activityType') }}</label>
                                <select class="form-control rounded-0" name="department_id">
                                    <option value="">{{ __('homepage.choose') }}</option>
                                    @foreach (\App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.commercialImage') }}</label><br>
                                <label for="file" class="upload form-control d-flex flex-row-reverse"><i class="fa fa-duotone fa-cloud-arrow-up text-secondary"></i> {{ __('homepage.uploadcommercialImage') }}</label>
                                <input type="file" accept="image/*" class="form-control rounded-0" id="file" name="commercial_registration_image">
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.email') }}</label>
                                <input type="email" class="form-control rounded-0" name="email">
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">{{ __('homepage.confirmPassword') }}</label>
                                <div class="position-relative">
                                    <input type="password" id="confirmed_password" class="form-control rounded-0" name="confirmed_password">
                                    <i class="bi bi-eye-slash" style="position: absolute; left: 10px; top: 30%;" id="togglePassword3"></i>
                                </div>
                            </div>
                        </div> <!-- col-6 -->

                        <div class="form-group mt-4 text-center">
                            <button type="submit" id="verify" class="btn px-5 mb-3">{{ __('homepage.signup') }}</button><br>
                            <a id="loginbtn" data-bs-target="#exampleModalToggle" type="button" data-bs-toggle="modal" style="cursor: pointer;">{{ __('homepage.haveaccount') }} <span class="text-danger text-decoration-underline">{{ __('homepage.login') }}</span></a>
                        </div>
                    </div>
                </div> <!-- row -->
            </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
    </div> <!-- modal-fade -->


    {{-- Confirm Number --}}
    {{-- <div class="modal fade border-0" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggle3Label" tabindex="-1" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-body">
                <div class="mt-5 mt-lg-0 text-end" data-aos-delay="100">
                    <form action="{{ route('check') }}" method="POST">
                    @csrf
                        <div class="form-group mt-3">
                            <div class="container height-100 d-flex justify-content-center align-items-center">
                                <div class="position-relative">
                                    <h2 class="fw-bold" style="color: #e57504">{{ __('homepage.phone_verification') }}</h2>
                                    <div class="text-center"> <span class="mb-3">{{ __('homepage.Enter_the_code_sent_to') }}</span>
                                        <small>
                                            {{ session('phone') }}
                                        </small>
                                    </div>

                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                        <input class="m-2 text-center form-control rounded-0" type="text" name ="first" id="first" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded-0" type="text" name ="second" id="second" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded-0" type="text" name ="third" id="third" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded-0" type="text" name ="fourth" id="fourth" maxlength="1" />
                                        <input name="verification_code" type="text form-cotrol" type="text">
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-success">{{ __('homepage.login') }}</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <div class="countdown">59:00</div>
                                    </div>

                                </div> <!-- position-relative -->
                            </div> <!-- container -->
                        </div> <!-- form-group -->
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div> --}}


@push('script')
    <script>
        $('#loginbtn').on('click', function(event) {
            $('#exampleModalToggle2').modal('hide');
            setTimeout(() => {
                $('#exampleModalToggle').modal('show');
            }, 200);
        });
    </script>
@endpush
