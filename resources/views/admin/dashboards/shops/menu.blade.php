@extends('admin.layouts.app')
@section('title')
    قائمة المنتجات
@endsection

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
				<a href="#" class="menu-item">لا توجد أقسام</a>

			</nav>
		</aside>
	</div>

<section class="container col-10">
    <div class="container">
    <div class="section-title text-end">
        <h2 class="text-black">قائمة المنتجات</h2>
    </div>


    <div class="text-center mt-4">
        <h2>ابدأ باضافة منتجاتك</h2>
        <a id="login" class="btn mt-2 px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">اضافة فئة جديدة</a>
    </div>
    </div> <!-- container -->
</section>
</div><!-- col-12 -->



<div class="modal fade" id="staticBackdrop" aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered rounded-0">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createShopCategory') }}" method="POST">
            @csrf
            <div class="modal-body col-6 text-end m-auto my-5">
                <label><h3>اسم الفئة</h3></label>
                <input type="text" name="name" class="form-control rounded-0">
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</button>
                <button type="submit" id="package" class="btn btn-block px-5 text-white">اضف</button>
            </div>
        </form>
    </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


@endsection
