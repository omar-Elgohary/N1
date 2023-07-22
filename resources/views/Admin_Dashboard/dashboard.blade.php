@extends('Admin_Dashboard.layouts.app')
@section('title')
    لوحة التحكم
@endsection

@section('content')

<div class="main-content">
<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">لوحة التحكم</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::where('type', 'user')->count() }}</span></h4>
                        <p class="text-muted mb-0">عدد مستخدمين الموقع</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::where('department_id', 1)->count() }}</span></h4>
                        <p class="text-muted mb-0">أعضاء المطاعم</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::where('department_id', 2)->count() }}</span></h4>
                        <p class="text-muted mb-0">أعضاء المتاجر</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::where('department_id', 3)->count() }}</span></h4>
                        <p class="text-muted mb-0">أعضاء الترفيه</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">اخر العروض</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-4">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>توع العرض</th>
                                    <th>عدد المستخدمين</th>
                                    <th>حالة العرض</th>
                                    <th>تاريخ البداية</th>
                                    <th>تاريخ الانتهاء</th>
                                </tr>
                            </thead>

                            @forelse($offers = \App\Models\Offer::paginate(5) as $offer)
                            <tbody>
                                <tr>
                                    <td>{{ $offer->id }}</td>

                                @if ($offer->offer_type == 'coupon')
                                    <td class="text-primary fw-bold">{{ $offer->offer_type }}</td>
                                @else
                                    <td class="text-warning fw-bold">{{ $offer->offer_type }}</td>
                                @endif
                                <td>{{ $offer->users_count }}</td>

                                @if ($offer->status == 'مفعل')
                                    <td class="badge bg-soft-success">{{ $offer->status }}</td>
                                @else
                                    <td class="badge bg-soft-danger">{{ $offer->status }}</td>
                                @endif

                                <td>{{ $offer->start_date }}</td>
                                <td>{{ $offer->end_date }}</td>
                            </tr>
                        </tbody>
                        @empty
                            <tr>
                                <th class="text-danger" colspan="10">
                                    لا يوجد بيانات
                                </th>
                            </tr>
                        @endforelse
                        </table>
                        {{ $offers->links("pagination::bootstrap-4") }}


                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection
