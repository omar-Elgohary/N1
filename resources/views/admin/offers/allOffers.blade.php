@extends('admin.layouts.app')
@section('title')
    العروض
@endsection

@if (session()->has('addCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة الكوبون بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل الكوبون بنجاح ',
                type: "primary"
            })
        }
    </script>
@endif

@if (session()->has('addPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم اضافة الباكدج بنجاح ',
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: 'تم تعديل الباكدج بنجاح ',
                type: "primary"
            })
        }
    </script>
@endif

@if(session()->has('deleteOffer'))
<script>
    window.onload = function() {
        notif({
            msg: 'تم حذف العرض بنجاح ',
            type: "primary"
        })
    }
</script>
@endif

@if (session()->has('activationCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تفعيل الكوبون بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deactivationCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم الغاء تفعيل الكوبون بنجاح",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('activationPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تفعيل الباكدج بنجاح",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deactivationPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم الغاء تفعيل الباكدج بنجاح",
                type: "error"
            })
        }
    </script>
@endif

@section('content')
<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">العروض</h2>
            </div>

            <div class="col-lg-6 text-start">
                <a href="#" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i>PDF</a>
                <a id="login" class="btn px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">اضافة عرض جديد</a>
            </div>
        </div> <!-- row -->

        <div class="mt-4">
            <table class="table text-center" dir="rtl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نوع العرض</th>
                        <th>عدد المستخدمين</th>
                        <th>الحالة</th>
                        <th>تاريخ البداية</th>
                        <th>تاريخ النهاية</th>
                        <th>التحكم بالعرض</th>
                    </tr>
                </thead>

                @foreach(\App\Models\Offer::all() as $key => $offer)
                <tbody>
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $offer->offer_type }}</td>
                        <td>{{ $offer->users_count }}</td>
                        @if ($offer->status == 'مفعل')
                            <td>
                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{ route('couponDetails', $offer->coupon_id) }}" class="text-success">{{ $offer->status }}</a>
                                @else
                                    <a href="{{ route('packageDetails', $offer->package_id) }}" class="text-success">{{ $offer->status }}</a>
                                @endif
                            </td>
                        @else
                            <td>
                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{ route('couponDetails', $offer->coupon_id) }}" class="text-danger">{{ $offer->status }}</a>
                                @else
                                    <a href="{{ route('packageDetails', $offer->package_id) }}" class="text-danger">{{ $offer->status }}</a>
                                @endif
                            </td>
                        @endif
                        <td>{{ $offer->start_date }}</td>
                        <td>{{ $offer->end_date }}</td>
                        <td>
                            @if ($offer->offer_type == 'coupon')
                                <a href="{{ route('editCoupon', $offer->coupon_id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            @else
                                <a href="{{ route('editPackage', $offer->package_id) }}" class="btn bg-white text-success"><i class="fa fa-edit"></i></a>
                            @endif

                            <a href="#deleteOffer{{ $offer->id }}" class="btn bg-white text-danger" data-bs-toggle="modal"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>

                {{-- delete offer --}}
                <div class="modal fade border-0" id="deleteOffer{{ $offer->id }}" aria-hidden="true" aria-labelledby="deleteOfferLabel" tabindex="-1" dir="rtl">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="btn-x modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body text-center my-5">
                                <h2>هل أنت متأكد من حذف هذا العرض؟</h2>
                            </div>

                            <div class="d-flex justify-content-around my-4">
                                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>

                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{route('deleteCoupon', $offer->coupon_id) }}" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
                                @else
                                    <a href="{{route('deletePackage', $offer->package_id) }}" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
                                @endif

                            </div>
                        </div> <!-- modal-content -->
                    </div> <!-- modal-dialog -->
                </div> <!-- modal fade -->

                @endforeach
            </table>


    </div>
</div> <!-- container -->
</section>

{{-- modal --}}
<div class="modal fade border-0" id="staticBackdrop" aria-hidden="true" aria-labelledby="staticBackdropLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center my-5">
                <h2>هل تريد اضافة عرض أو بكج؟</h2>
            </div>

            <div class="d-flex justify-content-around my-4">
                <a href="{{ route('addCouponPage') }}" id="coupon" type="button" class="btn btn-block btn-bordered px-5">عرض</a>
                <a href="{{ route('addPackagePage') }}" id="package" type="button" class="btn btn-block px-5 text-white">بكج</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
