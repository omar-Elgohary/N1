@extends('admin.layouts.app')
@section('title')
    {{ __('branches.branches') }}
@endsection

@if (session()->has('addBranch'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم انشاء حساب الفرع بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editBranch'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تعديل حساب الفرع بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deleteBranch'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم حذف حساب الفرع بنجاح",
                type: "info"
            })
        }
    </script>
@endif

@if ($errors->any())
    <script>
        window.onload = function() {
            notif({
                msg: "@foreach($errors->all() as $error) {{ $error }} <br> @endforeach",
                type: "error"
            })
        }
    </script>
@endif

@section('content')
<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end fw-bold">{{ __('branches.branches') }}</h2>
            </div>

            <div class="col-lg-6 text-start">
                <a href="{{ route('exportBranchePdf') }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i>PDF</a>
                <a id="login" class="btn px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">{{ __('branches.add_branche') }}</a>
            </div>
        </div> <!-- row -->

        <div class="mt-4">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('branches.name') }}</th>
                        <th>{{ __('branches.phone') }}</th>
                        <th>{{ __('branches.email') }}</th>
                        <th>{{ __('branches.control') }}</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($branches as $key => $branch)
                    <tr>
                        <th>{{ $branch->random_id }}</th>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->phone }}</td>
                        <td>{{ $branch->email }}</td>
                        <td>
                            <a href="{{ route('EditBranchPage', $branch->id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            <a href="#deleteBranch" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

{{-- delete branch --}}
<div class="modal fade border-0" id="deleteBranch" aria-hidden="true" aria-labelledby="deleteBranchLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2 class="text-black">{{ __('branches.delete_question') }}</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.retreat') }}</button>
                <a href="{{ route('deleteBranch', $branch->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

            @empty
            <tr>
                <th class="text-danger" colspan="5">
                    {{ __('restaurent.nodata') }}
                </th>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>
</div> <!-- container -->
</section>


{{-- add branch --}}
<div class="modal fade border-0" id="staticBackdrop" aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="d-flex justify-content-between p-3 mb-2">
            <h3 class="modal-title font-bold" style="color: #ed7802; font: x-large">{{ __('branches.add_branche_account') }}</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <form action="{{ route('createBranche') }}" method="post" autocomplete="off">
            @csrf

            <div class="mt-lg-0 text-end">
                <div class="row d-flex justify-content-center flex-row-reverse col-12">

                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('branches.name_ar') }}</label>
                        <input type="text" class="form-control rounded-0" name="name_ar" id="arabicNameInput">
                        <p id="errorText_ar" class="error-message"></p>
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('branches.branche_location') }}</label>
                        <input type="text" class="form-control rounded-0" name="branche_location">
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('branches.phone') }}</label>
                        <input type="text" class="form-control rounded-0" name="phone">
                    </div>
                </div> <!-- col-4 -->

                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('branches.name_en') }}</label>
                        <input type="text" class="form-control rounded-0" name="name_en" id="englishNameInput">
                        <p id="errorText_en" class="error-message"></p>
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('branches.email') }}</label>
                        <input type="email" class="form-control rounded-0" name="email">
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('homepage.password') }}</label>
                        <input type="password" class="form-control rounded-0" name="password">
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-black mb-3">{{ __('homepage.confirmPassword') }}</label>
                        <input type="password" class="form-control rounded-0" name="confirmed_password">
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->
        </div>
    </div>

    <div class="d-flex justify-content-around mt-4 mb-5">
        <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('branches.add_branche_account') }}</button>
    </div>
</form>
    </div>
</div>
</div>

@endsection

