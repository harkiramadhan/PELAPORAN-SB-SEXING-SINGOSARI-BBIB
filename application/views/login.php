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
		<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/brand/logo-primary.png">
		<link rel="icon" type="image/png" href="./assets/img/brand/logo-primary.png">
  <title>Halaman Masuk - Sistem Pelaporan Inseminasi Buatan BBIB Singosari</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.0.4') ?>" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-center">
                  <img src="./assets/img/brand/logo-primary.png" class=" mb-2" style="max-height: 100px;" alt="main_logo">

                  <h4 class="font-weight-bolder">Halaman Masuk</h4>
                  <p class="mb-0 fw-bold"> Pelaporan Inseminasi Buatan
                    <br>
                    BBIB Singosari
                  </p>
                  <?= ($this->session->flashdata('error')) ? '<p class="mb-0 text-danger"><strong>' . $this->session->flashdata('error') . '</strong></p>' : '' ?>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="<?= site_url('auth/login') ?>">
                    <div class="mb-3">
                      <div class="form-group <?= ($this->session->flashdata('usr_error')) ? 'has-danger' : '' ?>">
                        <input value="<?= $this->session->flashdata('username') ?>" type="text" class="form-control form-control-lg <?= ($this->session->flashdata('usr_error')) ? 'is-invalid' : '' ?>" placeholder="username" aria-label="username" name="username">
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="form-group <?= ($this->session->flashdata('pwd_error')) ? 'has-danger' : '' ?>">
                        <input type="password" class="form-control form-control-lg <?= ($this->session->flashdata('pwd_error')) ? 'is-invalid' : '' ?>" placeholder="Password" aria-label="Password" name="password">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">LOGIN</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://i0.wp.com/www.tokomesin.com/wp-content/uploads/2016/02/Peluang-Usaha-Ternak-Sapi-dan-Analisa-Usahanya-tokomesin.jpg'); background-size: cover;">
                <span class="mask bg-gradient-danger opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"BBIB Singosari"</h4>
                <p class="text-white position-relative">Setetes Mani Sejuta Harapan.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
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
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4q') ?>"></script>
</body>

</html>