
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
	</head>
	<body class="g-sidenav-show bg-gray-100">
		<div class="min-height-300 bg-gradient-primary position-absolute w-100"></div>
		<main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
			
			<!-- End Navbar -->
			<div class="container-fluid py-4">
                <h5 class="font-weight-bolder text-white mb-4">Laporan Inseminasi Buatan BBIB Singosari</h5>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row mt-0">
                            <!-- INSEMINASI BUATAN -->
                            <h6 class="text-sm text-secondary mb-2 text-uppercase">Inseminasi Buatan</h6>
                            <div class="col-12 mt-0">
                                <label class="ms-0">Nama Petugas</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" value="Alfian Rahmatullah" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="" disabled="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Lokasi</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Peternak</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Akkseptor</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Nama Bull</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Kode Bull</label>
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Jenis Semen Beku</label>
                                <select class="form-control" name="kewarganegaraan_ayah">
                                    <option selected="" disabled="">- Pilih Jenis -</option>
                                    <option value="Sexing x">Sexing x</option>
                                    <option value="Sexing y">Sexing y</option>
                                    <option value="Unsexing">Unsexing</option>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Tanggal Inseminasi Buatan</label>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="me-2 nomor-sub">1</span>
                                    <input class="multisteps-form__input form-control" value="" type="date" name="" required="" disabled="">
                                </div>      
                            </div>
                            <hr class="horizontal dark mt-4 mb-3">
                            <!-- PKB -->
                            <h6 class="text-sm text-secondary mb-2 text-uppercase">PELAYANAN PEMERIKSAAN KEBUNTINGAN (PKB) &amp; Kelahiran</h6>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">PKB</label>
                                <input class="multisteps-form__input form-control" name="" type="date" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">+ (Bunting)</label>
                                <input class="multisteps-form__input form-control" name="" type="number" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">- (Tidak Bunting)</label>
                                <input class="multisteps-form__input form-control" name="" type="number" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <!-- KELAHIRAN -->
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Kelahiran</label>
                                <input class="multisteps-form__input form-control" name="" type="date" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">Jantan</label>
                                <input class="multisteps-form__input form-control" name="" type="number" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">Betina</label>
                                <input class="multisteps-form__input form-control" name="" type="number" placeholder="" onfocus="focused(this)" onfocusout="defocused(this)" required="" disabled="">
                            </div>
                            <hr class="horizontal dark mt-4 mb-3">
                            <!-- PKB -->
                            <h6 class="text-sm text-secondary mb-2 text-uppercase">KETERANGAN</h6>
                            <div class="col-lg-12 col-12 mt-2">
                                <textarea class="form-control" placeholder="Tulis keterangan" id="" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                    document.write(new Date().getFullYear())
                                    </script>2023
                                    <strong>PELAPORAN SB SEXING SINGOSARI BBIB</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
        </div>
    <!--   Core JS Files   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $('#table').DataTable();

        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                padding: 10,
                color: '#fbfbfb',
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#ccc',
                padding: 20,
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });
    </script>
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
    <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
    </body>

</html>