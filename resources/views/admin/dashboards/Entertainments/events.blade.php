@extends('admin.layouts.app')
@section('title')
    {{ __('events.List_of_events') }}
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

@if (session()->has('addEvent'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة الفعالية بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editEvent'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل الفعالية بنجاح ',
                type: "primary"
            })
        }
    </script>
@endif

@if (session()->has('deactivationEvent'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم ايقاف نشر الفعالية بنجاح',
                type: "info"
            })
        }
    </script>
@endif

@if (session()->has('activationEvent'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اعادة نشر الفعالية بنجاح',
                type: "info"
            })
        }
    </script>
@endif

@if (session()->has('deleteEvent'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم حذف الفعالية بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('ErrorName'))
    <script>
        window.onload = function() {
            notif({
                msg: 'يجب ادخال اسم القسم',
                type: "error"
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
			<a href="{{ route('eventCategories') }}" class="fw-bold fs-5 text-success mb-5">{{ __('events.categories') }}</a>
			<nav class="menu">
                <a href="{{ route('events') }}" class="menu-item {{ !request('category_id') ? 'is-active' : '' }}">{{ __('restaurent.all') }}</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="{{ route('filterEventProducts', $category->id) }}" class="menu-item {{ request('category_id') == $category->id ? 'is-active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
                <a href="#addCategoryName" id="package" class="btn mt-3" data-bs-toggle="modal">{{ __('events.add_new_category') }}</a>
			</nav>
		</aside>
	</div>


<section class="container col-lg-12">
    <div class="container">
    <div class="col-lg-12 col-md-10 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">{{ __('events.List_of_events') }}</h2>
        </div>

        <div class="col-6 text-start">
            <a href="{{ route('ExportEventPDF') }}" id="pdf" class="btn btn-success btns">PDF <i class="fa fa-thin fa-print fa-xl"></i></a>
            <a id="login" class="btn btns" data-bs-toggle="modal" href="#importData" role="button">{{ __('restaurent.exportexcel') }}<i class="fa-solid fa-file-excel fa-xl"></i></a>
            <a id="login" class="btn btns" href="{{ route('createEvent') }}">{{ __('events.add_new_event') }}</a>
            <a href="#addSubCategory" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">{{ __('restaurent.addsubcategory') }}</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('events.event_name') }}</th>
                        <th>{{ __('events.reservation_status') }}</th>
                        <th>{{ __('events.category') }}</th>
                        <th>{{ __('events.publish_date') }}</th>
                        <th>{{ __('events.ticket_price') }}</th>
                        <th>{{ __('events.reservation_tickets') }}</th>
                        <th>{{ __('events.product_control') }}</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($events as $key => $event)
                    <tr>
                        <th>{{ $event->random_id }}</th>
                        <td>
                            <a href="{{ route('eventDetails', $event->id) }}" class="text-warning">{{ $event->name }}</a>
                        </td>

                        @if($event->status == 'لم يبدأ')
                            <td class="text-secondary">{{ __('events.didnt_start') }}</td>
                        @elseif($event->status == 'منتهي')
                            <td class="text-dark">{{ __('events.finished') }}</td>
                        @elseif($event->status == 'متوقف')
                            <td class="text-danger">{{ __('events.stopped') }}</td>
                        @else
                            <td class="text-success">{{ __('events.available') }}</td>
                        @endif

                        <td class="fw-bold">{{ $event->subCategory->name }}</td>
                        <td>{{ date('Y-m-d' , strtotime($event->start_reservation_date)) }}
                        <td>{{ $event->ticket_price}}</td>
                        <td>{{ $event->tickets_sold_quantity}} / {{ $event->tickets_quantity}}</td>
                        <td>
                            <a href="{{ route('editEvent', $event->id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            <a href="#deleteEvent{{$event->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                        {{-- deleteEvent --}}
                        <div class="modal fade border-0" id="deleteEvent{{$event->id}}" aria-hidden="true" aria-labelledby="deleteProductLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body text-center my-5">
                                        <h2>{{ __('events.delete_question') }}</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</button>
                                        <a href="{{ route('deleteEvent', $event->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>
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
    </div>
    </div> <!-- container -->
</section>


{{-- addCategoryName --}}
<div class="modal fade border-0" id="addCategoryName" aria-hidden="true" aria-labelledby="addCategoryNameLabel" tabindex="-1" dir="rtl">
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
                <h4 class="text-end">اسم المقر</h4>
                <input type="text" class="form-control">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5">حذف</a>
                <a href="FoodMenu" id="package" type="button" class="btn btn-block px-5 text-white">تعديل</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- deleteEvent --}}
<div class="modal fade border-0" id="deleteEvent" aria-hidden="true" aria-labelledby="deleteEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center fw-bold my-5">
                <h2>{{ __('events.delete_event_question') }}</h2>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</button>
                <a href="{{ route('deleteEvent', $event->id) }}" id="package" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>

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

        <form action="{{ route('uploadEventExcel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body my-5">
                <input type="file" name="file" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</button>
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

@endsection
