
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
                                <input class="multisteps-form__input form-control" name="" type="text" placeholder="" value="<?= $laporan->petugas ?>" readonly="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="ms-0">Tanggal Laporan</label>
                                <input class="multisteps-form__input form-control" name="date" value="<?= $laporan->date ?>" type="date" readonly="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="ms-0">Lokasi</label>
                                <input class="multisteps-form__input form-control" type="text" value="<?= $laporan->lokasi ?>" readonly="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="ms-0">Peternak</label>
                                <input class="multisteps-form__input form-control" type="text" value="<?= $laporan->peternak ?>" readonly="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="ms-0">Akkseptor</label>
                                <input class="multisteps-form__input form-control" type="text" value="<?= $laporan->akseptor ?>" readonly="">
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Nama Bull</label>
                                <input class="multisteps-form__input form-control" type="text" value="<?= $laporan->nama_bull ?>" readonly="">
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Kode Bull</label>
                                <input class="multisteps-form__input form-control" type="text" value="<?= $laporan->kode_bull ?>" readonly="">
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Kode Batch</label>
                                <input class="multisteps-form__input form-control" name="kode_batch" value="<?= $laporan->kode_batch ?>" type="text" readonly="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="ms-0">Jenis Semen Beku</label>
                                <select class="form-control" readonly>
                                    <option>- Pilih Jenis -</option>
                                    <option <?= ($laporan->sexing == 'x') ? 'selected' : '' ?> value="x">Sexing x</option>
                                    <option <?= ($laporan->sexing == 'y') ? 'selected' : '' ?> value="y">Sexing y</option>
                                    <option <?= ($laporan->sexing == 'n') ? 'selected' : '' ?> value="n">Unsexing</option>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="ms-0">Tanggal Inseminasi Buatan</label>
                                <?php if($ib->num_rows() > 0): ?>
                                    <?php $no=1; foreach($ib->result() as $row): ?>
                                        <div class="d-flex align-items-center justify-content-between mb-2" id="form__<?= $row->id ?>">
                                            <span class="me-2 nomor-sub"><?= $no++ ?>.</span>
                                            <input class="multisteps-form__input form-control" value="<?= $row->tgl ?>" type="date" name="tgl_ib[]" required="" readonly>
                                        </div>    
                                    <?php endforeach; ?>
                                <?php endif; ?>    
                            </div>
                            <hr class="horizontal dark mt-4 mb-3">
                            <!-- PKB -->
                            <h6 class="text-sm text-secondary mb-2 text-uppercase">PELAYANAN PEMERIKSAAN KEBUNTINGAN (PKB) &amp; Kelahiran</h6>
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">PKB</label>
                                <input class="multisteps-form__input form-control" type="date" value="<?= $laporan->tgl_pkb ?>" readonly="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">+ (Bunting)</label>
                                <input class="multisteps-form__input form-control" type="number" value="<?= $laporan->bunting ?>" readonly="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">- (Tidak Bunting)</label>
                                <input class="multisteps-form__input form-control" type="number" value="<?= $laporan->tidak_bunting ?>" readonly="">
                            </div>
                            <!-- KELAHIRAN -->
                            <div class="col-lg-6 col-12 mt-2">
                                <label class="ms-0">Kelahiran</label>
                                <input class="multisteps-form__input form-control" type="date" value="<?= $laporan->tgl_kelahiran ?>" readonly="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">Jantan</label>
                                <input class="multisteps-form__input form-control" type="number" value="<?= $laporan->jantan ?>" readonly="">
                            </div>
                            <div class="col-lg-3 col-12 mt-2">
                                <label class="ms-0">Betina</label>
                                <input class="multisteps-form__input form-control" type="number" value="<?= $laporan->betina ?>" readonly="">
                            </div>
                            <hr class="horizontal dark mt-4 mb-3">
                            <!-- PKB -->
                            <h6 class="text-sm text-secondary mb-2 text-uppercase">KETERANGAN</h6>
                            <div class="col-lg-12 col-12 mt-2">
                                <textarea class="form-control" placeholder="Tulis keterangan" id="" style="height: 100px" readonly><?= $laporan->keterangan ?></textarea>
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
    <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
    </body>

</html>