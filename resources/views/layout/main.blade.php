<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('judulSitus')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Informasi Rumah Sakit" name="description" />
    <meta content="Tanzilal Mustaqim" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../layout/assets/images/favicon.png">
    @yield('css')
    <!-- Sweet Alert -->
    <link href="../../layout/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <link href="../../layout/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="../../layout/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../../layout/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../../layout/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="../../layout/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/app.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../../layout/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                        <img src="../../layout/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="../../layout/assets/images/logo-dark.png" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>

            {{-- <ul class="list-unstyled topbar-nav float-right mb-0">

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline nav-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (258)
                            </h6>
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                    <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="../../layout/assets/images/users/user-1.jpg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted mr-2"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul> --}}

            <ul class="list-unstyled topbar-nav mb-0">

                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="mdi mdi-menu nav-icon"></i>
                    </button>
                </li>

                {{-- <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li> --}}

            </ul>

        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <img src="../../layout/assets/images/users/user-1.jpg" alt="user"
                    class="rounded-circle img-thumbnail mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body">
                    <h5 class="text-light">Administrator </h5>
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        {{-- <li class="list-inline-item">
                                <a href="javascript: void(0);" class=""><i class="mdi mdi-account text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class=""><i class="mdi mdi-settings text-light"></i></a>
                            </li> --}}
                        {{-- <li class="list-inline-item">
                            <a href="javascript: void(0);" class=""><i class="mdi mdi-power text-danger"></i></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">

                        {{-- <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>Dashboard</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard 1</li>
                                </ol>
                            </div>                                       --}}
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
        </div>
    </div>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <!-- Left Sidenav -->
            <div class="left-sidenav">

                <ul class="metismenu left-sidenav-menu" id="side-nav">

                    <li class="menu-title">Main</li>

                    <li>
                        <a href="/"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>

                    </li>
                    <li>

                        <a href="/pasien"><i class="mdi mdi-account-heart-outline"></i><span>Pasien</span></a>
                    </li>
                    <li>

                        <a href="/dokter"><i class="dripicons-user-group"></i><span>Dokter</span></a>
                    </li>
                    <li>

                        <a href="/perawat"><i class="mdi mdi-shield-account"></i><span>Perawat</span></a>
                    </li>
                    <li>

                        <a href="/ruang"><i class="mdi mdi-table-column-width"></i><span>Ruang</span></a>
                    </li>
                    <li>

                        <a href="/inap"><i class="mdi mdi-seat-individual-suite"></i><span>Rawat Inap</span></a>
                    </li>
                    <li>

                        <a href="/bayar"><i class="mdi mdi-square-inc-cash"></i><span>Pembayaran</span></a>
                    </li>
                </ul>
            </div>
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    @yield('konten')
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 Tanzilal Mustaqim <span class="text-muted d-none d-sm-inline-block float-right">Crafted
                        with <i class="mdi mdi-heart text-danger"></i> by Tanzilal Mustaqim and Templates by
                        Mannatthemes</span>
                </footer>
            </div>

            <!-- end page content -->
        </div>
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="../../layout/assets/js/jquery.min.js"></script>
    {{-- <script src="../../layout/assets/js/jquery.maskMoney.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}
    <script src="../../layout/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../layout/assets/js/metisMenu.min.js"></script>
    <script src="../../layout/assets/js/waves.min.js"></script>
    <script src="../../layout/assets/js/jquery.slimscroll.min.js"></script>

    <script src="../../layout/assets/plugins/moment/moment.js"></script>
    <script src="../../layout/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    <script src="../../layout/assets/pages/jquery.dashboard.init.js"></script>

    <script src="../../layout/assets/plugins/select2/select2.min.js"></script>


    <!-- Required datatable js -->
    <script src="../../layout/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../../layout/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/jszip.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="../../layout/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="../../layout/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../../layout/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../../layout/assets/pages/jquery.datatable.init.js"></script>



    <!-- Sweet-Alert  -->
    <script src="../../layout/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="../../layout/assets/pages/jquery.sweet-alert.init.js"></script>

    <script src="../../layout/assets/plugins/custombox/custombox.min.js"></script>
    <script src="../../layout/assets/plugins/custombox/custombox.legacy.min.js"></script>

    <script src="../../layout/assets/pages/jquery.modal-animation.js"></script>


    <!-- App js -->
    <script src="../../layout/assets/js/app.js"></script>
    @yield('js')
</body>

</html>