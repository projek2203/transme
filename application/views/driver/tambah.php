<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Akun</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
            <?php if (validation_errors() or $this->session->flashdata()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                    <?php echo $this->session->flashdata('invalid'); ?>
                    <?php echo $this->session->flashdata('demo'); ?>
            </div>
            <?php endif; ?>
            <!-- Konten -->
            <?= form_open_multipart('driver/tambahakun'); ?>
                <!-- Data Diri -->
                <div class="card-title d-flex align-items-center">
                    <h6 class="mb-0">Data Diri</h6>
                </div>
                    <hr/>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Foto Profil</label>
                        <div class="col-sm-9">
                            <input id="uploadProfile" type="file" class="form-control" name="foto" onchange="PreviewProfile();" data-max-file-size="3mb" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_driver" name="nama_driver" <?php if ($_POST != NULL) { ?> value="<?= $_POST['nama_driver']; ?>" <?php } ?> placeholder="enter name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control custom-select  mt-15" style="width:100%" name="gender">
                                <option value="Male" <?php
                                    if ($_POST != NULL) {
                                        if ($_POST['gender'] == 'Male') {
                                        ?>selected<?php }
                                        } ?>>Male</option>
                                <option value="Female" <?php
                                    if ($_POST != NULL) {
                                        if ($_POST['gender'] == 'Female') {
                                        ?>selected<?php }
                                        } ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" <?php if ($_POST != NULL) { ?> value="<?= $_POST['tgl_lahir']; ?>" <?php } ?> placeholder="enter birth date " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" <?php if ($_POST != NULL) { ?> value="<?= $_POST['email']; ?>" <?php } ?> placeholder="enter email " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Kontak</label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <span><input type="tel" id="txtPhone" size="2" class="form-control" name="countrycode" <?php if ($_POST != NULL) { ?> value="<?= $_POST['countrycode']; ?>" <?php } ?> required></span>
                                <input type="text" class="form-control" id="phone" name="phone" <?php if ($_POST != NULL) { ?> value="<?= $_POST['phone']; ?>" <?php } ?> placeholder="enter phone number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_driver" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat_driver" rows="6" class="form-control" rows="3" required><?php if ($_POST != NULL) {echo $_POST['alamat_driver']; ?>" <?php } ?></textarea>
                        </div>
                    </div>
                <!-- Kendaraan -->
                <div class="card-title d-flex align-items-center">
                    <h6 class="mb-0">Kendaraan</h6>
                </div>
                <hr/>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kendaraan</label>
                    <div class="col-sm-9">
                    <select class="form-control custom-select  mt-15" name="job" style="width:100%">
                            <?php foreach ($driverjob as $drj) { ?>
                                <option value="<?= $drj['id'] ?>"><?= $drj['driver_job'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> 
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Merk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="merek" id="brand" <?php if ($_POST != NULL) { ?> value="<?= $_POST['merek']; ?>" <?php } ?> placeholder="Ex Honda Beat" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tipe</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tipe" id="variantvehicle" <?php if ($_POST != NULL) { ?> value="<?= $_POST['tipe']; ?>" <?php } ?> placeholder="Ex Matic" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Warna</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="warna" id="vehiclecolor" <?php if ($_POST != NULL) { ?> value="<?= $_POST['warna']; ?>" <?php } ?> placeholder="Ex Hitam" required>
                    </div>
                </div> 
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Plat Nomor</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nomor_kendaraan" id="vehicleregistration" <?php if ($_POST != NULL) { ?> value="<?= $_POST['nomor_kendaraan']; ?>" <?php } ?> placeholder="Masukan Plat Nomor" required>
                    </div>
                </div>
            <!-- Kendaraan -->
            <div class="card-title d-flex align-items-center">
                    <h6 class="mb-0">Persyaratan</h6>
                </div>
                <hr/>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor KTP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_ktp" <?php if ($_POST != NULL) { ?> value="<?= $_POST['no_ktp']; ?>" <?php } ?> placeholder="Nomor KTP" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Upload KTP</label>
                    <div class="col-sm-9">
                        <input id="uploadKTP" type="file" class="form-control" name="foto_ktp" onchange="PreviewKtp();" data-max-file-size="3mb" required /><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor SIM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="id_sim" <?php if ($_POST != NULL) { ?> value="<?= $_POST['id_sim']; ?>" <?php } ?> placeholder="Nomor SIM" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Upload SIM</label>
                    <div class="col-sm-9">
                        <input id="uploadSIM" type="file" class="form-control" name="foto_sim" onchange="PreviewSIM();" data-max-file-size="3mb" required /><br>
                    </div>
                </div>
                <div class="row">
					<label class="col-sm-3 col-form-label"></label>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary px-5">Daftarkan</button>
					</div>
				</div>      
            <?= form_close(); ?>
            <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->