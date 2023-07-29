@extends('admin.layouts.app')
@section('title')
    {{ __('offers.edit_package') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('offers.edit_package') }}</h3>
        </div>

        <form action="{{ route('updatePackage', $package->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row col-lg-12">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <img src="{{ asset('assets/images/offers/'.$package->image) }}" name="image" style="width: 100%" alt="package photo">
                </div>

                <div class="col-lg-6 mt-3">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                        <input type="file" name="image" class="drop-zone__input @error('image') is-invalid @enderror" multiple>
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div> <!-- row -->

            <div class="col-lg-4 mt-5">
                        <div class="form-group">
                    <label>{{ __('offers.first_meal') }}</label>
                    <select name="first_meal_id" class="form-control rounded-0 mb-4 mt-2">
                        @foreach ($meals as $meal)
                        <option value="{{ $meal->id }}" @if($meal->id == $package->first_meal_id) selected @endif>{{ $meal->name }}</option>
                    @endforeach
                </select>
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>{{ __('offers.second_meal') }}</label>
                    <select name="second_meal_id" class="form-control rounded-0 mb-4 mt-2">
                        @foreach ($meals as $meal)
                            <option value="{{ $meal->id }}" @if($meal->id == $package->second_meal_id) selected @endif>{{ $meal->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('offers.start_code_time') }}</label>
                    <input type="date" name="start_date" value="{{$package->start_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('offers.end_code_time') }}</label>
                    <input type="date" name="end_date" value="{{$package->end_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.price') }}</label>
                    <input type="text" name="price" value="{{$package->price}}" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('offers.user_count') }}</label>
                    <input type="text" name="users_count" value="{{$package->users_count}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('offers.number_of_uses_per_person') }}</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" value="{{$package->how_many_times_user_use_this_coupon}}" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('restaurent.save_updates') }}</button>
                <a id="coupon" href="{{ route('alloffers') }}" type="submit" class="btn">{{ __('offers.cancel') }}</a>
            </div>
        </form>

    </div> <!-- container -->
</section>

@endsection
