<div class="card mb-3 bg-gradient-mask-light d-none d-lg-block">
    <div class="card-body z-index-1 bg-cover d-flex flex-lg-row flex-column text-lg-start text-center align-items-center">
        <div class="mb-lg-0 mb-3">
            <!-- Ini nanti kalau edit, bearti jadi edit aja -->
            <h5 class="mb-1 text-uppercase">Tambah Laporan</h5>
        </div>
    </div>
</div>

<?php if($this->session->userdata('role') == 1): ?>
    <form action="<?= site_url('admin/pelaporan/create') ?>" method="post" enctype="multipart/form-data" >
<?php else: ?>
    <form action="<?= site_url('petugas/pelaporan/create') ?>" method="post" enctype="multipart/form-data" >
<?php endif; ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row mt-0">
                <!-- INSEMINASI BUATAN -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">Inseminasi Buatan</h6>
                <?php if($this->session->userdata('role') == 1): ?>
                    <div class="col-lg-4 col-12 mt-2">
                        <label class="ms-0">Nama Petugas <span class="text-warning">*</span></label>
                        <select class="form-control" name="user_id" required>
                            <option selected="">- Pilih Petugas -</option>
                            <?php foreach($petugas->result() as $pt){ ?>
                                <option value="<?= $pt->id ?>"><?= $pt->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
                <?php endif; ?>
                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-12 mt-2">
                            <label class="ms-0">Kota/Kabupaten <span class="text-warning">*</span></label>
                            <select class="form-control select2 data-kabupaten" id="kabupaten" name="kabupaten_id" required>
                                <option selected="" disabled="">- Pilih Kota/Kabupaten -</option>
                                <?php foreach($kabupaten->result() as $kab){ ?>
                                    <option value="<?= $kab->code ?>"> <?= $kab->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-12 mt-2">
                            <label class="ms-0">Kecamatan <span class="text-warning">*</span></label>
                            <select class="form-control select2 data-kabupaten" id="kecamatan" name="kecamatan_id" required>
                                <option selected="" disabled="">- Pilih Kecamatan -</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-12 mt-2">
                            <label class="ms-0">Kelurahan/Desa <span class="text-warning">*</span></label>
                            <select class="form-control select2 data-kabupaten" id="kelurahan" name="kelurahan_id" required>
                                <option selected="" disabled="">- Pilih Kelurahan -</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Peternak <span class="text-warning">*</span></label>
                    <select class="form-control select2-tags" name="peternak_id" id="select-peternak" required>
                        <option selected="" disabled="">- Pilih Peternak -</option>
                        <?php foreach($peternak->result() as $p){ ?>
                            <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Nomor Anggota  <i class="fw-normal">(Kosongkan jika tidak ada)</i></label>
                    <input class="multisteps-form__input form-control" name="no_anggota" type="text" placeholder="" id="no-anggota">
                </div>
                
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Akseptor  <i class="fw-normal">(Sesuai dengan kode irtag)</i></label>
                    <input class="multisteps-form__input form-control" name="akseptor" type="text" placeholder="">
                </div>
                
                <div class="col-lg-6 col-12 mt-2">
                    <label class="ms-0">Upload Foto Akseptor </label>
                    <input class="form-control" name="img" type="file" id="image-source" onchange="previewImage();" accept="image/png, image/gif, image/jpeg">
                </div>

                <hr class="horizontal dark mt-4 mb-3">

                <!-- IB -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">INSEMINASI BUATAN</h6>

                <div class="row tanggal-ib" id="clone-1">
                    <div class="col-lg-3 col-12 mt-2">
                        <label class="ms-0">Tanggal Inseminasi Buatan <span class="text-warning">*</span></label>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="me-2 nomor-sub">1.</span>
                            <input class="multisteps-form__input form-control border-2" value="" type="date" name="tgl_ib[]" required="">
                        </div>
                    </div>

                    <div class="col-lg-2 col-12 mt-2">
                        <label class="ms-0">Bull <i class="fw-normal">(Kode Bull - Nama Bull) </i><span class="text-warning">*</span></label>
                        <select class="form-control select2" name="bull_id[]" required>
                            <option selected="" disabled="">- Pilih Bull -</option>
                            <?php foreach($bull->result() as $b){ ?>
                                <option value="<?= $b->id ?>"><?= $b->kode . " - " . $b->bull . " - " . $b->rumpun ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-2 col-12 mt-2">
                        <label class="ms-0">Jenis Semen Beku <span class="text-warning">*</span></label>
                        <select class="form-control select2" name="sexing[]" required>
                            <option selected="" disabled="">- Pilih Jenis -</option>
                            <option value="x">Sexing x</option>
                            <option value="y">Sexing y</option>
                            <option value="n">Unsexing</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-12 mt-2">
                        <label class="ms-0">Metode Sexing <span class="text-warning">*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="metode[0]" value="1" id="customRadioMetode1" required>
                            <label class="custom-control-label" for="customRadioMetode1"><strong><i class="fas fa-star me-2"></i></strong></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="metode[0]" value="0" id="customRadioMetode2" required>
                            <label class="custom-control-label" for="customRadioMetode2"><strong><i class="fa fa-star-o me-2"></i></strong></label>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-12 mt-2">
                        <label class="ms-0">Kode Batch <span class="text-warning">*</span></label>
                        <input class="multisteps-form__input form-control" name="kode_batch[]" type="text" placeholder="" required="">
                    </div>

                    <div class="col-lg-1 col-12 mt-lg-2 mt-3 mb-lg-0 mb-3">
                        <label class="ms-0 text-white d-lg-block d-none mt-1">-</label>
                        <button type="button" class="btn btn-icon-only btn-danger mb-0 w-100 btn-remove d-none" data-id="1"><i class="fas fa-trash" aria-hidden="true"></i></button>                
                    </div>
                </div>


                <div class="hasil">

                </div>

                <div class="col-12 mt-4">
                    <button type="button" class="btn btn-sm mb-0 btn-outline-light mx-auto w-100 text-dark" id="cloneDiv">
                        <i class="fas fa-plus me-2" aria-hidden="true"></i>Tanggal Inseminasi Buatan
                    </button>              
                </div>

                <hr class="horizontal dark mt-4 mb-3">
                <!-- PKB -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">PELAYANAN PEMERIKSAAN KEBUNTINGAN (PKB) & Kelahiran</h6>
                <div class="col-lg-8 col-12 mt-2">
                    <label class="ms-0">PKB</label>
                    <input class="multisteps-form__input form-control" name="tgl_pkb" type="date" placeholder="">
                </div>
                <div class="col-lg-4 col-12 mt-2">
                    <label class="ms-0">Status</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bunting" value="1" id="customRadioBunting1">
                        <label class="custom-control-label" for="customRadioBunting1"><strong><i class="fas fa-plus me-2"></i></strong> Bunting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bunting" value="0" id="customRadioBunting2">
                        <label class="custom-control-label" for="customRadioBunting2"><strong><i class="fas fa-minus me-2"></i></strong> Tidak Bunting</label>
                    </div>
                </div>
                <!-- KELAHIRAN -->
                <div class="col-lg-8 col-12 mt-2">
                    <label class="ms-0">Kelahiran</label>
                    <input class="multisteps-form__input form-control" name="tgl_kelahiran" type="date" placeholder="">
                </div>
                <div class="col-lg-4 col-12 mt-2">
                    <label class="ms-0">Status</label> 
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelamin" value="1" id="customRadioKelamin1">
                        <label class="custom-control-label" for="customRadioKelamin1"><strong><i class="fas fa-mars me-2"></i></strong> Jantan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelamin" value="0" id="customRadioKelamin2">
                        <label class="custom-control-label" for="customRadioKelamin2"><strong><i class="fas fa-venus me-2"></i></strong> Betina</label>
                    </div>
                </div>
                <hr class="horizontal dark mt-4 mb-3">
                <!-- PKB -->
                <h6 class="text-sm text-secondary mb-2 text-uppercase">KETERANGAN</h6>
                <div class="col-lg-12 col-12 mt-2">
                    <textarea class="form-control" placeholder="Tulis keterangan" id="" style="height: 100px" name="keterangan"></textarea>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn bg-gradient-dark w-100 m-0">Simpan Data</button>
                    <a href="<?= site_url('admin/pelaporan') ?>" class="btn shadow-none w-100 mt-0 mb-0">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
</form>