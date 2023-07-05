@extends('admin.layouts.app')
@section('title')
    عمليات الحجز
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
			<h3 class="text-black">الفعاليات</h3>
			<nav class="menu">
                @foreach ($events as $event)
                    <a href="#" class="menu-item is-active">{{ $event->event_name }}</a>
                @endforeach
			</nav>
		</aside>
	</div>


<section class="container col-lg-10 col-md-11">
    <div class="container">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">عمليات الحجز</h2>
        </div>

        <div class="col-6 text-start mb-3">
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
            <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
        </div>
    </div> <!-- col-12 -->

    <div class="text-center">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المستخدم</th>
                        <th>عدد التذاكر</th>
                        <th>نوع الحجز</th>
                        <th>السعر</th>
                        <th>تقييم الفعالية</th>
                        <th>التفاصيل</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($events as $key => $event)
                    <tr>
                        <th>{{ $event->random_id }}</th>
                        <td>{{ \App\Models\User::where('id', $event->user_id)->first()->name }}</td>
                        <td>{{ $event->category->name}}</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{ route('eventDetails', $event->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
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
