@extends('admin.layouts.app')
@section('content')
@section('title')
    تغيير كلمة المرور
@endsection

@if (session()->has('passwordInCorrect'))
    <script>
        window.onload = function() {
            notif({
                msg: "كلمة المرور غير متطابقة",
                type: "warning"
            })
        }
    </script>
@endif

<section>
    <div class="container text-center">
        <div class="row d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">تغيير كلمة المرور</h2>
            </div>
        </div> <!-- row -->

        <form action="{{ route('changePassword', auth()->user()->id) }}" method="post">
            @csrf
            <div class="mt-lg-0 text-end">
                <div class="row d-flex justify-content-center flex-row-reverse col-12">
                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="fw-bold mb-3">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control rounded-0" name="password1" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="fw-bold mb-3">تأكيد كلمة المرور الجديدة</label>
                        <input type="password" class="form-control rounded-0" name="password2" required>
                    </div>
                </div> <!-- col-4 -->
            </div> <!-- row -->
        </div>

        <div class="mt-5">
            <button type="submit" id="login" class="btn btn-block mx-5 px-5">تحديث</button>
            <a id="coupon" href="{{ route('personalInfo') }}" class="btn btn-block mx-5 px-5">الغاء</a>
        </div>
    </form>

    </div> <!-- container -->
</section>

@endsection
