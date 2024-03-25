<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url(); ?>assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="<?= base_url(); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
  <!-- fontawesome -->
  <link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet" media="screen">
  <!-- country code -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
  <!-- Datatable -->
  <link href="<?= base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- material ikon -->
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <!-- loader-->
	<link href="<?= base_url(); ?>assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="<?= base_url(); ?>assets/css/dark-theme.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/light-theme.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/semi-dark.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/header-colors.css" rel="stylesheet" />
  <!-- Tinymc -->
  <script src="https://cdn.tiny.cloud/1/gr1k4keo8egkuf59cn86eo8yp4svaaj0zq2iil10b16ntdea/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
</style>
  <title><?= $apps['app_name'] ?></title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand">
          <div class="mobile-toggle-icon d-xl-none">
              <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar d-none d-xl-block">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">Lihat Website</a>
              </li>
            </ul>
            </div>
            <div class="search-toggle-icon d-xl-none ms-auto">
              <i class="bi bi-search"></i>
            </div>
            <form class="searchbar d-none d-xl-flex ms-auto">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-3">
              <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center gap-1">
                    <img src="<?= base_url(); ?>images/admin/<?= $this->session->userdata('image') ?>" class="user-img" alt="">
                    <div class="user-name d-none d-sm-block"><?= $this->session->userdata('fullname') ?></div>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="<?= base_url(); ?>images/admin/<?= $this->session->userdata('image') ?>" alt="" class="rounded-circle" width="60" height="60">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name"><?= $this->session->userdata('user_name') ?></h6>
                            <small class="mb-0 dropdown-user-designation text-secondary"><?= $this->session->userdata('level') ?></small>
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="<?= base_url(); ?>profile">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                           <div class="setting-text ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url(); ?>pengaturan">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                           <div class="setting-text ms-3"><span>Setting</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url(); ?>dashboard">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                           <div class="setting-text ms-3"><span>Dashboard</span></div>
                         </div>
                       </a>
                    </li>
                  
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url(); ?>login/logout">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                           <div class="setting-text ms-3"><span>Logout</span></div>
                         </div>
                       </a>
                    </li>
                </ul>
              </li>
              <!--
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="projects">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                   <div class="row row-cols-3 gx-2">
                      <div class="col">
                        <a href="ecommerce-orders.html">
                         <div class="apps p-2 radius-10 text-center">
                            <div class="apps-icon-box mb-1 text-white bg-primary bg-gradient">
                              <i class="bi bi-cart-plus-fill"></i>
                            </div>
                            <p class="mb-0 apps-name">Orders</p>
                         </div>
                        </a>
                      </div>
                      <div class="col">
                        <a href="javascript:;">
                        <div class="apps p-2 radius-10 text-center">
                           <div class="apps-icon-box mb-1 text-white bg-danger bg-gradient">
                             <i class="bi bi-people-fill"></i>
                           </div>
                           <p class="mb-0 apps-name">Users</p>
                        </div>
                      </a>
                     </div>
                     <div class="col">
                      <a href="ecommerce-products-grid.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-success bg-gradient">
                          <i class="bi bi-bank2"></i>
                         </div>
                         <p class="mb-0 apps-name">Products</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="component-media-object.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-orange bg-gradient">
                          <i class="bi bi-collection-play-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Media</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="pages-user-profile.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-purple bg-gradient">
                          <i class="bi bi-person-circle"></i>
                         </div>
                         <p class="mb-0 apps-name">Account</p>
                       </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-dark bg-info bg-gradient">
                          <i class="bi bi-file-earmark-text-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Docs</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="ecommerce-orders-detail.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-pink bg-gradient">
                          <i class="bi bi-credit-card-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Payment</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-bronze bg-gradient">
                          <i class="bi bi-calendar-check-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Events</p>
                      </div>
                    </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-dark bg-warning bg-gradient">
                          <i class="bi bi-book-half"></i>
                         </div>
                         <p class="mb-0 apps-name">Story</p>
                        </div>
                      </a>
                    </div>
                   </div>
                </div>
              </li> 
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="messages">
                    <span class="notify-badge">5</span>
                    <i class="bi bi-messenger"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Messages</h5>
                  </div>
                 <div class="header-message-list p-2">
                    <div class="dropdown-item bg-light radius-10 mb-1">
                      <form class="dropdown-searchbar position-relative">
                        <div class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon"><i class="bi bi-search"></i></div>
                        <input class="form-control" type="search" placeholder="Search Messages">
                      </form>
                    </div>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="<?= base_url(); ?>assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="52" height="52">
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                          </div>
                       </div>
                     </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-4.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span class="msg-time float-end text-secondary">3 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It was popularised in the 1960</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-5.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span class="msg-time float-end text-secondary">1 d</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If you are going to use a passage</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-6.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span class="msg-time float-end text-secondary">2 w</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All the Lorem Ipsum generators</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <img src="<?= base_url(); ?>assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="52" height="52">
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                         </div>
                      </div>
                    </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="<?= base_url(); ?>assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="52" height="52">
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="<?= base_url(); ?>assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="52" height="52">
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                        </div>
                     </div>
                   </a>
                </div>
                <div class="p-2">
                  <div><hr class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <div class="text-center">View All Messages</div>
                    </a>
                </div>
               </div>
              </li>
              <li class="nav-item dropdown dropdown-large d-none d-sm-block">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="notifications">
                    <span class="notify-badge">8</span>
                    <i class="bi bi-bell-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Notifications</h5>
                  </div>
                  <div class="header-notifications-list p-2">
                     <div class="dropdown-item bg-light radius-10 mb-1">
                      <form class="dropdown-searchbar position-relative">
                        <div class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon"><i class="bi bi-search"></i></div>
                        <input class="form-control" type="search" placeholder="Search Messages">
                      </form>
                      </div>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                           <div class="notification-box"><i class="bi bi-basket2-fill"></i></div>
                           <div class="ms-3 flex-grow-1">
                             <h6 class="mb-0 dropdown-msg-user">New Orders <span class="msg-time float-end text-secondary">1 m</span></h6>
                             <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You have recived new orders</small>
                           </div>
                        </div>
                      </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-people-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Customers <span class="msg-time float-end text-secondary">7 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 new user registered</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">24 PDF File <span class="msg-time float-end text-secondary">2 h</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The pdf files generated</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-collection-play-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">Time Response  <span class="msg-time float-end text-secondary">3 h</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1 min avarage time response</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-cursor-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Product Approved  <span class="msg-time float-end text-secondary">1 d</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your new product has approved</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-gift-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New Comments <span class="msg-time float-end text-secondary">2 w</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New customer comments recived</small>
                          </div>
                       </div>
                     </a>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-droplet-fill"></i></div>
                          <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0 dropdown-msg-user">New 24 authors<span class="msg-time float-end text-secondary">1 m</span></h6>
                            <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24 new authors joined last week</small>
                          </div>
                       </div>
                     </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-mic-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span class="msg-time float-end text-secondary">7 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully shipped your item</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-lightbulb-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span class="msg-time float-end text-secondary">2 h</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45% less alerts last 4 weeks</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-bookmark-heart-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span class="msg-time float-end text-secondary">2 w</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New 4 user registartions</small>
                         </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                        <div class="notification-box"><i class="bi bi-briefcase-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span class="msg-time float-end text-secondary">1 mo</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully uploaded all files</small>
                         </div>
                      </div>
                    </a>
                 </div>
                 <div class="p-2">
                   <div><hr class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                       <div class="text-center">View All Notifications</div>
                     </a>
                 </div>
                </div>
              </li>-->
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="<?= base_url(); ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text"><?= $apps['app_name'] ?></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li <?php if($this->uri->segment(1)=="dashboard"){echo 'class="active-page"';}?>>
              <a href="<?= base_url(); ?>dashboard">
                <div class="parent-icon"><i class="fa-duotone fa-house"></i></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
            </li>
            <li <?php if($this->uri->segment(1)=="transaksi"){echo 'class="active-page"';}?>>
              <a href="<?= base_url(); ?>transaksi">
                <div class="parent-icon"><i class="fa-duotone fa-money-simple-from-bracket"></i></i>
                </div>
                <div class="menu-title">Transaksi</div>
              </a>
            </li>
            <li class="menu-label">Akun</li> 
            <?php if ($this->session->userdata('level') == 'admin') { ?>
              <li <?php if($this->uri->segment(1)=="staff"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>staff">
                  <div class="parent-icon"><i class="fa-duotone fa-people-simple"></i></div>
                  <div class="menu-title">Staff</div>
                </a>
              </li>
             <?php } ?>
             
              <li <?php if($this->uri->segment(1)=="driver"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>driver">
                  <div class="parent-icon"><i class="fa-duotone fa-moped"></i></div>
                  <div class="menu-title">Driver</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="driver/upgrade"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>driver/upgrade">
                  <div class="parent-icon"><i class="fa-duotone fa-moped"></i></div>
                  <div class="menu-title">Upgrade</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="driver/tracking"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>driver/tracking">
                  <div class="parent-icon"><i class="fa-duotone fa-moped"></i></div>
                  <div class="menu-title">Tracking</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="pelanggan"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>pelanggan">
                  <div class="parent-icon"><i class="fa-duotone fa-people-simple"></i></div>
                  <div class="menu-title">Pelanggan</div>
                </a>
              </li>
              <li class="menu-label">Saldo</li> 
              <li <?php if($this->uri->segment(1)=="saldo"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>saldo">
                  <div class="parent-icon"><i class="fa-duotone fa-money-check-dollar"></i></div>
                  <div class="menu-title">Saldo</div>
                </a>
              </li>
              <li class="menu-label">Mitra</li> 
              <li <?php if($this->uri->segment(1)=="merchant"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>merchant">
                  <div class="parent-icon"><i class="fa-duotone fa-store"></i></div>
                  <div class="menu-title">Mitra</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="merchant/kategori"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>merchant/kategori">
                  <div class="parent-icon"><i class="fa-duotone fa-bars"></i></div>
                  <div class="menu-title">Kategori</div>
                </a>
              </li>  
              <li class="menu-label">Digiflazz</li> 
              <li <?php if($this->uri->segment(1)=="digiflazz"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>digiflazz">
                  <div class="parent-icon"><i class="fa-duotone fa-mobile"></i></div>
                  <div class="menu-title">Kategori</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="digiflazz/listbrand"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>digiflazz/listbrand">
                  <div class="parent-icon"><i class="fa-duotone fa-mobile"></i></div>
                  <div class="menu-title">Brand</div>
                </a>
              </li>
              <li <?php if($this->uri->segment(1)=="digiflazz/riwayat"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>digiflazz/riwayat">
                  <div class="parent-icon"><i class="fa-duotone fa-mobile"></i></div>
                  <div class="menu-title">Riwayat</div>
                </a>
              </li>
              <li class="menu-label">Webview</li> 
              <li <?php if($this->uri->segment(1)=="webview"){echo 'class="active-page"';}?>>
                <a href="<?= base_url(); ?>webview">
                  <div class="parent-icon"><i class="fa-duotone fa-mobile"></i></div>
                  <div class="menu-title">Daftar</div>
                </a>
              </li>
              <li class="menu-label">Aplikasi</li>
                <li <?php if($this->uri->segment(1)=="promo"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>promo">
                    <div class="parent-icon"><i class="fa-duotone fa-tags"></i></div>
                    <div class="menu-title">Promo</div>
                  </a>
                </li>
                <li <?php if($this->uri->segment(1)=="banner"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>banner">
                    <div class="parent-icon"><i class="fa-duotone fa-images"></i></div>
                    <div class="menu-title">Banner</div>
                  </a>
                </li>
                <li <?php if($this->uri->segment(1)=="berita"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>berita">
                    <div class="parent-icon"><i class="fa-duotone fa-newspaper"></i></div>
                    <div class="menu-title">Berita</div>
                  </a>
                </li>
                <li class="menu-label">Akun</li> 
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                  <li <?php if($this->uri->segment(1)=="fitur"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>fitur">
                    <div class="parent-icon"><i class="fa-duotone fa-taxi"></i></div>
                    <div class="menu-title">Fitur</div>
                  </a>
                </li>
                <?php } ?>
               
                <li <?php if($this->uri->segment(1)=="paket"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>paket">
                    <div class="parent-icon"><i class="fa-duotone fa-box-circle-check"></i></div>
                    <div class="menu-title">Paket</div>
                  </a>
                </li>
                <li <?php if($this->uri->segment(1)=="Appnotifikasi"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>Appnotifikasi">
                    <div class="parent-icon"><i class="fa-duotone fa-bell"></i></div>
                    <div class="menu-title">Notifikasi</div>
                  </a>
                </li>
              
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                <li class="menu-label">Aplikasi</li> 
                <li <?php if($this->uri->segment(1)=="poin"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>poin">
                    <div class="parent-icon"><i class="fa-duotone fa-award"></i></div>
                    <div class="menu-title">Poin</div>
                  </a>
                </li>
                <li <?php if($this->uri->segment(1)=="partnerjob"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>partnerjob">
                    <div class="parent-icon"><i class="fa-duotone fa-motorcycle"></i></div>
                    <div class="menu-title">Partner Job</div>
                  </a>
                </li>
                  <li <?php if($this->uri->segment(1)=="pengaturan"){echo 'class="active-page"';}?>>
                  <a href="<?= base_url(); ?>pengaturan">
                    <div class="parent-icon"><i class="fa-duotone fa-gears"></i></div>
                    <div class="menu-title">Pengaturan</div>
                  </a>
                </li>
                <?php } ?>
  
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->