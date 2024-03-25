     <!-- Hero Start -->
     <section class="bg-half-260 d-table w-100" style="background: url('<?= base_url(); ?>homeasset/images/hosting/bg.png') center center;" id="home">
     <div class="bg-overlay bg-gradient-primary opacity-8"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                <div class="col-lg-12">
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
                                            <?= form_open_multipart('home/regcs'); ?>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Profil <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadProfile" type="file" class="form-control ps-5" name="fotopelanggan" data-max-file-size="3mb" required />
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Username <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Input Username" name="fullnama" <?php if ($_POST != NULL) { ?> value="<?= $_POST['fullnama']; ?>" <?php } ?> required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="email" class="form-control ps-5" placeholder="Email" name="email" <?php if ($_POST != NULL) { ?> value="<?= $_POST['email']; ?>" <?php } ?> required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                            <input type="date" class="form-control ps-5" placeholder="Tanggal Lahir" name="tgl_lahir" <?php if ($_POST != NULL) { ?> value="<?= $_POST['tgl_lahir']; ?>" <?php } ?> required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode Negara<span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <input type="tel" id="txtPhone" class="form-control ps-5" name="countrycode" placeholder="+62 " value="+62" required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Ponsel<span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <input type="text" id="txtPhone" class="form-control ps-5" name="phone" placeholder="8991xxxxxx" <?php if ($_POST != NULL) { ?> value="<?= $_POST['phone']; ?>" <?php } ?> required>
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
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary">Buat Akun</button>
                                                    </div>
                                                </div><!--end col-->
        
                                            </div><!--end row-->
                                        <?= form_close(); ?>
                                    </div>   
                            </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container--> 
        </section><!--end section-->
        <!-- Hero End -->