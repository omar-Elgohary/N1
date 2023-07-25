@extends('admin.layouts.app')
@section('title')
    {{ __('offers.add_package') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('offers.add_package') }}</h3>
        </div>

        <form action="{{route('addPackage')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12">
                <div class="drop-zone">
                    <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                    <input type="file" name="image" class="drop-zone__input @error('image') is-invalid @enderror" multiple>
                    @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="col-lg-4 mt-5">
                <div class="form-group">
                    <label>{{ __('offers.first_meal') }}</label>
                    <select name="first_meal" class="form-control rounded-0 mb-4 mt-2">
                        <option>{{ __('offers.choose_meal') }}</option>
                        @foreach ($meals as $meal)
                            <option value="{{ $meal->name }}">{{ $meal->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>{{ __('offers.second_meal') }}</label>
                    <select name="second_meal" class="form-control rounded-0 mb-4 mt-2">
                        <option>{{ __('offers.choose_meal') }}</option>
                        @foreach ($meals as $meal)
                            <option value="{{ $meal->name}}">{{ $meal->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('offers.start_code_time') }}</label>
                    <input type="date" name="start_date" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('offers.end_code_time') }}</label>
                    <input type="date" name="end_date" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.price') }}</label>
                    <input type="text" name="price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('offers.user_count') }}</label>
                    <input type="text" name="users_count" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('offers.number_of_uses_per_person') }}</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('offers.add') }}</button>
                <a href="{{ route('alloffers') }}" id="coupon" class="btn px-5">{{ __('offers.cancel') }}</a>
            </div>
        </form>

    </div> <!-- container -->
</section>

@endsection
