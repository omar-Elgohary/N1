@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تفاصيل المنتج</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('images/Mask Group 8511.png') }}" class="m-1 mt-0" height="150" alt="">
                <img src="{{ asset('images/Mask Group 8512.png') }}" class="m-1 mt-0" height="150" alt="">
                <img src="{{ asset('images/Mask Group 8513.png') }}" class="m-1 mt-0" height="150" alt="">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>الحالة</label>
                    <label class="text-danger fw-bold mx-5">غير منشور</label>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>الاسم</label>
                    <label class="mx-5">اسم المنتج</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>الوصف</label>
                    <label class="mx-5">وصف قصير للمنتج ومكوناته</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>السعر</label>
                    <label class="mx-5">45 ريال سعودي</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>السعرات</label>
                    <label class="mx-5">250 كالوري</label>
                </div> <!-- 5 -->

                <hr>

                <h4>الاضافات الممكنة:</h4>
                <div class="form-group my-4">
                    <label class="fw-bold">صوص</label>
                    <label class="mx-5">السعر 54 ريال سعودي</label>
                </div> <!-- 6 -->

                <div class="form-group my-4">
                    <label class="fw-bold">بطاطس</label>
                    <label class="mx-5">السعر 54 ريال سعودي</label>
                </div> <!-- 7 -->

                <div class="form-group my-4">
                    <label class="fw-bold">زيادة جبن</label>
                    <label class="mx-5">السعر 54 ريال سعودي</label>
                </div> <!-- 8 -->

            <hr>

                <h4>المكونات التي يمكن حذفها:</h4>
                <div class="form-group my-4">
                    <label class="fw-bold">البصل</label>
                </div> <!-- 6 -->

                <div class="form-group my-4">
                    <label class="fw-bold">البيض</label>
                </div> <!-- 7 -->

                <div class="form-group my-4">
                    <label class="fw-bold">الجبن</label>
                </div> <!-- 8 -->
            </div> <!-- col-4 -->
        </form>

        <div class="d-flex justify-content-evenly mt-5">
            <a id="login" href="RestaurantAdminDetails" class="btn px-5">نشر المنتج في الفرع</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
