@extends('Admin_Dashboard.layouts.app')
@section('title')
    ترقية الحسابات
@endsection

@section('content')
<div class="main-content">

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">ترقية الحسابات</h4>
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
                                <th>اسم العميل</th>
                                <th>الايميل</th>
                                <th>رقم الجوال</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }} {{ $user->country_code }}</td>

                                <td>
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        ترقية <i class="uil uil-check me-2"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger waves-effect waves-light">
                                        رفض <i class="uil uil-exclamation-octagon me-2"></i>
                                    </button>
                                </td>
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
