<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-4 border-bottom">
				<div class="row">
					<div class="col-lg-9 col-12">
						<h4 class="text-lg-start text-center mb-lg-0 mb-3">Daftar Bull</h4>
					</div>
					<div class="col-lg-3 col-12 d-flex justify-content-lg-end justify-content-center">
						<button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add-bull"><i class="fas fa-plus me-2"></i> BULL</button>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
                    <table class="table table-hover align-items-center mb-0 table-striped" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-sm text-center" width="1px">#</th>
								<th class="text-uppercase text-sm" width="1px">KODE</th>
                                <th class="text-uppercase text-sm" width="1px">BULL</th>
								<th class="text-sm text-center" width="1px">Aksi </th>
							</tr>
						</thead>
						<tbody>
                            <?php $no = 1; foreach($bull->result() as $row){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>. </td>
                                    <td class="text-sm"><?= $row->kode ?></td>
                                    <td class="text-sm fw-normal"><?= $row->bull ?></td>
                                    <td>
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-dark px-3 me-2 mb-0" data-bs-toggle="modal" data-bs-target="#edit-bull-<?= $row->id ?>"><i class="fas fa-edit"></i></button>
											<button type="button" class="btn btn-sm btn-danger px-3 mb-0" data-bs-toggle="modal" data-bs-target="#remove-bull-<?= $row->id ?>"><i class="fas fa-trash"></i></button>
										</div>
									</td>
                                </tr>

                                <div class="modal fade" id="edit-bull-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Bull</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= site_url('admin/bull/update/' . $row->id) ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">KODE BULL <small class="text-danger"><strong>*</strong></small></label>
                                                        <input type="text" name="kode" value="<?= $row->kode ?>" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">BULL <small class="text-danger"><strong>*</strong></small></label>
                                                        <input type="text" name="bull" value="<?= $row->bull ?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-sm btn-success">SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="remove-bull-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Bull</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= site_url('admin/bull/remove/' . $row->id) ?>" method="post">
                                                <div class="card bg-danger">
                                                    <div class="card-body text-center">
                                                        <p class="text-white">
                                                            <strong>Apakah Anda Yakin Menghapus Bull <?= $row->bull ?></strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-white">
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-sm btn-success">HAPUS</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade" id="add-bull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bull</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/bull/create') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">KODE BULL <small class="text-danger"><strong>*</strong></small></label>
                        <input type="text" name="kode" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">BULL <small class="text-danger"><strong>*</strong></small></label>
                        <input type="text" name="bull" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-sm btn-success">TAMBAHKAN</button>
                </div>
            </form>
        </div>
    </div>
</div>