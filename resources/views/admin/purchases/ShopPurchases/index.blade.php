@extends('admin.layouts.app')
@section('title')
    {{ __('shop.purchases') }}
@endsection

@section('content')

<div class="col-12 text-end" id="side">
    <div class="app col-lg-2 col-md-1">
		<div class="menu-toggle">
			<div class="hamburger">
                <i class="fa-solid fa-circle-right"></i>
			</div>
		</div>

		<aside class="sidebar">
            <nav class="menu">
                <a href="{{ route('shopPurchases') }}" class="menu-item {{ !request('key') ? 'is-active' : '' }}">{{ __('restaurent.all') }}</a>
                @foreach([1 => __('homepage.January'), 2 => __('homepage.February'), 3 => __('homepage.March'), 4 => __('homepage.April'), 5 => __('homepage.May'), 6 => __('homepage.June'), 7 => __('homepage.July'), 8 => __('homepage.August'), 9 => __('homepage.September'), 10 => __('homepage.October'), 11 => __('homepage.November'), 12 => __('homepage.December')] as $key => $month)
                    <a href="{{ route('filterShopPurchases', $key) }}" class="menu-item monthes {{ request('key') == $key ? 'is-active' : '' }}">{{ $month }}</a>
                @endforeach
			</nav>
		</aside>
	</div>


<section class="container col-lg-10 col-md-11">
    <div class="container">
        <div class="col-12 p-0" id="rever">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">{{ __('shop.purchases') }}</h2>
        </div>

        <div class="col-6 mb-3" id="pdfs">
            <a href="{{ route('ExportShopPurchasesPDF') }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            {{-- <a href="#importData" id="pdf" data-bs-toggle="modal" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a> --}}
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" id="tabledir">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('shop.user_name') }}</th>
                        <th>{{ __('shop.price') }}</th>
                        <th>{{ __('shop.products_number') }}</th>
                        <th>{{ __('shop.order_status') }}</th>
                        <th>{{ __('shop.order_date') }}</th>
                        <th>{{ __('restaurent.rate_service') }}</th>
                        <th>{{ __('restaurent.details') }}</th>
                    </tr>
                </thead>

                @forelse($orders as $order)
                <tbody>
                    <tr>
                        <th>{{$order->random_id}}</th>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->products_count}}</td>

                        @if($order->order_status == 'قيد التجهيز')
                            <td class="text-warning">{{ __('shop.processing') }}</td>
                        @elseif($order->order_status == 'جاهز للاستلام')
                            <td class="text-primary">{{ __('shop.ready_pick') }}</td>
                        @elseif($order->order_status == 'تم الشحن')
                            <td class="text-info">{{ __('shop.charged') }}</td>
                        @else
                            <td class="text-success">{{ __('shop.completed') }}</td>
                        @endif

                        <td>{{ $order->formatted_created_at }}</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{ route('shopPurchasesDetails', $order->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <th class="text-danger" colspan="10">
                                {{ __('restaurent.nodata') }}
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> <!-- container -->
    </div>
    </div> <!-- container -->
</section>
@endsection
