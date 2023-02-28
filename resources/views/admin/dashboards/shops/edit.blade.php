@extends('admin.layouts.app')
@section('content')

<section>
    <div class="container mt-2" dir="rtl">
        <div class="section-title text-end">
            <h3 class="text-black">تعديل معلومات المنتج</h3>
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

            <div class="col-lg-4 mt-3">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="productName" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 1 -->

                <div class="form-group">
                    <label>الوصف</label>
                    <input type="text" name="discription" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 2 -->

                <div class="form-group">
                    <label>السعر</label>
                    <input type="text" name="price" placeholder="ريال سعودي" class="form-control rounded-0 mb-4 mt-2">
                </div> <!-- 3 -->

                <label>المقاس</label>
                <div class="form-group d-flex justify-content-evenly">
                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        M
                    </div>

                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        L
                    </div>

                    <div class="card text-center rounded-0 col-2 mb-4 mt-3">
                        XL
                    </div>
                </div> <!-- 4 -->

                <label>الألوان</label>
                <div class="form-group d-flex justify-content-evenly">
                    <div class="card text-center rounded-0 bg-warning col-2 mb-4 mt-3">
                        orange
                    </div>

                    <div class="card text-center rounded-0 bg-success col-2 mb-4 mt-3">
                        green
                    </div>

                    <div class="card text-center rounded-0 bg-primary col-2 mb-4 mt-3">
                        blue
                    </div>
                </div> <!-- 5 -->

                <hr>

                <div>
                    <label>هل من الممكن اعادة المنتج؟</label>

                    <div class="form-group">
                        <input type="radio" name="able" class="mb-4 mt-4">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="able" class="mb-4 mt-2">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>


                <div class="mt-5">
                    <label>فئة المنتج:</label>

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-4">
                        <label>النساء</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label class="text-black">الرجال</label>
                    </div> <!-- 2 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label class="text-black">أطفال - أولاد</label>
                    </div> <!-- 3 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label class="text-black">أطفال - بنات</label>
                    </div> <!-- 4 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label class="text-black">مواليد</label>
                    </div> <!-- 5 -->

                    <div class="form-group">
                        <input type="radio" class="mb-4 mt-2">
                        <label class="text-black">غير محدد</label>
                    </div> <!-- 6 -->
                </div>

                <div class="mt-5">
                    <label>هل يوجد ضمان للمنتج؟</label>

                    <div class="form-group">
                        <input type="radio" name="dman" class="mb-4 mt-4">
                        <label>نعم</label>
                    </div> <!-- 1 -->

                    <div class="form-group">
                        <input type="radio" name="dman" class="mb-4 mt-2">
                        <label>لا</label>
                    </div> <!-- 2 -->
                </div>

                <div class="mt-5">
                    <label>عدد البضاعة المتوفرة</label>
                        <input type="text" class="form-control mt-3 rounded-0">
                </div>

                <div class="form-group mt-5">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <label>نشر المنتج</label>
                </div>

                <div class="branches mt-5">
                    <label>الفروع التي توفر المنتج:</label>

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">الفرع الأول
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 1 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black">الفرع الثاني
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 2 -->

                    <div class="form-group mt-3">
                        <label class="custom-checks text-black pb-3">الفرع الثالث
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div> <!-- 3 -->
                </div> <!-- branches -->
            </div> <!-- col-4 -->
        </form>

        <div class="col-4 d-grid mx-auto mt-5">
            <a id="login" href="productDetails" class="btn mb-3">حفظ التعديلات</a>
            <a id="coupon" href="#DeleteShopProduct" class="btn" data-bs-toggle="modal">حذف المنتج</a>
        </div>
    </div> <!-- container -->
</section>

{{-- delete shop products --}}
<div class="modal fade border-0" id="DeleteShopProduct" aria-hidden="true" aria-labelledby="DeleteShopProductLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mx-auto my-5">
                <h4 class="text-end fw-bold">هل أنت متأكد من حذف هذا المنتج؟</h4>
            </div>

            <div class="d-flex justify-content-around mb-5">
                <button id="coupon" class="btn px-5" data-bs-dismiss="modal">تراجع</button>
                <a href="#" id="package" class="btn btn-block px-5 text-white">حذف</a>
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
