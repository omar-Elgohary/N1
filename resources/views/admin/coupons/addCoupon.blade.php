@extends('admin.layouts.app')
@section('title')
    اضافة كوبون
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة كوبون جديد</h3>
        </div>

        <form action="{{ route('addCoupon') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">اضغط أو اسحب الصور الى هنا</span>
                        <input type="file" name="image" class="drop-zone__input @error('image') is-invalid @enderror" multiple>
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>كوبون الخصم</label>
                    <input type="text" name="discount_coupon" class="form-control mb-4 mt-2 @error('discount_coupon') is-invalid @enderror">
                    @error('discount_coupon')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>نسبة الخصم</label>
                    <input type="text" name="discount_percentage" class="form-control mb-4 mt-2 @error('discount_percentage') is-invalid @enderror">
                    @error('discount_percentage')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>تاريخ بداية تفعيل الكود</label>
                    <input type="date" name="start_date" class="form-control mb-4 mt-2 @error('start_date') is-invalid @enderror">
                    @error('start_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>تاريخ نهاية تفعيل الكود</label>
                    <input type="date" name="end_date" class="form-control mb-4 mt-2 @error('end_date') is-invalid @enderror">
                    @error('end_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>عدد المستخدمين</label>
                    <input type="text" name="users_count" class="form-control mb-4 mt-2 @error('users_count') is-invalid @enderror">
                    @error('users_count')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>عدد مرات الاستخدام للشخص الواحد</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" class="form-control mb-5 mt-2 @error('how_many_times_user_use_this_coupon') is-invalid @enderror">
                    @error('how_many_times_user_use_this_coupon')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 6 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">اضافة</button>
                <button id="coupon" type="submit" class="btn">الغاء</button>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
