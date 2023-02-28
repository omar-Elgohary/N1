@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تعديل المنتج</h3>
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

                <div class="form-group">
                    <label>عدد السعرات الحرارية</label>
                    <input type="text" name="calories" placeholder="كالوري" class="form-control rounded-0 mb-4 mt-2">
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

                <div class="without my-4">
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
            <a id="login" href="menuDetails" class="btn mb-3">حفظ التعديلات</a>
            <a href="#deleteProduct" id="coupon"  class="btn px-5" data-bs-toggle="modal">حذف المنتج</a>
        </div>
    </div> <!-- container -->
</section>

{{-- deleteProduct --}}
<div class="modal fade" id="deleteProduct" aria-hidden="true" aria-labelledby="deleteProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered rounded-0">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h3>هل أنت متأكد من حذف هذا الكوبون؟</h3>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
