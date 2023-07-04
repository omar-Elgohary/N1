@extends('admin.layouts.app')
@section('title')
    أدمن متجر المحلات
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
			<h3 class="text-black">الفئات</h3>
			<nav class="menu">
				<a href="#" class="menu-item is-active">الكل</a>
                @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                    <a href="#" class="menu-item">{{ $category->name}}</a>
                @endforeach
			</nav>
		</aside>
	</div>


<section class="container col-10">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-end p-0">
            <h2 class="text-black">قائمة المنتجات</h2>
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
                        <th>اسم المنتج</th>
                        <th>الحالة</th>
                        <th>السعر</th>
                        <th>الكمية المباعة</th>
                        <th>الكمية المتبقية</th>
                        <th>القسم</th>
                        <th>تقييم المنتج</th>
                        <th>التفاصيل</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->random_id }}</td>
                        {{-- <td>
                            <a href="{{ route('shopProductDetails', $product->id) }}" class="text-warning">{{ $product->product_name}}</a>
                        </td> --}}
                        <td>
                            <a href="{{ route('ShopAdminDetails', $product->id) }}" class="text-warning">{{ $product->product_name}}</a>
                        </td>
                        @if ($product->status == 'متوفر')
                            <td class="text-success mx-5">{{ $product->status }}</td>
                        @else
                            <td class="text-danger mx-5">{{ $product->status }}</td>
                        @endif
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sold_quantity }}</td>
                        <td>{{ $product->remaining_quantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        <td>
                            <a href="{{route('editShopProduct', $product->id)}}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            <a href="#deleteProduct{{$product->id}}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
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
