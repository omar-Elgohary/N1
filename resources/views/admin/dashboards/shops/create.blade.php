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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeShopProduct') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="drop-zone">
                <span class="drop-zone__prompt">اضغط أو اسحب الصور الى هنا</span>
                <input type="file" name="product_image" class="drop-zone__input" multiple>
            </div>

            <div class="col-lg-4 mt-3">
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
                    <label>عدد البضاعة المتوفرة</label>
                        <input type="text" name="quantity" class="form-control rounded-0 mt-3">
                </div>

                <label class="mt-4">المقاس</label>
                <div class="form-group d-flex justify-content-between">
                    @foreach ($sizes as $size)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $size->size }}
                                <input name="size_id[]" value="{{$size->id}}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- 4 -->

                <label class="mt-4">الألوان</label>
                <div class="form-group d-flex justify-content-between">
                    @foreach ($colors as $color)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $color->color }}
                                <input name="color_id[]" value="{{$color->id}}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- 5 -->
            </div>

                <hr>

                <div>
                    <label class="mt-4">هل من الممكن اعادة المنتج؟</label>

                    <div class="form-group">
                        <input type="radio" name="returnable" class="mb-4 mt-4" value="نعم">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="returnable" class="mb-4 mt-2" value="لا">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>


                <div class="mt-5">
                    <label>فئة المنتج:</label>
                    @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                        <div class="form-group">
                            <input name="category_id" value="{{ $category->id }}" type="radio" class="mb-4 mt-4">
                            <label>{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <label>هل يوجد ضمان للمنتج؟</label>

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="نعم" class="mb-4 mt-4">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="لا" class="mb-4 mt-2">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" name="status" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>


                <div class="branches mt-5">
                    <label>الفروع التي توفر المنتج:</label>
                    @forelse (\App\Models\Branch::where('department_id', auth()->user()->department_id)->get() as $branch)
                        <div class="form-group my-3">
                            <label class="custom-checks text-black">{{ $branch->branche_title}}
                                <input name="branche_id[]" value="{{ $branch->id }}" type="checkbox">
                                <span class="checkmark pb-1"></span>
                            </label>
                        </div>
                    @empty
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black text-bold">لا يوجد فروع اخرى
                            </label>
                        </div>
                    @endforelse
                </div> <!-- branches -->

                <div class="col-4 d-grid mx-auto mt-5">
                    <button type="submit" id="login" class="btn mb-3">اضافة</button>
                    <a id="coupon" href="route('products')" class="btn">الغاء</a>
                </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
