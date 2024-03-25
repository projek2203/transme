
<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title><?= $apps['app_name'] ?></title>
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
        <link href="<?= base_url(); ?>homeasset/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="<?= base_url(); ?>homeasset/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url(); ?>homeasset/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>homeasset/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="<?= base_url(); ?>homeasset/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- fontawesome -->
        <link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet" media="screen">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css" rel="stylesheet" />
        <!-- multistep -->
        <style>
        // workaround
        .intl-tel-input {
        display: table-cell;
        }
        .intl-tel-input .selected-flag {
        z-index: 4;
        }
        .intl-tel-input .country-list {
        z-index: 5;
        }
        .input-group .intl-tel-input .form-control {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 0;
        }
            #regForm {
                background-color: #ffffff;
                margin: 0px auto;
                font-family: Raleway;
                padding: 40px;
                border-radius: 10px
            }

            input.invalid {
                background-color: #ffdddd
            }

            .tab {
                display: none
            }

            .step {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;
                border-radius: 50%;
                display: inline-block;
                opacity: 0.5
            }

            .step.active {
                opacity: 1
            }

            .step.finish {
                background-color: #4CAF50
            }

            .all-steps {
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px
            }
        </style>
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
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="<?= base_url(); ?>">
                    <span class="logo-light-mode">
                        <img src="<?= base_url(); ?>homeasset/images/logo-dark.png" class="l-dark" height="24" alt="">
                        <img src="<?= base_url(); ?>homeasset/images/logo-light.png" class="l-light" height="24" alt="">
                    </span>
                    <img src="<?= base_url(); ?>homeasset/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                </a>

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <!--Login button Start-->
                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item mb-0">
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <div class="login-btn-primary"><span class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="fea icon-sm"></i></span></div>
                            <div class="login-btn-light"><span class="btn btn-icon btn-pills btn-light"><i data-feather="settings" class="fea icon-sm"></i></span></div>
                        </a>
                    </li>
                    <?php  if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) { ?>
                        <li class="list-inline-item ps-1 mb-0">
                            <a href="<?= base_url(); ?>login" target="_blank">
                                <div class="btn btn-icon btn-pills btn-primary"><i data-feather="user" class="fea icon-sm"></i></div>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="list-inline-item ps-1 mb-0">
                            <a href="<?= base_url(); ?>dashboard" target="_blank">
                                <div class="btn btn-icon btn-pills btn-primary"><i data-feather="user" class="fea icon-sm"></i></div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <!--Login button End-->
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-light nav-right">
                        <li><a href="<?= base_url(); ?>" class="menu-item">Beranda</a></li>
						<li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Registrasi</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>home/regcs" class="sub-menu-item">Pelanggan</a></li>
                                <li><a href="<?= base_url(); ?>home/regdv" class="sub-menu-item">Driver</a></li>
                                <li><a href="<?= base_url(); ?>home/regmech" class="sub-menu-item">Merchant</a></li>
                                <li><a href="#" class="sub-menu-item">Laundry</a></li>
                            </ul>
                        </li>
						<li><a href="#" class="menu-item">Fitur</a></li>
						<li><a href="#" class="menu-item">Kebijakan</a></li>
						<li><a href="#" class="menu-item">Kontak</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        