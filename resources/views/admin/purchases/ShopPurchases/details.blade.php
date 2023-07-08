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

                @if($purchase->order_status == 'قيد التجهيز')
                    <strong class="text-warning">{{ $purchase->order_status }}</strong>
                @elseif($purchase->order_status == 'جاهز للاستلام')
                    <strong class="text-primary">{{ $purchase->order_status }}</strong>
                @elseif($purchase->order_status == 'تم الشحن')
                    <strong class="text-info">{{ $purchase->order_status }}</strong>
                @else
                    <strong class="text-success">{{ $purchase->order_status }}</strong>
                @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>اسم المستخدم</label>
                <strong class="mx-5">{{ $purchase->user->name }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>عدد المنتجات</label>
                <strong class="mx-5">{{ $purchase->products_count }} منتج</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>اجمالي السعر</label>
                <strong class="mx-5">{{ $purchase->total_price }} رس</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">تاريخ الطلب</label>
                <strong class="mx-5">{{ $purchase->formatted_created_at }}</strong>
            </div> <!-- 4 -->
        </div> <!-- col-4 -->
        
    <hr>

        <div class="col-lg-4 mt-3">
            <strong>تفاصيل الطلب</strong>
            <div class="col-12">
                <h4 class="mt-4">{{ \App\Models\ShopProduct::where('id', $purchase->shop_product_id)->first()->description }}</h4>

                <div class="col-3">
                    <img src="{{ asset('assets/images/products/'.\App\Models\ShopProduct::where('id', $purchase->shop_product_id)->first()->product_image) }}" class="mt-4" height="200" width="200" alt="photo">
                </div>
            </div> <!-- 1 -->
        </div> <!-- col-4 -->
    </div> <!-- container -->
</section>

@endsection
