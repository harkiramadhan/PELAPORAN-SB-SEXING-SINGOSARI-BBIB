<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<div class="row">
                    <div class="col-lg-9">
                        <h6>Daftar User</h6>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-success w-100"><i class="fas fa-plus me-2"></i> USER</button>
                    </div>
                </div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table align-items-center mb-0 table-stiped table-bordered" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="1px">NO</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" width="1px">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">Role</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">Status</th>
								<th class="text-secondary opacity-7" rowspan="2" width="1px"></th>
							</tr>
						</thead>
						<tbody>
                            <?php $no = 1; foreach($user->result() as $row){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>. </td>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><button type="button" class="btn btn-sm w-100 mb-0 <?= ($row->role == 1) ? 'btn-success' : 'btn-primary' ?>"><?= ($row->role == 1) ? 'Admin' : 'Petugas' ?></button></td>
                                    <td><button type="button" class="btn btn-sm w-100 mb-0 <?= ($row->status == 1) ? 'btn-success' : 'btn-danger' ?>"><?= ($row->status == 1) ? 'Active' : 'Non Active' ?></button></td>
                                    <td>
                                        <button type="button" class="btn btn-sm w-100 mb-0 btn-info"><i class="fas fa-pencil-alt"></i></button>
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