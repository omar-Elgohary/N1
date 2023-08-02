@extends('front.layouts.app')
@section('content')

@if ($errors->any())
    <script>
        window.onload = function() {
            notif({
                msg: "@foreach($errors->all() as $error) {{ $error }} <br> @endforeach",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('logout'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.logout') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('isVerified'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.isVerified') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('registeration failed'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.registeration failed') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (Session::has('Invalid verification code entered!'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.Invalid verification code entered!') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (Session::has('OTP'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.OTP') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (Session::has('mustLogin'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.mustLogin') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('ErrorLogin'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.ErrorLogin') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('ErrorRegister'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.ErrorRegister') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('CheckRestaurent'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.CheckRestaurent') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('CheckShop'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.CheckShop') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('CheckEntertainment'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.CheckEntertainment') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('CheckUser'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.CheckUser') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('error'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.error') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('remember'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.remember') }}",
                type: "error"
            })
        }
    </script>
@endif

<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade">
        <h3 class="text-white text-center">{{ __('homepage.bigheader') }}</h3>
        <p class="text-white text-center">{{ __('homepage.smallheader') }}</p>
    </div>
</section>

<main id="main">
<section id="icon-boxes" class="icon-boxes">
    <div class="container">
        <div class="row d-flex flex-row-reverse">
                @foreach (\App\Models\Department::all() as $department)
                    <div class="col-md-6 col-lg-4 d-flex align-items-center mb-5 mb-lg-0">
                        <div class="icon-box mx-auto">
                            <h4 class="title text-center">{{ $department->name }}</h4>
                            <img src="{{ asset('assets/images/departments/'.$department->image) }}" class="mx-auto d-block" alt="">
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</section>


<section>
    <div id="about" class="text-center position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div>
                    <img class="one" src="{{ asset('images/heidi-fin-2TLREZi7BUg-unsplash.png') }}" height="350" alt="">
                </div>
            </div>

            <div class="para col-lg-8 mt-4">
                <h3 class="title text-dark" dir="rtl">{{ __('homepage.aboutus') }}</h3>
                <div class="card p-3 mb-5">
                    {{ __('homepage.frontDesc') }}
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<section id="pricing" class="pricing">
    <div class="container">
    <div class="section-title">
        <h2 class="text-black text-center">{{ __('homepage.Partners') }}</h2>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6" data-aos-delay="100">
        <div class="box">
            <svg id="Icon_ionic-logo-ionic" data-name="Icon ionic-logo-ionic" xmlns="http://www.w3.org/2000/svg" width="77.527" height="77.527" viewBox="0 0 77.527 77.527">
                <path id="Path_224218" data-name="Path 224218" d="M29,11.334A17.667,17.667,0,1,0,46.669,29,17.681,17.681,0,0,0,29,11.334Z" transform="translate(9.763 9.762)" fill="#c9c9c9"/>
                <path id="Path_224219" data-name="Path 224219" d="M40.634,13.9A8.051,8.051,0,1,1,32.583,5.85,8.051,8.051,0,0,1,40.634,13.9Z" transform="translate(31.545 0.709)" fill="#c9c9c9"/>
                <path id="Path_224220" data-name="Path 224220" d="M77.417,26.074l-.335-.745-.54.615a12.178,12.178,0,0,1-4.864,3.336l-.522.186.2.5A31.653,31.653,0,1,1,55.706,13.532l.5.242.224-.5a12.128,12.128,0,0,1,3.578-4.7l.634-.5L59.918,7.7A38.362,38.362,0,0,0,42.139,3.375a38.762,38.762,0,1,0,35.279,22.7Z" transform="translate(-3.375 -3.375)" fill="#c9c9c9"/>
            </svg>
        </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos-delay="200">
        <div class="box featured">
            <svg id="Icon_ionic-logo-bitbucket" data-name="Icon ionic-logo-bitbucket" xmlns="http://www.w3.org/2000/svg" width="84.001" height="77.53" viewBox="0 0 84.001 77.53">
                <path id="Icon_ionic-logo-bitbucket-2" data-name="Icon ionic-logo-bitbucket" d="M85.124,4.541a3.3,3.3,0,0,0-.444-.04H6.1A2.714,2.714,0,0,0,3.375,7.226a1.966,1.966,0,0,0,.04.485L14.843,78.88a3.876,3.876,0,0,0,1.232,2.241h0a3.527,3.527,0,0,0,2.362.909h54.8a2.7,2.7,0,0,0,2.685-2.322l6.8-42.9H57.484l-3.23,19.382H36.487l-4.5-25.621H83.711L87.345,7.731A2.79,2.79,0,0,0,85.124,4.541Z" transform="translate(-3.375 -4.5)" fill="#c9c9c9"/>
            </svg>
        </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos-delay="300">
        <div class="box">
            <svg id="Icon_ionic-logo-designernews" data-name="Icon ionic-logo-designernews" xmlns="http://www.w3.org/2000/svg" width="108.544" height="77.531" viewBox="0 0 108.544 77.531">
                <path id="Path_224215" data-name="Path 224215" d="M31.322,18.622,15.961,6.75,31.37,31.512Z" transform="translate(31.284 -6.75)" fill="#c9c9c9"/>
                <path id="Path_224216" data-name="Path 224216" d="M74.209,6.75V46.242H65.39L50.077,22.353l.412,23.889H40.773V20.318l-9.037-7.1c.242.291.485.581.7.9a20.275,20.275,0,0,1,3.634,12.235c0,11.92-7.414,19.892-18.632,19.892H2.25v.1L50.61,84.281h60.184V35.364Z" transform="translate(-2.25 -6.75)" fill="#c9c9c9"/>
                <path id="Path_224217" data-name="Path 224217" d="M19.263,20.279c0-7.026-3.44-10.927-9.619-10.927H4.992V30.915H9.6C15.9,30.915,19.263,27.184,19.263,20.279Z" transform="translate(4.457 -0.387)" fill="#c9c9c9"/>
            </svg>
        </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos-delay="400">
        <div class="box">
            <svg id="Icon_ionic-logo-ionic" data-name="Icon ionic-logo-ionic" xmlns="http://www.w3.org/2000/svg" width="77.527" height="77.527" viewBox="0 0 77.527 77.527">
                <path id="Path_224218" data-name="Path 224218" d="M29,11.334A17.667,17.667,0,1,0,46.669,29,17.681,17.681,0,0,0,29,11.334Z" transform="translate(9.763 9.762)" fill="#c9c9c9"/>
                <path id="Path_224219" data-name="Path 224219" d="M40.634,13.9A8.051,8.051,0,1,1,32.583,5.85,8.051,8.051,0,0,1,40.634,13.9Z" transform="translate(31.545 0.709)" fill="#c9c9c9"/>
                <path id="Path_224220" data-name="Path 224220" d="M77.417,26.074l-.335-.745-.54.615a12.178,12.178,0,0,1-4.864,3.336l-.522.186.2.5A31.653,31.653,0,1,1,55.706,13.532l.5.242.224-.5a12.128,12.128,0,0,1,3.578-4.7l.634-.5L59.918,7.7A38.362,38.362,0,0,0,42.139,3.375a38.762,38.762,0,1,0,35.279,22.7Z" transform="translate(-3.375 -3.375)" fill="#c9c9c9"/>
            </svg>
        </div>
        </div>
    </div>
    </div>
</section>
</main>

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

@endsection

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
