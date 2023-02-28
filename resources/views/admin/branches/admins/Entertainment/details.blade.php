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
                    <label class="text-success mx-5">متاح</label>
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

                <div class="form-group col-12 my-4 d-grid">
                    <div class="col-4 mb-3">
                        <label>أنواع الحجز</label>
                    </div>

                    <div class="col-12 d-flex">
                        <h5>النوع الأول</h5>
                        <p class="mx-5">50 ريال سعودي</p>
                    </div>
                </div> <!-- 6 -->

                <div class="form-group col-12 my-4 d-grid">
                    <div class="col-4 mb-3">
                        <h5>أوقات الحجز</h5>
                    </div>

                    <div id="smallcard" class="container col-12 d-flex text-center">
                        <div id="SmallCard" class="col-5 mx-3">
                            <h5>00/00</h5>
                            <h5>00:00 - 00:00 ص</h5>
                        </div>

                        <div id="SmallCard" class="col-5 mx-3">
                            <h5>00/00</h5>
                            <h5>00:00 - 00:00 ص</h5>
                        </div>

                        <div id="SmallCard" class="col-5 mx-3">
                            <h5>00/00</h5>
                            <h5>00:00 - 00:00 م</h5>
                        </div>

                        <div id="SmallCard" class="col-5 mx-3">
                            <h5>00/00</h5>
                            <h5>00:00 - 00:00 م</h5>
                        </div>
                    </div>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->
        </form>
    </div> <!-- container -->
</section>

@endsection
