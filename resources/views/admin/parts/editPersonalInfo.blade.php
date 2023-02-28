@extends('admin.layouts.app')
@section('content')
@section('title')
    تعديل المعلومات الشخصية
@endsection

<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">تعديل المعلومات الشخصية</h2>
            </div>
        </div> <!-- row -->


        <form action="#" method="post">
            <div class="mt-lg-0 text-end">

                <div class="form-group text-center mt-3">
                    <img src="{{ asset("images/NoPath - Copy (35).png") }}" width="150" height="150" alt="">
                </div>

                <div class="row d-flex justify-content-center flex-row-reverse col-12">

                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="mb-3">اسم الشركة</label>
                        <input type="text" class="form-control rounded-0" name="CompanyName" id="CompanyName" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">رقم السجل التجاري/ معروف</label>
                        <input type="text" class="form-control rounded-0" name="number" id="number" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">رقم الجوال</label>
                        <input type="text" class="form-control rounded-0" name="phone" id="phone" required>
                    </div>
                </div> <!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mt-3">
                        <label class="mb-3">نوع النشاط</label>
                        <select class="form-control rounded-0" name="ActiveType">
                            <option value="">اختر نوع النشاط</option>
                            <option value=""> </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">صورة السجل التجاري/ معروف</label><br>
                        <label for="file" class="upload form-control"><i class="fa fa-duotone fa-cloud-arrow-up text-secondary"></i> ارفع السجل التجاري\ معروف</label>
                        <input type="file" class="form-control rounded-0" name="image" id="file" required>
                    </div>

                    <div class="form-group mt-3">
                        <label class="mb-3">البريد الالكتروني</label>
                        <input type="email" class="form-control rounded-0" name="email" id="email" required>
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->
            </form>
        </div>

        <div class="mt-5 text-center">
            <a id="login" href="admin" class="btn px-5 mx-5">حفظ التعديلات</a>
        </div>
    </div> <!-- container -->
</section>

@endsection
