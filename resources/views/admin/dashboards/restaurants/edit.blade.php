@extends('admin.layouts.app')
@section('title')
    تعديل المنتج
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تعديل المنتج</h3>
        </div>

        <form action="{{ route('updateRestaurentProduct', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row col-12">
                <div class="col-lg-6">
                    <input type="file" name="product_image" id="upload-custom" multiple>
                    <label for="upload-custom" class="upload-lable text-center">
                        <i class="fa-solid fa-file-image"></i>
                        <h4 class="drag-text">اضغط أو اسحب الصورة الى هنا</h4>
                    </label>
                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('assets/images/products/'.$product->product_image) }}" name="product_image" height="150" width="250">
                </div>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>القسم</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror">
                        <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control rounded-0 mb-4 mt-2 @error('product_name') is-invalid @enderror">
                    @error('product_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="description" value="{{$product->description}}" class="form-control rounded-0 mb-4 mt-2 @error('description') is-invalid @enderror">
                    @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>السعر</label>
                    <input type="text" name="price" placeholder="ريال سعودي" value="{{$product->price}}" class="form-control rounded-0 mb-4 mt-2 @error('price') is-invalid @enderror">
                    @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>عدد السعرات الحرارية</label>
                    <input type="text" name="calories" placeholder="كالوري" value="{{$product->calories}}" class="form-control rounded-0 mb-4 mt-2 @error('calories') is-invalid @enderror">
                    @error('calories')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>الكمية</label>
                    <input type="text" name="quantity" placeholder="الكمية" value="{{$product->quantity}}" class="form-control rounded-0 mb-4 mt-2 @error('quantity') is-invalid @enderror">
                    @error('quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <hr>

                <div class="extra">
                    <h5>الاضافات:</h5>
                    @foreach (\App\Models\Extra::all() as $extra)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $extra->name }}
                                <input name="extra_id[]" value="{{$extra->id}}" type="checkbox" 
                                {{\App\Models\Product::where('id', $product->id)->where('extra_id', $extra->id)->first() ? 'checked' : ''}}>
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
                                <input name="without_id[]" value="{{$without->id}}" type="checkbox"
                                {{\App\Models\Product::where('id', $product->id)->where('without_id', $without->id)->first() ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- without -->

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" name="status" 
                        {{\App\Models\Product::where('id', $product->id)->where('status', 'متوفر')->first() ? 'checked' : ''}}>>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>

                <hr>

                <h5 class="fw-bold">الفروع التي توفر المنتج:</h5>
                <div class="branches">
                    @forelse (\App\Models\Branch::all() as $branch)
                        <div class="form-group mb-3">
                            <label class="custom-checks text-black">{{ $branch->branche_title}}
                                <input name="branche_id[]" value="{{ $branch->id }}" type="checkbox"
                                {{\App\Models\Product::where('id', $product->id)->where('branche_id', $branch->id)->first() ? 'checked' : ''}}>
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
                <button id="login" type="submit" class="btn mb-3">حفظ التعديلات</button>
            <a href="#deleteProduct" id="coupon" class="btn btn-block px-4 btns" data-bs-toggle="modal">حذف</a>
        </div>
        </form>
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
                <h3>هل أنت متأكد من حذف هذا المنتج؟</h3>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="{{ route('deleteRestaurentProduct', $product->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
