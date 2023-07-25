@extends('admin.layouts.app')
@section('title')
    {{ __('offers.edit_coupon') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('offers.edit_coupon_info') }}</h3>
        </div>

        <form action="{{ route('updateCoupon', $coupon->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <img src="{{ asset('assets/images/offers/'.$coupon->image) }}" name="image" style="width: 100%" alt="coupon photo">
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                        <input type="file" name="image" class="drop-zone__input @error('image') is-invalid @enderror" multiple>
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div> <!-- row -->

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>{{ __('offers.discount_coupon') }}</label>
                    <input type="text" name="discount_coupon" value="{{$coupon->discount_coupon}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>{{ __('offers.discount_percentage') }}</label>
                    <input type="text" name="discount_percentage" value="{{$coupon->discount_percentage}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('offers.start_code_time') }}</label>
                    <input type="date" name="start_date" value="{{$coupon->start_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('offers.end_code_time') }}</label>
                    <input type="date" name="end_date" value="{{$coupon->end_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('offers.user_count') }}</label>
                    <input type="text" name="users_count" value="{{$coupon->users_count}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('offers.number_of_uses_per_person') }}</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" value="{{$coupon->how_many_times_user_use_this_coupon}}" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 6 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('restaurent.save_updates') }}</button>
                <a href="{{ route('alloffers') }}" id="coupon" class="btn">{{ __('offers.cancel') }}</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
