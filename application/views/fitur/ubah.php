<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Ubah Fitur</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata()) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('demo'); ?>
            </div>
        <?php endif; ?>
        <!-- Konten -->
        <?= form_open_multipart('fitur/ubahfitur/' . $id_fitur); ?>
        <input type="hidden" name="id_fitur" value='<?= $id_fitur ?>'>
        <div class="mb-3">
            <input type="file" class="form-control" name="icon" data-max-file-size="3mb" data-default-file="<?= base_url('images/fitur/') . $icon ?>" />
        </div>
        <div class="mb-3">
            <label for="newstitle">Nama Layanan</label>
            <input type="text" class="form-control" id="newstitle" name="fitur" value="<?= $fitur ?>" required>
        </div>
        <div class="mb-3">
            <label for="service_tipe">Tipe Layanan</label>
            <select class="form-control custom-select  mt-15" name="home" style="width:100%">
                <option value="1" <?php if ($home == '1') { ?>selected<?php } ?>>Transportasi</option>
                <option value="2" <?php if ($home == '2') { ?>selected<?php } ?>>Kurir</option>
                <option value="3" <?php if ($home == '3') { ?>selected<?php } ?>>Rental</option>
                <option value="4" <?php if ($home == '4') { ?>selected<?php } ?>>Merchant</option>
                <option value="5" <?php if ($home == '5') { ?>selected<?php } ?>>Belanja</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Harga</label>
            <input type="text"  class="form-control" id="newstitle" name="biaya" value="<?= rupiah($biaya) ?>" required>
        </div>
        <div class="mb-3">
            <label for="promo">Diskon (%)</label>
            <input type="text" class="form-control" id="promo" name="promo" value="<?= $promo ?>" placeholder="ex 10%">
        </div>
        <div class="mb-3">
            <label for="newscategory">Jarak</label>
            <select class="form-control custom-select  mt-15" name="keterangan_biaya" style="width:100%">
                <option value="KM" <?php if ($keterangan_biaya == 'KM') { ?>selected<?php } ?>>Per Km</option>
                <option value="Hr" <?php if ($keterangan_biaya == 'Hr') { ?>selected<?php } ?>>Per Jam</option>
                <option value="Hr" <?php if ($keterangan_biaya == 'Dy') { ?>selected<?php } ?>>Per Hari</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Komisi (%)</label>
            <input type="text" class="form-control" id="newstitle" name="komisi" value="<?= $komisi ?>" placeholder="ex 10%" required>
        </div>
        <div class="mb-3">
            <label for="newscategory">Kendaraan</label>
            <select class="form-control custom-select  mt-15" name="driver_job" style="width:100%">
                <?php foreach ($driverjob as $drj) { ?>
                    <option value="<?= $drj['id'] ?>" <?php if ($driver_job == $drj['id']) { ?>selected<?php } ?>><?= $drj['driver_job'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Min Harga</label>
            <input type="text"  class="form-control" id="newstitle" name="biaya_minimum" value="<?= rupiah($biaya_minimum) ?>" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Jarak Driver</label>
            <input type="text" class="form-control" id="newstitle" name="jarak_driver" value="<?= $jarak_driver ?>" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Min Jarak Pesanan</label>
            <input type="text" class="form-control" id="newstitle" name="jarak_minimum" value="<?= $jarak_minimum ?>" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Maks Jarak Pesanan</label>
            <input type="text" class="form-control" id="newstitle" name="maks_distance" value="<?= $maks_distance ?>" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Min Saldo</label>
            <input type="text"  class="form-control" id="newstitle" name="wallet_minimum" value="<?= rupiah($wallet_minimum) ?>" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Deskripsi</label>
            <input type="text" class="form-control" id="newstitle" name="keterangan" value="<?= $keterangan ?>" required>
        </div>
        <div class="card-title d-flex align-items-center">
                 <h6 class="mb-0">Background Fitur</h6>
        </div>
        <div class="row mb-4 col-sm-12">
            <label class="col-sm-2 col-form-label">Star Color</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="startcolor" value="<?= $startcolor ?>" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">End Color</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="endcolor" value="<?= $endcolor ?>" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Radius</label>
            <div class="col-sm-2">
                <input type="number" width="50" name="angel" value="<?= $angel ?>" required></br>
            </div>
        </div>

        <div class="card-title d-flex align-items-center">
                 <h6 class="mb-0">Warna Fitur</h6>
        </div>
        <div class="row mb-4 col-sm-12">
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Warna</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="tint" value="<?= $tint ?>" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Gunakan</label>
            <div class="col-sm-2">
            <select class="form-control custom-select  mt-15" name="usedtint" style="width:100%">
                <option value="0" <?php if ($usedtint == 0) { ?>selected<?php } ?>>Tidak</option>
                <option value="1" <?php if ($usedtint == 1) { ?>selected<?php } ?>>Ya</option>
            </select>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Padding</label>
            <div class="col-sm-2">
                <input type="number" id="head" name="padding" value="<?= $padding ?>" required>
            </div>
        </div>
       
        <div class="mb-3">
            <label for="newstitle">Kota (Kosongkan / ketik 'all' Jika Fitur Tersebut Untuk Semua Wilayah)</label><br>
            <input type="text" class="form-control" id="head" name="kota" value="<?= $kota ?>" required>
        </div>
        <div class="mb-3">
            <label for="newscategory">Status</label>
            <select class="form-control custom-select  mt-15" name="active" style="width:100%">
                <option value="0" <?php if ($active == 0) { ?>selected<?php } ?>>Nonactive</option>
                <option value="1" <?php if ($active == 1) { ?>selected<?php } ?>>Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <a href="<?= base_url() ?>services" class="btn btn-danger">Cancel</a>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->