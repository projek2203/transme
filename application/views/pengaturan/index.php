
 <!--start content-->
 <main class="page-content">
<div class="card border shadow-none">
    <div class="card-header py-3">
         <div class="row align-items-center g-3">
            <div class="col-12 col-lg-6">
              <h5 class="mb-0">Pengaturan Aplikasi</h5>
            </div>
          </div>
    </div>
    <div class="card">
			<div class="card-body">
            <?php if ($this->session->flashdata('ubah')) : ?>
            <div class="alert alert-info" role="alert">
                <?php echo $this->session->flashdata('ubah'); ?>
            </div>
        <?php endif; ?>
        <ul class="nav nav-tabs nav-success" role="tablist">
          <li class="nav-item" role="presentation">
						<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-selected="true">
							<div class="d-flex align-items-center">
							  <div class="tab-icon"><i class="fa-duotone fa-mobile font-18 me-1"></i></div>
							  <div class="tab-title">Aplikasi</div>
						</div>
						</button>
					</li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-envelopes-bulk font-18 me-1"></i></div>
                <div class="tab-title">Email Template</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-envelopes font-18 me-1"></i></div>
                <div class="tab-title">Email Server</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-money-bill-transfer font-18 me-1"></i></div>
                <div class="tab-title">Ofline Topup</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-credit-card font-18 me-1"></i></div>
                <div class="tab-title">Duitku</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-mobile font-18 me-1"></i></div>
                <div class="tab-title">Digiflazz</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab7" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-duotone fa-bell font-18 me-1"></i></div>
                <div class="tab-title">Notifikasi</div>
              </div>
            </button>
          </li>
        </ul>
        <div class="tab-content py-3">

				<div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <?= form_open_multipart('pengaturan/ubahapp'); ?>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Logo App</label>
                        <div class="col-sm-9">
                            <input id="uploadProfile" type="file" class="form-control" name="app_logo" onchange="PreviewProfile();" data-max-file-size="3mb" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email App</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="app_email" value="<?= $appsettings['app_email']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama App</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="app_name" value="<?= $appsettings['app_name']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Slogan App</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="app_description" value="<?= $appsettings['app_description']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kontak App</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="app_contact" value="<?= $appsettings['app_contact']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Url App</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="app_website" value="<?= $appsettings['app_website']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kebijakan</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="textarea" name="app_privacy_policy" required><?= $appsettings['app_privacy_policy']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tentang App</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="textarea" name="app_aboutus" required><?= $appsettings['app_aboutus']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="textarea" name="app_address" required><?= $appsettings['app_address']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Geocoder Apikey</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="title" name="geocode_key" value="<?= $appsettings['geocode_key']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Direction Apikey</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="title" name="map_key" value="<?= $appsettings['map_key']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Firebase Server Key</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="fcm_key" value="<?= $appsettings['fcm_key']; ?>" required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Sistem OTP</label>
                        <div class="col-sm-9">
                            <select name="isotp" id="isotp" class="form-control custom-select  mt-15" style="width:100%">
                                <option value="1" <?php if ($appsettings['isotp'] == '1') { ?>selected<?php } ?>>Active</option>
                                <option value="0" <?php if ($appsettings['isotp'] == '0') { ?>selected<?php } ?>>Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Maintenance</label>
                        <div class="col-sm-9">
                            <select name="maintenance" id="maintenance" class="form-control custom-select  mt-15" style="width:100%">
                                <option value="1" <?php if ($appsettings['maintenance'] == '1') { ?>selected<?php } ?>>Active</option>
                                <option value="0" <?php if ($appsettings['maintenance'] == '0') { ?>selected<?php } ?>>Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Warna App</label>
                        <div class="col-sm-9">
                            <input type="color" id="head" name="background" value="<?= $appsettings['background'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Reward Refferall</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="title" name="upreff" value="<?= $appsettings['upreff']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-2 col-form-label">Reward Refferall Tujuan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="title" name="rewardreff" value="<?= $appsettings['rewardreff']; ?>" required>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
				</div>
					
				<div class="tab-pane fade" id="tab2" role="tabpanel">
                    <?= form_open_multipart('pengaturan/ubahemail'); ?>
                    <!-- Lupa pass -->
                    <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Template Lupa Password</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Subjek Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="email_subject" value="<?= $appsettings['email_subject']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email Text 1</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="textarea" name="email_text1" required><?= $appsettings['email_text1']; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email Text 2</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="textarea" name="email_text2" required><?= $appsettings['email_text2']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Konfirmasi Driver -->
                     <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Template Konfirmasi Driver</h6>
                        </div>
                        <div class="card-body">
                        <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Subjek Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="email_subject_confirm" value="<?= $appsettings['email_subject_confirm']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email Text 1</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="textarea" name="email_text3" required><?= $appsettings['email_text3']; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email Text 2</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="textarea" name="email_text4" required><?= $appsettings['email_text4']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
				</div>

                <div class="tab-pane fade" id="tab3" role="tabpanel">
                    <?= form_open_multipart('pengaturan/ubahsmtp'); ?>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Host</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="smtp_host" value="<?= $appsettings['smtp_host']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Port</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="smtp_port" value="<?= $appsettings['smtp_port']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="smtp_username" value="<?= $appsettings['smtp_username']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="smtp_password" value="<?= $appsettings['smtp_password']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Form</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="smtp_from" value="<?= $appsettings['smtp_from']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-control border-primary" name="smtp_secure" id="smtp_secure">
                                    <option value="tls" <?php if ($appsettings['smtp_secure'] == 'tls') { ?>selected<?php } ?>>TLS</option>
                                    <option value="ssl" <?php if ($appsettings['smtp_secure'] == 'ssl') { ?>selected<?php } ?>>SSL</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button>
                            </div>
                        </div>
                    <?= form_close(); ?>
				</div>
                <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <a class="btn btn-primary" href="<?= base_url(); ?>pengaturan/addbank"><i class="fa-duotone fa-credit-card"></i> Tambah Metode Pembayaran</a>
                                </div></br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="order-listing7" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Ikon</th>
                                                        <th>Nama Bank</th>
                                                        <th>No Rekening</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($transfer as $trf) { ?>
                                                        <tr>

                                                            <td><?= $i ?></td>
                                                            <td>
                                                                <img width="50" height="50" class="avatar-img rounded-circle" src="<?= base_url('images/bank/') . $trf['image_bank']; ?>">
                                                            </td>
                                                            <td><?= $trf['nama_bank'] ?></td>
                                                            <td><?= $trf['rekening_bank'] ?></td>
                                                            <td><?php if ($trf['status_bank'] == 1) { ?>
                                                                    <label class="badge bg-primary">Active</label>
                                                                <?php } else if ($trf['status_bank'] == 0) { ?>
                                                                    <label class="badge bg-danger">Non Active</label>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url(); ?>pengaturan/editbank/<?= $trf['id_bank'] ?>">
                                                                    <button class="btn btn-primary">Ubah</button>
                                                                </a>
                                                                <a href="<?= base_url(); ?>pengaturan/hapusbank/<?= $trf['id_bank'] ?>" onclick="return confirm ('are you sure?')">
                                                                    <button class="btn btn-danger">Hapus</button>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    <?php $i++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- ---------------------- Duitku ----------------------- -->
                <div class="tab-pane fade" id="tab5" role="tabpanel">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                            <?= form_open_multipart('pengaturan/ubahDuitku'); ?>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kode Merchant</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="duitku_merchant" value="<?= $appsettings['duitku_merchant'] ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Merchant Apikey</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="duitku_key" value="<?= $appsettings['duitku_key'] ?>" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="duitku_status" id="duitku_status" class="form-control" style="width:100%">
                                            <option value="1" <?php if ($appsettings['duitku_status'] == '1') { ?>selected<?php } ?>>Active</option>
                                            <option value="0" <?php if ($appsettings['duitku_status'] == '0') { ?>selected<?php } ?>>Non Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Mode</label>
                                        <div class="col-sm-9">
                                            <select name="duitku_mode" id="duitku_mode" class="form-control" style="width:100%">
                                                <option value="1" <?php if ($appsettings['duitku_mode'] == '1') { ?>selected<?php } ?>>Production</option>
                                                <option value="0" <?php if ($appsettings['duitku_mode'] == '0') { ?>selected<?php } ?>>Sanbox</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-9">
                                        <!--button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button-->
                                    </div>
                                </div>
                            <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- ---------------------------------- Digiflazz -------------------------- -->
                <div class="tab-pane fade" id="tab6" role="tabpanel">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                            <?= form_open_multipart('pengaturan/ubahdigiflazz'); ?>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="digi_user" value="<?= $appsettings['digi_user'] ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Apikey</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="digi_api" value="<?= $appsettings['digi_api'] ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Mode</label>
                                    <div class="col-sm-9">
                                        <select name="digi_mode" id="digi_mode" class="form-control" style="width:100%">
                                            <option value="1" <?php if ($appsettings['digi_mode'] == '1') { ?>selected<?php } ?>>Development</option>
                                            <option value="0" <?php if ($appsettings['digi_mode'] == '0') { ?>selected<?php } ?>>Production</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="digi_status" id="digi_status" class="form-control" style="width:100%">
                                            <option value="1" <?php if ($appsettings['digi_status'] == '1') { ?>selected<?php } ?>>Active</option>
                                            <option value="0" <?php if ($appsettings['digi_status'] == '0') { ?>selected<?php } ?>>Non Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-9">
                                        <!--button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button-->
                                    </div>
                                </div>
                            <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
				</div>
            <!-- Setting notifikasi -->
            <div class="tab-pane fade" id="tab7" role="tabpanel">
                    <?= form_open_multipart('pengaturan/ubahnotifikasi'); ?>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Fcm Server</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fcmkey" value="<?= $appsettings['fcm_key']; ?>" required>
                            </div>
                        </div>
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">Onesignal</h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">App ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="appid" value="<?= $appsettings['os_appid']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Rest Api</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="restapi" value="<?= $appsettings['os_restapi']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Channel Order</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="channel" value="<?= $appsettings['os_channel']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Template Order</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="template" value="<?= $appsettings['os_template']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Channel Chat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="channelchat" value="<?= $appsettings['os_channel_chat']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Template Chat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="templatechat" value="<?= $appsettings['os_template_chat']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Mode</label>
                                <div class="col-sm-9">
                                    <select name="mode" id="mode" class="form-control" style="width:100%">
                                        <option value="Firebase" <?php if ($appsettings['mode'] == 'Firebase') { ?>selected<?php } ?>>Firebase</option>
                                        <option value="Onesignal" <?php if ($appsettings['mode'] == 'Onesignal') { ?>selected<?php } ?>>Onesignal</option>
                                    </select>
                                </div>
                        </div>
                      <div class="row mb-3">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button>
                            </div>
                        </div>
                    <?= form_close(); ?>    
					</div>
			</div>
		</div>
    </div>
</div>
</main>
<!--end page main-->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>