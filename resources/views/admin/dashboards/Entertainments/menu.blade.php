@extends('admin.layouts.app')
@section('title')
    قائمة الفعاليات
@endsection

@section('content')
<div class="col-12 d-flex flex-row-reverse text-end">
<section class="container col-10">
    <div class="container">
    <div class="section-title text-end">
        <h2 class="text-black">قائمة الفعاليات</h2>
    </div>


    <div class="text-center mt-4">
        <h2>ابدأ باضافة الفعاليات</h2>
        <a id="login" class="btn mt-2 px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">اضافة مقر فعاليات</a>
    </div>
    </div> <!-- container -->
</section>
</div><!-- col-12 -->



<div class="modal fade" id="staticBackdrop" aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered rounded-0">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ route('createEntertainmentCategory') }}" method="POST">
        @csrf
            <div class="modal-body col-lg-6 col-md-6 col-sm-6 mx-auto my-5">
                <h4 class="text-end">اسم المقر</h4>
                <input type="text" name="name" class="form-control rounded-0">
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">الغاء</button>
                <button type="submit" id="package" type="button" class="btn btn-block px-5 text-white">اضف</button>
            </div>
        </form>

        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


@endsection
