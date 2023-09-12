<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-9">
						<h6>Daftar Pelaporan</h6>
					</div>
					<div class="col-lg-3">
						<button class="btn btn-sm btn-success w-100"><i class="fas fa-plus me-2"></i> PELAPORAN</button>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table align-items-center mb-0 table-stiped table-bordered" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" rowspan="2" width="1px">NO</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" rowspan="2">Petugas</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" rowspan="2" width="1px">Peternak</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" rowspan="2" width="1px">Akseptor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" colspan="2" width="1px">Kode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" colspan="2" width="1px">Sexing</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" rowspan="2" width="1px">Unsexing</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" rowspan="2" width="1px">Keterangan</th>
								<th class="text-secondary opacity-7" rowspan="2" width="1px"></th>
							</tr>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">BULL</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">BULL</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">Batch</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">X</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">Y</th>
                            </tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($laporan->result() as $row){ ?>
								<tr>
									<td class="text-center"><?= $no++ ?>. </td>
									<td><?= $row->nama ?></td>
									<td><?= $row->peternak ?></td>
									<td class="text-center"><?= $row->akseptor ?></td>
									<td class="text-center"><?= $row->nama_bull ?></td>
									<td class="text-center"><?= $row->kode_bull ?></td>
									<td class="text-center"><?= $row->kode_batch ?></td>
									<td class="text-center"><?= ($row->sexing == 'x') ? 'v' : '' ?></td>
									<td class="text-center"><?= ($row->sexing == 'y') ? 'v' : '' ?></td>
									<td class="text-center"><?= ($row->sexing == 'n') ? 'v' : '' ?></td>
									<td><?= $row->keterangan ?></td>
									<td>
										<button class="btn btn-sm btn-info w-100 mb-0"><i class="fas fa-eye"></i></button>
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