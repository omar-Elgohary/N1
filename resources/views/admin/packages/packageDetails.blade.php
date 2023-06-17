@extends('admin.layouts.app')
@section('title')
    تفاصيل الباكدج
@endsection

@section('content')
<section>
    <div class="container" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تفاصيل البكج</h3>
        </div>

        <div class="row col-12">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <img src="{{ asset('assets/images/offers/'.$package->image) }}" style="width: 100%" alt="">
            </div>
        </div>

            <div class="col-lg-4 mt-5">
                <div class="form-group my-4">
                    <label class="text-black">حالة العرض</label>
                    <label class="text-success mx-5" style="font-weight: bold;">مفعل</label>
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label><img src="{{ asset('images/NoPath - Copy (2).png') }}" alt=""></label>
                    <label class="mx-5">
                        <h5 class="text-black">{{ $package->first_meal }}</h5>
                    </label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label><img src="{{ asset('images/NoPath - Copy (2).png') }}" alt=""></label>
                    <label class="mx-5">
                        <h5 class="text-black">{{ $package->second_meal }}</h5>
                    </label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label class="text-black">تاريخ البداية</label>
                    <label class="text-black mx-5">{{ $package->start_date }}</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label class="text-black">تاريخ النهاية</label>
                    <label class="text-black mx-5">{{ $package->end_date }}</label>
                </div> <!-- 5 -->

                <div class="form-group my-4">
                    <label class="text-black">السعر</label>
                    <label class="text-black mx-5">{{ $package->price }} رس</label>
                </div> <!-- 6 -->
            </div> <!-- col-4 -->

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="{{ route('editPackage', $package->id) }}" class="btn mb-3">تعديل</a>
            <a href="#Deactivation" id="coupon" class="btn" data-bs-toggle="modal">الغاء التفعيل</a>
        </div>
    </div> <!-- container -->
</section>


{{-- Deactivation --}}
<div class="modal fade border-0" id="Deactivation" aria-hidden="true" aria-labelledby="DeactivationLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center text-black my-5">
                <h2>هل أنت متأكد من الغاء تفعيل هذا العرض؟</h2>
            </div>

            <div class="modal-footer d-flex justify-content-around">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a id="package" href="DeactivationPackage" class="btn btn-block px-5 text-white">الغاء التفعيل</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
