<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/assets/images/logo_square.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/assets/images/logo_square.png">
    <title>
        Koperasi Arta Gamma Sejahtera
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url(); ?>/assets/admin/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/admin/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>/assets/admin/css/nucleo-svg.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url(); ?>/assets/admin/css/argon-dashboard.css?v=2.0.4"
        rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?php echo base_url(); ?>dashboard">
                <img src="<?php echo base_url(); ?>assets/assets/images/logo_1.png" class="navbar-brand-img h-100" alt="main_logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url(); ?>dashboard">
                        <div class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>nasabah">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nasabah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>teller">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-clipboard-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Teller</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>tabungan">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-piggy-bank"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tabungan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>penarikan">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penarikan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>pinjaman">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pinjaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>angsuran">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <span class="nav-link-text ms-1">Angsuran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>laporan">
                        <div
                            class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Dashboard</a></li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Sign In</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">