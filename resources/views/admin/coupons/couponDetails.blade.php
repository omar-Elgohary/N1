@extends('admin.layouts.app')
@section('title')
    {{ __('offers.coupon_details') }}
@endsection

@if (session()->has('deactivationCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deactivationCoupon') }}",
                type: "info"
            })
        }
    </script>
@endif

@section('content')
<section>
    <div class="container" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('offers.coupon_details') }}</h3>
        </div>

        <div class="row col-12">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <img src="{{ asset('assets/images/offers/'.$coupon->image) }}" style="width: 100%" alt="">
            </div>
        </div>

            <div class="col-lg-4 col-md-3 mt-5">
                <div class="form-group my-4">
                    <label>{{ __('offers.offer_status') }}</label>
                    @if($coupon->status == 'مفعل')
                        <label class="text-success mx-5 fw-bold">{{ __('restaurent.available') }}</label>
                    @else
                        <label class="text-danger mx-5 fw-bold">{{ __('restaurent.notavailable') }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.discount_coupon') }}</label>
                    <label class="mx-5">{{ $coupon->discount_coupon }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.discount_percentage') }}</label>
                    <label class="mx-5">{{ $coupon->discount_percentage }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.start_time') }}</label>
                    <label class="mx-5">{{ $coupon->start_date }}</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.end_time') }}</label>
                    <label class="mx-5">{{ $coupon->end_date }}</label>
                </div> <!-- 5 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.user_count') }}</label>
                    <label class="mx-5">{{ $coupon->users_count }}</label>
                </div> <!-- 6 -->

                <div class="form-group my-4">
                    <label>{{ __('offers.number_of_uses_per_person') }}</label>
                    <label class="mx-5">{{ $coupon->how_many_times_user_use_this_coupon }}</label>
                </div> <!-- 6 -->
            </div> <!-- col-4 -->

        <div class="col-4 d-grid mx-auto mt-5">
            @if($coupon->status == 'مفعل')
                <a id="login" href="{{ route('editCoupon', $coupon->id) }}" class="btn mb-3">{{ __('offers.edit') }}</a>
            @else
                <a href="{{ route('activationCoupon', $coupon->id) }}" id="login" class="btn mb-3">{{ __('offers.activate') }}</a>
            @endif

            @if($coupon->status == 'مفعل')
                <a href="#Deactivation" id="coupon" class="btn mb-3" data-bs-toggle="modal">{{ __('offers.disactivate') }}</a>
            @else
                <a id="coupon" href="{{ route('deleteCoupon', $coupon->id) }}" class="btn mb-3">{{ __('restaurent.delete') }}</a>
            @endif
        </div>
    </div> <!-- container -->
</section>


{{-- Deactivation --}}
<div class="modal fade border-0" id="Deactivation" aria-hidden="true" aria-labelledby="DeactivationLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2>{{ __('offers.disactivate_questtion') }}</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('offers.cancel') }}</button>
                <a href="{{ route('deactivationCoupon', $coupon->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('offers.disactivate') }}</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
