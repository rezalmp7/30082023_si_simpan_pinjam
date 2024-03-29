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
  <link href="<?php echo base_url(); ?>assets/admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo base_url(); ?>assets/admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo base_url(); ?>assets/admin/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
  
    <?php if ($this->session->flashdata('message')): ?>
        <script>
            Swal.fire({
              position: 'top-right',
              icon: 'warning',
              title: 'Akun tidak terdaftar',
              showConfirmButton: false,
              timer: 1500
            })
        </script>
        <?php $this->session->set_flashdata('message', null); ?>
    <?php endif; ?>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?php echo base_url(); ?>">
              Koperasi Arta Gamma Sejahtera
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In To Panel</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="<?php echo base_url(); ?>login/login">
                    <div class="form-group mb-3">
                      <label for="example-text-input" class="form-control-label">Username</label>
                      <input type="text" name="username" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-text-input" class="form-control-label">Password</label>
                      <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="form-group mb-3">
                      <label for="example-text-input" class="form-control-label">Sebagai</label>
                      <select class="form-control form-control-sm" name="level" id="exampleFormControlSelect1">
                        <option value="0">Nasabah</option>
                        <option value="1">Teller</option>
                        <option value="2">Manager</option>
                      </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('<?php echo base_url(); ?>assets/client/img/carousel-1.jpg'); background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"RAIH KESUKSESAN USAHA BERSAMA"</h4>
                <p class="text-white position-relative">Koperasi Arta Gamma Sejahtera</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/admin/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/admin/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>