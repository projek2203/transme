
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
												<div class="tab-icon"><i class="fa-duotone fa-clock-rotate-left font-18 me-1"></i></div>
												<div class="tab-title">Transaksi</div>
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
												<div class="tab-title">Saldo</div>
											</div>
										</button>
									</li>
								</ul>
								<div class="tab-content py-4">
                  <!-- Tab Akun -->
									<div class="tab-pane fade show active" id="tab1" role="tabpanel">
									<!-- --------------------------------- Konten ----------------------------------------- -->
                    <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Informasi Akun</h6>
                        </div>
                       
                        <div class="card-body">
                       <?= form_open_multipart('pelanggan/ubahid'); ?>
                       <?php if ($this->session->flashdata('ubahfoto')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('ubahfoto'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('ubahinfo')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('ubahinfo'); ?>
                                </div>
                            <?php endif; ?>
                          <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="fullnama" placeholder="Nama Lengkap" value="<?= $pelanggan['fullnama'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="email" placeholder="contoh@gmail.com" value="<?= $pelanggan['email'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-9">
                                <div class="row">
                                  <div class="form-group col-2">
                                  <input type="tel" id="txtPhone" class="form-control" name="countrycode" value="<?= $pelanggan['countrycode'] ?>" required>
                                  </div>
                                  <div class=" form-group col-10">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $pelanggan['phone'] ?>" required>
                                  </div>
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tgl Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="title" name="tgl_lahir" placeholder="dd/mm/yyyy" value="<?= $pelanggan['tgl_lahir'] ?>" required>
                                </div>
                            </div>
                             <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Refferal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="refferal" placeholder="Refferal" value="<?= $pelanggan['refferal'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                            </div>
 
                            <?= form_close(); ?>
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Password</h6>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipartclass('pelanggan/ubahpass'); ?>
                            <div class="col-12">
                            <?php if ($this->session->flashdata('ubahpass')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('ubahpass'); ?>
                                </div>
                            <?php endif; ?>
                              <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">
                              <label class="form-label">Password Baru</label>
                              <input type="password" class="form-control" id="new-password" name="password" placeholder="Masukan Password Baru" required>
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                            </div>
                            
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
                          <h6 class="mb-0">Transaksi</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="dproftrx" class="table table-hover w-100 display pb-30" data-info="false">
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Nota</th>
                            <th>Fitur</th>
                            <th>Tanggal</th>
                            <th>Biaya</th>
                            <th>Status</th>
                           
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($countorder as $tr) { ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $tr['id'] ?></td>
                            <td><?= $tr['fitur'] ?></td>
                            <td><?= $tr['waktu_order'] ?></td>
                            <td><?= $currency['app_currency'] ?><?= rupiah($tr['biaya_akhir']) ?></td> 
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
                           
                            <?php $i++;
                            } ?>
                            </tr>
                            </tbody>
                            </table>
                        </div>
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
                          <?= form_open_multipartclass('pelanggan/ubahfoto'); ?>
                            <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">
                            <img id="ProfilePreview" class="avatar-img rounded" src="<?= base_url('images/pelanggan/') . $pelanggan['fotopelanggan']; ?>" style="width: 400px; height: 300px;">
                                            <script type="text/javascript">
                                                function PreviewProfile() {
                                                    var oFReader = new FileReader();
                                                    oFReader.readAsDataURL(document.getElementById("uploadProfile").files[0]);
                                                    oFReader.onload = function (oFREvent) {
                                                    document.getElementById("ProfilePreview").src = oFREvent.target.result;
                                                    };
                                                };                                           
                                            </script>
                                <input id="uploadProfile" type="file" class="form-control" name="fotopelanggan" onchange="PreviewProfile();" data-max-file-size="3mb" data-default-file="<?= base_url('images/pelanggan/') . $pelanggan['fotopelanggan'] ?>" /></br>
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
                          <h6 class="mb-0">Saldo</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="dpdetailwallet" class="table table-hover w-100 display pb-30" data-info="false">
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Id</th>
                            <th>Tipe</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($wallet as $wl) { ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $wl['id']; ?></td>
                            <td><?= $wl['type']; ?></td>
                            <td><?= $wl['waktu']; ?></td>
                            <?php if ($wl['type'] == 'topup' or $wl['type'] == 'Order+') { ?>
                                <td class="text-success"><?= $currency['app_currency'] ?><?= rupiah($wl['jumlah']) ?></td>
                            <?php } else { ?>
                                <td class="text-danger"><?= $currency['app_currency'] ?><?= rupiah($wl['jumlah']) ?></td>
                            <?php } ?>
                            </tr>
                            <?php $i++;
                            } ?>
                            </tbody>
                            </table>
                        </div>
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
            <img src="<?= base_url('images/pelanggan/') . $pelanggan['fotopelanggan']; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-around mt-5 gap-1">
            <span class="badge bg-primary">
            <?php if ($pelanggan['status'] == 1) {
              echo 'active';
                } else {
                echo 'Blocked';
                } ?>
              </span>
          </div>
          <div class="text-center mt-4">
            <h4 class="mb-1"><?= $pelanggan['fullnama'] ?></h4>
             
            <div class="mt-4"></div>
            <h6 class="mb-1">Email</h6>
            <p class="mb-0 text-secondary"><?= $pelanggan['email'] ?></p>
          </div>
          <hr>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
          Transaksi
          <span class="badge bg-primary rounded-pill"><?= count($countorder) ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
          Saldo
          <span class="badge bg-primary rounded-pill"><?= $currency['app_currency'] ?><?= rupiah($totalsaldo['saldo']) ?></span>
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
