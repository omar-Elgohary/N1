@extends('admin.layouts.app')
@section('title')
    {{ __('restaurent.food menu') }}
@endsection

@if (session()->has('addSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.addSubCategory') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('addRestaurentProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.addRestaurentProduct') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editRestaurentProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editRestaurentProduct') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deleteRestaurentProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deleteRestaurentProduct') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('addCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.addCategory') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editCategory') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('ExcelImported'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.ExcelImported') }}",
                type: "success"
            })
        }
    </script>
@endif

@section('content')
<div class="col-12 text-end" id="side">
    <div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
                <i class="fa-solid fa-circle-right"></i>
			</div>
		</div>

		<aside class="sidebar">
			<a href="{{ route('restaurentCategories') }}" class="fw-bold fs-5 text-success mb-5">{{ __('restaurent.menu') }}</a>
			<nav class="menu">
				<a href="{{ route('foodMenu') }}" class="menu-item {{ !request('category_id') ? 'is-active' : '' }}">{{ __('restaurent.all') }}</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="{{ route('filterProducts', $category->id) }}" class="menu-item {{ request('category_id') == $category->id ? 'is-active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
                <a href="#addCategoryName" id="package" class="btn mt-3" data-bs-toggle="modal">{{ __('restaurent.addnewcategory') }}</a>
            </nav>
		</aside>
	</div>


<section class="container col-lg-12">
    <div class="col-12 d-flex flex-row-reverse right-0 p-0">
        <div class="col-6 section-title text-start p-0" id="headtitle">
            <h2 class="text-black">{{ __('restaurent.food menu') }}</h2>
        </div>

        <div class="col-6 text-start" id="smbtn">
            <a href="{{ route('ExportrestaurentPDF') }}" id="pdf" class="btn btn-success btns">PDF <i class="fa fa-thin fa-print fa-xl"></i></a>
            <a id="login" class="btn btns" data-bs-toggle="modal" href="#importData" role="button">{{ __('restaurent.exportexcel') }} <i class="fa-solid fa-file-excel fa-xl"></i></a>
            <a id="login" class="btn btns" href="{{ route('createRestaurentProduct') }}">{{ __('restaurent.addnewmeal') }}</a>
            <a href="#addSubCategory" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">{{ __('restaurent.addsubcategory') }}</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('restaurent.name') }}</th>
                        <th>{{ __('restaurent.sub_category') }}</th>
                        <th>{{ __('restaurent.price') }}</th>
                        <th>{{ __('restaurent.sold_quantity') }}</th>
                        <th>{{ __('restaurent.remaining_quantity') }}</th>
                        <th>{{ __('restaurent.rate') }}</th>
                        <th>{{ __('restaurent.control') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $key => $product)
                        <tr>
                            <th>{{ $product->random_id }}</th>
                            <td>
                                <a href="{{ route('RestaurentProductDetails', $product->id) }}" class="text-warning">{{ $product->name }}</a>
                            </td>
                            <td class="fw-bold">{{ $product->subCategory->name }}</td>
                            <td>{{ $product->price}}</td>
                            <td>{{ $product->sold_quantity}}</td>
                            <td>{{ $product->remaining_quantity}}</td>
                            <td><i class="fa fa-thin fa-star text-warning"></i>4.5</td>
                            <td>
                                <a href="{{ route('editRestaurentProduct', $product->id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                                <a href="#deleteProduct{{$product->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        {{-- deleteProduct --}}
                        <div class="modal fade border-0" id="deleteProduct{{$product->id}}" aria-hidden="true" aria-labelledby="deleteProductLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body text-center my-5">
                                        <h2>{{ __('restaurent.delete_question') }}</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.retreat') }}</button>
                                        <a href="{{ route('deleteRestaurentProduct', $product->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>

                                    </div>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                    @empty
                        <tr>
                            <th class="text-danger" colspan="10">
                                {{ __('restaurent.nodata') }}
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div> <!-- container -->
    </div> <!-- container -->
</section>


{{-- addCategoryName --}}
<div class="modal fade border-0" id="addCategoryName" aria-hidden="true" aria-labelledby="addCategoryNameLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createCategory') }}" method="post">
            @csrf
            <div class="modal-body">
                <h4 class="text-end">{{ __('restaurent.category_name_ar') }}</h4>
                <input type="text" name="name_ar" id="arabicNameInput" class="form-control rounded-0 mb-2">
                <p id="errorText_ar" class="error-message"></p>
            </div>

            <div class="modal-body mb-3">
                <h4 class="text-end">{{ __('restaurent.category_name_en') }}</h4>
                <input type="text" name="name_en" id="englishNameInput" class="form-control rounded-0 mb-2">
                <p id="errorText_en" class="error-message"></p>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- importExcel --}}
<div class="modal fade border-0" id="importData" aria-hidden="true" aria-labelledby="importDataLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('uploadtrestaurentExcel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body my-5">
                <input type="file" name="file" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</a>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">اضف</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

{{-- add sub category --}}
<div class="modal fade border-0" id="addSubCategory" aria-hidden="true" aria-labelledby="addSubCategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('addSubCategory') }}" method="POST">
        @csrf
            <div class="modal-body my-2">
                <h4 class="text-end">{{ __('restaurent.category_name') }}</h4>
                <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror">
                    <option value="" selected disabled>{{ __('restaurent.choose_category') }}</option>
                    @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <h4 class="text-end">{{ __('restaurent.sub_category_ar') }}</h4>
                <input type="text" name="name_ar" id="arabicSubInput" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">
                <p id="errorSub_ar" class="error-message"></p>

                <h4 class="text-end">{{ __('restaurent.sub_category_en') }}</h4>
                <input type="text" name="name_en" id="englishSubInput" class="form-control rounded-0 mb-4 mt-2 @error('name_en') is-invalid @enderror">
                <p id="errorSub_en" class="error-message"></p>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5">{{ __('restaurent.delete') }}</a>
                <button type="submit" id="package" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
            </div>
        </div> <!-- modal-content -->
    </form>
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


@endsection
