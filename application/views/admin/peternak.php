<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-lg-9 col-12">
						<h4 class="text-lg-start text-center mb-lg-0 mb-3">Daftar Peternak</h4>
					</div>
					<div class="col-lg-3 col-12 d-flex justify-content-lg-end justify-content-center">
						<a href="<?= site_url('admin/peternak/tambah') ?>" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus me-2"></i> PETERNAK</a>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table table-hover align-items-center mb-0 table-striped" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-sm text-center" width="1px">#</th>
								<th class="text-uppercase text-sm">Nama</th>
								<th class="text-uppercase text-sm" width="1px">No. Anggota</th>
								<th class="text-uppercase text-sm" width="1px">No. WA</th>
								<th class="text-uppercase text-sm" width="1px">L/P</th>
								<th class="text-uppercase text-sm text-center" width="1px">Aksi</th>
							</tr>
						</thead>
						<tbody>
                            <?php $no = 1; foreach($peternak->result() as $row){ ?>
                                <tr>
                                    <td class="text-sm text-center"><?= $no++ ?>. </td>
                                    <td class="text-sm fw-normal"><?= $row->nama ?></td>
									<td class="text-sm fw-normal"><?= $row->no_anggota ?></td>
									<td class="text-sm fw-normal"><?= $row->nowa ?></td>
									<td class="text-sm fw-normal"><?= $row->jenkel ?></td>
                                    <td class="text-sm fw-normal">
										<div class="btn-group">
											<a href="<?= site_url('admin/peternak/edit/' . $row->id) ?>" class="btn btn-sm btn-dark px-3 me-2 mb-0"><i class="fas fa-edit"></i></a>
											<a href="<?= site_url('admin/peternak/remove/' . $row->id) ?>" class="btn btn-sm btn-danger px-3 mb-0"><i class="fas fa-trash"></i></a>
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