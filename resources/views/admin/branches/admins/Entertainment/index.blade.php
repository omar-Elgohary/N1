@extends('admin.layouts.app')
@section('title')
    قائمة الفعاليات
@endsection

@section('content')
<div class="col-12 d-flex flex-row-reverse text-end">
    <div class="app">
		<div class="menu-toggle">
			<div class="hamburger">
				<i class="fas fa-regular fa-arrow-right"></i>
			</div>
		</div>

		<aside class="sidebar">
			<h3 class="text-black">المقرات</h3>
			<nav class="menu">
				<a href="#" class="menu-item is-active">الكل</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="#" class="menu-item">{{ $category->name }}</a>
                @endforeach
			</nav>
		</aside>
	</div>


<section class="container col-10">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">قائمة الفعاليات</h2>
        </div>

        <div class="col-6 text-start mb-3">
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
    <div class="container">
        <div class="mb-5">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الفعالية</th>
                        <th>حالة الحجز</th>
                        <th>تاريخ النشر</th>
                        <th>سعر التذكرة</th>
                        <th>التذاكر المحجوزة</th>
                        <th>التفاصيل</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($events as $key => $event)
                        <tr>
                            <th>{{ $event->random_id }}</th>
                            <td>{{ $event->event_name}}</td>

                            @if($event->status == 'لم يبدأ')
                                <td class="text-secondary">{{ $event->status }}</td>
                            @elseif($event->status == 'منتهي')
                                <td class="text-dark">{{ $event->status }}</td>
                            @elseif($event->status == 'متوقف')
                                <td class="text-danger">{{ $event->status }}</td>
                            @else
                                <td class="text-success">{{ $event->status }}</td>
                            @endif

                            <td>{{ $event->start_reservation_date}}</td>
                            <td>{{ $event->ticket_price}}</td>
                            <td>{{ $event->tickets_sold_quantity}} / {{ $event->tickets_quantity}}</td>
                            <td>
                                <a href="{{ route('eventAdminDetails', $event->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-danger" colspan="10">
                                لا يوجد بيانات
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
