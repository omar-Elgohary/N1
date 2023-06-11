@extends('front.layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('logout'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تسجيل الخروج بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (Session::has('Invalid verification code entered!'))
    <script>
        window.onload = function() {
            notif({
                msg: "يجب عليك تسجيل الدخول أولا",
                type: "error"
            })
        }
    </script>
@endif

@if (Session::has('mustLogin'))
    <script>
        window.onload = function() {
            notif({
                msg: "يجب عليك تسجيل الدخول أولا",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('ErrorLogin'))
    <script>
        window.onload = function() {
            notif({
                msg: "هناك خطأ في تسجيل الدخول",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('ErrorRegister'))
    <script>
        window.onload = function() {
            notif({
                msg: "هناك خطأ في انشاء الحساب",
                type: "error"
            })
        }
    </script>
@endif


<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade">
        <h3 class="text-white text-center">Lorem ipsum dolor sit consectetur</h3>
        <p class="text-white text-center">Lorem ipsum dolor sit.</p>
    </div>
</section>


<main id="main">
<section id="icon-boxes" class="icon-boxes">
    <div class="container">
    <div class="row d-flex flex-row-reverse">
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box">
            <h4 class="title text-center">الخدمة الأولى</h4>
            <img src="{{ asset('images/l1.png') }}" alt="">
        </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos-delay="100">
        <div class="icon-box">
            <h4 class="title text-center">الخدمة الثانية</h4>
            <img src="{{ asset('images/l2.png') }}" alt="">
        </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos-delay="200">
        <div class="icon-box">
            <h4 class="title text-center">الخدمة الثالثة</h4>
            <img src="{{ asset('images/l3.png') }}" alt="">
        </div>
        </div>
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
                <h3 class="title text-dark" dir="rtl">عن N1</h3>
                <div class="card p-3 mb-5">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore minus ex obcaecati pariatur. Soluta perspiciatis culpa modi veniam beatae recusandae quis deserunt quam. Adipisci enim expedita repellendus reiciendis quos iusto dolorum cupiditate, qui maxime quae. Illo alias neque nihil corrupti! Quasi, beatae tempora. Veniam a beatae quo eligendi natus? Tenetur quidem rerum quis dicta aliquid odio quia, ipsa, exercitationem tempore est id illum. Porro, nemo maiores? Temporibus architecto enim voluptas animi ea nesciunt consectetur, accusamus ratione! Iste quibusdam rem vel dolor!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore minus ex obcaecati pariatur. Soluta perspiciatis culpa modi veniam beatae recusandae quis deserunt quam. Adipisci enim expedita repellendus reiciendis quos iusto dolorum cupiditate, qui maxime quae. Illo alias neque nihil corrupti! Quasi, beatae tempora. Veniam a beatae quo eligendi natus? Tenetur quidem rerum quis dicta aliquid odio quia, ipsa, exercitationem tempore est id illum. Porro, nemo maiores? Temporibus architecto enim voluptas animi ea nesciunt consectetur, accusamus ratione! Iste quibusdam rem vel dolor!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore minus ex obcaecati pariatur. Soluta perspiciatis culpa modi veniam beatae recusandae quis deserunt quam. Adipisci enim expedita repellendus reiciendis quos iusto dolorum cupiditate, qui maxime quae. Illo alias neque nihil corrupti!
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<section id="pricing" class="pricing">
    <div class="container">
    <div class="section-title">
        <h2 class="text-black">الشركاء</h2>
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

@endsection
