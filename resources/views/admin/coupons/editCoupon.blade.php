@extends('admin.layouts.app')
@section('title')
    تعديل كوبون
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تعديل معلومات الكوبون</h3>
        </div>

        <form action="{{ route('updateCoupon', $coupon->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <img src="{{ asset('assets/images/offers/'.$coupon->image) }}" style="width: 100%" alt="">
                </div>

                <div class="col-lg-6 mt-3">
                    <input type="file" name="CouponPic" id="upload-custom">
                    <label for="upload-custom" class="upload-lable text-center w-50">
                        <i class="fa-solid fa-file-image"></i>
                        <h4 class="drag-text">تغيير الصورة</h4>
                    </label>
                </div>
            </div> <!-- row -->

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>كوبون الخصم</label>
                    <input type="text" name="discount_coupon" value="{{$coupon->discount_coupon}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>نسبة الخصم</label>
                    <input type="text" name="discount_percentage" value="{{$coupon->discount_percentage}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>تاريخ بداية تفعيل الكود</label>
                    <input type="date" name="start_date" value="{{$coupon->start_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>تاريخ نهاية تفعيل الكود</label>
                    <input type="date" name="end_date" value="{{$coupon->end_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>عدد المستخدمين</label>
                    <input type="text" name="users_count" value="{{$coupon->users_count}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>عدد مرات الاستخدام للشخص الواحد</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" value="{{$coupon->how_many_times_user_use_this_coupon}}" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 6 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">حفظ التعديلات</button>
                <a href="{{ route('alloffers') }}" id="coupon" class="btn">الغاء</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
