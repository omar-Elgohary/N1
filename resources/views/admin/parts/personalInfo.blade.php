@extends('admin.layouts.app')
@section('content')
@section('title')
    المعلومات الشخصية
@endsection

<section>
    <div class="container">
        <div class="row text-center d-flex flex-row-reverse">
            <div class="col-lg-6">
                <h2 class="text-black text-end">المعلومات الشخصية</h2>
            </div>
        </div> <!-- row -->

        <div class="col-6 mx-auto text-center mt-4">
            <form action="#" method="post">

                <div class="form-group">
                    <img src="{{ asset("images/NoPath - Copy (35).png") }}" width="150" height="150" alt="">
                    <h3 class="text-black mt-4">اسم الشركة</h3>
                    <h5>+966131354777</h5>
                    <p>aa@gmail.com</p>
                </div> <!-- 1 -->
                <hr>

                <div class="form-group">
                    <p class="text-black"> السجل التجاري: 10465461854</p>
                </div> <!-- 2 -->

                <div class="form-group">
                    <p class="text-black"> نوع النشاط: متجر منتجات</p>
                </div> <!-- 3 -->
            </form>

            <div class="d-flex justify-content-around mt-5 bttn">
                <a id="login" href="editPersonalInfo" class="btn">تعديل المعلومات الشخصية</a>
                <a id="coupon" href="changePassword" class="btn">تغيير كلمة المرور</a>
            </div>
        </div>
    </div> <!-- container -->
</section>

@endsection
