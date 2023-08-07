@extends('admin.layouts.app')
@section('title')
    {{ __('events.Reservations') }}
@endsection

@section('content')
<div class="col-12 text-end" id="side">
    <div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
                <i class="fa-solid fa-circle-right"></i>
			</div>
		</div>

		<aside class="sidebar">
			<h3 class="text-black">{{ __('events.events') }}</h3>
			<nav class="menu">
                <a href="{{ route('entertainmentPurchases') }}" class="menu-item {{ !request('cat_id') ? 'is-active' : ''}}">{{ __('restaurent.all') }}</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="{{ route('filterEventPurchases', $category->id) }}" class="menu-item {{request('cat_id') == $category->id ? 'is-active' : ''}}">{{ $category->name }}</a>
                @endforeach
			</nav>
		</aside>
	</div>


    <section class="container col-lg-10 col-md-11">
        <div class="container">
        <div class="col-12 d-flex flex-row-reverse p-0">
            <div class="col-6 section-title text-end p-0" id="headtitle">
                <h2 class="text-black">{{ __('events.Reservations') }}</h2>
        </div>

        <div class="col-6 text-start mb-3">
            <a href="{{ route('ExportEventPurchasesPDF') }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            {{-- <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a> --}}
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" id="tabledir">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('restaurent.user_name') }}</th>
                        <th>{{ __('events.tickets_number') }}</th>
                        <th>{{ __('events.reservation_type') }}</th>
                        <th>{{ __('restaurent.price') }}</th>
                        <th>{{ __('events.event_rate') }}</th>
                        <th>{{ __('restaurent.details') }}</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th>{{ $order->random_id }}</th>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->event->quantity }}</td>

                        @foreach (\App\Models\ReservationType::where('id', $order->event->reservations_type_id)->get() as $type)
                            <td>
                                {{ $type->name }}
                            </td>
                        @endforeach

                        <td>{{ \App\Models\Event::where('id', $order->event_id)->first()->ticket_price }}</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{ route('eventOrderDetails', $order->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
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
