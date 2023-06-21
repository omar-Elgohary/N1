@extends('admin.layouts.app')
@section('title')
    اضافة منتج جديد
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة منتج جديد</h3>
        </div>

        <form action="{{route('storeRestaurentProduct')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12">
                <input type="file" name="product_image" id="upload-custom" multiple>
                <label for="upload-custom" class="upload-lable text-center">
                    <i class="fa-solid fa-file-image"></i>
                    <h4 class="drag-text">اضغط أو اسحب الصورة الى هنا</h4>
                </label>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="form-group">
                    <label>القسم</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2">
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                        {{-- @foreach (\App\Models\Category::all() as $category) --}}
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="product_name" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="description" class="form-control rounded-0 mb-4 mt-2">
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
                    @foreach (\App\Models\Extra::all() as $extra)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $extra->name }}
                                <input name="extra_id[]" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- extra -->

                <hr>

                <div class="without">
                    <h5>بدون:</h5>
                    @foreach (\App\Models\Without::all() as $without)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $without->name}}
                                <input name="without_id[]" value="{{$without->id}}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
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
                    @forelse (\App\Models\Branch::all() as $branch)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $branch->name}}
                                <input name="branche_id" value="{{ $branch->id }}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @empty
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black text-bold">لا يوجد فروع اخرى
                            </label>
                        </div>
                    @endforelse
                </div> <!-- branches -->
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">اضافة</button>
                <a id="coupon" href="FoodMenu" class="btn">الغاء</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
