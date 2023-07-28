@extends('admin.layouts.app')
@section('title')
    {{ __('categories.sub_categories') }}
@endsection

@if (session()->has('nameRequired'))
    <script>
        window.onload = function() {
            notif({ 
                msg: "{{ __('messages.nameRequired') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('nameRequiredEn'))
    <script>
        window.onload = function() {
            notif({ 
                msg: "{{ __('messages.nameRequiredEn') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('nameRequiredAr'))
    <script>
        window.onload = function() {
            notif({ 
                msg: "{{ __('messages.nameRequiredAr') }}",
                type: "error"
            })
        }
    </script>
@endif

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

@if (session()->has('editSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editSubCategory') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deleteSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deleteSubCategory') }}",
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
	</div>


<section class="container col-lg-12">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">{{ __('categories.sub_categories_of') }} <span class="text-primary">{{ $category->name }}</span></h2>
        </div>

        <div class="col-6 text-start">
            <a href="#addSubCategory{{$category->id}}" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">{{ __('restaurent.addsubcategory') }}</a>
            <a href="{{ route('restaurentCategories') }}" id="package" class="btn btn-block btn-bordered px-4 btns">{{ __('categories.categories') }}</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('categories.sub_category_name') }}</th>
                        <th>{{ __('categories.control') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($subCategories as $key => $subCategory)
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>{{ $subCategory->name }}</td>
                            <td>
                                <a href="#editSubCategory{{$subCategory->id}}" class="btn bg-white text-success" data-bs-toggle="modal"><i class="fa fa-edit"></i></a>
                                <a href="#deleteSubCategory{{$subCategory->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        {{-- deleteSubCategory --}}
                        <div class="modal fade border-0" id="deleteSubCategory{{$subCategory->id}}" aria-hidden="true" aria-labelledby="deleteSubCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('deleteSubCategory', $subCategory->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>{{ __('categories.delete_subcat_question') }}</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</button>
                                    </div>
                            </form>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                        {{-- editSubCategory --}}
                        <div class="modal fade border-0" id="editSubCategory{{$subCategory->id}}" aria-hidden="true" aria-labelledby="editSubCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('editSubCategory', $subCategory->id) }}" method="post">
                                @csrf
                                <div class="modal-body my-3">
                                    <h4 class="text-end">{{ __('restaurent.category_name') }}</h4>
                                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror">
                                        <option value="{{ $subCategory->id }}" selected>{{ $category->name }}</option>
                                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    <h4 class="text-end">{{ __('restaurent.sub_category_ar') }}</h4>
                                    <input type="text" name="name_ar" value="{{ $subCategory->nameLocale('ar') }}" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">

                                    <h4 class="text-end">{{ __('restaurent.sub_category_en') }}</h4>
                                    <input type="text" name="name_en" value="{{ $subCategory->nameLocale('en') }}" class="form-control rounded-0 mb-2 mt-2 @error('name_en') is-invalid @enderror">
                                </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('categories.edit') }}</button>
                                    </div>
                            </form>
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


{{-- addSubCategory --}}
<div class="modal fade border-0" id="addSubCategory{{$category->id}}" aria-hidden="true" aria-labelledby="addSubCategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createSubCategory', $category->id) }}" method="post">
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
                <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.add') }}</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
