@extends('admin.layouts.app')
@section('title')
    قائمة الفعاليات
@endsection

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


@section('content')
<div class="col-12 d-flex flex-row-reverse text-end">
    <div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
				<i class="fas fa-regular fa-arrow-right"></i>
			</div>
		</div>

		<aside class="sidebar">
			<h3 class="text-black">المقرات</h3>
			<nav class="menu">
				<a href="#" class="menu-item is-active">الكل</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="#" class="menu-item">{{ $category->name}}</a>
                @endforeach
                <a href="#addCategoryName" id="package" class="btn mt-3" data-bs-toggle="modal">اضافة مقر جديد</a>
			</nav>
		</aside>
	</div>


<section class="container col-lg-12">
    <div class="container">
    <div class="col-lg-12 col-md-10 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">قائمة الفعاليات</h2>
        </div>

        <div class="col-6 text-start">
            <a href="#" id="pdf" class="btn btn-success btns">PDF <i class="fa fa-thin fa-print fa-xl"></i></a>
            <a id="login" class="btn btns" data-bs-toggle="modal" href="#" role="button">استيراد من اكسل<i class="fa-solid fa-file-excel fa-xl"></i></a>
            <a id="login" class="btn btns" href="{{ route('createEvent') }}">اضافة فعالية جديدة</a>
            {{-- <a href="#editCategoryName" id="coupon" class="btn btn-block btn-bordered btns" data-bs-toggle="modal">تعديل اسم المقر</a> --}}
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الفعالية</th>
                        <th>حالة الحجز</th>
                        <th>القسم</th>
                        <th>تاريخ النشر</th>
                        <th>سعر التذكرة</th>
                        <th>التذاكر المحجوزة</th>
                        <th>التحكم بالمنتج</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($events as $key => $event)
                        <tr>
                            <th>{{ $event->random_id }}</th>
                            <td>
                                <a href="{{ route('RestaurentProductDetails', $event->id) }}" class="text-warning">{{ $event->event_name}}</a>
                            </td>

                            @if($event->status == 'لم يبدأ')
                                <td class="text-secondary">{{ $event->status }}</td>
                            @elseif($event->status == 'منتهي')
                                <td class="text-dark">{{ $event->status }}</td>
                            @elseif($event->status == 'متوقف')
                                <td class="text-danger">{{ $event->status }}</td>
                            @else
                                <td class="text-success">{{ $event->status }}</td>
                            @endif

                            <td>{{ $event->category->name}}</td>
                            <td>{{ $event->start_reservation_date}}</td>
                            <td>{{ $event->ticket_price}}</td>
                            <td>{{ $event->tickets_sold_quantity}} / {{ $event->tickets_quantity}}</td>
                            <td>
                                <a href="{{ route('editRestaurentProduct', $event->id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
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
                                        <h2>هل أنت متأكد من حذف هذا المنتج؟</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                                        <a href="{{ route('deleteEvent', $event->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>

                                    </div>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                    @empty
                        <tr>
                            <th class="text-danger" colspan="10">
                                لا يوجد بيانات
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
                <div class="modal-body my-5">
                    <h4 class="text-end">اسم القسم</h4>
                    <input type="text" name="name" class="form-control rounded-0">
                </div>

                <div class="d-flex justify-content-around mb-5">
                    <button href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</button>
                    <button id="package" type="submit" class="btn btn-block px-5 text-white">اضف</button>
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
                <h2>هل أنت متأكد من حذف هذا الفعالية؟</h2>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>

            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
