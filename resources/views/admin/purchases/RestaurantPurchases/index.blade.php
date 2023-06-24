@extends('admin.layouts.app')
@section('title')
    عمليات الشراء
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
            <div class="dropdown">
                <a id="year" class="btn d-flex justify-content-around flex-row-reverse" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    2023 <i class="fas fa-regular fa-angle-down mt-1 mx-3"></i>
                </a>

                <ul class="dropdown-menu text-end">
                    <li><a class="dropdown-item" href="#">2022</a></li>
                    <li><a class="dropdown-item" href="#">2021</a></li>
                    <li><a class="dropdown-item" href="#">2020</a></li>
                </ul>
            </div>

            <nav class="menu">
				<a href="#" class="menu-item monthes is-active">يناير</a>
				<a href="#" class="menu-item monthes">فبراير</a>
				<a href="#" class="menu-item monthes">مارس</a>
				<a href="#" class="menu-item monthes">ابريل</a>
				<a href="#" class="menu-item monthes">مايو</a>
				<a href="#" class="menu-item monthes">يونيو</a>
				<a href="#" class="menu-item monthes">يوليو</a>
				<a href="#" class="menu-item monthes">اغسطس</a>
				<a href="#" class="menu-item monthes">سبتمبر</a>
				<a href="#" class="menu-item monthes">اكتوبر</a>
				<a href="#" class="menu-item monthes">نوفمبر</a>
				<a href="#" class="menu-item monthes">ديسمبر</a>
			</nav>
		</aside>
	</div>


<section class="container col-lg-10 col-md-11">
    <div class="container">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">عمليات الشراء</h2>
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
                        <th>السعر</th>
                        <th>عدد المنتجات</th>
                        <th>حالة الطلب</th>
                        <th>تاريخ الطلب</th>
                        <th>تقييم الخدمة</th>
                        <th>التفاصيل</th>
                    </tr>
                </thead>

                @foreach ($purchases as $purchase)
                <tbody>
                    <tr>
                        <th>{{ $purchase->random_id }}</th>
                        <td>{{ $purchase->order->user->name }}</td>
                        <td>{{ $purchase->order->total_price }}</td>
                        <td>{{ $purchase->order->products_count }}</td>

                        @if($purchase->order->order_status == 'جديد')
                            <td class="text-danger">{{ $purchase->order->order_status }}</td>
                        @elseif($purchase->order->order_status == 'قيد التجهيز')
                            <td class="text-warning">{{ $purchase->order->order_status }}</td>
                        @elseif($purchase->order->order_status == 'تم الاستلام')
                            <td class="text-success">{{ $purchase->order->order_status }}</td>
                        @else
                            <td class="text-dark">{{ $purchase->order->order_status }}</td>
                        @endif

                        <td>{{ $purchase->order->created_at }}</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{ route('restaurantPurchasesDetails', $purchase->id) }}" class="btn bg-white text-warning"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
    </div> <!-- container -->
    </div>
    </div> <!-- container -->
</section>
@endsection
