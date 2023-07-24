@extends('Admin_Dashboard.layouts.app')
@section('title')
    مقدمي الخدمة
@endsection

@section('content')

<div class="main-content">
<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">اتصل بنا</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"></h4>
                <div class="table-responsive text-center">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم مقدم الخدمة</th>
                                <th>اسم الشركة</th>
                                <th>القسم</th>
                                <th>الايميل</th>
                                <th>رقم الجوال</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($sellers as $key => $seller)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->company_name }}</td>

                                @if($seller->department_id == 1)
                                    <td class="text-primary fw-bold">{{ $seller->department->name }}</td>
                                @elseif($seller->department_id == 2)
                                    <td class="text-danger fw-bold">{{ $seller->department->name }}</td>
                                @else
                                    <td class="text-warning fw-bold">{{ $seller->department->name }}</td>
                                @endif

                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->phone }} {{ $seller->country_code }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-danger text-center fw-bold" colspan="6">
                                    لا يوجد بيانات
                                </th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div><!-- end table-responsive -->
            </div>
        </div>
    </div>
</div><!-- end row -->
</div> <!-- container-fluid -->
</div>
@endsection
