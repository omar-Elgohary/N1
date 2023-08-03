@extends('admin.layouts.app')
@section('title')
    {{ __('shop.edit_product') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('shop.edit_product_info') }}</h3>
        </div>

        <form action="{{route('updateShopProduct', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row col-12">
                <div class="col-lg-6">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                        <input type="file" name="product_image" class="drop-zone__input" multiple>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('assets/images/products/'.$product->product_image) }}" name="product_image" height="200" width="250">
                </div>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>{{ __('restaurent.category_name') }}</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                        <option value="{{ \App\Models\Category::where('id', $product->category_id)->first()->id }}" name="category_id" selected>{{  \App\Models\Category::where('id', $product->category_id)->first()->name }}</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->where('id', '!=', $product->category_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 1 -->


                <div class="form-group">
                    <label>{{ __('restaurent.sub_category') }}</label>
                    <select name="sub_category_name" id="sub_category_name" class="form-control rounded-0 mb-4 mt-2">
                        <option value="{{ $product->subCategory->id }}">{{ $product->subCategory->name }}</option>
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('restaurent.name_en') }}</label>
                    <input type="text" name="name_en" id="englishNameInput" value="{{ $product->nameLocale('en') }}" class="form-control rounded-0 mb-4 mt-2">
                    <p id="errorText_en" class="error-message"></p>
                </div> <!-- 3 -->
                
                <div class="form-group">
                    <label>{{ __('restaurent.name_ar') }}</label>
                    <input type="text" name="name_ar" id="arabicNameInput" value="{{ $product->nameLocale('ar') }}" class="form-control rounded-0 mb-4 mt-2">
                    <p id="errorText_ar" class="error-message"></p>
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_en') }}</label>
                    <input type="text" name="description_en" id="englishDescInput" value="{{ $product->descriptionLocale('en') }}" class="form-control rounded-0 mb-4 mt-2">
                    <p id="errorDesc_en" class="error-message"></p>
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_ar') }}</label>
                    <input type="text" name="description_ar" id="arabicDescInput" value="{{ $product->descriptionLocale('ar') }}" class="form-control rounded-0 mb-4 mt-2">
                    <p id="errorDesc_ar" class="error-message"></p>
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('shop.price') }}</label>
                    <input type="text" name="price" value="{{$product->price}}" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 7 -->

                <div class="form-group">
                    <label>{{ __('shop.avaulable_quantity') }}</label>
                        <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control rounded-0  mb-4 mt-2">
                </div>

                <div class="form-group">
                    <label>{{ __('restaurent.sold_quantity') }}</label>
                    <input type="text" name="sold_quantity" placeholder="الكمية" value="{{ $product->sold_quantity }}" class=" mb-4 mt-2 form-control rounded-0 mb-4 mt-2 @error('quantity') is-invalid @enderror">
                    @error('sold_quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>

                <hr>

                <label class="mt-4">{{ __('shop.size') }}</label>
                <div class="form-group d-flex justify-content-between">
                    @foreach (\App\Models\Size::all() as $size)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $size->size }}
                                <input name="size_id[]" value="{{$size->id}}" type="checkbox"
                                {{\App\Models\ShopProduct::where('id', $product->id)->where('size_id', $size->id)->first() ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- 4 -->

                <label class="mt-4">{{ __('shop.color') }}</label>
                <div class="form-group d-flex justify-content-between">
                    @foreach (\App\Models\Color::all() as $color)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $color->color }}
                                <input name="color_id[]" value="{{$color->id}}" type="checkbox"
                                {{\App\Models\ShopProduct::where('id', $product->id)->where('color_id', $color->id)->first() ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- 5 -->
            </div>

                <hr>

                <div>
                    <label>{{ __('shop.return_question') }}</label>
                    <div class="form-group">
                        <input type="radio" name="returnable" value="نعم" class="mb-4 mt-4"
                        {{ $product->returnable == 'نعم' ? 'checked' : '' }}>
                        <label>{{ __('shop.yes') }}</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="returnable" value="لا" class="mb-4 mt-2"
                        {{ $product->returnable == 'لا' ? 'checked' : '' }}>
                        <label>{{ __('shop.no') }}</label>
                    </div> <!-- 2 -->
                </div>

                <div class="mt-5">
                    <label>{{ __('shop.guarantee_question') }}</label>

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="نعم" class="mb-4 mt-4"
                        {{ $product->guarantee == 'نعم' ? 'checked' : '' }}>
                        <label>{{ __('shop.yes') }}</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="لا" class="mb-4 mt-2"
                        {{ $product->guarantee == 'لا' ? 'checked' : '' }}>
                        <label>{{ __('shop.no') }}</label>
                    </div> <!-- 2 -->
                </div>

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" name="status"
                        {{\App\Models\ShopProduct::where('id', $product->id)->where('status', 'متوفر')->first() ? 'checked' : ''}}>>
                        <span class="slider round"></span>
                    </label>
                    <label>{{ __('restaurent.publish') }}</label>
                </div>

                <div class="branches mt-5">
                    <label>{{ __('shop.provide_branches') }} :</label>
                    @foreach (\App\Models\Branch::where('department_id', auth()->user()->department_id)->get() as $branch)
                        <div class="form-group my-3">
                            <label class="custom-checks text-black">{{ $branch->name }}
                                <input name="branche_id[]" value="{{ $branch->id }}" type="checkbox"
                                {{\App\Models\ShopProduct::where('id', $product->id)->where('branche_id', $branch->id)->first() ? 'checked' : ''}}>
                                <span class="checkmark pb-1"></span>
                            </label>
                        </div>
                    @endforeach
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('restaurent.save_updates') }}</button>
                <a id="coupon" href="#DeleteShopProduct" class="btn" data-bs-toggle="modal">{{ __('shop.delete_product') }}</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

{{-- delete shop products --}}
<div class="modal fade border-0" id="DeleteShopProduct" aria-hidden="true" aria-labelledby="DeleteShopProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-auto my-5">
                <h4 class="text-end fw-bold">{{ __('shop.delete_question') }}</h4>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('restaurent.cancel') }}</button>
                <a href="#" id="package" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
