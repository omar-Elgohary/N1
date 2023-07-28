@extends('admin.layouts.app')
@section('title')
    {{ __('categories.categories') }}
@endsection

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

@if (session()->has('deleteCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deleteCategory') }}",
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
            <h2 class="text-black">{{ __('categories.categories') }}</h2>
        </div>

        <div class="col-6 text-start">
            <a href="#createEntertainmentCategory" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">{{ __('categories.add_category') }}</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>    
                        <th>#</th>
                        <th>{{ __('categories.category_name') }}</th>
                        <th>{{ __('categories.category_control') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $key => $category)
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>
                                <a href="{{ route('eventSubCategories', $category->id) }}" class="text-warning fw-bold">{{ $category->name }}</a>
                            </td>
                            <td>
                                <a href="#editEventCategory{{$category->id}}" class="btn bg-white text-success" data-bs-toggle="modal"><i class="fa fa-edit"></i></a>
                                <a href="#deleteEventCategory{{$category->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        {{-- deleteEventCategory --}}
                        <div class="modal fade border-0" id="deleteEventCategory{{$category->id}}" aria-hidden="true" aria-labelledby="deleteEventCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('deleteEventCategory', $category->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>{{ __('categories.cat_delete_question') }}</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <a type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</button>
                                    </div>
                            </form>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                        {{-- editEventCategory --}}
                        <div class="modal fade border-0" id="editEventCategory{{$category->id}}" aria-hidden="true" aria-labelledby="editEventCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('editEventCategory', $category->id) }}" method="post">
                                @csrf
                                    <div class="modal-body mb-2">
                                        <h4 class="text-end">{{ __('restaurent.category_name_ar') }}</h4>
                                        <input type="text" name="name_ar" class="form-control rounded-0" value="{{ $category->nameLocale('ar') }}">
                                    </div>
                        
                                    <div class="modal-body mb-2">
                                        <h4 class="text-end">{{ __('restaurent.category_name_en') }}</h4>
                                        <input type="text" name="name_en" class="form-control rounded-0" value="{{ $category->nameLocale('en') }}">
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <a type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</a>
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


{{-- createEntertainmentCategory --}}
<div class="modal fade border-0" id="createEntertainmentCategory" aria-hidden="true" aria-labelledby="createEntertainmentCategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createEntertainmentCategory') }}" method="post">
            @csrf
            <div class="modal-body mb-2">
                <h4 class="text-end">{{ __('restaurent.category_name_ar') }}</h4>
                <input type="text" name="name_ar" class="form-control rounded-0">
            </div>

            <div class="modal-body mb-2">
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

@endsection
