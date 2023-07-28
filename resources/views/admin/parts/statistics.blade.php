@extends('admin.layouts.app')
@section('content')
@section('title')
    {{ __('staticpage.statistics') }}
@endsection

<section>
    <div class="container">

    @if (session()->has('login'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ __('messages.login') }}",
                    type: "success"
                })
            }
        </script>
    @endif

    @if (session()->has('register'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ __('messages.register') }}",
                    type: "success"
                })
            }
        </script>
    @endif

        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end fw-bold">{{ __('staticpage.statistics') }}</h2>
            </div>
        </div> <!-- row -->

        <div class="row text-end mt-4 flex-row-reverse">
            <div class="col-xl-6">
                <div class="donut_chart">
                    <div class="card-body">
                        <h4 class="card-title text-black mb-4">{{ __('staticpage.title1') }}</h4>
                        <div id="donut_chart" data-colors='["--bs-success", "--bs-primary", "--bs-warning" ,"--bs-info", "--bs-danger"]' class="apex-charts"  dir="ltr"></div>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-xl-6 -->

            <div class="col-xl-6">
                <div class="spinners">
                    <div>
                        <h4 class="card-title text-black mb-3">{{ __('staticpage.title2') }}</h4>
                    </div>

                <div class="row lastOffer d-flex justify-content-end">
                    <div class="card-body d-flex justify-content-end">

                        @if(auth()->user()->department_id == 1 )
                            @foreach(\App\Models\RestaurentProduct::orderBy('sold_quantity', 'desc')->limit(3)->get() as $product)
                                <div class="col-lg-2 col-md-2 text-center mx-3" dir="ltr">
                                    <h5>{{ $product->sold_quantity }}</h5>
                                    <span>{{ $product->name }}</span>
                                </div>

                                <input class="knob p-5" data-width="50" data-height="50" data-linecap=round
                                    data-fgColor="#FF0000" value="65" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1"/>
                            @endforeach
                        @elseif(auth()->user()->department_id == 2)
                            @foreach(\App\Models\ShopProduct::orderBy('sold_quantity', 'desc')->limit(3)->get() as $product)
                                <div class="col-lg-2 col-md-2 text-center mx-3" dir="ltr">
                                    <h5>{{ $product->sold_quantity }}</h5>
                                    <h5>{{ $product->name }}</h5>
                                </div>

                                <input class="knob" data-width="50" data-height="50" data-linecap=round
                                    data-fgColor="#FF0000" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1"/>
                            @endforeach
                        @else
                            @foreach(\App\Models\Event::orderBy('tickets_sold_quantity', 'desc')->limit(3)->get() as $product)
                                <div class="col-lg-2 col-md-2 text-center mx-3" dir="ltr">
                                    <h5>{{ $product->tickets_sold_quantity }}</h5>
                                    <h5>{{ $product->name }}</h5>
                                </div>

                                <input class="knob" data-width="50" data-height="50" data-linecap=round
                                    data-fgColor="#FF0000" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1"/>
                            @endforeach
                        @endif

                    </div> <!-- card-body -->
                </div> <!-- row -->
            </div> <!-- card -->


            <div class="col-xl-12">
                <div class="topRate mt-5">
                    <div class="card-body">
                        <h4 class="card-title text-black mb-3">{{ __('staticpage.title3') }}</h4>

                    @if(auth()->user()->department_id == 1)
                        @foreach(\App\Models\Rate::groupBy('restaurent_product_id')->selectRaw('restaurent_product_id,avg(rate) as rate')->where('department_id', auth()->user()->department_id)->orderBy('rate', 'desc')->limit(5)->get() as $rate)
                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>{{ $rate->restaurent_product->name }}</h5>
                                <p>{{ round($rate->rate, 1) }}<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div>
                        @endforeach
                    @elseif(auth()->user()->department_id == 2)
                        @foreach(\App\Models\Rate::groupBy('shop_product_id')->selectRaw('shop_product_id,avg(rate) as rate')->where('department_id', auth()->user()->department_id)->orderBy('rate', 'desc')->limit(5)->get() as $rate)
                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>{{ $rate->shop_product->name }}</h5>
                                <p>{{ round($rate->rate, 1) }}<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div>
                        @endforeach
                    @elseif(auth()->user()->department_id == 3)
                        @foreach(\App\Models\Rate::groupBy('event_product_id')->selectRaw('event_product_id,avg(rate) as rate')->where('department_id', auth()->user()->department_id)->orderBy('rate', 'desc')->limit(5)->get() as $rate)
                            <div class="d-flex flex-row-reverse justify-content-between">
                                <h5>{{ $rate->event_product->event_name }}</h5>
                                <p>{{ round($rate->rate, 1) }}<i class="fa fa-thin fa-star text-warning"></i></p>
                            </div>
                        @endforeach
                    @endif

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-xl-6 -->
        </div> <!-- col-xl-6 -->
    </div> <!-- row -->

    <div class="last text-end mt-5">
        <div class="col-lg-12">
            <h4 class="card-title text-black mb-3">{{ __('staticpage.title4') }}</h4>
                <div class="row lastOffer d-flex justify-content-end">

                    @foreach(\App\Models\Offer::where('department_id', auth()->user()->department_id)->where('package_id', null)->limit(5)->get() as $offer)
                        <div class="col-lg-1 col-md-2 col-sm-2 text-center mx-3" dir="ltr">
                            <h5>{{ $offer->coupon->discount_coupon }}</h5>
                            <input class="knob" data-width="50" data-height="50" data-linecap=round
                                data-fgColor="#4682B4" value="90" data-skin="tron" data-angleOffset="180"
                                data-readOnly=true data-thickness=".1"/>
                        </div>
                    @endforeach

                </div> <!-- card-body -->
            </div>
        </div>
    </div> <!-- container -->
</section>

@endsection

