<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-lg-8 col-12">
						<h4 class="text-lg-start text-center mb-lg-0 mb-3">Daftar Laporan Pelaksanaan IB</h4>
					</div>
					<div class="col-lg-4 col-12 d-flex justify-content-lg-end justify-content-center">
						<div class="d-flex">
							<div class="dropdown me-2">
								<a href="#" class="btn btn-outline-dark dropdown-toggle mb-0" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
									<i class="fas  fa-file-pdf me-2 mb-0"></i> Export Dokumen
								</a>
								<ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdownMenuLink2">
									<li>
										<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalExportSatuBulan">
											<i class="fas  fa-file-pdf me-2"></i> 1 Bulan
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalExportBulanan">
											<i class="fas  fa-file-pdf me-2"></i> > 1 Bulan
										</a>
									</li>
								</ul>
							</div>
							<a href="<?= site_url('admin/pelaporan/tambah') ?>" class="btn bg-gradient-dark mb-0 d-inline"><i class="fas fa-plus me-2"></i> LAPORAN</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table table-hover align-items-center mb-0 table-striped" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-sm" width="1px">#</th>
								<th class="text-uppercase text-sm">Petugas</th>
								<th class="text-uppercase text-sm" width="1px">Peternak</th>
                                <th class="text-uppercase text-sm text-center" width="1px">Akseptor</th>
                                <th class="text-uppercase text-sm text-center" width="1px">Bull</th>
                                <th class="text-uppercase text-sm text-center" width="1px">Kode Batch</th>
                                <th class="text-uppercase text-sm text-center" width="1px">IB</th>
                                <th class="text-uppercase text-sm text-center" width="1px">PKB</th>
								<th class="text-uppercase text-sm text-center" width="1px">LAHIR</th>
								<th class="text-uppercase text-sm text-center" width="1px">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($laporan->result() as $row){ ?>
								<tr class="border: none;">
									<td class="text-center fw-normal text-sm align-top"><?= $no++ ?>. </td>
									<td class="align-top" >
										<p class="fw-bold text-sm text-dark mb-0"><?= $row->nama ?></p>
                                        <p class="fw-normal text-sm text-sm mb-0" style="margin-top: -2px;"><?= $row->lokasi ?></p>
									</td>
									<td class="fw-normal text-sm align-top"><?= $row->peternak ?></td>
									<td class="fw-normal text-sm align-top text-center">
										<?= $row->akseptor ?>
									</td>
									<td class="fw-normal text-sm align-top text-left">
										<p class="text-sm mb-0">
											<span class="fw-bold text-sm"><?= $row->nama_bull ?></span>, 
											<br><?= $row->kode_bull ?>
										</p>
										<p class="fw-normal text-sm align-top text-sm mb-0" style="margin-top: -2px;">
											<?= ($row->sexing == 'y') ? 'Sexing y' : 
											(($row->sexing == 'x') ? 'Sexing x' : 
											(($row->sexing == 'n') ? 'Unsexing' : '')) ?>	
										</p>
									</td>
									<td class="fw-normal text-sm align-top text-center"><?= $row->kode_batch ?></td>
									<td class="fw-normal text-sm align-top text-center">
										<div class="d-flex justify-content-center">
											<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
										</div>	
									</td>
									<td class="fw-normal text-sm align-top text-center">
										<div class="d-flex justify-content-center">
											<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
										</div>	
									</td>
									<td class="fw-normal text-sm align-top text-center">
										<div class="d-flex justify-content-center">
											<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
										</div>	
									</td>
									<td class="align-top">
										<div class="btn-group">
											<a href="" class="btn btn-sm btn-dark px-3 me-2 mb-0"><i class="fas fa-eye"></i></a>
											<a href="<?= site_url('admin/pelaporan/edit/' . $row->id) ?>" class="btn btn-sm btn-dark px-3 me-2 mb-0"><i class="fas fa-pencil-alt"></i></a>
											<a href="<?= site_url('admin/pelaporan/remove/' . $row->id) ?>" class="btn btn-sm btn-danger px-3 mb-0"><i class="fas fa-trash"></i></a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- MODAL MODAL -->

<div class="modal fade" id="modalExportSatuBulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""><i class="fas fa-upload fa-md text-dark me-2 ms-1" aria-hidden="true"></i>Export Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="<?= site_url('admin/excel/laporansatubulan') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
						<div class="col-12 col-lg-6 mb-2">
							<label class="ms-0">Pilih Bulan</label>
							<select class="form-control" name="bulan" required>
								<option selected="" disabled="">- Pilih Bulan -</option>
								<?php
									$range = range(1, 12);
									foreach($range as $r){
								?>
									<option <?= ((int)date('m') == $r) ? 'selected' : '' ?> value="<?= $r ?>"> <?= bulan($r) ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-12 col-lg-6">
							<label class="ms-0">Pilih Tahun</label>
							<select class="form-control" name="tahun" required>
								<option selected="" disabled="">- Pilih Tahun -</option>
								<?php 
									$range = range(date('Y-m-d', strtotime("-5 year", time())), date('Y'));
									foreach($range as $r){
								?>
									<option <?= (date('Y') == $r) ? 'selected' : '' ?> value="<?= $r ?>"> <?= $r ?></option>
								<?php } ?>
							</select>
						</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn m-0 me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-gradient-primary m-0">Export Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExportBulanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""><i class="fas fa-upload fa-md text-dark me-2 ms-1" aria-hidden="true"></i>Export Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="<?= site_url('admin/excel/laporanbulanan') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
						<div class="col-12 col-lg-4 mb-2">
							<label class="ms-0">Pilih Bulan Awal</label>
							<select class="form-control" name="bulan_awal" required>
								<option selected="" disabled="">- Pilih Bulan -</option>
								<?php
									$range = range(1, 12);
									foreach($range as $r){
								?>
									<option <?= ((int)date('m') == $r) ? 'selected' : '' ?> value="<?= $r ?>"> <?= bulan($r) ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-12 col-lg-4 mb-2">
							<label class="ms-0">Pilih Bulan Akhir</label>
							<select class="form-control" name="bulan_akhir" required>
								<option selected="" disabled="">- Pilih Bulan -</option>
								<?php
									$range = range(1, 12);
									foreach($range as $r){
								?>
									<option <?= ((int)date('m') == $r) ? 'selected' : '' ?> value="<?= $r ?>"> <?= bulan($r) ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-12 col-lg-4">
							<label class="ms-0">Pilih Tahun</label>
							<select class="form-control" name="tahun" required>
								<option selected="" disabled="">- Pilih Tahun -</option>
								<?php 
									$range = range(date('Y-m-d', strtotime("-5 year", time())), date('Y'));
									foreach($range as $r){
								?>
									<option <?= (date('Y') == $r) ? 'selected' : '' ?> value="<?= $r ?>"> <?= $r ?></option>
								<?php } ?>
							</select>
						</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn m-0 me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-gradient-primary m-0">Export Data</button>
                </div>
            </form>
        </div>
    </div>
</div>