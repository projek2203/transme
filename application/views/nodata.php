
<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title><?= $apps['app_name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in" />
        <meta name="Version" content="v4.2.0" />

        <!-- favicon -->
        <link rel="shortcut icon" href="<?= base_url(); ?>homeasset/images/favicon.ico" />
        
        <!-- Css -->
        <!-- Bootstrap Css -->
        <link href="<?= base_url(); ?>homeasset/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url(); ?>homeasset/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>homeasset/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="<?= base_url(); ?>homeasset/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="" class="back-button btn btn-icon btn-primary"><i data-feather="arrow-left" class="icons"></i></a>
        </div>

        <!-- ERROR PAGE -->
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 text-center">
                        <img src="<?= base_url(); ?>homeasset/images/404.svg" class="img-fluid" alt="">
                        <div class="text-uppercase mt-4 display-3">Oh ! no</div>
                        <div class="text-capitalize text-dark mb-4 error-page">Page Not Found</div>
                        <p class="text-muted para-desc mx-auto">The page you’re looking for was not found.</p>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-12 text-center">  
                        <a href="<?= base_url(); ?>" class="btn btn-outline-primary mt-4">Kembali</a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- ERROR PAGE -->
        
       

        <!-- Javascript -->
        <!-- JAVASCRIPT -->
        <script src="<?= base_url(); ?>homeasset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>homeasset/libs/feather-icons/feather.min.js"></script>
        <!-- Main Js -->
        <script src="<?= base_url(); ?>homeasset/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="<?= base_url(); ?>homeasset/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>