@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">تعديل معلومات الفرع</h2>
            </div>
        </div> <!-- row -->

        <form action="#" method="post">
            <div class="mt-lg-0 text-end">

                <div class="form-group text-center">
                    <img src="{{ asset("images/NoPath - Copy (35).png") }}" width="150" height="150" alt="">
                </div>

                <div class="row d-flex justify-content-center col-12">
                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <label class="mb-3">موقع الفرع</label>
                            <input type="text" class="form-control rounded-0" name="location" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="text-black mb-3">رقم الجوال</label>
                            <input type="number" class="form-control rounded-0" name="phone" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">نهاية وقت الدوام</label>
                            <input type="text" class="form-control rounded-0" name="end_hour" required>
                        </div>
                    </div> <!-- col-6 -->

                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <label class="mb-3">عنوان الفرع</label>
                            <input type="text" class="form-control rounded-0" name="CompanyName" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">البريد الالكتروني</label>
                            <input type="email" class="form-control rounded-0" name="email" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="mb-3">بداية وقت الدوام</label>
                            <input type="text" class="form-control rounded-0" name="start_hour" required>
                        </div>

                    <div class="mt-5">
                        <h4>:امكانية التوصيل</h4>

                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">خدمة الاستلام من الفرع
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div> <!-- 2 -->

                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">خدمة التوصيل الى العميل
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div> <!-- 2 -->
                    </div> <!-- col-4 -->

                </div> <!-- row -->
            </form>
            <div class="text-center d-flex justify-content-evenly mt-5">
                <a id="login" href="allBranches" class="btn px-5">حفظ التعديلات</a>
                <a id="coupon" href="changePassword" class="btn">تغيير كلمة المرور</a>
            </div>

        </div>
    </div> <!-- container -->
</section>

@endsection
