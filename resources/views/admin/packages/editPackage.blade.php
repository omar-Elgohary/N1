@extends('admin.layouts.app')
@section('title')
    تعديل باكدج
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تعديل البكج</h3>
        </div>

        <form action="{{ route('updatePackage', $package->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row col-lg-12">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <img src="{{ asset('assets/images/offers/'.$package->image) }}" name="image" style="width: 100%" alt="">
                </div>

                <div class="col-lg-6 mt-3">
                    <input type="file" name="image" id="upload-custom">
                    <label for="upload-custom" class="upload-lable text-center w-50">
                        <i class="fa-solid fa-file-image"></i>
                        <h4 class="drag-text">تغيير الصورة</h4>
                    </label>
                </div>
            </div> <!-- row -->

            <div class="col-lg-4 mt-5">
                        <div class="form-group">
                    <label>الوجبة الأولى</label>
                    <select name="first_meal" class="form-control rounded-0 mb-4 mt-2">
                        <option>{{ $package->first_meal }}</option>
                        @foreach ($meals as $meal)
                        <option value="{{ $meal->name }}">{{ $meal->name }}</option>
                    @endforeach
                </select>
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوجبة الثانية</label>
                    <select name="second_meal" class="form-control rounded-0 mb-4 mt-2">
                        <option>{{$package->second_meal}}</option>
                        @foreach ($meals as $meal)
                            <option value="{{ $meal->name }}">{{ $meal->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>تاريخ بداية تفعيل الكود</label>
                    <input type="date" name="start_date" value="{{$package->start_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>تاريخ نهاية تفعيل الكود</label>
                    <input type="date" name="end_date" value="{{$package->end_date}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>السعر</label>
                    <input type="text" name="price" value="{{$package->price}}" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>عدد المستخدمين</label>
                    <input type="text" name="users_count" value="{{$package->users_count}}" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>عدد مرات الاستخدام للشخص الواحد</label>
                    <input type="text" name="how_many_times_user_use_this_coupon" value="{{$package->how_many_times_user_use_this_coupon}}" class="form-control rounded-0 mb-5 mt-2">
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">حفظ التعديلات</button>
                <a id="coupon" href="{{ route('alloffers') }}" type="submit" class="btn">الغاء</a>
            </div>
        </form>

    </div> <!-- container -->
</section>

@endsection
