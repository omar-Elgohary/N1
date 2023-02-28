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
                    <label class="text-success mx-5">منشور</label>
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
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>الاضافات الممكنة:</h4>
                <div class="form-group my-4">
                    <label>صوص</label>
                    <label class="mx-5">السعر 55 ريال سعودي</label>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>بطاطس</label>
                    <label class="mx-5">السعر 55 ريال سعودي</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>زيادة جبن</label>
                    <label class="mx-5">السعر 55 ريال سعودي</label>
                </div> <!-- 3 -->
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>المكونات التي يمكن حذفها:</h4>
                <div class="form-group my-4">
                    <p>البصل</p>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <p>البيض</p>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <p>الجبن</p>
                </div> <!-- 3 -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="editProduct" class="btn mb-3">تعديل معلومات المنتج</a>
            <a id="coupon" href="DeactivationProduct" class="btn">الغاء نشر المنتج</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
