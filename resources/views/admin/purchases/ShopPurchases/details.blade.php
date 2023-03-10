@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 section-title text-end p-0">
                <h2 class="text-black">تفاصيل عملية الشراء</h2>
            </div>

            <div class="col-6 text-start mb-3">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4 mt-3">
            <div class="form-group my-4">
                <label style="margin-left: 70px">رقم الطالب</label>
                <strong>1095454654</strong> | <strong class="text-warning">قيد التجهيز</strong>
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label>اسم المستخدم</label>
                <strong class="mx-5">اسم المستخدم</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">تاريخ الطلب</label>
                <strong class="mx-5">0000/00/00</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label>اجمالي السعر</label>
                <strong class="mx-5">540 رس</strong>
            </div> <!-- 4 -->
        </div> <!-- col-4 -->

    <hr>

        <div class="col-lg-4 mt-3">
            <strong>تفاصيل الطلب</strong>
            <div class="col-12">
                <div class="col-3">
                    <img src="{{ asset('images/Scroll Group 4.png') }}" alt="">
                </div>
            </div> <!-- 1 -->
        </div> <!-- col-4 -->
    </div> <!-- container -->
</section>

@endsection
