@extends('front.layouts.app')
@section('title')
    {{ __('homepage.contactus') }}
@endsection

@if (session()->has('contactMessage'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.contactMessage') }}",
                type: "success"
            })
        }
    </script>
@endif

@section('content')
<section id="contact" class="contact">
<div class="container">
    <div class="row mt-1 d-flex justify-content-end" data-aos-delay="100">
        <div class="col-lg-7">
            <img src="{{ asset('images/Background Complete (1).jpg') }}" class="mx-auto w-100" alt="">
        </div>


    <div class="col-lg-5 mt-5 mt-lg-0 text-end" data-aos-delay="100">
        <h2 class="text-black">{{ __('homepage.contactus_desc') }}</h2>
        <form action="{{ route('contact_us.store') }}" method="post">
            @csrf

            <div class="form-group mt-3">
                <label>{{ __('homepage.email') }}</label>
                <input type="email" class="form-control mt-3 rounded-0" name="email" id="email">
            </div>

            <div class="form-group mt-3">
                <label>{{ __('homepage.full_name') }}</label>
                <input type="text" class="form-control mt-3 rounded-0" name="name" id="subject">
            </div>

            <div class="form-group mt-3">
                <label>{{ __('homepage.Message_text') }}</label>
                <textarea class="form-control mt-3 rounded-0" name="message" rows="5"></textarea>
            </div>

            <div class="form-group mt-3">
                <button type="submit" id="package" class="btn">{{ __('homepage.send') }}</button>
            </div>
        </form>
    </div>
    </div> <!-- row -->
</div> <!-- container -->
</section><!-- End Contact Section -->
@endsection
