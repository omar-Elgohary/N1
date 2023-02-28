@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة كوبون جديد</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12">
                <input type="file" name="CouponPic" id="upload-custom">
                <label for="upload-custom" class="upload-lable text-center">
                    <i class="fa-solid fa-file-image"></i>
                    <h4 class="drag-text">اضغط أو اسحب الصورة الى هنا</h4>
                </label>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>كوبون الخصم</label>
                    <input type="text" name="discountCoupon" class="form-control mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>نسبة الخصم</label>
                    <input type="text" name="discountPercentage" class="form-control mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>تاريخ بداية تفعيل الكود</label>
                    <input type="date" name="startDate" class="form-control mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>تاريخ نهاية تفعيل الكود</label>
                    <input type="date" name="endDate" class="form-control mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>عدد المستخدمين</label>
                    <input type="text" name="usersCount" class="form-control mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>عدد مرات الاستخدام للشخص الواحد</label>
                    <input type="text" name="times" class="form-control mb-5 mt-2">
                </div> <!-- 6 -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <button id="login" type="submit" class="btn mb-3">اضافة</button>
            <button id="coupon" type="submit" class="btn">الغاء</button>
        </div>
    </div> <!-- container -->
</section>

@endsection
