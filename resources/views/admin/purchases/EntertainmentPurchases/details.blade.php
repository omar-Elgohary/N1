@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="col-12 d-flex p-0">
            <div class="col-6 section-title text-end p-0">
                <h2 class="text-black">تفاصيل عملية الحجز</h2>
            </div>

            <div class="col-6 text-start">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i><br><small>PDF</small> </a>
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-file-excel"></i><br><small>Excel</small> </a>
            </div>
        </div> <!-- col-12 -->

        <div class="col-lg-4">
            <div class="form-group mt-4">
                <input type="text" value="حجز مؤكد" class="form-control bg-secondary">
            </div> <!-- 1 -->

            <div class="form-group my-4">
                <label style="margin-left: 70px">رقم الطالب</label>
                <strong>1095454654</strong>
            </div> <!-- 2 -->

            <div class="form-group my-4">
                <label>اسم المستخدم</label>
                <strong class="mx-5">اسم المستخدم</strong>
            </div> <!-- 3 -->

            <div class="form-group my-4">
                <label style="margin-left: 20px">عدد التذاكر</label>
                <strong class="mx-5">4 تذاكر</strong>
            </div> <!-- 4 -->

            <div class="form-group my-4">
                <label>تاريخ الحجز</label>
                <strong class="mx-5">0000/00/00</strong>
            </div> <!-- 5 -->

            <div class="form-group my-4">
                <label>اجمالي السعر</label>
                <strong class="mx-5">452 رس</strong>
            </div> <!-- 6 -->

        </div> <!-- col-4 -->
    </div> <!-- container -->
</section>

@endsection
