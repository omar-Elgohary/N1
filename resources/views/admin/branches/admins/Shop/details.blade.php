@extends('admin.layouts.app')
@section('title')
    تفاصيل المنتج
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تفاصيل المنتج</h3>
        </div>

        <form action="#" method="post">
            <div class="col-lg-12 pt-0 p-2">
                <img src="{{ asset('assets/images/products/'.$product->product_image) }}" class="m-1 mt-0" height="150" alt="">
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>الحالة</label>
                    @if ($product->status == 'متوفر')
                        <label class="text-success fw-bold -bold mx-5">{{ $product->status }}</label>
                    @else
                        <label class="text-danger fw-bold -bold mx-5">{{ $product->status }}</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>الاسم</label>
                    <label class="mx-5">{{ $product->product_name }}</label>
                </div> <!-- 2 -->

                <div class="form-group my-4">
                    <label>الوصف</label>
                    <label class="mx-5">{{ $product->description }}</label>
                </div> <!-- 3 -->

                <div class="form-group my-4">
                    <label>السعر</label>
                    <label class="mx-5">{{ $product->price }} ريال سعودي</label>
                </div> <!-- 4 -->

                <div class="form-group my-4">
                    <label>المقاس</label>
                    <label class="mx-5">{{ \App\Models\Size::where('id', $product->size_id)->first()->size }}</label>
                </div> <!-- 5 -->

                <div class="form-group my-4">
                    <label>اللون</label>
                    <label class="mx-5">{{ \App\Models\Color::where('id', $product->color_id)->first()->color }}</label>
                </div> <!-- 6 -->

                <div class="form-group my-4">
                    <label>الفئة</label>
                    <label class="mx-5">{{ $product->category->name }}</label>
                </div> <!-- 7 -->

                <div class="form-group my-4">
                    <label>المتوفر</label>
                    <label class="mx-5">{{ $product->remaining_quantity }} منتجات</label>
                </div> <!-- 7 -->
            </div> <!-- col-4 -->

        <hr>

            <div class="col-lg-4 mt-3">
                <div class="form-group my-4">
                    <label>هل من الممكن اعادة المنتج؟</label>
                    @if($product->returnable == 'نعم')
                        <label class="fw-bold mx-5">نعم خلال 7 أيام</label>
                    @else
                        <label class="fw-bold mx-5">لا</label>
                    @endif
                </div> <!-- 1 -->

                <div class="form-group my-4">
                    <label>هل يوجد ضمان للمنتج؟</label>
                    @if($product->guarantee == 'نعم')
                        <label class="fw-bold mx-5">نعم مدة 3 شهور</label>
                    @else
                        <label class="fw-bold mx-5">لا</label>
                    @endif
                </div> <!-- 2 -->
            </div> <!-- col-4 -->


            <div class="col-lg-8 mt-3">
                <div class="form-group my-4 d-flex">
                    <div class="col-3">
                        <p>الفروع التي توفر المنتج:</p>
                    </div>

                    <div class="col-5">
                        <table class="table">
                            <thead style="background-color: #fff">
                                <tr>
                                    <th>عنوان الفرع</th>
                                    <th>عدد المنتجات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Branch::where('id', $product->branche_id)->get() as $branche)
                                <tr>
                                    <td>{{ $branche->branche_title }}</td>
                                    <td>{{ $product->remaining_quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- 1 -->
            </div> <!-- col-4 -->
        </form>
    </div> <!-- container -->
</section>

@endsection
