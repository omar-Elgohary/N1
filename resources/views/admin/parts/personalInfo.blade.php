@extends('admin.layouts.app')
@section('content')
@section('title')
    {{ __('personalInfo.personal_information') }}
@endsection

@if (session()->has('editSellerInfo'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editSellerInfo') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('passwordCorrect'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.passwordCorrect') }}",
                type: "success"
            })
        }
    </script>
@endif



<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">{{ __('personalInfo.personal_information') }}</h2>
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
                    <p class="text-black">{{ __('personalInfo.commercial_register') }} :<span class="text-danger fw-bold">{{ auth()->user()->commercial_registration_number }}</span></p>
                </div> <!-- 2 -->

                <div class="form-group">
                    <p class="text-black">{{ __('personalInfo.activity_type') }} :<span class="text-danger fw-bold">{{ auth()->user()->department->name }}</span></p>
                </div> <!-- 3 -->
            </form>

            <div class="d-flex justify-content-around mt-5 bttn">
                <a id="login" href="{{ route('editSellerPage', auth()->user()->id) }}" class="btn">{{ __('personalInfo.edit_personal_info') }}</a>
                <a id="coupon" href="{{ route('changePasswordPage') }}" class="btn">{{ __('personalInfo.change_password') }}</a>
            </div>
        </div>
    </div> <!-- container -->
</section>

@endsection
