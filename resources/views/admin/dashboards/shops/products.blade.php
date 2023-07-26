@extends('admin.layouts.app')
@section('title')
    {{ __('shop.products_menu') }}
@endsection

@if (session()->has('addSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة الفئة الفرعية بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('addCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة القسم بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('addShopProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة المنتج بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editShopProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل المنتج بنجاح ',
                type: "info"
            })
        }
    </script>
@endif

@if (session()->has('deleteShopProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم حذف المنتج بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('ExcelImported'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم رفع ملف الاكسيل بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@section('content')
<div class="col-12 d-flex flex-row-reverse text-end">
    <div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
				<i class="fas fa-regular fa-arrow-right"></i>
			</div>
		</div>

		<aside class="sidebar">
			<a href="{{ route('shopCategories') }}" class="fw-bold fs-5 text-success mb-5">{{ __('shop.categories') }}</a>
			<nav class="menu">
                <a href="{{ route('products') }}" class="menu-item {{ !request('category_id') ? 'is-active' : '' }}">{{ __('shop.all') }}</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="{{ route('filterShopProducts', $category->id) }}" class="menu-item {{ request('category_id') == $category->id ? 'is-active' : '' }}">
                        {{ $category->name}}
                    </a>
                @endforeach
                <a href="#addCategoryName" id="package" class="btn mt-3" data-bs-toggle="modal">{{ __("shop.add_category") }}</a>
			</nav>
		</aside>
	</div>


<section class="container col-lg-12">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">{{ __('shop.products_menu') }}</h2>
        </div>

        <div class="col-6 text-start">
            <a href="{{ route('ExportShopPDF') }}" id="pdf" class="btn btn-success btns">PDF <i class="fa fa-thin fa-print fa-xl"></i></a>
            <a id="login" class="btn btns" data-bs-toggle="modal" href="#importData" role="button">{{ __('restaurent.exportexcel') }}<i class="fa-solid fa-file-excel fa-xl"></i></a>
            <a id="login" class="btn btns" href="{{ route('createShopProduct') }}">{{ __('shop.add_new_product') }}</a>
            <a href="#addSubCategory" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">{{ __('restaurent.addsubcategory') }}</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('shop.product_name') }}</th>
                        <th>{{ __('shop.status') }}</th>
                        <th>{{ __('shop.price') }}</th>
                        <th>{{ __('shop.sub_category') }}</th>
                        <th>{{ __('shop.sold_quantity') }}</th>
                        <th>{{ __('shop.remaining_quantity') }}</th>
                        <th>{{ __('shop.rate') }}</th>
                        <th>{{ __('shop.control') }}</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->random_id }}</td>
                            <td>
                                <a href="{{ route('shopProductDetails', $product->id) }}" class="text-warning">{{ $product->name }}</a>
                            </td>
                            @if ($product->status == 'متوفر')
                                <td class="text-success fw-bold mx-5">{{ __('restaurent.available') }}</td>
                            @else
                                <td class="text-danger fw-bold mx-5">{{ __('restaurent.notavailable') }}</td>
                            @endif
                            <td>{{ $product->price }}</td>
                            <td class="fw-bold">{{ $product->subCategory->name }}</td>
                            <td>{{ $product->sold_quantity }}</td>
                            <td>{{ $product->remaining_quantity }}</td>
                            <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                            <td>
                                <a href="{{route('editShopProduct', $product->id)}}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                                <a href="#deleteProduct{{$product->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
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

        <form action="{{route('createShopCategory')}}" method="POST">
            @csrf

            <div class="modal-body mb-2">
                <h4 class="text-end">{{ __('restaurent.category_name_ar') }}</h4>
                <input type="text" name="name_ar" class="form-control rounded-0">
            </div>

            <div class="modal-body mb-3">
                <h4 class="text-end">{{ __('restaurent.category_name_en') }}</h4>
                <input type="text" name="name_en" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->



{{-- edit category name --}}
<div class="modal fade border-0" id="editCategoryName" aria-hidden="true" aria-labelledby="editCategoryNameLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body my-5">
                <h4 class="text-end">اسم القسم</h4>
                <input type="text" name="CategoryName" class="form-control rounded-0" value="المشروبات">
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <a href="#" id="coupon" class="btn px-5">حذف</a>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">تعديل</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- deleteProduct --}}
<div class="modal fade border-0" id="deleteProduct{{$product->id}}" aria-hidden="true" aria-labelledby="deleteProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2>{{ __('shop.delete_question') }}</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                <a href="{{route('deleteShopProduct', $product->id)}}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>

            </div>
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

        <form action="{{ route('uploadShopExcel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body my-5">
                <input type="file" name="file" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
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
            <div class="modal-body my-3">
                <h4 class="text-end">{{ __('restaurent.category_name') }}</h4>
                <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror">
                    <option value="" selected disabled>{{ __('restaurent.choose_category') }}</option>
                    @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                    <h4 class="text-end">{{ __('restaurent.sub_category_ar') }}</h4>
                    <input type="text" name="name_ar" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">

                    <h4 class="text-end">{{ __('restaurent.sub_category_en') }}</h4>
                    <input type="text" name="name_en" class="form-control rounded-0 mb-4 mt-2 @error('name_en') is-invalid @enderror">
                </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                <button type="submit" id="package" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
            </div>
        </div> <!-- modal-content -->
    </form>
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

<script>
    // document.addEventListener("DOMContentLoaded", ()=>{
    //     const row = document.querySelectorAll("tr[data-href]");

    //     row.forEach(row =>{
    //         row.addEventListener("click", ()=>{
    //             window.location.href = row.dataset.href;
    //         })
    //     });
    // });
</script>

@endsection
