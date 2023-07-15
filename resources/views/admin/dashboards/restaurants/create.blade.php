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

            <div class="drop-zone">
                <span class="drop-zone__prompt">اضغط أو اسحب الصور الى هنا</span>
                <input type="file" name="product_image" class="drop-zone__input @error('product_image') is-invalid @enderror" multiple>
                @error('product_image')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="col-lg-4 mt-4">
                <div class="form-group">
                    <label>القسم</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                        <option value="" selected disabled>حدد القسم</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->


                <div class="form-group">
                    <label for="inputName">الفئة الفرعية</label>
                    <select name="sub_category_name" id="sub_category_name" class="form-control rounded-0 mb-4 mt-2">
                    </select>
                </div> <!-- 1 -->


                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="product_name" class="form-control rounded-0 mb-4 mt-2 @error('product_name') is-invalid @enderror">
                    @error('product_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="description" class="form-control rounded-0 mb-4 mt-2 @error('description') is-invalid @enderror">
                    @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>السعر</label>
                    <input type="text" name="price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2 @error('price') is-invalid @enderror">
                    @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>عدد السعرات الحرارية</label>
                    <input type="text" name="calories" placeholder="كالوري" class="form-control rounded-0 mb-4 mt-2 @error('calories') is-invalid @enderror">
                    @error('calories')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>الكمية</label>
                    <input type="text" name="quantity" placeholder="الكمية" class="form-control rounded-0 mb-4 mt-2 @error('quantity') is-invalid @enderror">
                    @error('quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <hr>

                <div class="extra">
                    <h5>الاضافات:</h5>
                    @foreach (\App\Models\Extra::all() as $extra)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $extra->name }}
                                <input name="extra_id[]" value="{{$extra->id}}" type="checkbox">
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

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" name="status" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>

                <hr>

                <h5 class="fw-bold">الفروع التي توفر المنتج:</h5>
                <div class="branches p-2">
                    @forelse(\App\Models\Branch::where('department_id', auth()->user()->department_id)->get() as $branch)
                        <div class="form-group mb-3">
                            <label class="custom-checks text-black">{{ $branch->branche_title}}
                                <input name="branche_id[]" value="{{ $branch->id }}" type="checkbox">
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
