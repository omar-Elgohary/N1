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
			<h3 class="text-black">الفئات</h3>
			<nav class="menu">
				<a href="#" class="menu-item is-active">الكل</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
				<a href="#" class="menu-item">الفئة الفرعية 2</a>
                <a href="#addCategoryName" id="package" class="btn mt-3" data-bs-toggle="modal">اضافة فئة جديد</a>
			</nav>
		</aside>
	</div>


<section class="container col-lg-12">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">قائمة المنتجات</h2>
        </div>

        <div class="col-6 text-start">
            <a href="#" id="pdf" class="btn btn-success btns">PDF <i class="fa fa-thin fa-print fa-xl"></i></a>
            <a id="login" class="btn btns" data-bs-toggle="modal" href="#" role="button">استيراد من اكسل<i class="fa-solid fa-file-excel fa-xl"></i></a>
            <a id="login" class="btn btns" href="createShopProduct">اضافة منتج جديد</a>
            <a href="#editCategoryName" id="coupon" class="btn btn-block btn-bordered btns" data-bs-toggle="modal">تعديل اسم الفئة</a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                        <th>الحالة</th>
                        <th>السعر</th>
                        <th>الكمية المباعة</th>
                        <th>الفئة</th>
                        <th>تقييم المنتج</th>
                        <th>التحكم بالمنتج</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-href="productDetails">
                        <td>1</td>
                        <td>Mark</td>
                        <td>متوفر</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>Mark</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="editShopProduct" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            <a href="#deleteProduct" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
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

            <div class="modal-body my-5">
                <h4 class="text-end">اسم الفئة</h4>
                <select type="text" name="CategoryName" class="form-control rounded-0">
                    <option value="">اختر اسم الفئة</option>
                </select>
            </div>

            <div class="d-flex justify-content-around mb-5">
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
