@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black fw-bold">تعديل معلومات الفعالية</h3>
        </div>

        <form action="#" method="post">

            <div class="drop-zone">
                <span class="drop-zone__prompt">اضغط أو اسحب الصور الى هنا</span>
                <input type="file" name="myFile" class="drop-zone__input" multiple>
            </div>


            {{-- <div class="col-lg-12 d-flex flex-row-reverse">
                <div class="col-6">
                    <input type="file" name="CouponPic" id="upload-custom">
                    <label for="upload-custom" class="upload-lable text-center">
                        <i class="fa-solid fa-file-image"></i>
                        <h4 class="drag-text">اضغط أو اسحب الصورة الى هنا</h4>
                    </label>
                </div>

                <div class="col-6">
                    <img src="{{ asset('images/Mask Group 8511.png') }}" class="m-1 mt-0" height="150" alt="">
                    <img src="{{ asset('images/Mask Group 8512.png') }}" class="m-1 mt-0" height="150" alt="">
                    <img src="{{ asset('images/Mask Group 8513.png') }}" class="m-1 mt-0" height="150" alt="">
                </div>
            </div> <!-- col-12 --> --}}

            <div class="col-lg-4 mt-5">
                <div class="form-group">
                    <label>اسم الفعالية</label>
                    <input type="text" name="eventName" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="discription" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>عدد التذاكر</label>
                    <input type="text" name="ticketsCount" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->


                <div>
                    <label>أنواع الحجز:</label>

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">لا يوجد
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->


                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">استاندرد
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">كبار الشخصيات
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div>

                <hr>

            <div class="row">
                <h5>أوقات الحجز</h5>
                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <input type="date" class="form-control rounded-0" name="startDate">
                    </div>

                    <div class="form-group mt-3">
                        <input type="date" class="form-control rounded-0" name="endDate">
                    </div>
                </div> <!-- col-6 -->

                <div class="col-lg-6">
                    <div class="form-group mt-3">
                        <input type="time" class="form-control rounded-0" name="startTime">
                    </div>

                    <div class="form-group mt-3">
                        <input type="time" class="form-control rounded-0" name="endTime">
                    </div>
                </div> <!-- col-6 -->
            </div> <!-- row -->

            <div class="mt-5">
                <h5>تاريخ بدء الحجوزات</h5>
                <p class="fs-6">سيتم نشر الفعالية وتفعيل حجز التتذاكر بناءا على التاريخ المحدد هنا</p>
                <div class="form-group mt-3">
                    <input type="date" class="form-control rounded-0" name="startDate">
                </div>
            </div>

            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="eventDetails" class="btn mb-3">حفظ التعديلات</a>
            <a href="#deleteEvent" id="coupon" class="btn" data-bs-toggle="modal" role="button">حذف الفعالية</a>

        </div>
    </div> <!-- container -->
</section>


{{-- deleteEvent --}}
<div class="modal fade border-0" id="deleteEvent" aria-hidden="true" aria-labelledby="deleteEventLabel" tabindex="-1" dir="rtl">
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
                <a href="#" id="package" type="button" class="btn btn-block px-5 text-white">حذف</a>
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
