@extends('admin.layouts.app')
@section('title')
    {{ __('branches.edit_branche_info') }}
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">{{ __('branches.edit_branche_info') }}</h2>
            </div>
        </div> <!-- row -->

        <form action="{{ route('updateBranch', $branch->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mt-lg-0 text-end">
                <div class="form-group text-center">
                    <img src="{{ asset("images/NoPath - Copy (35).png") }}" width="150" height="150" alt="">
                </div>

                <div class="row d-flex justify-content-center col-12">
                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('branches.branche_location') }}</label>
                            <input type="text" class="form-control rounded-0" name="branche_location" value="{{$branch->branche_location}}">
                        </div>

                        <div class="form-group mt-3">
                            <label class="text-black mb-3">{{ __('branches.phone') }}</label>
                            <input type="text" class="form-control rounded-0" name="phone" value="{{$branch->phone}}">
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('branches.start_time') }}</label>
                            <input type="time" class="form-control rounded-0" name="end_time" value="{{$branch->end_time}}">
                        </div>
                    </div> <!-- col-6 -->

                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('branches.name') }}</label>
                            <input type="text" class="form-control rounded-0" name="branche_title" value="{{$branch->branche_title}}">
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('branches.email') }}</label>
                            <input type="email" class="form-control rounded-0" name="email" value="{{$branch->email}}">
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">{{ __('branches.end_time') }}</label>
                            <input type="time" class="form-control rounded-0" name="start_time" value="{{$branch->start_time  }}">
                        </div>

                    <div class="mt-5">
                        <h4>: {{ __('branches.possibil_delivery') }}</h4>

                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ __('branches.pickup') }}
                                <input type="checkbox" name="delivery" value="0" {{ $branch->delivery == 0 ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </div> <!-- 2 -->

                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ __('branches.delivery') }}
                                <input type="checkbox" name="delivery" value="1" {{ $branch->delivery == 1 ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </div> <!-- 2 -->
                    </div> <!-- col-4 -->

                </div> <!-- row -->
                <div class="text-center d-flex justify-content-evenly mt-5">
                    <button id="login" type="submit" class="btn px-5">{{ __('restaurent.save_updates') }}</button>
                    <a id="coupon" href="changePassword" class="btn">{{ __('branches.change_password') }}</a>
                </div>

            </form>
        </div>
    </div> <!-- container -->
</section>

@endsection
