@extends('admin.layouts.app')
@section('title')
    اضافة فعالية جديدة
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">اضافة فعالية جديدة</h3>
        </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('storeEvent') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="drop-zone">
                <span class="drop-zone__prompt">اضغط أو اسحب الصور الى هنا</span>
                <input type="file" name="event_image" class="drop-zone__input" multiple>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label class="mt-4">القسم</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror">
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>اسم الفعالية</label>
                    <input type="text" name="event_name" class="form-control rounded-0 mb-4 mt-2 @error('product_name') is-invalid @enderror">
                    @error('event_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="description" class="form-control rounded-0 mb-4 mt-2 @error('description') is-invalid @enderror">
                    @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>سعر التذكرة</label>
                    <input type="text" name="ticket_price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2 @error('ticket_price') is-invalid @enderror">
                    @error('ticket_price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>عدد التذاكر</label>
                    <input type="text" name="tickets_quantity" class="form-control rounded-0 mb-4 mt-2 @error('tickets_quantity') is-invalid @enderror">
                    @error('tickets_quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->


                <div class="branches mt-5">
                    <label>أنواع الحجز :</label>
                    @forelse ($reservationTypes as $type)
                        <div class="form-group my-3">
                            <label class="custom-checks text-black">{{ $type->name}}
                                <input name="reservations_type_id[]" value="{{ $type->id }}" type="checkbox">
                                <span class="checkmark pb-1"></span>
                            </label>
                        </div>
                    @empty
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black text-bold">لا يوجد فروع اخرى
                            </label>
                        </div>
                    @endforelse
                </div> <!-- branches -->

            <hr>

                <div class="row mt-5">
                    <h5>أوقات الحجز</h5>
                    <div class="col-lg-6">
                        <div class="form-group mt-3">
                            <input type="date" class="form-control rounded-0  @error('reservation_date') is-invalid @enderror" name="reservation_date">
                            @error('reservation_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="time" class="form-control rounded-0  @error('reservation_time') is-invalid @enderror" name="reservation_time">
                            @error('reservation_time')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div> <!-- col-6 -->
                </div> <!-- row -->

                <div class="mt-5">
                    <h5>تاريخ بدء الحجوزات</h5>
                    <p class="fs-6">سيتم نشر الفعالية وتفعيل حجز التتذاكر بناءا على التاريخ المحدد هنا</p>
                    <div class="form-group mt-3">
                        <input type="date" name="start_reservation_date" class="form-control rounded-0 @error('start_reservation_date') is-invalid @enderror">
                        @error('start_reservation_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">اضافة</button>
                <a id="coupon" href="events" class="btn">الغاء</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
