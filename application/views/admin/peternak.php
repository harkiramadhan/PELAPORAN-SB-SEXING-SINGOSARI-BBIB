<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<div class="row">
                    <div class="col-lg-9">
                        <h6>Daftar Peternak</h6>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-sm btn-success w-100"><i class="fas fa-plus me-2"></i>  PETERNAK</button>
                    </div>
                </div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table align-items-center mb-0 table-stiped table-bordered" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="1px">NO</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
								<th class="text-secondary opacity-7" rowspan="2" width="1px"></th>
							</tr>
						</thead>
						<tbody>
                            <?php $no = 1; foreach($peternak->result() as $row){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>. </td>
                                    <td><?= $row->peternak ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm w-100 btn-info"><i class="fas fa-pencil-alt"></i></button>
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