@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة فعالية جديدة</h3>
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
                    <label>اسم الفعالية</label>
                    <input type="text" name="eventName" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="discription" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>سعر التذكرة</label>
                    <input type="text" name="ticketPrice" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>عدد التذاكر</label>
                    <input type="text" name="ticketsCount" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->


                <div>
                    <label>أنواع الحجز:</label>

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">لا يوجد
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->


                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">استاندرد
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">كبار الشخصيات
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div>

                <hr>

            <div class="row mt-5">
                <h5>أوقات الحجز</h5>
                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <input type="date" class="form-control rounded-0" name="startDate">
                    </div>

                    <div class="form-group mt-3">
                        <input type="date" class="form-control rounded-0" name="endDate">
                    </div>
                </div> <!-- col-6 -->

                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <input type="time" class="form-control rounded-0" name="startTime">
                    </div>

                    <div class="form-group mt-3">
                        <input type="time" class="form-control rounded-0" name="endTime">
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->

            <div class="mt-5">
                <h5>تاريخ بدء الحجوزات</h5>
                <p class="fs-6">سيتم نشر الفعالية وتفعيل حجز التتذاكر بناءا على التاريخ المحدد هنا</p>
                <div class="form-group mt-3">
                    <input type="date" class="form-control rounded-0" name="startDate">
                </div>
            </div>

            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="events" class="btn mb-3">اضافة</a>
            <a id="coupon" href="events" class="btn">الغاء</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
