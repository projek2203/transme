     <!-- Hero Start -->
     <section class="bg-half-260 d-table w-100" style="background: url('<?= base_url(); ?>homeasset/images/hosting/bg.png') center center;" id="home">
     <div class="bg-overlay bg-gradient-primary opacity-8"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                <div class="col-lg-10">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="card-body">
                                    <div class="shadow-md p-3 mb-5 bg-body rounded">
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= validation_errors() ?>
                                            <?php echo $this->session->flashdata('invalid'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( $this->session->flashdata('sukses') == 'sukses') : ?>
                                        <div class="alert alert-info" role="alert">
                                            <?php echo $this->session->flashdata('registrasi'); ?>
                                            <?php header( "refresh:3;url=" . base_url() ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link rounded active" id="akun-tab" data-bs-toggle="pill" href="#akuntab" role="tab" aria-controls="akuntab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="fa-duotone fa-arrow-right-long font-18 me-1"></i></div>
                                                    <div class="tab-title">Akun</div>
                                                </div>
                                                </a><!--end nav link-->
                                            </li><!--end nav item-->
                                            
                                            <li class="nav-item">
                                                <a class="nav-link rounded" id="kendaraan-tab" data-bs-toggle="pill" href="#kendaraantab" role="tab" aria-controls="kendaraantab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="fa-duotone fa-arrow-right-long font-18 me-1"></i></div>
                                                    <div class="tab-title">Kendaraan</div>
                                                </div>
                                                </a><!--end nav link-->
                                            </li><!--end nav item-->
                                            
                                            <li class="nav-item">
                                                <a class="nav-link rounded" id="berkas-tab" data-bs-toggle="pill" href="#berkastab" role="tab" aria-controls="berkastab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="fa-duotone fa-arrow-right-long font-18 me-1"></i></div>
                                                    <div class="tab-title">Berkas</div>
                                                </div>
                                                </a><!--end nav link-->
                                            </li><!--end nav item-->
                                        </ul><!--end nav pills-->
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="row pt-3">
                                    <?= form_open_multipart('home/regdv'); ?>
                                    <div class="col-12">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="akuntab" role="tabpanel" aria-labelledby="akun-tab">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Profil <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadProfile" type="file" class="form-control ps-5" name="foto" onchange="PreviewProfile();" data-max-file-size="3mb" required />
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Nama Driver" name="nama_driver" <?php if ($_POST != NULL) { ?> value="<?= $_POST['nama_driver']; ?>" <?php } ?> placeholder="enter name" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="email" class="form-control ps-5" id="email" name="email" <?php if ($_POST != NULL) { ?> value="<?= $_POST['email']; ?>" <?php } ?> placeholder="contoh@gmail.com" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <select class="form-control ps-5" style="width:100%" name="gender">
                                                                <option value="Male" <?php
                                                                                    if ($_POST != NULL) {
                                                                                        if ($_POST['gender'] == 'Laki-Laki') {
                                                                                    ?>selected<?php }
                                                                                        } ?>>Laki-Laki</option>
                                                                <option value="Female" <?php
                                                                                    if ($_POST != NULL) {
                                                                                        if ($_POST['gender'] == 'Perempuan') {
                                                                                    ?>selected<?php }
                                                                                        } ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                            <input type="date" class="form-control ps-5" id="tgl_lahir" name="tgl_lahir" <?php if ($_POST != NULL) { ?> value="<?= $_POST['tgl_lahir']; ?>" <?php } ?> placeholder="enter birth date " required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <span><input type="tel" id="txtPhone" size="2" class="form-control ps-5" name="countrycode" value="+62" required></span>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Ponsel <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <input type="number" class="form-control ps-5" id="phone" name="phone" <?php if ($_POST != NULL) { ?> value="<?= $_POST['phone']; ?>" <?php } ?> placeholder="899xxxxxxx" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                                            <input type="password" class="form-control ps-5" name="password" placeholder="Password" required="">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="home" class="fea icon-sm icons"></i>
                                                            <input name="alamat_driver" rows="6" class="form-control ps-5" placeholder="Masukan Alamat Lengkap" required><?php if ($_POST != NULL) { echo $_POST['alamat_driver']; ?>" <?php } ?></input>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                            </div><!--end row-->
                                            </div><!--end teb pane-->
                                            
                                            <div class="tab-pane fade" id="kendaraantab" role="tabpanel" aria-labelledby="kendaraantab-tab">
                                            <div class="row">
                                            
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kendaraan <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="truck" class="fea icon-sm icons"></i>
                                                            <select class="form-control ps-5" name="job" style="width:100%">
                                                                <?php foreach ($driverjob as $drj) { ?>
                                                                    <option value="<?= $drj['id'] ?>"><?= $drj['driver_job'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Merk <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="edit-2" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="merek" id="brand" <?php if ($_POST != NULL) { ?> value="<?= $_POST['merek']; ?>" <?php } ?> placeholder="Ex Honda Beat" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="edit-2" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="tipe" id="variantvehicle" <?php if ($_POST != NULL) { ?> value="<?= $_POST['tipe']; ?>" <?php } ?> placeholder="Ex Matic" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Warna <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="pen-tool" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="warna" id="vehiclecolor" <?php if ($_POST != NULL) { ?> value="<?= $_POST['warna']; ?>" <?php } ?> placeholder="Ex Hitam" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Plat Nomor <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="hash" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="nomor_kendaraan" id="vehicleregistration" <?php if ($_POST != NULL) { ?> value="<?= $_POST['nomor_kendaraan']; ?>" <?php } ?> placeholder="Masukan Plat Nomor" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                            </div><!--end row-->
                                            </div><!--end teb pane-->

                                            <div class="tab-pane fade" id="berkastab" role="tabpanel" aria-labelledby="berkas-tab">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">No KTP <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                        <i data-feather="edit" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="no_ktp" <?php if ($_POST != NULL) { ?> value="<?= $_POST['no_ktp']; ?>" <?php } ?> placeholder="Nomor KTP" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload KTP <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadKTP" type="file" class="form-control ps-5" name="foto_ktp" onchange="PreviewKtp();" data-max-file-size="3mb" required /><br>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">No SIM <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                        <i data-feather="edit" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="id_sim" <?php if ($_POST != NULL) { ?> value="<?= $_POST['id_sim']; ?>" <?php } ?> placeholder="Nomor SIM" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload SIM <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                        <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadSIM" type="file" class="form-control ps-5" name="foto_sim" onchange="PreviewSIM();" data-max-file-size="3mb" required /><br>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary">Buat Akun</button>
                                                </div>
                                                </div><!--end col-->

                                            </div><!--end row-->
                                      
                                            </div><!--end teb pane-->
                                        </div><!--end tab content-->
                                    </div><!--end col-->
                                    <?= form_close(); ?>
                                </div><!--end row-->
                                    </div>   
                                 </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container--> 
        </section><!--end section-->
        <!-- Hero End -->