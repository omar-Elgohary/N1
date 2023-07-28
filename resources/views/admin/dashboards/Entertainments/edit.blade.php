@extends('admin.layouts.app')
@section('title')
    {{ __('events.edit_event') }}
@endsection

@section('content')
<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black fw-bold">{{ __('events.edit_event') }}</h3>
        </div>

        <form action="{{ route('updateEvent', $event->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row col-12">
                <div class="col-lg-6">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">{{ __('restaurent.upload_photo') }}</span>
                        <input type="file" name="event_image" class="drop-zone__input" multiple>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('assets/images/products/'.$event->event_image) }}" name="event_image" height="200" width="250" alt="event photo">
                </div>
            </div>

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>{{ __('events.category') }}</label>
                    <select name="category_id" class="form-control rounded-0 mb-4 mt-2" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                        <option value="{{ \App\Models\Category::where('id', $event->category_id)->first()->id }}" name="category_id" selected>{{  \App\Models\Category::where('id', $event->category_id)->first()->name }}</option>
                        @foreach (\App\Models\Category::where('department_id', auth()->user()->department_id)->where('id', '!=', $event->category_id)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> <!-- 1 -->


                <div class="form-group">
                    <label>{{ __('restaurent.sub_category') }}</label>
                    <select name="sub_category_name" id="sub_category_name" class="form-control rounded-0 mb-4 mt-2">
                        <option value="{{ $event->subCategory->id }}">{{ $event->subCategory->name }}</option>
                    </select>
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>{{ __('events.event_name_ar') }}</label>
                    <input type="text" name="name_ar" value="{{ $event->nameLocale('ar') }}" class="form-control rounded-0 mb-4 mt-2 @error('name_ar') is-invalid @enderror">
                    @error('name_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 3 -->

                <div class="form-group">
                    <label>{{ __('events.event_name_en') }}</label>
                    <input type="text" name="name_en" value="{{ $event->nameLocale('en') }}" class="form-control rounded-0 mb-4 mt-2 @error('name_en') is-invalid @enderror">
                    @error('name_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 4 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_ar') }}</label>
                    <input type="text" name="description_ar" value="{{ $event->descriptionLocale('ar') }}" class="form-control rounded-0 mb-4 mt-2 @error('description_ar') is-invalid @enderror">
                    @error('description_ar')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 5 -->

                <div class="form-group">
                    <label>{{ __('restaurent.description_en') }}</label>
                    <input type="text" name="description_en" value="{{ $event->descriptionLocale('en') }}" class="form-control rounded-0 mb-4 mt-2 @error('description_en') is-invalid @enderror">
                    @error('description_en')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 6 -->

                <div class="form-group">
                    <label>{{ __('events.ticket_price') }}</label>
                    <input type="text" name="ticket_price" value="{{ $event->ticket_price }}" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2 @error('ticket_price') is-invalid @enderror">
                    @error('ticket_price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 7 -->

                <div class="form-group">
                    <label>{{ __('events.tickets_number') }}</label>
                    <input type="text" name="tickets_quantity" value="{{ $event->tickets_quantity }}" class="form-control rounded-0 mb-4 mt-2 @error('tickets_quantity') is-invalid @enderror">
                    @error('tickets_quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 8 -->

                <div class="form-group">
                    <label>{{ __('events.sold_tickets_number') }}</label>
                    <input type="text" name="tickets_sold_quantity" placeholder="الكمية" value="{{ $event->tickets_sold_quantity }}" class="form-control rounded-0 mb-4 mt-2 @error('quantity') is-invalid @enderror">
                    @error('tickets_sold_quantity')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div> <!-- 9 -->

            <hr>

                <div class="extra">
                    <label>{{ __('events.reservation_type') }} :</label>
                    @foreach (\App\Models\ReservationType::all() as $type)
                        <div class="form-group mt-3">
                            <label class="custom-checks text-black">{{ $type->name }}
                                <input name="reservations_type_id[]" value="{{$type->id}}" type="checkbox"
                                {{\App\Models\Event::where('id', $event->id)->where('reservations_type_id', $type->id)->first() ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach
                </div> <!-- extra -->

            <hr>

            <div class="row mt-5">
                <h5>{{ __('events.reservation_time') }} </h5>
                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <input type="date" value="{{ $event->reservation_date }}" class="form-control rounded-0  @error('reservation_date') is-invalid @enderror" name="reservation_date">
                        @error('reservation_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mt-3">
                        <input type="time" value="{{ $event->reservation_time }}" class="form-control rounded-0  @error('reservation_time') is-invalid @enderror" name="reservation_time">
                        @error('reservation_time')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->

            <div class="mt-5">
                <h5>{{ __('events.reservation_start_date') }}</h5>
                <p class="fs-6">{{ __('events.reservation_desc_date') }}</p>
                <div class="form-group mt-3">
                    <input type="date" value="{{ $event->start_reservation_date }}" name="start_reservation_date" class="form-control rounded-0 @error('start_reservation_date') is-invalid @enderror">
                    @error('start_reservation_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
        </div> <!-- col-4 -->

            <div class="col-4 d-grid mx-auto mt-5">
                <button id="login" type="submit" class="btn mb-3">{{ __('restaurent.save_updates') }}</button>
                <a href="#deleteEvent{{ $event->id }}" id="coupon" class="btn" data-bs-toggle="modal" role="button">{{ __('events.delete_event') }}</a>
            </div>
        </form>
    </div> <!-- container -->
</section>


{{-- deleteEvent --}}
<div class="modal fade border-0" id="deleteEvent{{ $event->id }}" aria-hidden="true" aria-labelledby="deleteEventLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center fw-bold my-5">
                <h2>هل أنت متأكد من حذف هذه الفعالية؟</h2>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button type="button" id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="{{ route('deleteEvent', $event->id) }}" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->



<script>
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
	const dropZoneElement = inputElement.closest(".drop-zone");

	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => {
		if (inputElement.files.length) {
			updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});

	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone--over");
		});
	});

	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}

		dropZoneElement.classList.remove("drop-zone--over");
	});
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}

</script>
@endsection
