@extends('admin.layouts.app')
@section('title')
    {{ __('restaurent.product_details') }}
@endsection

@if (session()->has('DeactiveRestaurentProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم الغاء نشر المنتج بنجاح ',
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('unDeactiveRestaurentProduct'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم نشر المنتج بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('restaurent.product_details') }}</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('assets/images/products/'.$product->product_image) }}" name="product_image" class="m-1 mt-0" height="150" alt="product_image">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>{{ __('restaurent.status') }}</label>
                    @if ($product->status == 'متوفر')
                        <label class="text-success fw-bold mx-5">{{ __('restaurent.available') }}</label>
                    @else
                        <label class="text-danger fw-bold mx-5">{{ __('restaurent.notavailable') }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.name') }}</label>
                    <label class="mx-5">{{ $product->name }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.description') }}</label>
                    <label class="mx-5">{{ $product->description }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.price') }}</label>
                    <label class="mx-5">{{ $product->price }} {{ __('restaurent.SAR') }}</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>{{ __('restaurent.calories') }}</label>
                    <label class="mx-5">{{ $product->calories }} {{ __('restaurent.cal') }}</label>
                </div> <!-- 5 -->
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>{{ __('restaurent.extra') }} :</h4>
                @if($product->extra_id)
                @foreach($extras as $extra)
                        <div class="form-group my-4">
                            <label>- {{ $extra->name }}</label>
                        </div>
                    @endforeach
                @else
                    <h5 class="text-danger">{{ __('restaurent.noextra') }}</h5>
                @endif
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>{{ __('restaurent.without') }} :</h4>
                @if($product->without_id)
                    @foreach ($withouts as $without)
                        <div class="form-group my-4">
                            <p>- {{ $without->name }}</p>
                        </div>
                    @endforeach
                @else
                    <h5 class="text-danger">{{ __('restaurent.nowithout') }}</h5>
                @endif
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="{{route('editRestaurentProduct', $product->id)}}" class="btn mb-3">{{ __('restaurent.edit_product') }}</a>
            @if($product->status == 'متوفر')
                <a id="coupon" href="{{route('DeactiviteRestaurentProduct', $product->id)}}" class="btn">{{ __('restaurent.cancel_publish') }}</a>
            @else
                <a id="coupon" href="{{route('unDeactiviteRestaurentProduct', $product->id)}}" class="btn">{{ __('restaurent.publish') }}</a>
            @endif
        </div>
    </div> <!-- container -->
</section>

@endsection
