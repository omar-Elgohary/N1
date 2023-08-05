@extends('admin.layouts.app')
@section('title')
    {{ __('restaurent.purchases_details') }}
@endsection

@if (session()->has('processing'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.processing') }}",
                type: "warining"
            })
        }
    </script>
@endif

@if (session()->has('recived'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.recived') }}",
                type: "success"
            })
        }
    </script>
@endif

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 p-0">
                <h2 class="text-black">{{ __('restaurent.purchases_details') }}</h2>
            </div>

            <div class="col-6 text-start">
                <a href="{{ route('ExportrestaurentPurchasesDetailsPDF', $purchase->id) }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                {{-- <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a> --}}
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4 mt-3">
            <div class="form-group my-4">
                <label style="margin-left: 70px">{{ __('restaurent.user_phone') }}</label>
                <strong>{{ $purchase->user->phone }}</strong> |

                @if($purchase->order_status == 'جديد')
                    <strong class="text-danger">{{ __('restaurent.new') }}</strong>
                @elseif($purchase->order_status == 'قيد التجهيز')
                    <strong class="text-warning">{{ __('restaurent.processing') }}</strong>
                @elseif($purchase->order_status == 'تم الاستلام')
                    <strong class="text-success">{{ __('restaurent.received') }}</strong>
                @else
                    <strong class="text-dark">{{ __('restaurent.completed') }}</strong>
                @endif
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.user_name') }}</label>
                <strong class="mx-5">{{ $purchase->user->name }}</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">{{ __('restaurent.offer_time') }}</label>
                <strong class="mx-5">{{ $purchase->formatted_created_at }}</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">{{ __('restaurent.required_quantity') }}</label>
                <strong class="mx-5">{{ $purchase->products_count }}</strong>
            </div> <!-- 4 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.total_price') }}</label>
                <strong class="mx-5">{{ $purchase->total_price }} {{ __('restaurent.SAR') }}</strong>
            </div> <!-- 5 -->
        </div> <!-- col-4 -->

    <hr>

        <div class="col-lg-4 mt-3">
            <strong>{{ __('restaurent.offer_details') }}</strong>
            <div class="form-group my-4">
                <label>{{ __('restaurent.meal_name') }}</label>
                <label class="mx-5">{{ \App\Models\RestaurentProduct::where('id', $purchase->restaurent_product_id)->first()->name }}</label>
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>{{ __('restaurent.meal_price') }}</label>
                <label class="mx-5">{{ \App\Models\RestaurentProduct::where('id', $purchase->restaurent_product_id)->first()->price }} {{ __('restaurent.SAR') }}</label>
            </div> <!-- 2 -->
        </div> <!-- col-4 -->

        <div class="col-4 d-grid mx-auto mt-5">
            @if($purchase->order_status == 'جديد')
                <a id="login" href="{{ route('changePurchaseStatus', $purchase->id) }}" class="btn mb-3">{{ __('restaurent.processing') }}</a>
            @elseif($purchase->order_status == 'قيد التجهيز')
                <a id="login" href="{{ route('changePurchaseStatus', $purchase->id) }}" class="btn mb-3">{{ __('restaurent.received') }}</a>
            @endif
        </div>
    </div> <!-- container -->
</section>

@endsection
