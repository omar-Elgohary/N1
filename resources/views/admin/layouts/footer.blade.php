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
            <a href="{{ route('front.questions') }}" class="text-dark">الأسئلة الشائعة</a><br>
            <a href="#" class="text-dark">سياسة الخصوصية</a><br>
        </div>
    </div>
    </div>
</div>

<div class="container">
    <div class="copyright">
        جميع الحقوق محفوظة لشركة
    </div>
</div>
</footer><!-- End Footer -->

{{-- <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
<script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery-knob.init.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<script>
    const menu_toggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menu_toggle.addEventListener('click', () => {
        menu_toggle.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
</script>
</body>
</html>
