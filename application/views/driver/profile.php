
<!--start content-->
<main class="page-content">
<div class="profile-cover bg-dark"></div>
<div class="row">
  <div class="col-12 col-lg-8">
    <div class="card shadow-sm border-0">
    <div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-address-card font-18 me-1"></i></div>
												<div class="tab-title">Akun</div>
											</div>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-motorcycle font-18 me-1"></i></div>
												<div class="tab-title">Kendaraan</div>
											</div>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-square-user font-18 me-1"></i>
												</div>
												<div class="tab-title">Ubah Foto</div>
											</div>
										</button>
									</li>
                  <li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-clock-rotate-left font-18 me-1"></i>
												</div>
												<div class="tab-title">Transaksi</div>
											</div>
										</button>
									</li>
								</ul>
								<div class="tab-content py-4">
                  <!-- Tab Akun -->
									<div class="tab-pane fade show active" id="tab1" role="tabpanel">
                  <?php if ($this->session->flashdata('ubah')) : ?>
                          <div class="alert alert-success" role="alert">
                                  <?php echo $this->session->flashdata('ubah'); ?>
                            </div>
                   <?php endif; ?>
									<!-- --------------------------------- Konten ----------------------------------------- -->
                    <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Informasi Akun</h6>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipartclass('driver/ubahid'); ?>
                          <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_driver" value="<?= $driver['nama_driver'] ?>" required>
                            </div>
                            <div class="col-6">
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" value="<?= $driver['email'] ?>" required>
                            </div>
                              <div class="col-6">
                                <label class="form-label">Kontak</label>
                                <div class="row">
                                  <div class="form-group col-2">
                                  <input type="tel" id="txtPhone" class="form-control" name="countrycode" value="<?= $driver['countrycode'] ?>" required>
                                  </div>
                                  <div class=" form-group col-10">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $driver['phone'] ?>" required>
                                  </div>
                                </div>
                            </div>
                              <div class="col-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control custom-select" style="width:100%" name="gender">
                                  <option value="Male" <?php if ($driver['gender'] == 'Male') { ?>selected<?php } ?>>Laki-laki</option>
                                  <option value="Female" <?php if ($driver['gender'] == 'Female') { ?>selected<?php } ?>>Perempuan</option>
                              </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" rows="2" cols="2" name="alamat_driver" required><?= $driver['alamat_driver'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                            <?= form_close(); ?>
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipartclass('driver/ubahpassword'); ?>
                            <div class="col-12">
                           
                              <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                              <label class="form-label">Password Baru</label>
                              <input type="password" class="form-control" id="new-password" name="password" placeholder="Masukan Password Baru" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                        <?= form_close(); ?>
                        </div>
                      </div>
                  <!-- ------------------------------------------------------------------------------------ -->
									</div>
                  <!-- Tab Kendaraan -->
									<div class="tab-pane fade" id="tab2" role="tabpanel">
                  <!-- --------------------------------- Konten ----------------------------------------- -->
                  <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Identitas Kendaraan</h6>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipartclass('driver/ubahkendaraan'); ?>
                            <input type="hidden" name="id" value="<?= $driver['id'] ?>">
														<input type="hidden" name="id_k" value="<?= $driver['id_k'] ?>">
                            <div class="col-6">
                                <label class="form-label">Kendaraan</label>
                                <select class="form-control custom-select" name="jenis" style="width:100%">\
																<?php foreach ($driverjob as $drj) { ?>
																	<option value="<?= $drj['id'] ?>" <?php if ($driver['job'] == $drj['id']) { ?>selected<?php } ?>><?= $drj['driver_job'] ?></option>
																<?php } ?>
															</select>
                            </div>
                            <div class="col-6">
                              <label class="form-label">Merk</label>
                              <input type="text" class="form-control" name="merek" id="brand" value="<?= $driver['merek'] ?>" required>
                            </div>
                              <div class="col-6">
                                <label class="form-label">Jenis</label>
                                <input type="text" class="form-control" name="tipe" id="variantvehicle" value="<?= $driver['tipe'] ?>" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Warna</label>
                                <input type="text" class="form-control" name="warna" id="vehiclecolor" value="<?= $driver['warna'] ?>" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Plat Nomor</label>
                                <input type="text" class="form-control" name="nomor_kendaraan" id="vehicleregistration" value="<?= $driver['nomor_kendaraan'] ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                  <!-- ------------------------------------------------------------------------------------ -->
									</div>
                  <!-- Tab Foto -->
									<div class="tab-pane fade" id="tab3" role="tabpanel">
                  <!-- --------------------------------- Konten ----------------------------------------- -->
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Ubah Foto Profile</h6>
                        </div>
                        <div class="card-body">
                          <?= form_open_multipartclass('driver/ubahfoto'); ?>
                            <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                                <img id="ProfilePreview" src="<?= base_url('images/fotodriver/') . $driver['foto'] ?>" style="width: 400px; height: 300px;" />
                                    <script type="text/javascript">
                                      function PreviewProfile() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("uploadProfile").files[0]);
                                        oFReader.onload = function (oFREvent) {
                                        document.getElementById("ProfilePreview").src = oFREvent.target.result;
                                        };
                                      };                                           
                                </script>
                                <input id="uploadProfile" type="file" class="form-control" name="foto" onchange="PreviewProfile();" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotodriver/') . $driver['foto'] ?>" /></br>
                              <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                          <?= form_close(); ?>
                        </div>
                      </div>
                  <!-- ------------------------------------------------------------------------------------ -->
									</div>
                  <!-- Tab Transaksi -->
                  <div class="tab-pane fade" id="tab4" role="tabpanel">
                  <!-- --------------------------------- Konten ----------------------------------------- -->
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Transaksi</h6>
                        </div>
                        <div class="card-body">
                        <table id="dpdetailtrx" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                          <thead>
                              <tr>
                              <th>No</th>
                              <th>#ID</th>
                              <th>Fitur</th>
                              <th>Tanggal</th>
                              <th>Jumlah</th>
                              <th>Status</th>
                              <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1;
                            foreach ($transaksi as $tr) { ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td>#INV-<?= $tr['id'] ?></td>
                            <td><?= $tr['fitur'] ?></td>
                            <td><?= $tr['waktu_order'] ?></td>
                            <td class="text-success">
                            <?= $currency['app_currency'] ?>
                            <?= rupiah($tr['biaya_akhir']) ?>
                            </td>
                            <td>
                            <?php if ($tr['status'] == '2') { ?>
                            <label class="badge bg-primary"><?= $tr['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($tr['status'] == '3') { ?>
                            <label class="badge bg-success"><?= $tr['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($tr['status'] == '5') { ?>
                            <label class="badge bg-danger"><?= $tr['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($tr['status'] == '4') { ?>
                            <label class="badge bg-info"><?= $tr['status_transaksi']; ?></label>
                            <?php } ?>
                            </td>
                            <td>
                            <a href="<?= base_url(); ?>driver/invoice/<?= $tr['id_transaksi']; ?>" class="btn btn-outline-primary">Lihat</a>
                            </td>
                            <?php $i++;
                            } ?>
                            </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                              <th>No</th>
                              <th>#ID</th>
                              <th>Fitur</th>
                              <th>Tanggal</th>
                              <th>Jumlah</th>
                              <th>Status</th>
                              <th>Aksi</th>
                              </tr>
                          </tfoot>
                        </table>
                        </div>
                      </div>
                  <!-- ------------------------------------------------------------------------------------ -->
									</div>

								</div>
							</div>
						</div>
    </div>
  </div>
  <div class="col-12 col-lg-4">
    <div class="card shadow-sm border-0 overflow-hidden">
      <div class="card-body">
          <div class="profile-avatar text-center">
            <img src="<?= base_url('images/fotodriver/') . $driver['foto']; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-around mt-5 gap-1">
            <span class="badge bg-primary">
              <?php if ($driver['status'] == 3) {
								echo 'Banned';
								} elseif ($driver['status'] == 0) {
								echo 'Baru';
								} else {
								if ($driver['status_job'] == 1) {
								echo 'Aktif';
								}
								if ($driver['status_job'] == 2) {
								echo 'Memproses';
								}
								if ($driver['status_job'] == 3) {
								echo 'Pengantaran';
								}
								if ($driver['status_job'] == 4) {
								echo 'Nonaktif';
								}
								if ($driver['status_job'] == 5) {
								echo 'Keluar';
								}
								} ?>
              </span>
          </div>
          <div class="text-center mt-4">
            <h4 class="mb-1"><?= $driver['nama_driver'] ?></h4>
              <input id="input-21f" type="text" data-stars="5" value="<?= $driver['rating'] ?>" class="rating" data-size="sm" disabled>
            <div class="mt-4"></div>
            <h6 class="mb-1">Alamat Lengkap</h6>
            <p class="mb-0 text-secondary"><?= $driver['alamat_driver'] ?></p>
          </div>
          <hr>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
          Transaksi
          <span class="badge bg-primary rounded-pill"><?= count($transaksi) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
          Sukses
          <span class="badge bg-primary rounded-pill"><?= count($suksestrx) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
          Gagal
          <span class="badge bg-danger rounded-pill"><?= count($canceltrx) ?></span>
        </li>
      </ul>
    </div>
  </div>
</div><!--end row-->

</main>
<!--end page main-->

<script>
jQuery(document).ready(function () {
$("#input-21f").rating({
starCaptions: function (val) {
if (val < 3) {
  return val;
} else {
return 'high';
}
},
starCaptionClasses: function (val) {
if (val < 3) {
  return 'label label-danger';
} else {
  return 'label label-success';
}
},
hoverOnClear: false
});
var $inp = $('#rating-input');
$inp.rating({
min: 0,
max: 5,
step: 1,
size: 'lg',
showClear: false
});
$('#btn-rating-input').on('click', function () {
$inp.rating('refresh', {
showClear: true,
disabled: !$inp.attr('disabled')
});
});
$('.btn-danger').on('click', function () {
$("#kartik").rating('destroy');
});
$('.btn-success').on('click', function () {
$("#kartik").rating('create');
});
$inp.on('rating.change', function () {
alert($('#rating-input').val());
});
$('.rb-rating').rating({
'showCaption': true,
'stars': '3',
'min': '0',
'max': '3',
'step': '1',
'size': 'xs',
'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
});
$("#input-21c").rating({
min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
});
});
</script>
