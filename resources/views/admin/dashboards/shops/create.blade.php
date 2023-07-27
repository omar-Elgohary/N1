@extends('admin.layouts.app')
@section('title')
    {{ __('shop.add_new_product') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('shop.add_new_product') }}</h3>
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
                <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                <input type="file" name="product_image" class="drop-zone__input" multiple>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>{{ __('restaurent.category_name') }}</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                        <option value="" selected disabled>{{ __('restaurent.choose_category') }}</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label for="inputName">{{ __('shop.sub_category') }}</label>
                    <select name="sub_category_name" id="sub_category_name" class="form-control rounded-0 mb-4 mt-2">
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('restaurent.name_ar') }}</label>
                    <input type="text" name="name_ar" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">
                    @error('name_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('restaurent.name_en') }}</label>
                    <input type="text" name="name_en" class="form-control rounded-0 mb-4 mt-2 @error('name_en') is-invalid @enderror">
                    @error('name_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_ar') }}</label>
                    <input type="text" name="description_ar" class="form-control rounded-0 mb-4 mt-2 @error('description_ar') is-invalid @enderror">
                    @error('description_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_en') }}</label>
                    <input type="text" name="description_en" class="form-control rounded-0 mb-4 mt-2 @error('description_en') is-invalid @enderror">
                    @error('description_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('shop.price') }}</label>
                    <input type="text" name="price" placeholder="{{ __('restaurent.SAR') }}" class="form-control rounded-0 mb-4 mt-2 @error('price') is-invalid @enderror">
                    @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 7 -->

                <div class="form-group">
                    <label>{{ __('shop.avaulable_quantity') }}</label>
                        <input type="text" name="quantity" class="form-control rounded-0 mt-3">
                </div>

                <label class="mt-4">{{ __('shop.size') }}</label>
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

                <label class="mt-4">{{ __('shop.color') }}</label>
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
                    <label class="mt-4">{{ __('shop.return_question') }}</label>

                    <div class="form-group">
                        <input type="radio" name="returnable" class="mb-4 mt-4" value="نعم">
                        <label>{{ __('shop.yes') }}</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="returnable" class="mb-4 mt-2" value="لا">
                        <label>{{ __('shop.no') }}</label>
                    </div> <!-- 2 -->
                </div>

                <div class="mt-5">
                    <label>{{ __('shop.guarantee_question') }}</label>

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="نعم" class="mb-4 mt-4">
                        <label>{{ __('shop.yes') }}</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="guarantee" value="لا" class="mb-4 mt-2">
                        <label>{{ __('shop.no') }}</label>
                    </div> <!-- 2 -->
                </div>

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" name="status" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>{{ __('restaurent.publish') }}</label>
                </div>


                <div class="branches mt-5">
                    <label>{{ __('restaurent.available_branches') }} :</label>
                    @forelse (\App\Models\Branch::where('department_id', auth()->user()->department_id)->get() as $branch)
                        <div class="form-group my-3">
                            <label class="custom-checks text-black">{{ $branch->name }}
                                <input name="branche_id[]" value="{{ $branch->id }}" type="checkbox">
                                <span class="checkmark pb-1"></span>
                            </label>
                        </div>
                    @empty
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black text-bold">{{ __('restaurent.nobranches') }}
                            </label>
                        </div>
                    @endforelse
                </div> <!-- branches -->

                <div class="col-4 d-grid mx-auto mt-5">
                    <button type="submit" id="login" class="btn mb-3">{{ __('restaurent.add') }}</button>
                    <a id="coupon" href="route('products')" class="btn">{{ __('restaurent.cancel') }}</a>
                </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
