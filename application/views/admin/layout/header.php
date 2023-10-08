
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/brand/logo-primary.png') ?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/brand/logo-primary.png') ?>">
		<title> <?= @$title ?> </title>
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<!-- Nucleo Icons -->
		<link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
		<!-- Font Awesome Icons -->
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
		<link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet" />
		<!-- CSS Files -->
		<link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.0.4') ?>" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	</head>
	<body class="g-sidenav-show   bg-gray-100">
		<div class="min-height-300 bg-primary position-absolute w-100"></div>
		<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
			<div class="div pb-">
				<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
				<a class="navbar-brand m-0 mb-3 text-center pb-0" href="<?= site_url('admin/dashboard') ?>">
					<img src="<?= base_url('assets/img/brand/logo-primary.png" class=" mb-2" style="max-height: 100px;" alt="main_logo') ?>">
					<br>
					<span class="ms-1 font-weight-bold ms-auto">Pelaporan Inseminasi Buatan
						<br>
						BBIB Singosari
					</span>
				</a>
			</div>
			<hr class="horizontal dark mt-0">
			<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-home text-dark text-sm opacity-10" style="margin-top: -7px;"></i>
							</div>
							<span class="nav-link-text fw-bold ms-1">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'pelaporan') ? 'active' : '' ?>" href="<?= site_url('admin/pelaporan') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-list text-dark text-sm opacity-10" style="margin-top: -7px;"></i>
							</div>
							<span class="nav-link-text fw-bold ms-1">Pelaporan IB</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'bull') ? 'active' : '' ?>" href="<?= site_url('admin/bull') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-hippo text-dark text-sm opacity-10" style="margin-top: -7px;"></i>
							</div>
							<span class="nav-link-text fw-bold ms-1">Bull</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'peternak') ? 'active' : '' ?>" href="<?= site_url('admin/peternak') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-users text-dark text-sm opacity-10" style="margin-top: -7px;"></i>
							</div>
							<span class="nav-link-text fw-bold ms-1">Peternak</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'user') ? 'active' : '' ?>" href="<?= site_url('admin/user') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-user-shield text-dark text-sm opacity-10" style="margin-top: -7px;"></i>
							</div>
							<span class="nav-link-text fw-bold ms-1">Petugas</span>
						</a>
					</li>
				</ul>
			</div>
		</aside>
		<main class="main-content position-relative border-radius-lg ">
			<!-- Navbar -->
			<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
				<div class="container-fluid py-1 px-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
							<li class="breadcrumb-item text-sm">
								<a class="opacity-5 text-white" href="javascript:;"><i class="fa fa-home me-sm-1"></i>Beranda</a>
							</li>
							<li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= $pages ?></li>
						</ol>
						<h5 class="font-weight-bolder text-white mb-0 mt-3">Menu <?= $pages ?></h5>
					</nav>
					<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
						<div class="ms-md-auto pe-md-3 d-flex align-items-center">
							<p></p>
						</div>
						<ul class="navbar-nav  justify-content-end">
							<li class="nav-item d-flex align-items-center">
								<a href="
									<?= site_url('auth/logout') ?>" class="nav-link text-white font-weight-bold px-0 bg-gradient-dark shadow py-3 px-4 rounded-pill">
									<i class="fa fa-user me-sm-1"></i>
									<span class="d-sm-inline d-none">
									<strong>LOGOUT </span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="container-fluid py-4">