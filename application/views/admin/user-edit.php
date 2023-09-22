<div class="card mb-3 bg-gradient-mask-light d-none d-lg-block">
    <div class="card-body z-index-1 bg-cover d-flex flex-lg-row flex-column text-lg-start text-center align-items-center">
        <div class="mb-lg-0 mb-3">
            <!-- Ini nanti kalau edit, bearti jadi edit aja -->
            <h5 class="mb-1 text-uppercase">Edit PETUGAS</h5>
        </div>
    </div>
</div>

<form action="<?= site_url('admin/user/update/' . $user->id) ?>" method="post">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row mt-0">
                <div class="col-12 mt-0">
                    <div class="form-group form-username <?= ($this->session->flashdata('username')) ? 'has-danger' : '' ?>">
                        <label class="ms-0">Username <small><strong class="text-danger">*) Digunakaan Saat Login Petugas, Bersifat Unik</strong></small></label>
                        <input class="multisteps-form__input form-control <?= ($this->session->flashdata('username')) ? 'is-invalid' : '' ?>" name="username" type="text" placeholder="" value="<?= $user->username ?>" required="" data-id="<?= $user->id ?>" id="input-username">
                    </div>
                </div>
                <div class="col-12 mt-0">
                    <label class="ms-0">Nama Petugas</label>
                    <input class="multisteps-form__input form-control" name="nama" type="text" placeholder="" value="<?= $user->nama ?>" required="">
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Jenis Kelamin</label>
                    <select class="form-control" name="jenkel" required>
                        <option disabled="">- Pilih Jenis Kelamin -</option>
                        <option <?= ($user->jenkel == 'L') ? 'selected' : '' ?> value="L">Laki - Laki</option>
                        <option <?= ($user->jenkel == 'P') ? 'selected' : '' ?> value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Nomor Whatsapp</label>
                    <input class="multisteps-form__input form-control" name="nowa" type="number" value="<?= $user->nowa ?>" placeholder="" required="">
                </div>
                <div class="col-12 mt-2">
                    <label class="ms-0">Password <small><strong class="text-danger">*) Isi Jika Ingin Edit Password</strong></small></label>
                    <input class="multisteps-form__input form-control" name="password" type="password" placeholder="">
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn bg-gradient-dark w-100 m-0">Simpan Data</button>
                    <a href="<?= site_url('admin/user') ?>" class="btn shadow-none w-100 mt-0 mb-0">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
</form>