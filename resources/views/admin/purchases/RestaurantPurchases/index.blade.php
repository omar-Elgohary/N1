@extends('admin.layouts.app')
@section('title')
    {{ __('restaurent.purchases') }}
@endsection

@section('content')
<div class="col-12 d-flex flex-row-reverse text-end">
    <div class="app col-lg-2 col-md-1">
		<div class="menu-toggle">
			<div class="hamburger">
				<i class="fas fa-regular fa-arrow-right"></i>
			</div>
		</div>


		<aside class="sidebar">
            {{-- <div class="dropdown">
                <a id="year" class="btn d-flex justify-content-around flex-row-reverse" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    2023 <i class="fas fa-regular fa-angle-down mt-1 mx-3"></i>
                </a>

                <ul class="dropdown-menu text-end">
                    <li><a class="dropdown-item" href="#">2022</a></li>
                    <li><a class="dropdown-item" href="#">2021</a></li>
                    <li><a class="dropdown-item" href="#">2020</a></li>
                </ul>
            </div> --}}

            <nav class="menu">
                @foreach([1 => __('homepage.January'), 2 => __('homepage.February'), 3 => __('homepage.March'), 4 => __('homepage.April'), 5 => __('homepage.May'), 6 => __('homepage.June'), 7 => __('homepage.July'), 8 => __('homepage.August'), 9 => __('homepage.September'), 10 => __('homepage.October'), 11 => __('homepage.November'), 12 => __('homepage.December')] as $key => $month)
                    <a href="{{ route('filterRestaurantPurchases', $key) }}" class="menu-item monthes">{{ $month }}</a>
                @endforeach
			</nav>
		</aside>
	</div>


<section class="container col-lg-10 col-md-11">
    <div class="container">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">{{ __('restaurent.purchases') }}</h2>
        </div>

        <div class="col-6 text-start mb-3">
            <a href="{{ route('ExportrestaurantPurchasesPDF') }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            {{-- <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a> --}}
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('restaurent.user_name') }}</th>
                        <th>{{ __('restaurent.price') }}</th>
                        <th>{{ __('restaurent.products_number') }}</th>
                        <th>{{ __('offers.offer_status') }}</th>
                        <th>{{ __('restaurent.offer_time') }}</th>
                        <th>{{ __('restaurent.rate_service') }}</th>
                        <th>{{ __('restaurent.details') }}</th>
                    </tr>
                </thead>

                @forelse($purchases as $purchase)
                <tbody>
                    <tr>
                        <th>{{ $purchase->random_id }}</th>
                        <td>{{ \App\Models\User::where('id', $purchase->user_id)->first()->name }}</td>
                        <td>{{ $purchase->total_price }}</td>
                        <td>{{ $purchase->products_count }}</td>

                        @if($purchase->order_status == 'جديد')
                            <td class="text-danger">{{ __('restaurent.new') }}</td>
                        @elseif($purchase->order_status == 'قيد التجهيز')
                            <td class="text-warning">{{ __('restaurent.processing') }}</td>
                        @elseif($purchase->order->order_status == 'تم الاستلام')
                            <td class="text-success">{{ __('restaurent.received') }}</td>
                        @else
                            <td class="text-dark">{{ __('restaurent.completed') }}</td>
                        @endif

                        <td>{{ $purchase->formatted_created_at }}</td>

                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{ route('restaurantPurchasesDetails', $purchase->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
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
