@extends('front.layouts.app')
@section('content')

<section id="contact" class="contact">
<div class="container">
    <div class="row mt-1 d-flex justify-content-end" data-aos-delay="100">
        <div class="col-lg-7">
            <img src="{{ asset('images/Background Complete (1).jpg') }}" class="mx-auto w-100" alt="">
        </div>


    <div class="col-lg-5 mt-5 mt-lg-0 text-end" data-aos-delay="100">
        <h2 class="text-black">شاركنا التطوير وسمعنا صوتك</h2>
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">

            <div class="form-group mt-3">
                <label>البريد الالكتروني</label>
                <input type="email" class="form-control mt-3 rounded-0" name="email" id="email" required>
            </div>

            <div class="form-group mt-3">
                <label>الاسم الثلاثي</label>
                <input type="text" class="form-control mt-3 rounded-0" name="subject" id="subject" required>
            </div>

            <div class="form-group mt-3">
                <label>نص الرسالة</label>
                <textarea class="form-control mt-3 rounded-0" name="message" rows="5" required></textarea>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn">ارسال</button>
            </div>
        </form>
    </div>
    </div> <!-- row -->
</div> <!-- container -->
</section><!-- End Contact Section -->
@endsection
