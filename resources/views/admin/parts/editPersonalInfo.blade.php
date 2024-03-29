@extends('admin.layouts.app')
@section('content')
@section('title')
    {{ __('personalInfo.edit_personal_info') }}
@endsection

<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">{{ __('personalInfo.edit_personal_info') }}</h2>
            </div>
        </div> <!-- row -->


        <form action="{{ route('editSellerInfo', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-lg-0 text-end">

                <div class="form-group text-center mt-3">
                    <img src="{{ asset('assets/images/users/'.$user->commercial_registration_image) }}" width="150" height="150" alt="">
                </div>

                <div class="row d-flex justify-content-center flex-row-reverse col-12">

                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.companyName') }}</label>
                        <input type="text" class="form-control rounded-0" name="company_name" value="{{ $user->company_name }}">
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.commercialNumber') }}</label>
                        <input type="text" class="form-control rounded-0" name="commercial_registration_number" value="{{ $user->commercial_registration_number }}">
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.phone') }}</label>
                        <input type="text" class="form-control rounded-0" name="phone" value="{{$user->phone}}">
                    </div>
                </div> <!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.activityType') }}</label>
                        <select class="form-control rounded-0" name="department_id">
                            <option value="{{ $user->department_id }}">{{ $user->department->name }}</option>
                            @foreach (\App\Models\Department::where('id', '!=', $user->department_id)->get() as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.commercialImage') }}</label><br>
                        <label for="file" value="{{$user->commercial_registration_image}}" class="upload form-control"><i class="fa fa-duotone fa-cloud-arrow-up text-secondary"></i>{{ __('homepage.uploadcommercialImage') }}</label>
                        <input type="file" class="form-control rounded-0" name="commercial_registration_image" id="file">
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">{{ __('homepage.email') }}</label>
                        <input type="email" class="form-control rounded-0" name="email" value="{{$user->email}}">
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->

            <div class="mt-5 text-center">
                <button type="submit" id="login" class="btn px-5 mx-5">{{ __('restaurent.save_updates') }}</button>
            </div>
            </form>
        </div>
    </div> <!-- container -->
</section>

@endsection
