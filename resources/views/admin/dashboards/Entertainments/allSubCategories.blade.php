@extends('admin.layouts.app')
@section('title')
    الفئات الفرعية
@endsection

@if (session()->has('nameRequired'))
    <script>
        window.onload = function() {
            notif({
                msg: 'يجب ادخال اسم الفئة',
                type: "error"
            })
        }
    </script>
@endif

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

@if (session()->has('editSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل الفئة الفرعية بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deleteSubCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم حذف الفئة الفرعية بنجاح ',
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
            <h2 class="text-black">الفئات الفرعية الخاصة بالقسم {{ $category->name }}</h2>
        </div>

        <div class="col-6 text-start">
            <a href="#createEventSubCategory{{$category->id}}" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">اضافة فئة فرعية</a>
            <a href="{{ route('eventCategories') }}" id="package" class="btn btn-block btn-bordered px-4 btns">جميع الأقسام</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الفئة الفرعية</th>
                        <th>الادارة</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($subCategories as $key => $subCategory)
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>{{ $subCategory->name }}</td>
                            <td>
                                <a href="#editEventSubCategory{{$subCategory->id}}" class="btn bg-white text-success" data-bs-toggle="modal"><i class="fa fa-edit"></i></a>
                                <a href="#deleteEventSubCategory{{$subCategory->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        {{-- deleteEventSubCategory --}}
                        <div class="modal fade border-0" id="deleteEventSubCategory{{$subCategory->id}}" aria-hidden="true" aria-labelledby="deleteEventSubCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('deleteEventSubCategory', $subCategory->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>هل أنت متأكد من حذف هذه الفئة؟</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">حذف</button>
                                    </div>
                            </form>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                        {{-- editEventSubCategory --}}
                        <div class="modal fade border-0" id="editEventSubCategory{{$subCategory->id}}" aria-hidden="true" aria-labelledby="editEventSubCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('editEventSubCategory', $subCategory->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>اسم الفئة</h2>
                                        <input type="text" name="name" class="form-control rounded-0" value="{{ $subCategory->name }}">
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">تعديل</button>
                                    </div>
                            </form>
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
    </div> <!-- container -->
</section>


{{-- createEventSubCategory --}}
<div class="modal fade border-0" id="createEventSubCategory{{$category->id}}" aria-hidden="true" aria-labelledby="createEventSubCategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createEventSubCategory', $category->id) }}" method="post">
            @csrf
            <div class="modal-body my-5">
                <h4 class="text-end">اسم الفئة</h4>
                <input type="text" name="name" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <a href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</a>
                <button id="package" type="submit" class="btn btn-block px-5 text-white">اضف</button>
            </div>
        </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
