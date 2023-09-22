<div class="card mb-3 bg-gradient-mask-light d-none d-lg-block">
    <div class="card-body z-index-1 bg-cover d-flex flex-lg-row flex-column text-lg-start text-center align-items-center">
        <div class="mb-lg-0 mb-3">
            <h5 class="mb-1 text-uppercase">Edit Laporan</h5>
        </div>
    </div>
</div>

<form action="<?= site_url('admin/pelaporan/update/' . $laporan->id) ?>" method="post">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row mt-0">
                <!-- INSEMINASI BUATAN -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">Inseminasi Buatan</h6>
                <div class="col-12 mt-0">
                    <label class="ms-0">Nama Petugas</label>
                    <select class="form-control" name="user_id">
                        <option selected="" disabled="">- Pilih Petugas -</option>
                        <?php foreach($petugas->result() as $pt){ ?>
                            <option <?= ($laporan->user_id == $pt->id) ? 'selected' : '' ?> value="<?= $pt->id ?>"><?= $pt->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Lokasi</label>
                    <input class="multisteps-form__input form-control" name="lokasi" value="<?= $laporan->lokasi ?>" type="text" placeholder="" required="">
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Peternak</label>
                    <select class="form-control" name="peternak_id">
                        <option selected="" disabled="">- Pilih Peternak -</option>
                        <?php foreach($peternak->result() as $p){ ?>
                            <option <?= ($laporan->peternak_id == $p->id) ? 'selected' : '' ?> value="<?= $p->id ?>"><?= $p->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Akkseptor</label>
                    <input class="multisteps-form__input form-control" name="akseptor" value="<?= $laporan->akseptor ?>" type="text" placeholder="" required="">
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Nama Bull</label>
                    <input class="multisteps-form__input form-control" name="nama_bull" value="<?= $laporan->nama_bull ?>" type="text" placeholder="" required="">
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Kode Bull</label>
                    <input class="multisteps-form__input form-control" name="kode_bull" value="<?= $laporan->kode_bull ?>" type="text" placeholder="" required="">
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Kode Batch</label>
                    <input class="multisteps-form__input form-control" name="kode_batch" value="<?= $laporan->kode_batch ?>" type="text" placeholder="" required="">
                </div>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Jenis Semen Beku</label>
                    <select class="form-control" name="sexing" required>
                        <option selected="" disabled="">- Pilih Jenis -</option>
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
                                <input class="multisteps-form__input form-control" value="<?= $row->tgl ?>" type="date" name="tgl_ib[]" required="">
                                <button type="button" class="btn btn-icon-only btn-danger mb-0 ms-2 d-flex align-items-center justify-content-center btn-remove-tgl" data-id="__<?= $row->id ?>"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>    
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="me-2 nomor-sub">1.</span>
                            <input class="multisteps-form__input form-control" value="" type="date" name="tgl_ib[]" required="">
                        </div>
                    <?php endif; ?>

                    <div class="hasil">

                    </div>

                    <button type="button" class="btn btn-sm mb-0 btn-outline-light mx-auto w-100 text-dark btn-add-tgl">
                        <i class="fas fa-plus me-2" aria-hidden="true"></i>Tanggal Inseminasi Buatan
                    </button>              
                </div>

                <hr class="horizontal dark mt-4 mb-3">
                <!-- PKB -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">PELAYANAN PEMERIKSAAN KEBUNTINGAN (PKB) & Kelahiran</h6>
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">PKB</label>
                    <input class="multisteps-form__input form-control" name="tgl_pkb" value="<?= $laporan->tgl_pkb ?>" type="date" placeholder="" required="">
                </div>
                <div class="col-lg-3 col-12 mt-2">
                    <label class="ms-0">+ (Bunting)</label>
                    <input class="multisteps-form__input form-control" name="bunting" value="<?= $laporan->bunting ?>" type="number" placeholder="" required="">
                </div>
                <div class="col-lg-3 col-12 mt-2">
                    <label class="ms-0">- (Tidak Bunting)</label>
                    <input class="multisteps-form__input form-control" name="tidak_bunting" value="<?= $laporan->tidak_bunting ?>" type="number" placeholder="" required="">
                </div>
                <!-- KELAHIRAN -->
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Kelahiran</label>
                    <input class="multisteps-form__input form-control" name="tgl_kelahiran" value="<?= $laporan->tgl_kelahiran ?>" type="date" placeholder="" required="">
                </div>
                <div class="col-lg-3 col-12 mt-2">
                    <label class="ms-0">Jantan</label>
                    <input class="multisteps-form__input form-control" name="jantan" value="<?= $laporan->jantan ?>" type="number" placeholder="" required="">
                </div>
                <div class="col-lg-3 col-12 mt-2">
                    <label class="ms-0">Betina</label>
                    <input class="multisteps-form__input form-control" name="betina" value="<?= $laporan->betina ?>" type="number" placeholder="" required="">
                </div>
                <hr class="horizontal dark mt-4 mb-3">
                <!-- PKB -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">KETERANGAN</h6>
                <div class="col-lg-12 col-12 mt-2">
                    <textarea class="form-control" placeholder="Tulis keterangan" id="" style="height: 100px" name="keterangan"><?= $laporan->keterangan ?></textarea>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn bg-gradient-dark w-100 m-0">Simpan Data</button>
                    <a href="<?= site_url('admin/pelaporan') ?>" class="btn shadow-none w-100 mt-0 mb-0">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
</form>