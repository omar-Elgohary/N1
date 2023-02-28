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
                    <label class="text-success fw-bold -bold mx-5">متوفر</label>
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
                    <label>المقاس</label>
                    <label class="mx-5">M</label>
                </div> <!-- 5 -->

                <div class="form-group my-4">
                    <label>اللون</label>
                    <label class="mx-5">رمادي</label>
                </div> <!-- 6 -->

                <div class="form-group my-4">
                    <label>الفئة</label>
                    <label class="mx-5">النساء</label>
                </div> <!-- 7 -->

                <div class="form-group my-4">
                    <label>المتوفر</label>
                    <label class="mx-5">10 منتجات</label>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>هل من الممكن اعادة المنتج؟</label>
                    <label class="fw-bold mx-5">نعم خلال 7 أيام</label>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>هل يوجد ضمان للمنتج؟</label>
                    <label class="fw-bold mx-5">نعم مدة 3 شهور</label>
                </div> <!-- 2 -->
            </div> <!-- col-4 -->


            <div class="col-lg-8 mt-3">
                <div class="form-group my-4 d-flex">
                    <div class="col-3">
                        <p>الفروع التي توفر المنتج:</p>
                    </div>

                    <div class="col-5">
                        <table class="table">
                            <thead style="background-color: #fff">
                                <tr>
                                    <th>عنوان الفرع</th>
                                    <th>عدد المنتجات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>الفرع الأول</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- 1 -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="editShopProduct" class="btn mb-3">التعديل</a>
            <a href="#DeactivationProduct" id="coupon" class="btn px-5" data-bs-toggle="modal">الغاء نشر المنتج</a>
        </div>
    </div> <!-- container -->
</section>


{{-- DeactivationProduct --}}
<div class="modal fade border-0" id="DeactivationProduct" aria-hidden="true" aria-labelledby="DeactivationProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-auto my-5">
                <h4 class="text-end text-black fw-bold">هل أنت متأكد من الغاء نشر هذا المنتج؟</h4>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button href="#" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="DeactivationShopProduct" id="package" type="button" class="btn btn-block px-5 text-white">تأكيد الغاء النشر</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
