@extends('front.layouts.app')
@section('content')

<section id="faq" class="faq section-bg">
    <div class="container">

    <div class="section-title">
        <h2 class="text-black">{{ __('homepage.FAQ') }}</h2>
    </div>

<div class="faq-list">
    <ul>
        <li data-aos-delay="200">
            <a data-bs-toggle="collapse" data-bs-target="#faq-list-1" class="collapsed fw-bold text-black">السؤال الأول<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
            <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
            </p>
            </div>
        </li>

        <li data-aos-delay="300">
            <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed fw-bold text-black">السؤال الثاني<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
            <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
            </p>
            </div>
        </li>

        <li data-aos-delay="300">
            <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed fw-bold text-black">السؤال الثالث<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
            <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
            </p>
            </div>
        </li>
    </ul>
</div>

    </div>
</section>
@endsection
