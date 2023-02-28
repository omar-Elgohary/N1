@extends('admin.layouts.app')
@section('content')
@section('title')
    تغيير كلمة المرور
@endsection

<section>
    <div class="container text-center">
        <div class="row d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">تغيير كلمة المرور</h2>
            </div>
        </div> <!-- row -->

        <form action="#" method="post">
            <div class="mt-lg-0 text-end">
                <div class="row d-flex justify-content-center flex-row-reverse col-12">

                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="fw-bold mb-3">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control rounded-0" name="password" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="fw-bold mb-3">تأكيد كلمة المرور الجديدة</label>
                        <input type="password" class="form-control rounded-0" name="password" required>
                    </div>
                </div> <!-- col-4 -->
            </div> <!-- row -->
            </form>
        </div>

        <div class="mt-5">
            <a id="login" href="personalInfo" class="btn btn-block mx-5 px-5">تحديث</a>
            <a id="coupon" href="personalInfo" class="btn btn-block mx-5 px-5">الغاء</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
