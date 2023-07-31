@extends('front.layouts.app')
@section('content')

@if (session()->has('Invalid verification code'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.Invalid verification code') }}",
                type: "error"
            })
        }
    </script>
@endif

<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

    <div class="modal-body">
        <div class="mt-5 mt-lg-0 text-end" data-aos-delay="100">
            <form action="{{ route('check   ') }}" method="POST">
            @csrf
                <div class="form-group my-5">
                    <div class="container height-100 d-flex justify-content-center align-items-center">
                        <div class="position-relative">
                            <h2 class="fw-bold" style="color: #e57504">{{ __('homepage.phone_verification') }}</h2>
                            <div class="text-center"><span class="mb-3">{{ __('homepage.Enter_the_code_sent_to') }}</span>
                                <small>
                                    {{ $user->phone }}
                                </small>
                            </div>

                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                <input name="verification_code" type="text form-cotrol" type="text">
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" id="ff" class="btn btn-success">{{ __('homepage.login') }}</button>
                            </div>

                        </div> <!-- position-relative -->
                    </div> <!-- container -->
                </div> <!-- form-group -->
            </form>
        </div>
    </div>
    </div>
</div>

@endsection
