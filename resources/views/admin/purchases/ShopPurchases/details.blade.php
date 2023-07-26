@extends('admin.layouts.app')
@section('title')
    {{ __('shop.purchases_details') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 section-title text-end p-0">
                <h2 class="text-black">{{ __('shop.purchases_details') }}</h2>
            </div>

            <div class="col-6 text-start mb-3">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4 mt-3">
            <div class="form-group my-4">
                <label style="margin-left: 70px">{{ __('restaurent.user_phone') }}</label>
                <strong>{{ $purchase->user->phone }}</strong> |

                @if($purchase->order_status == 'قيد التجهيز')
                    <strong class="text-warning">{{ __('shop.processing') }}</strong>
                @elseif($purchase->order_status == 'جاهز للاستلام')
                    <strong class="text-primary">{{ __('shop.ready_pick') }}</strong>
                @elseif($purchase->order_status == 'تم الشحن')
                    <strong class="text-info">{{ __('shop.charged') }}</strong>
                @else
                    <strong class="text-success">{{ __('shop.completed') }}</strong>
                @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>{{ __('shop.user_name') }}</label>
                <strong class="mx-5">{{ $purchase->user->name }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>{{ __('shop.products_number') }}</label>
                <strong class="mx-5">{{ $purchase->products_count }} {{ __('shop.products') }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.total_price') }}</label>
                <strong class="mx-5">{{ $purchase->total_price }} {{ __('restaurent.SAR') }}</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">{{ __('shop.order_date') }}</label>
                <strong class="mx-5">{{ $purchase->formatted_created_at }}</strong>
            </div> <!-- 4 -->
        </div> <!-- col-4 -->

    <hr>

        <div class="col-lg-4 mt-3">
            <strong>{{ __('shop.order_details') }}</strong>
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
