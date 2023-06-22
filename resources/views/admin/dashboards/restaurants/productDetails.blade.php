@extends('admin.layouts.app')
@section('title')
    تفاصيل المنتج
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
            <h3 class="text-black">تفاصيل المنتج</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('assets/images/products/'.$product->product_image) }}" class="m-1 mt-0" height="150" alt="">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>الحالة</label>
                    @if ($product->status == 'متوفر')
                        <label class="text-success mx-5">{{ $product->status }}</label>
                    @else
                        <label class="text-danger mx-5">{{ $product->status }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>الاسم</label>
                    <label class="mx-5">{{ $product->product_name }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>الوصف</label>
                    <label class="mx-5">{{ $product->description }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>السعر</label>
                    <label class="mx-5">{{ $product->price }} ريال سعودي</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>السعرات</label>
                    <label class="mx-5">{{ $product->calories }} كالوري</label>
                </div> <!-- 5 -->
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>الاضافات الممكنة:</h4>
                @if($product->extra_id)
                @foreach($extras as $extra)
                        <div class="form-group my-4">
                            <label>- {{ $extra->name }}</label>
                        </div> 
                    @endforeach
                @else
                    <h5 class="text-danger">لا يوجد اضافات</h5>
                @endif
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <h4>المكونات التي يمكن حذفها:</h4>
                @if($product->without_id)
                    @foreach ($withouts as $without)
                        <div class="form-group my-4">
                            <p>- {{ $without->name }}</p>
                        </div> 
                    @endforeach
                @else
                    <h5 class="text-danger">لا يوجد مكونات</h5>
                @endif
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="{{route('editRestaurentProduct', $product->id)}}" class="btn mb-3">تعديل معلومات المنتج</a>
            @if($product->status == 'متوفر')
                <a id="coupon" href="{{route('DeactiviteRestaurentProduct', $product->id)}}" class="btn">الغاء نشر المنتج</a>
            @else
                <a id="coupon" href="{{route('unDeactiviteRestaurentProduct', $product->id)}}" class="btn">نشر المنتج</a>
            @endif
        </div>
    </div> <!-- container -->
</section>

@endsection
