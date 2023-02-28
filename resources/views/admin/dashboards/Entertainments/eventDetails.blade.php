@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تفاصيل الفعالية</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('images/Mask Group 8511.png') }}" class="m-1 mt-0" height="150" alt="">
                <img src="{{ asset('images/Mask Group 8512.png') }}" class="m-1 mt-0" height="150" alt="">
                <img src="{{ asset('images/Mask Group 8513.png') }}" class="m-1 mt-0" height="150" alt="">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>الحالة</label>
                    <label class="text-secondary fw-bold mx-5">لم يبدأ بعد</label>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>الاسم</label>
                    <label class="mx-5">اسم الفعالية</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>الوصف</label>
                    <label class="mx-5">وصف قصير للفعالية ومكوناته</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>عدد التذاكر</label>
                    <label class="mx-5">560 تذكرة</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>الحجوزات</label>
                    <label class="mx-5">230 تذكرة</label>
                </div> <!-- 5 -->

                <div class="form-group col-12 my-5 d-grid">
                    <div class="col-4 mb-3">
                        <label>أنواع الحجز</label>
                    </div>

                    <div class="col-12 d-flex">
                        <h5 class="fw-bold">النوع الأول</h5>
                        <p class="mx-5">50 ريال سعودي</p>
                    </div>
                </div> <!-- 6 -->

                <div class="form-group col-lg-12 my-4 d-grid">
                    <div class="col-4 mb-3">
                        <h5>أوقات الحجز</h5>
                    </div>

                    <div class="container smca col-10 d-flex text-center">
                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>00/00</h5>
                            <h5>ص 00:00 - 00:00</h5>
                        </div>

                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>00/00</h5>
                            <h5>ص 00:00 - 00:00</h5>
                        </div>

                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>00/00</h5>
                            <h5>م 00:00 - 00:00</h5>
                        </div>

                        <div id="SmallCard" class="col-lg-6 mx-3">
                            <h5>00/00</h5>
                            <h5>م 00:00 - 00:00</h5>
                        </div>

                    </div>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="editEvents" class="btn mb-3">تعديل</a>
            <a id="coupon" href="#deleteEvent" class="btn" data-bs-toggle="modal">حذف الفعالية</a>
        </div>
    </div> <!-- container -->
</section>


{{-- deleteEvent --}}
<div class="modal fade border-0" id="deleteEvent" aria-hidden="true" aria-labelledby="deleteEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center fw-bold my-5">
                <h2>هل أنت متأكد من حذف هذا الفعالية؟</h2>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>

            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


{{-- DeactivationEvent --}}
<div class="modal fade" id="DeactivationEvent" aria-hidden="true" aria-labelledby="DeactivationEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered rounded-0">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h3>هل أنت متأكد من ايقاف نشر هذه الفعالية؟</h3>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">تأكيد الايقاف</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
