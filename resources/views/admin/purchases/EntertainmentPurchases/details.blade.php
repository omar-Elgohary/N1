@extends('admin.layouts.app')
@section('title')
    {{ __('events.reservation_process_details') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 section-title text-end p-0">
                <h2 class="text-black">{{ __('events.reservation_process_details') }}</h2>
            </div>

            <div class="col-6 text-start">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                {{-- <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a> --}}
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4">
            <div class="form-group mt-4">
                @if($order->order_status == 'حجز مؤكد')
                    <input type="text" value="{{ __('events.confirmed_reservation') }}" class="form-control bg-secondary">
                @elseif($order->order_status == 'لم يتم تأكيد الحضور')
                <input type="text" value="{{ __('events.attendance_not_confirmed') }}" class="form-control bg-danger">
                @else
                    <input type="text" value="{{ __('events.attendance_confirmed') }}" class="form-control bg-success">
                @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label style="margin-left: 70px">{{ __('restaurent.user_phone') }}</label>
                <strong>{{ $order->user->phone }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.user_name') }}</label>
                <strong class="mx-5">{{ $order->user->name }}</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">{{ __('events.tickets_number') }}</label>
                <strong class="mx-5">{{ $order->tickets_count }} {{ __('events.ticket') }}</strong>
            </div> <!-- 4 -->

            <div class="form-group my-4">
                <label>{{ __('events.reservation_date') }}</label>
                <strong class="mx-5">{{ $order->event->reservation_date }}</strong>
            </div> <!-- 5 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.total_price') }}</label>
                <strong class="mx-5">({{ $order->total_price }}) {{ __('restaurent.SAR') }}</strong>
            </div> <!-- 6 -->

        </div> <!-- col-4 -->
    </div> <!-- container -->
</section>

@endsection
