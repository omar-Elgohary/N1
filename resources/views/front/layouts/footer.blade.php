<footer id="footer">

<div class="footer-top">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-3 col-md-6 footer-contact">
            <button type="submit" class="btn btn-dark px-4 mb-3"><i class="fa-brands fa-apple"></i> Download</button>
            <p>
            <button type="submit" class="btn btn-dark px-4"><i class="fa fa-thin fa-play"></i> Download</button>
            </p>
        </div>

            <div class="col-lg-3 col-md-6 footer-info">
                <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-whatsapp"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                </div>

                <div class="links">
                    <a href="{{ route('front.questions') }}" class="text-dark">{{ __('homepage.FAQ') }}</a><br>
                    <a href="#" class="text-dark">{{ __('homepage.privacy policy') }}</a><br>
                </div>
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

{{-- <div id="preloader">
</div> --}}

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

{{-- loader --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    setTimeout(function(){
        $('.loader_bg').fadeToggle();
    }, 1500);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://kit.fontawesome.com/cfe6bc4ca1.js" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword");

    togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const password = document.getElementById("password");
        const type =
        password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("bi-eye");
    });
    });
</script>

<script>
    window.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword2");

    togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const password = document.getElementById("re_password");
        const type =
        password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("bi-eye");
    });
    });
</script>

<script>
    window.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword3");

    togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const password = document.getElementById("confirmed_password");
        const type =
        password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("bi-eye");
    });
    });
</script>

<script>
    $('#verify').on('click', function(event) {
        $('#exampleModalToggle2').modal('hide');
        $.ajax({
            url: "{{ route('register') }}",
            type: 'POST',
        });
        Phone = getElementById('phone').value;
        consle.log('asd');
        $('#exampleModalToggle3').modal('show');
        // event.preventDefault();
    });
</script>

@stack('script')

</body>
</html>
