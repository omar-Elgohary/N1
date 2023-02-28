@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة منتج جديد</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12">
                <input type="file" name="CouponPic" id="upload-custom" multiple>
                <label for="upload-custom" class="upload-lable text-center">
                    <i class="fa-solid fa-file-image"></i>
                    <h4 class="drag-text">اضغط أو اسحب الصورة الى هنا</h4>
                </label>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="productName" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="discription" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>السعر</label>
                    <input type="text" name="price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>عدد السعرات الحرارية</label>
                    <input type="text" name="calories" placeholder="كالوري" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 4 -->

                <hr>

                <div class="extra">
                    <h5>الاضافات:</h5>

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">صوص
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">بطاطس
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">زيادة جبن
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div> <!-- extra -->

                <hr>

                <div class="without">
                    <h5>بدون:</h5>
                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">بصل
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">طماطم
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">جبن
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div> <!-- without -->

                <div class="form-group">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>

                <hr>

                <h5 class="fw-bold">الفروع التي توفر المنتج:</h5>
                <div class="branches">

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">الفرع الأول
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">الفرع الثاني
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black pb-3">الفرع الثالث
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div> <!-- branches -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="FoodMenu" class="btn mb-3">اضافة</a>
            <a id="coupon" href="FoodMenu" class="btn">الغاء</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
