@extends('admin.layouts.app')
@section('title')
    {{ __('offers.offers') }}
@endsection

@if (session()->has('addCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.addCoupon') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editCoupon') }}",
                type: "primary"
            })
        }
    </script>
@endif

@if (session()->has('addPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.addPackage') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('editPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.editPackage') }}",
                type: "primary"
            })
        }
    </script>
@endif

@if(session()->has('deleteOffer'))
<script>
    window.onload = function() {
        notif({
            msg: "{{ __('messages.deleteOffer') }}",
            type: "primary"
        })
    }
</script>
@endif

@if (session()->has('activationCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.activationCoupon') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deactivationCoupon'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deactivationCoupon') }}",
                type: "error"
            })
        }
    </script>
@endif

@if (session()->has('activationPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.activationPackage') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('deactivationPackage'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ __('messages.deactivationPackage') }}",
                type: "error"
            })
        }
    </script>
@endif

@section('content')
<section class="container col-lg-12">
    <div class="col-12 d-flex flex-row-reverse p-0">
        <div class="col-6 section-title text-start p-0" id="headtitle">
            <h2 class="text-black text-end">{{ __('offers.offers') }}</h2>
        </div>

        <div class="col-6 text-start" id="smbtn">
            <a href="{{ route('ExportOffersPDF') }}" id="pdf" class="btn btn-success"><i class="fa fa-thin fa-print"></i>PDF</a>
            <a id="login" class="btn px-4" data-bs-toggle="modal" href="#staticBackdrop" role="button">{{ __('offers.add_offer') }}</a>
        </div>
    </div> <!-- row -->

        <div class="mt-4">
        <div class="mb-5 restable">
            <table class="table text-center" dir="rtl">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('offers.offer_type') }}</th>
                        <th>{{ __('offers.user_count') }}</th>
                        <th>{{ __('offers.status') }}</th>
                        <th>{{ __('offers.start_time') }}</th>
                        <th>{{ __('offers.end_time') }}</th>
                        <th>{{ __('offers.offer_control') }}</th>
                    </tr>
                </thead>

                @foreach($offers as $key => $offer)
                <tbody>
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $offer->offer_type }}</td>
                        <td>{{ $offer->users_count }}</td>
                        @if ($offer->status == 'مفعل')
                            <td class="fw-bold">
                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{ route('couponDetails', $offer->coupon_id) }}" class="text-success">{{ __('restaurent.available') }}</a>
                                @else
                                    <a href="{{ route('packageDetails', $offer->package_id) }}" class="text-success">{{ __('restaurent.available') }}</a>
                                @endif
                            </td>
                        @else
                            <td class="fw-bold">
                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{ route('couponDetails', $offer->coupon_id) }}" class="text-danger">{{ __('restaurent.notavailable') }}</a>
                                @else
                                    <a href="{{ route('packageDetails', $offer->package_id) }}" class="text-danger">{{ __('restaurent.notavailable') }}</a>
                                @endif
                            </td>
                        @endif
                        <td>{{ $offer->start_date }}</td>

                        @if($offer->end_date < now())
                            <td class="text-danger fw-bold">{{ $offer->end_date }}</td>
                        @else
                            <td>{{ $offer->end_date }}</td>
                        @endif

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
                                <h2>{{ __('offers.delete_question') }}</h2>
                            </div>

                            <div class="d-flex justify-content-around my-4">
                                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">{{ __('offers.cancel') }}</button>

                                @if ($offer->offer_type == 'coupon')
                                    <a href="{{route('deleteCoupon', $offer->coupon_id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>
                                @else
                                    <a href="{{route('deletePackage', $offer->package_id) }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('restaurent.delete') }}</a>
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
                <h2>{{ __('offers.add_question') }}</h2>
            </div>

            <div class="d-flex justify-content-around my-4">
                <a href="{{ route('addCouponPage') }}" id="coupon" type="button" class="btn btn-block btn-bordered px-5">{{ __('offers.coupon') }}</a>
                <a href="{{ route('addPackagePage') }}" id="package" type="button" class="btn btn-block px-5 text-white">{{ __('offers.package') }}</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->

@endsection
