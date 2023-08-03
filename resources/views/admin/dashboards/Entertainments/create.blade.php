@extends('admin.layouts.app')
@section('title')
    {{ __('events.add_new_event') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">{{ __('events.add_new_event') }}</h3>
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
                <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                <input type="file" name="event_image" class="drop-zone__input" multiple>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>{{ __('events.category') }}</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2 @error('category_id') is-invalid @enderror" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                        <option value="" selected disabled>{{ __('restaurent.choose_category') }}</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 1 -->

                <div class="form-group">
                    <label for="inputName">{{ __('restaurent.sub_category') }}</label>
                    <select name="sub_category_name" id="sub_category_name" class="form-control rounded-0 mb-4 mt-2">
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('events.event_name_ar') }}</label>
                    <input type="text" name="name_ar" id="arabicNameInput" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">
                    <p id="errorText_ar" class="error-message"></p>
                    @error('name_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('events.event_name_en') }}</label>
                    <input type="text" name="name_en" id="englishNameInput" class="form-control rounded-0 mb-4 mt-2 @error('name_en') is-invalid @enderror">
                    <p id="errorText_en" class="error-message"></p>
                    @error('name_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_ar') }}</label>
                    <input type="text" name="description_ar" id="arabicDescInput" class="form-control rounded-0 mb-4 mt-2 @error('description_ar') is-invalid @enderror">
                    <p id="errorDesc_ar" class="error-message"></p>
                    @error('description_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_en') }}</label>
                    <input type="text" name="description_en" id="englishDescInput" class="form-control rounded-0 mb-4 mt-2 @error('description_en') is-invalid @enderror">
                    <p id="errorDesc_en" class="error-message"></p>
                    @error('description_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('events.ticket_price') }}</label>
                    <input type="text" name="ticket_price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2 @error('ticket_price') is-invalid @enderror">
                    @error('ticket_price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 7 -->

                <div class="form-group">
                    <label>{{ __('events.tickets_number') }}</label>
                    <input type="text" name="tickets_quantity" class="form-control rounded-0 mb-4 mt-2 @error('tickets_quantity') is-invalid @enderror">
                    @error('tickets_quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 8 -->


                <div class="branches mt-5">
                    <label>{{ __('events.reservation_type') }} :</label>
                    @forelse ($reservationTypes as $type)
                        <div class="form-group my-3">
                            <label class="custom-checks text-black">{{ $type->name}}
                                <input name="reservations_type_id[]" value="{{ $type->id }}" type="checkbox">
                                <span class="checkmark pb-1"></span>
                            </label>
                        </div>
                    @empty
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black text-bold">{{ __('restaurent.nodata') }}
                            </label>
                        </div>
                    @endforelse
                </div> <!-- branches -->

            <hr>

                <div class="row mt-5">
                    <h5>{{ __('events.reservation_time') }}</h5>
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
                    <h5>{{ __('events.reservation_start_date') }}</h5>
                    <p class="fs-6">{{ __('events.reservation_desc_date') }}</p>
                    <div class="form-group mt-3">
                        <input type="date" name="start_reservation_date" class="form-control rounded-0 @error('start_reservation_date') is-invalid @enderror">
                        @error('start_reservation_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('restaurent.add') }}</button>
                <a id="coupon" href="events" class="btn">{{ __('restaurent.cancel') }}</a>
            </div>
        </form>
    </div> <!-- container -->
</section>

@endsection
