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

        <div class="back-to-home">
            <a href="" class="back-button btn btn-icon btn-primary"><i data-feather="arrow-left" class="icons"></i></a>
        </div>
        
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('assets/images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card form-signin p-4 rounded shadow">
                            <form method="post">
                                <a href="index.html"><img src="<?= base_url(); ?><?= 'images/logo/'.$apps['app_logo']; ?>" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">Atur Ulang Password</h5>
                                <?php if ($this->session->flashdata()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="text-muted">Masukan Password Baru Kamu.</p>
                                <input type="hidden" name="token" value="<?= $user['token']; ?>" />
                				<input type="hidden" name="type" value="<?= $user['idkey']; ?>" />
                				<input type="hidden" name="id" value="<?= $user['userid']; ?>" />
                                <div class="form-floating mb-3" data-validate="Password tidak boleh kosong!">
                                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Password Baru">
                                    <label for="floatingInput">Password Baru</label>
                                    <span class="focus-input100"></span>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">Konfirmasi</button>
                                <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> <?=$this->config->item("app_name");?>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        
        <!-- Javascript -->
        <!-- JAVASCRIPT -->
        <script src="<?= base_url(); ?>homeasset/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>homeasset/libs/feather-icons/feather.min.js"></script>
        <!-- Main Js -->
        <script src="<?= base_url(); ?>homeasset/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="<?= base_url(); ?>homeasset/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>

</html>