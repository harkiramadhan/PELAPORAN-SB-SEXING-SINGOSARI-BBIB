<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-lg-9 col-12">
						<h4 class="text-lg-start text-center mb-lg-0 mb-3">Daftar Laporan Pelaksanaan IB</h4>
					</div>
					<div class="col-lg-3 col-12 d-flex justify-content-lg-end justify-content-center">
						<button class="btn bg-gradient-dark mb-0"><i class="fas fa-plus me-2"></i> LAPORAN</button>
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
                                        <p class="fw-normal text-sm text-sm mb-0" style="margin-top: -2px;">Lokasi Petugas Inseminasi</p>
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

											<button class="btn btn-sm btn-dark px-3 me-2 mb-0"><i class="fas fa-folder"></i></button>
											<button class="btn btn-sm btn-danger px-3 mb-0"><i class="fas fa-trash"></i></button>
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