@extends('admin.layouts.app')
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
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
			</nav>
		</aside>
	</div>


<section class="container col-10">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">قائمة الفعاليات</h2>
        </div>

        <div class="col-6 text-start mb-3">
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
    <div class="container">
        <div class="mb-5">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الفعالية</th>
                        <th>حالة الحجز</th>
                        <th>تاريخ النشر</th>
                        <th>سعر التذكرة</th>
                        <th>التذاكر المحجوزة</th>
                        <th>التفاصيل</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>10365464</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a href="EntertainmentAdminDetails" class="btn"><i class="fa fa-eye text-warning"></i></a>
                        </td>
                    </tr>
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

            <div class="modal-body my-5">
                <h4 class="text-end">اسم الفئة</h4>
                <select type="text" name="CategoryName" class="form-control">
                    <option value="">اختر اسم الفئة</option>
                </select>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</button>
                <a href="products" id="package" type="button" class="btn btn-block px-5 text-white">اضف</a>
            </div>
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
                <input type="text" name="CategoryName" class="form-control">
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <a href="#" id="coupon" class="btn px-5">حذف</a>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">تعديل</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- deleteProduct --}}
<div class="modal fade border-0" id="deleteProduct" aria-hidden="true" aria-labelledby="deleteProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2>هل أنت متأكد من حذف هذا المنتج؟</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>

            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
