<!-- Hero Start -->
<section class="bg-half-260 d-table w-100" style="background: url('<?= base_url(); ?>homeasset/images/hosting/bg.png') center center;" id="home">
    <div class="bg-overlay bg-gradient-primary opacity-8"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="card-body">
                                <?php if (validation_errors()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors() ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('tambah') or $this->session->flashdata('ubah')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('tambah'); ?>
                                        <?php echo $this->session->flashdata('ubah'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus') or $this->session->flashdata('gagal')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('demo'); ?>
                                        <?php echo $this->session->flashdata('hapus'); ?>
                                        <?php echo $this->session->flashdata('gagal'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="shadow-md p-3 mb-5 bg-body rounded">
                                        <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                                        <?= form_open_multipart('home/regmech'); ?>
                                        <!-- Step 1 -->
                                            <div class="tab">
                                                <h4 class="card-title">Penanggung Jawab / Owner</h4>
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Pemilik <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Nama Penanggung Jawab / Owner" name="nama_mitra" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Detail Alamat" name="alamat_mitra" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="at-sign" class="fea icon-sm icons"></i>
                                                            <input type="email" class="form-control ps-5" placeholder="email@domain.com" name="email_mitra" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kontak <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <div class="row">
                                                                <div class="form-group col-2">
                                                                    <input type="tel" id="txtPhone" class="form-control ps-5" name="country_code_mitra" required>
                                                                </div>
                                                                <div class=" form-group col-10">
                                                                    <input type="text" class="form-control ps-2" name="phone_mitra" placeholder="899123xxxxx" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!-- Step 2 -->
                                            <div class="tab">
                                                <h4 class="card-title">Berkas</h4>
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Identitas <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <select class="form-select form-control ps-5" aria-label="Default select example" style="width:100%" name="jenis_identitas_mitra" id="status_berita">
                                                                <option value="SIM">SIM</option>
                                                                <option value="KTP">KTP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nomor Identitas <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="hash" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Nomor SIM / KTP" name="nomor_identitas_mitra" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Diri <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadProfile" type="file" class="form-control ps-5" name="katepe" onchange="PreviewProfile();" data-max-file-size="3mb"  />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!-- Step 3 -->
                                            <div class="tab">
                                            <h4 class="card-title">Info Mitra / Usaha</h4>
                                             <!--start col-->
                                             <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Merchant <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="image" class="fea icon-sm icons"></i>
                                                            <input id="uploadProfile" type="file" class="form-control ps-5" name="foto_merchant" onchange="PreviewProfile();" data-max-file-size="3mb"  />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="info" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Nama Toko/Tempat" name="nama_merchant" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="menu" class="fea icon-sm icons"></i>
                                                            <select class="form-select form-control ps-5" style="width:100%" name="id_fitur">
                                                                <?php foreach ($fitur as $ftr) { ?>
                                                                    <option id="<?= $ftr['fitur'] ?>" value="<?= $ftr['id_fitur'] ?>"><?= $ftr['fitur'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="menu" class="fea icon-sm icons"></i>
                                                            <select class="form-select form-control ps-5" name="category_merchant" style="width:100%">
                                                                <?php foreach ($merchantk as $mck) { ?>
                                                                    <option value="<?= $mck['id_kategori_merchant'] ?>"><?= $mck['nama_kategori'] ?></option>
                                                                <?php
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--start col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat Tempat <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" placeholder="Alamat Lengkap Tempat / Toko" name="alamat_merchant" id="us3-address" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                 <!--start col-->
                                                 <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div id="us3" style="width: 100%; height: 400px;"></div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="row">
                                                <!--start col-->
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Latitude <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="latitude_merchant" id="us3-lat" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                 <!--start col-->
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Latitude <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="longitude_merchant" id="us3-lon" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                </div>
                                                <div class="row">
                                                <!--start col-->
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jam Buka <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="clock" class="fea icon-sm icons"></i>
                                                            <input type="time" class="form-control ps-5" id="op" name="jam_buka" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                 <!--start col-->
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jam Tutup <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="clock" class="fea icon-sm icons"></i>
                                                            <input type="time" class="form-control ps-5" id="cl" name="jam_tutup" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                </div>
                                            </div>
                                            <div style="overflow:auto;" id="nextprevious">
                                            <div style="float:right;">
                                                <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                <button type="submit" class="btn btn-success" id="subBtn">Submit</button>
                                            </div>
                                        </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container--> 
</section><!--end section-->
<!-- Hero End -->
