@extends('admin.layouts.app')
@section('title')
    المنيو
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

@if (session()->has('editCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل القسم بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deleteCategory'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم حذف القسم بنجاح ',
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
            <h2 class="text-black">جميع الأقسام</h2>
        </div>

        <div class="col-6 text-start">
            <a href="#createShopCategory" id="coupon" class="btn btn-block btn-bordered px-4 btns" data-bs-toggle="modal">اضافة قسم</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>التحكم بالقسم</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $key => $category)
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <td>
                                <a href="{{ route('shopSubCategories', $category->id) }}" class="text-warning fw-bold">{{ $category->name }}</a>
                            </td>
                            <td>
                                <a href="#editShopCategory{{$category->id}}" class="btn bg-white text-success" data-bs-toggle="modal"><i class="fa fa-edit"></i></a>
                                <a href="#deleteShopCategory{{$category->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        {{-- deleteShopCategory --}}
                        <div class="modal fade border-0" id="deleteShopCategory{{$category->id}}" aria-hidden="true" aria-labelledby="deleteShopCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('deleteShopCategory', $category->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>هل أنت متأكد من حذف هذا القسم؟</h2>
                                    </div>

                                    <div class="d-flex justify-content-around mb-5">
                                        <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                                        <button id="package" type="submit" class="btn btn-block px-5 text-white">حذف</button>
                                    </div>
                            </form>
                                </div> <!-- modal-content -->
                            </div> <!-- modal-dialog -->
                        </div> <!-- modal fade -->

                        {{-- editShopCategory --}}
                        <div class="modal fade border-0" id="editShopCategory{{$category->id}}" aria-hidden="true" aria-labelledby="editShopCategoryLabel" tabindex="-1" dir="rtl">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="btn-x modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <form action="{{ route('editShopCategory', $category->id) }}" method="post">
                                @csrf
                                    <div class="modal-body text-center my-5">
                                        <h2>اسم القسم</h2>
                                        <input type="text" name="name" class="form-control rounded-0" value="{{ $category->name }}">
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


{{-- createShopCategory --}}
<div class="modal fade border-0" id="createShopCategory" aria-hidden="true" aria-labelledby="createShopCategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createShopCategory') }}" method="post">
            @csrf
            <div class="modal-body my-5">
                <h4 class="text-end">اسم القسم</h4>
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
