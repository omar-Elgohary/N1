@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-4">

    <div class="section-title text-end">
        <h2 class="text-black">العروض</h2>
    </div>


    <div class="text-center mt-4">
        <h2>ابدأ باضافة العروض</h2>
        <a id="login" class="btn mt-2 px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">اضافة عرض جديد</a>
    </div>
    </div> <!-- container -->
</section>

<div class="modal fade border-0" id="staticBackdrop" aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2>هل تريد اضافة عرض أو بكج؟</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <a href="{{ route('addCouponPage') }}" id="coupon" class="btn btn-block px-5">عرض</a>
                <a href="{{ route('addPackagePage') }}" id="package" type="button" class="btn btn-block px-5 text-white">بكج</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
