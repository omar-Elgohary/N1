@extends('admin.layouts.app')
@section('title')
    تفاصيل الفعالية
@endsection

@section('content')
<section>
    <form action="{{ route('editEvent', $event->id) }}" method="POST">
        @csrf

    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تفاصيل الفعالية</h3>
        </div>

            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('assets/images/products/'.$event->product_image) }}" class="m-1 mt-0" height="250" alt="">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>الحالة</label>
                    @if($event->status == 'لم يبدأ')
                        <label class="text-secondary fw-bold mx-5">{{ $event->status }}</label>
                    @elseif($event->status == 'منتهي')
                        <label class="text-dark fw-bold mx-5">{{ $event->status }}</label>
                    @elseif($event->status == 'متوقف')
                        <label class="text-danger fw-bold mx-5">{{ $event->status }}</label>
                    @else
                        <label class="text-success fw-bold mx-5">{{ $event->status }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>الاسم</label>
                    <label class="mx-5">{{ $event->event_name }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>الوصف</label>
                    <label class="mx-5">{{ $event->description }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>عدد التذاكر</label>
                    <label class="mx-5">{{ $event->quantity }} تذكرة</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>الحجوزات</label>
                    <label class="mx-5">{{ $event->sold_quantity }} تذكرة</label>
                </div> <!-- 5 -->

                <hr>

                <div class="form-group col-12 my-5 d-grid">
                    <div class="col-4 mb-3">
                        <label>أنواع الحجز</label>
                    </div>

                    @foreach (\App\Models\Event::select('reservations_type_id')->get() as $eventIds)
                        <div class="col-12 d-flex">
                            <h5 class="fw-bold">- {{ \App\Models\ReservationType::where('id', $eventIds->reservations_type_id)->first()->name }}</h5>
                            {{-- <p class="mx-5">50 ريال سعودي</p> --}}
                        </div>
                    @endforeach
                </div> <!-- 6 -->

                <hr>

                <div class="form-group col-lg-12 my-4 d-grid">
                    <div class="col-4 mb-3">
                        <h5>أوقات الحجز</h5>
                    </div>

                    <div class="container smca col-10 d-flex text-center">
                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>{{ $event->reservation_date}}</h5>
                            <h5>{{ $event->reservation_time }}</h5>
                        </div>
                    </div>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->
        </form>
    </div> <!-- container -->
</section>

@endsection
