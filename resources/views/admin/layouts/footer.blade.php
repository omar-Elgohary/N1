<footer class="bottom-0" id="footer">

<div class="footer-top">
    <div class="container">
    <div class="row d-flex justify-content-between">
        <div class="col-lg-3 col-md-6 footer-contact">
        <button type="submit" class="btn btn-dark px-4 mb-3"><i class="fa-brands fa-apple"></i> {{ __('homepage.Download') }}</button>
        <p>
        <button type="submit" class="btn btn-dark px-4"><i class="fa fa-thin fa-play"></i> {{ __('homepage.Download') }}</button>
        </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-info">
            <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            </div>
                <a href="{{ route('front.questions') }}" class="text-dark">{{ __('homepage.FAQ') }}</a><br>
                <a href="#" class="text-dark">{{ __('homepage.privacy policy') }}</a><br>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="copyright">
        {{ __('homepage.footertitle') }}
    </div>
</div>
</footer><!-- End Footer -->

{{-- <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://kit.fontawesome.com/cfe6bc4ca1.js" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<!-- dropzone plugin -->
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- apexcharts init -->
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery-knob.init.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    const menu_toggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menu_toggle.addEventListener('click', () => {
        menu_toggle.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
</script>

<script>
$(document).ready(function() {
    $('#englishNameInput').on('input', function() {
        var inputField = document.getElementById('englishNameInput');
        var inputText = $(this).val();
        if (/[\u0600-\u06FF]/.test(inputText)) {
            inputText == "";
            $(this).addClass('error');
            $('#errorText_en').text("{{__('messages.english_letters')}}");
            inputField.value = "";
        } else {
            $(this).removeClass('error');
            $('#errorText_en').text('');
        }
        var inputText = $(this).reset();
    });
});

$(document).ready(function() {
    $('#arabicNameInput').on('input', function() {
        var inputField = document.getElementById('arabicNameInput');
        var inputText = $(this).val();
        if (/^[A-Za-z\s]+$/.test(inputText)) {
            $(this).addClass('error');
            $('#errorText_ar').text("{{__('messages.arabic_letters')}}");
            inputField.value = "";
        } else {
            $(this).removeClass('error');
            $('#errorText_ar').text('');
        }
    });
});
</script>


<script>
    $(document).ready(function() {
        $('#englishDescInput').on('input', function() {
            var inputField = document.getElementById('englishDescInput');
            var inputText = $(this).val();
            if (/[\u0600-\u06FF]/.test(inputText)) {
                $(this).addClass('error');
                $('#errorDesc_en').text("{{__('messages.english_letters')}}");
                inputField.value = "";
            } else {
                $(this).removeClass('error');
                $('#errorDesc_en').text('');
            }
        });
    });

    $(document).ready(function() {
        $('#arabicDescInput').on('input', function() {
            var inputField = document.getElementById('arabicDescInput');
            var inputText = $(this).val();
            if (/^[A-Za-z\s]+$/.test(inputText)) {
                $(this).addClass('error');
                $('#errorDesc_ar').text("{{__('messages.arabic_letters')}}");
                inputField.value = "";
            } else {
                $(this).removeClass('error');
                $('#errorDesc_ar').text('');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#englishSubInput').on('input', function() {
            var inputField = document.getElementById('englishSubInput');
            var inputText = $(this).val();
            if (/[\u0600-\u06FF]/.test(inputText)) {
                $(this).addClass('error');
                $('#errorSub_en').text("{{__('messages.english_letters')}}");
                inputField.value = "";
            } else {
                $(this).removeClass('error');
                $('#errorSub_en').text('');
            }
        });
    });

    $(document).ready(function() {
        $('#arabicSubInput').on('input', function() {
            var inputField = document.getElementById('arabicSubInput');
            var inputText = $(this).val();
            if (/^[A-Za-z\s]+$/.test(inputText)) {
                $(this).addClass('error');
                $('#errorSub_ar').text("{{__('messages.arabic_letters')}}");
                inputField.value = "";
            } else {
                $(this).removeClass('error');
                $('#errorSub_ar').text('');
            }
        });
    });
    </script>


<script>
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var CategoryId = $(this).val();
            if (CategoryId) {
                $.ajax({
                    url: "{{ URL::to('category') }}/" + CategoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sub_category_name"]').empty();
                        $.each(data, function(key, value) {
                            console.log(value);
                            $('select[name="sub_category_name"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

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













{{-- location --}}
<script>
    var map, marker;
    function initModal() {
        $("#location_modal").modal('show')
        // var location = new google.maps.LatLng(31.032462916883375, 31.36317377474954);
        // var location = new google.maps.LatLng(31.03075243779175, 31.362107203703385);
        var location = new google.maps.LatLng(26.768167521490252, 29.88884504734696);
        var mapProperty ={
            center: location,
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map'), mapProperty);
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: location
        });

        geocodePosition(marker.getPosition());
        google.maps.event.addListener(marker, 'dragend', function(){
            map.setCenter(marker.getPosition());
            geocodePosition(marker.getPosition());
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
        });

        currentLat = $('#latitude').val();
        currentLng = $('#longitude').val();

        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function (position){
                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                $('#latitude').val(pos.lat);
                $('#longitude').val(pos.lng);
                marker.setPosition(pos);
                map.setCenter(marker.getPosition);
                geocodePosition(marker.getPosition);
            });
        }
    }

    function geocodePosition(pos){
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            latLng: pos
        },

        function(results, status){
            if(status == google.maps.GeocoderStatus.OK){
                $('#address-label').html(results[0].formatted_address);
                $('#branche_location').val(results[0].formatted_address);
            }else{
                $('#address-label').html('Cannot determinr address at this location');
            }
        }
        );
    }

    // var searchInput = 'search_input';
    // $(document).ready(function () {
    //     var autocomplete;
    //     autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
    //     types: ['geocode'],
    //     // componentRestrictions: {
    //     // country: "EGYPT"
    //     // }
    // });

    // google.maps.event.addListener(autocomplete, 'place_changed', function () {
    //     var near_place = autocomplete.getPlace();
    //     });
    // });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC65lO9OQS_OZ-13GYeZH61dIHEl1jNFsw&callback=initMap"></script>
<script src="https://ipinfo.io/json?callback=recordData"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
