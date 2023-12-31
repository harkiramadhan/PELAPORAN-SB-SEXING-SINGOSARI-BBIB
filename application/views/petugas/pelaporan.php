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
							<a href="<?= site_url('admin/excel/export/' . $this->session->userdata('user_id')) ?>" class="btn btn-outline-dark mb-0 me-2"><i class="fas  fa-file-excel me-2 mb-0"></i> Export Dokumen</a>
							<a href="<?= site_url('petugas/pelaporan/tambah') ?>" class="btn bg-gradient-dark mb-0 d-inline"><i class="fas fa-plus me-2"></i> LAPORAN</a>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-3">
						<label for="">Filter Peternak</label> <br>
						<select name="" id="filter-peternak" class="form-control select2">
							<option value=""> - Pilih Peternak</option>
							<?php foreach($peternak->result() as $pt){ ?>
								<option value="<?= $pt->id ?>" <?= ($pt->id == $this->input->get('pt', TRUE)) ? 'selected' : '' ?>> <?= $pt->nama ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="col-lg-2">
						<label for="">Filter Bulan</label> <br>
						<select name="" id="filter-month" class="form-control select2">
							<option value=""> - Pilih Bulan</option>
							<?php foreach(range(1, 12) as $m){ ?>
								<option value="<?= sprintf("%02d", $m) ?>" <?= (sprintf("%02d", $m) == $this->input->get('m', TRUE)) ? 'selected' : '' ?>> <?= bulan($m) ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="col-lg-2">
						<label for="">Filter Tahun</label> <br>
						<select name="" id="filter-year" class="form-control select2">
							<option value=""> - Pilih Tahun</option>
							<?php foreach(range(date('Y', strtotime('-5 year')), date('Y')) as $y){ ?>
								<option value="<?= $y ?>" <?= ($y == $this->input->get('y', TRUE)) ? 'selected' : '' ?>> <?= $y ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="col-lg-2">
						<label for=""></label><br>
						<a href="<?= site_url('petugas/pelaporan') ?>" class="btn btn-danger w-100 mt-1"><i class="fa fa-rotate-right me-2"></i> Reset Filter</a>
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
                                <th class="text-uppercase text-sm text-center" width="1px">IB</th>
                                <th class="text-uppercase text-sm text-center" width="1px">PKB</th>
								<th class="text-uppercase text-sm text-center" width="1px">LAHIR</th>
								<th class="text-uppercase text-sm text-center" width="1px">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no=1; foreach($laporan->result() as $row){ 
									$ib = $this->db->get('ib', ['id_laporan' => $row->id]);
							?>
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
									<td class="fw-normal text-sm align-top text-center">
										<?php if($ib->num_rows() > 0): ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
											</div>	
										<?php else: ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
											</div>	
										<?php endif; ?>
									</td>
									<td class="fw-normal text-sm align-top text-center">
										<?php if($row->tgl_pkb): ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
											</div>	
										<?php else: ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
											</div>	
										<?php endif; ?>
									</td>
									<td class="fw-normal text-sm align-top text-center">
										<?php if($row->tgl_kelahiran): ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
											</div>	
										<?php else: ?>
											<div class="d-flex justify-content-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
											</div>	
										<?php endif; ?>
									</td>
									<td class="align-top">
										<div class="btn-group">
											<!-- <a href="<?= site_url('webview/laporan/' . md5($row->id)) ?>" class="btn btn-sm btn-dark px-3 me-2 mb-0" target="_BLANK"><i class="fas fa-eye"></i></a> -->
											<a href="<?= site_url('petugas/pelaporan/edit/' . $row->id) ?>" class="btn btn-sm btn-dark px-3 me-2 mb-0"><i class="fas fa-pencil-alt"></i></a>
											<a href="<?= site_url('petugas/pelaporan/remove/' . $row->id) ?>" class="btn btn-sm btn-danger px-3 mb-0"><i class="fas fa-trash"></i></a>
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
            <form action="<?= site_url('admin/excel/laporanlokasi') ?>" method="POST" enctype="multipart/form-data">
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