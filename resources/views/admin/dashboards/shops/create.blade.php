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

            <div class="col-lg-4 mt-3">
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

                <label>المقاس</label>
                <div class="form-group d-flex justify-content-evenly">
                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        M
                    </div>

                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        L
                    </div>

                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        XL
                    </div>
                </div> <!-- 4 -->

                <label>الألوان</label>
                <div class="form-group d-flex justify-content-evenly">
                    <div class="card text-center rounded-0 bg-warning col-2 mb-4 mt-3">
                        orange
                    </div>

                    <div class="card text-center rounded-0 bg-success col-2 mb-4 mt-3">
                        green
                    </div>

                    <div class="card text-center rounded-0 bg-primary col-2 mb-4 mt-3">
                        blue
                    </div>
                </div> <!-- 5 -->

                <hr>

                <div>
                    <label>هل من الممكن اعادة المنتج؟</label>

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-4">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>


                <div class="mt-5">
                    <label>فئة المنتج:</label>

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-4">
                        <label>النساء</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>الرجال</label>
                    </div> <!-- 2 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>أطفال - أولاد</label>
                    </div> <!-- 3 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>أطفال - بنات</label>
                    </div> <!-- 4 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>مواليد</label>
                    </div> <!-- 5 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>غير محدد</label>
                    </div> <!-- 6 -->
                </div>

                <div class="mt-5">
                    <label>هل يوجد ضمان للمنتج؟</label>

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-4">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>

                <div class="mt-5">
                    <label>عدد البضاعة المتوفرة</label>
                        <input type="text" class="form-control rounded-0 mt-3">
                </div>

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>

                <div class="branches mt-5">
                    <label>الفروع التي توفر المنتج:</label>

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
            <a id="login" href="productDetails" class="btn mb-3">اضافة</a>
            <a id="coupon" href="products" class="btn">الغاء</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
