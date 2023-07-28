@extends('admin.layouts.app')
@section('title')
    {{ __('events.event_details') }}
@endsection

@section('content')
<section>
    <form action="{{ route('editEvent', $event->id) }}" method="POST">
        @csrf

    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('events.event_details') }}</h3>
        </div>

            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('assets/images/products/'.$event->event_image) }}" class="m-1 mt-0" height="250" alt="event photo">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>{{ __('restaurent.status') }}</label>
                    @if($event->status == 'لم يبدأ')
                        <label class="text-secondary fw-bold mx-5">{{ __('events.didnt_start') }}</label>
                    @elseif($event->status == 'منتهي')
                        <label class="text-dark fw-bold mx-5">{{ __('events.finished') }}</label>
                    @elseif($event->status == 'متوقف')
                        <label class="text-danger fw-bold mx-5">{{ __('events.stopped') }}</label>
                    @else
                        <label class="text-success fw-bold mx-5">{{ __('events.available') }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.name') }}</label>
                    <label class="mx-5">{{ $event->name }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.description') }}</label>
                    <label class="mx-5">{{ $event->description }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>{{ __('events.tickets_number') }}</label>
                    <label class="mx-5">{{ $event->tickets_quantity }} {{ __('events.ticket') }}</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>{{ __('events.reservations') }}</label>
                    <label class="mx-5">{{ $event->tickets_sold_quantity }} {{ __('events.ticket') }}</label>
                </div> <!-- 5 -->

                <hr>

                <div class="form-group col-12 my-5 d-grid">
                    <div class="col-4 mb-3">
                        <label>{{ __('events.reservation_type') }}</label>
                    </div>

                    {{-- @foreach (\App\Models\Event::select('reservations_type_id')->get() as $eventIds) --}}
                        <div class="col-12 d-flex">
                            <h5 class="fw-bold">- {{ \App\Models\ReservationType::where('id', $event->reservations_type_id)->first()->name }}</h5>
                            {{-- <p class="mx-5">50 ريال سعودي</p> --}}
                        </div>
                    {{-- @endforeach --}}

                </div> <!-- 6 -->

                <hr>

                <div class="form-group col-lg-12 my-4 d-grid">
                    <div class="col-6 mb-3">
                        <h5>{{ __('events.reservation_time') }}</h5>
                    </div>

                    <div class="container smca col-10 d-flex text-center">
                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>{{ $event->reservation_date}}</h5>
                            <h5>{{ $event->reservation_time }}</h5>
                        </div>

                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>{{ $event->start_reservation_date }}</h5>
                        </div>

                    </div>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

        <div class="col-4 d-grid mx-auto mt-5">
            @if($event->status == 'منتهي')
                <a id="login" href="#deleteEvent{{$event->id}}" class="btn" data-bs-toggle="modal">{{ __('events.delete_event') }}</a>
            @elseif($event->status == 'لم يبدأ')
            <a id="login" href="{{route('editEvent', $event->id)}}" class="btn mb-3">{{ __('events.edit') }}</a>
                <a id="coupon" href="#deleteEvent{{$event->id}}" class="btn" data-bs-toggle="modal">{{ __('events.delete_event') }}</a>
            @elseif($event->status == 'متاح')
            <a id="login" href="{{route('editEvent', $event->id)}}" class="btn mb-3">{{ __('events.edit') }}</a>
            <a id="coupon" href="#DeactivationEvent{{$event->id}}" class="btn" data-bs-toggle="modal">{{ __('events.stop_publish') }}</a>
            @else
            <a id="login" href="{{route('editEvent', $event->id)}}" class="btn mb-3">{{ __('events.edit') }}</a>
            <a id="coupon" href="{{ route('activationEvent', $event->id) }}" class="btn">{{ __('events.publish') }}</a>
            @endif
        </div>
    </div> <!-- container -->
</form>

{{-- deleteEvent --}}
<div class="modal fade border-0" id="deleteEvent{{$event->id}}" aria-hidden="true" aria-labelledby="deleteEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('deleteEvent', $event->id) }}" method="POST" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="modal-body text-center fw-bold my-5">
                <h2>{{ __('events.delete_event_question') }}</h2>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</button>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- DeactivationEvent --}}
<div class="modal fade" id="DeactivationEvent{{$event->id}}" aria-hidden="true" aria-labelledby="DeactivationEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered rounded-0">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{route('deactivationEvent', $event->id)}}" method="POST">
            @csrf
            <div class="modal-body text-center my-5">
                <h3>هل أنت متأكد من ايقاف نشر هذه الفعالية؟</h3>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">تأكيد الايقاف</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

</section>
@endsection
