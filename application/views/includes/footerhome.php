

        <!-- Footer Start -->
        <!-- Footer Start -->
        <footer class="footer">
            <div class="py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="section-title">
                                <div class="d-flex">
                                    <i class="uil uil-envelope-star display-4 text-white title-dark"></i>
                                    <div class="flex-1 ms-md-4 ms-3">
                                        <h4 class="fw-bold text-white mb-1">Subscribe to our newsletters</h4>
                                        <p class="text-white-50 mb-0">Sign up and receive the latest tips via email.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-4 mt-sm-0">
                            <div class="text-md-end ms-5 ms-sm-0">
                                <a href="javascript:void(0)" class="btn btn-primary">Subscribe Now</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end div-->

    
            <div class="footer-py-30 footer-bar">
                <div class="container text-center">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="text-sm-start">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> <?= $apps['app_name'] ?>. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="" target="_blank" class="text-reset">TRANSME GROUP</a>.</p>
                            </div>
                        </div><!--end col-->

                        <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <ul class="list-unstyled text-sm-end mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?= base_url(); ?>homeasset/images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?= base_url(); ?>homeasset/images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?= base_url(); ?>homeasset/images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?= base_url(); ?>homeasset/images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="<?= base_url(); ?>homeasset/images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->
        <!-- Footer End -->

        
        <!-- Cookies Start -->
        <div class="card cookie-popup shadow rounded py-3 px-4">
            <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-success h6">use of cookies</a></p>
            <div class="cookie-popup-actions text-end">
                <button><i class="uil uil-times text-dark fs-4"></i></button>
            </div>
        </div><!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
        <!-- Cookies End -->
        

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header p-4 border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="<?= base_url(); ?>homeasset/images/logo-dark.png" height="24" class="light-version" alt="">
                    <img src="<?= base_url(); ?>homeasset/images/logo-light.png" height="24" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4">
                <div class="row">
                    <div class="col-12">
                        <img src="<?= base_url(); ?>homeasset/images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                        <div class="card border-0 mt-5" style="z-index: 1">
                            <div class="card-body p-0">
                                <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas-footer p-4 border-top text-center">
                <ul class="list-unstyled social-icon social mb-0">
                    <li class="list-inline-item mb-0"><a href="https://1.envato.market/landrick" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
                </ul><!--end icon-->
            </div>
        </div>
        <!-- Offcanvas End -->
   

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- Javascript -->
        <!-- JAVASCRIPT -->
        <script src="<?= base_url(); ?>homeasset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>homeasset/libs/feather-icons/feather.min.js"></script>
        <!-- SLIDER -->
        <script src="<?= base_url(); ?>homeasset/libs/tiny-slider/min/tiny-slider.js"></script>
        <!-- Main Js -->
        <script src="<?= base_url(); ?>homeasset/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="<?= base_url(); ?>homeasset/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <!-- Fontawesome -->
        <script src="<?= base_url(); ?>assets/fontawesome/js/all.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
        <!-- Map -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?= google_maps_api ?>&sensor=false&libraries=places'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js" integrity="sha512-KGE6gRUEc5VBc9weo5zMSOAvKAuSAfXN0I/djLFKgomlIUjDCz3b7Q+QDGDUhicHVLaGPX/zwHfDaVXS9Dt4YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.js" integrity="sha512-AR9dz+gbmrsSrWyaGDdUeS5z1kCejMjYbdQeHHdqrdOdyzs8x4LuDkLIjT1x34G71PS9o9RONhk24tN+sDYiYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.map"></script>
        <!-- multi step -->
        <script>
            var currentTab = 0;
            document.addEventListener("DOMContentLoaded", function(event) {


                showTab(currentTab);

            });

            function showTab(n) {
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                    document.getElementById("subBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").style.display = "none";
                    document.getElementById("subBtn").style.display = "inline";
                    document.getElementById("subBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                    document.getElementById("subBtn").style.display = "none";
                }
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                var x = document.getElementsByClassName("tab");
                if (n == 1 && !validateForm()) return false;
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;
                if (currentTab >= x.length) {
                    // document.getElementById("regForm").submit();
                    // return false;
                    //alert("sdf");
                    document.getElementById("nextprevious").style.display = "none";
                    document.getElementById("all-steps").style.display = "none";
                    document.getElementById("register").style.display = "none";
                    document.getElementById("text-message").style.display = "block";




                }
                showTab(currentTab);
            }

            function validateForm() {
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                for (i = 0; i < y.length; i++) {
                    if (y[i].value == "") {
                        y[i].className += " invalid";
                        valid = false;
                    }
                }
                if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
                return valid;
            }

            function fixStepIndicator(n) {
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
                x[n].className += " active";
            }
        </script>
        <script>
            $('#us3').locationpicker({
                location: {
                    latitude: -6.222320699570134,
                    longitude: 106.83289668750001
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function(currentLocation, radius, isMarkerDropped) {}
            });
        </script>

        <script type="text/javascript">
            $(function() {
                var code = "+62"; // Assigning value from model.
                $('#txtPhone').val(code);
                $('#txtPhone').intlTelInput({
                    autoHideDialCode: true,
                    autoPlaceholder: "ON",
                    dropdownContainer: document.body,
                    formatOnDisplay: true,
                    hiddenInput: "full_number",
                    initialCountry: "auto",
                    nationalMode: true,
                    placeholderNumberType: "MOBILE",
                    preferredCountries: ['US'],
                    separateDialCode: false
                });
                console.log(code)
            });
        </script>

        <script>
            function gantian() {
                document.getElementById("isitable").style = "display:none;";
                document.getElementById("isiform").style = "display:block;";

            }

            function balikan() {
                document.getElementById("isiform").style = "display:none;";
                document.getElementById("isitable").style = "display:block;";
            }
        </script>
    </body>
</html>