<div class="card mb-3 bg-gradient-mask-light d-none d-lg-block">
    <div class="card-body z-index-1 bg-cover d-flex flex-lg-row flex-column text-lg-start text-center align-items-center">
        <div class="mb-lg-0 mb-3">
            <h5 class="mb-1 text-uppercase">Tambah Peternak</h5>
        </div>
    </div>
</div>

<form action="<?= site_url('admin/peternak/create') ?>" method="post">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row mt-0">
                <div class="col-12 mt-0">
                    <label class="ms-0">Nama Peternak</label>
                    <input class="multisteps-form__input form-control" name="nama" type="text" placeholder="" value="" required="">
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Nomor Anggota</label>
                    <input class="multisteps-form__input form-control" name="no_anggota" type="number" placeholder="" required="">
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Jenis Kelamin</label>
                    <select class="form-control" name="jenkel">
                        <option selected="" disabled="">- Pilih Jenis Kelamin -</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Nomor Whatsapp</label>
                    <input class="multisteps-form__input form-control" name="nowa" type="text" placeholder="" required="">
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn bg-gradient-dark w-100 m-0">Simpan Data</button>
                    <a href="<?= site_url('admin/peternak') ?>" class="btn shadow-none w-100 mt-0 mb-0">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
</form>