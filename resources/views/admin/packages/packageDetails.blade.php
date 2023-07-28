@extends('admin.layouts.app')
@section('title')
    {{ __('offers.pcakage_details') }}
@endsection

@section('content')
<section>
    <div class="container" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('offers.pcakage_details') }}</h3>
        </div>

        <div class="row col-12">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <img src="{{ asset('assets/images/offers/'.$package->image) }}" style="width: 100%" alt="">
            </div>
        </div>

        <div class="col-lg-4 mt-5">
            <div class="form-group my-4">
                <label class="text-black">{{ __('offers.offer_status') }}</label>
                @if($package->status == 'مفعل')
                <label class="text-success mx-5" style="font-weight: bold;">{{ __('restaurent.available') }}</label>
            @else
                <label class="text-danger mx-5" style="font-weight: bold;">{{ __('restaurent.notavailable') }}</label>
            @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label><img src="{{ asset('images/NoPath - Copy (2).png') }}" alt=""></label>
                <label class="mx-5">
                    <h5 class="text-black">{{ \App\Models\Meal::where('id', $package->first_meal_id)->first()->name }}</h5>
                </label>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label><img src="{{ asset('images/NoPath - Copy (2).png') }}" alt=""></label>
                <label class="mx-5">
                    <h5 class="text-black">{{ \App\Models\Meal::where('id', $package->second_meal_id)->first()->name }}</h5>
                </label>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label class="text-black">{{ __('offers.start_time') }}</label>
                <label class="text-black mx-5">{{ $package->start_date }}</label>
            </div> <!-- 4 -->

            <div class="form-group my-4">
                <label class="text-black">{{ __('offers.end_time') }}</label>
                <label class="text-black mx-5">{{ $package->end_date }}</label>
            </div> <!-- 5 -->

            <div class="form-group my-4">
                <label class="text-black">{{ __('restaurent.price') }}</label>
                <label class="text-black mx-5">{{ $package->price }} {{ __('restaurent.SAR') }}</label>
            </div> <!-- 6 -->
        </div> <!-- col-4 -->

        <div class="col-4 d-grid mx-auto mt-5">
            @if($package->status == 'مفعل')
                <a id="login" href="{{ route('editPackage', $package->id) }}" class="btn mb-3">{{ __('offers.edit') }}</a>
            @else
                <a href="{{ route('activationPackage', $package->id) }}" id="login" class="btn">{{ __('offers.activate') }}</a>
            @endif

            @if($package->status == 'مفعل')
            <a href="#Deactivation" id="coupon" class="btn" data-bs-toggle="modal">{{ __('offers.disactivate') }}</a>
            @else
                <a id="coupon" href="{{ route('deletePackage', $package->id) }}" class="btn mb-3">{{ __('restaurent.delete') }}</a>
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

            <div class="modal-body text-center text-black my-5">
                <h2>{{ __('offers.disactivate_questtion') }}</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('offers.cancel') }}</button>
                <a id="package" href="{{route('deactivationPackage', $package->id)}}" class="btn btn-block px-5 text-white">{{ __('offers.disactivate') }}</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
