<div class="row mt-4">
    <div class="col-lg-8 col-12 order-2 order-lg-1">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Masuk</p>
                                <h2 class="font-weight-bolder mb-0"><?= $laporan ?></h2>
                            </div>
                            <div class="icon icon-shape bg-gradient-dark text-center ms-auto">
                                <i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
				<div class="card">
					<div class="card-body p-3">
						<div class="d-flex">
							<div class="numbers">
								<p class="text-sm mb-0 text-uppercase font-weight-bold">Peternak</p>
								<h2 class="font-weight-bolder mb-0"><?= $peternak ?></h2>
							</div>
							<div class="icon icon-shape bg-gradient-dark text-center ms-auto">
								<i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">
				<div class="card">
					<div class="card-body p-3">
						<div class="d-flex">
							<div class="numbers">
								<p class="text-sm mb-0 text-uppercase font-weight-bold">Petugas</p>
								<h2 class="font-weight-bolder mb-0"><?= $petugas ?></h2>
							</div>
							<div class="icon icon-shape bg-gradient-dark text-center ms-auto">
								<i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
            </div>
            
            <div class="col-lg-12">
                <div class="card z-index-2 mt-4">
                    <div class="card-header p-3 pb-0">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">GRAFIK LAPORAN IB <?= date('Y') ?></p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="laporanib" class="chart-canvas" height="600" style="display: block; box-sizing: border-box; height: 200px; width: 635px;" width="1270"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card z-index-2 mt-4">
                    <div class="card-header p-3 pb-0">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">GRAFIK PKB <?= date('Y') ?></p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="laporanpkb" class="chart-canvas" height="600" style="display: block; box-sizing: border-box; height: 200px; width: 635px;" width="1270"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card z-index-2 mt-4">
                    <div class="card-header p-3 pb-0">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">GRAFIK KELAHIRAN IB <?= date('Y') ?></p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                        <canvas id="kelahiranib" class="chart-canvas" height="600" style="display: block; box-sizing: border-box; height: 200px; width: 635px;" width="1270"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card z-index-2 mt-4">
                    <div class="card-header p-3 pb-0">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">JENIS SEXING <?= date('Y') ?></p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="jenissexing" class="chart-canvas" height="600" style="display: block; box-sizing: border-box; height: 300px; width: 635px;" width="1270"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="col-lg-4 col-12 order-1 order-lg-2 mb-3 mb-lg-0">
        <div class="card">
            <div class="card-body text-center">
                <img src="../assets/img/brand/logo-primary.png" style="width: 30%; height: auto;" alt="">
                <h4 class="mb-2">BBIB Singosari</h4>
                <span class="badge bg-gradient-dark mb-3">Sistem Pelaporan IB</span>
                <p class="text-sm text-muted mb-0">Jl. BBIB No.1, Ds. Toyomarto,Kec. Singosari, Malang 65153. Jawa Timur Indonesia Telp. (+62341) 458359, 458474, 454331. Fax : (+62341) 458359</p>
            </div>
        </div>
    </div>
</div>