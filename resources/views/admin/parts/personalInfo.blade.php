@extends('admin.layouts.app')
@section('content')
@section('title')
    المعلومات الشخصية
@endsection

@if (session()->has('editSellerInfo'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تعديل المعلومات الشخصية بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('passwordCorrect'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تعديل كلمة المرور بنجاح",
                type: "success"
            })
        }
    </script>
@endif



<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">المعلومات الشخصية</h2>
            </div>
        </div> <!-- row -->

        <div class="col-6 mx-auto text-center mt-4">
            <form action="#" method="post">

                <div class="form-group">
                    <img src="{{ asset('assets/images/users/'.auth()->user()->commercial_registration_image) }}" width="150" height="150" alt="">
                    <h3 class="text-black mt-4">{{ auth()->user()->company_name }}</h3>
                    <h5>{{ auth()->user()->country_code }} {{ auth()->user()->phone }}</h5>
                    <p>{{ auth()->user()->email }}</p>
                </div> <!-- 1 -->
                <hr>

                <div class="form-group">
                    <p class="text-black"><i class="fa-solid fa-eye"></i> السجل التجاري: {{ auth()->user()->commercial_registration_number }}</p>
                </div> <!-- 2 -->

                <div class="form-group">
                    <p class="text-black"> نوع النشاط: {{ auth()->user()->activity_type }} </p>
                </div> <!-- 3 -->
            </form>

            <div class="d-flex justify-content-around mt-5 bttn">
                <a id="login" href="{{ route('editSellerPage', auth()->user()->id) }}" class="btn">تعديل المعلومات الشخصية</a>
                <a id="coupon" href="{{ route('changePasswordPage') }}" class="btn">تغيير كلمة المرور</a>
            </div>
        </div>
    </div> <!-- container -->
</section>

@endsection
