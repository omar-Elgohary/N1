@extends('admin.layouts.app')
@section('title')
    تفاصيل عملية الشراء
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 section-title text-end p-0">
                <h2 class="text-black">تفاصيل عملية الشراء</h2>
            </div>

            <div class="col-6 text-start mb-3">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4 mt-3">
            <div class="form-group my-4">
                <label style="margin-left: 70px">رقم الطالب</label>
                <strong>{{ $purchase->user->phone }}</strong> |

                @if($purchase->order_status == 'جديد')
                    <strong class="text-danger">{{ $purchase->order_status }}</strong>
                @elseif($purchase->order_status == 'قيد التجهيز')
                    <strong class="text-warning">{{ $purchase->order_status }}</strong>
                @elseif($purchase->order_status == 'تم الاستلام')
                    <strong class="text-success">{{ $purchase->order_status }}</strong>
                @else
                    <strong class="text-dark">{{ $purchase->order_status }}</strong>
                @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>اسم المستخدم</label>
                <strong class="mx-5">{{ $purchase->user->name }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">تاريخ الطلب</label>
                <strong class="mx-5">{{ $purchase->created_at }}</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label>اجمالي السعر</label>
                <strong class="mx-5">{{ $purchase->total_price }} رس</strong>
            </div> <!-- 4 -->
        </div> <!-- col-4 -->

    <hr>

    {{-- @foreach (\App\Models\Product::where('id', $purchase->order->product_id)->get() as $product) --}}
        <div class="col-lg-4 mt-3">
            <strong>تفاصيل الطلب</strong>
            <div class="form-group my-4">
                <label>اسم الوجبة</label>
                <label class="mx-5">{{ \App\Models\RestaurentProduct::where('id', $purchase->restaurent_product_id)->first()->product_name }}</label>
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>سعر الوجبة</label>
                <label class="mx-5">{{ \App\Models\RestaurentProduct::where('id', $purchase->restaurent_product_id)->first()->price }} رس</label>
            </div> <!-- 2 -->
        </div> <!-- col-4 -->
    {{-- @endforeach --}}

        <div class="col-4 d-grid mx-auto mt-5">
            @if($purchase->order_status == 'جديد')
                <a id="login" href="{{ route('changePurchaseStatus', $purchase->id) }}" class="btn mb-3">قيد التجهيز</a>
            @elseif($purchase->order_status == 'قيد التجهيز')
                <a id="login" href="{{ route('changePurchaseStatus', $purchase->id) }}" class="btn mb-3">تم الاستلام</a>
            @endif
        </div>
    </div> <!-- container -->
</section>

@endsection
