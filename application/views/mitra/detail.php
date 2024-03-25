
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
												<div class="tab-icon"><i class="fa-duotone fa-store font-18 me-1"></i></div>
												<div class="tab-title">Merchant</div>
											</div>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-square-user font-18 me-1"></i></div>
												<div class="tab-title">Akun</div>
											</div>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-sitemap  font-18 me-1"></i>
												</div>
												<div class="tab-title">Item</div>
											</div>
										</button>
									</li>
                  <li class="nav-item" role="presentation">
										<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class="fa-duotone fa-clock-rotate-left font-18 me-1"></i>
												</div>
												<div class="tab-title">Riwayat</div>
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
                          <h6 class="mb-0">Merchant</h6>
                        </div>
                       
                        <div class="card-body">
                       <?= form_open_multipart('merchant/ubahmerchant/' . $mitra['id_mitra']); ?>
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
                            
                          <input type="hidden" name="id_merchant" value="<?= $mitra['id_merchant'] ?>">
                          <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input id="uploadProfile" type="file" class="form-control" name="foto_merchant" onchange="PreviewProfile();" data-default-file="<?= base_url('images/merchant/') . $mitra['foto_merchant'] ?>" data-max-file-size="3mb" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="nama_merchant" placeholder="Nama merchant" value="<?= $mitra['nama_merchant'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Layanan</label>
                                <div class="col-sm-10">
                                <select class=" form-control" style="width:100%" name="id_fitur">
                                    <?php foreach ($fitur as $ftr) { ?>
                                        <option id="<?= $ftr['fitur'] ?>" value="<?= $ftr['id_fitur'] ?>" <?php if ($mitra['id_fitur'] == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" style="width:100%" name="category_merchant">
                                        <?php foreach ($merchantk as $mck) { ?>
                                            <option value="<?= $mck['id_kategori_merchant'] ?>" <?php if ($mck['id_kategori_merchant'] == $mitra['category_merchant']) { ?>selected<?php } ?>><?= $mck['nama_kategori'] ?></option>
                                        <?php
                                             } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat_merchant" id="us3-address" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div id="us3" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Latitude</label>
                                    <input type="text" name="latitude_merchant" id="us3-lat" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude_merchant" id="us3-lon" class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Jam Buka</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="op" name="jam_buka" value="<?= $mitra['jam_buka'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Jam Tutup</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="cl" name="jam_tutup" value="<?= $mitra['jam_tutup'] ?>" required>
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
                        <?php if ($this->session->flashdata('ubahpass')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('ubahpass'); ?>
                                </div>
                            <?php endif; ?>
                            <?= form_open_multipart('merchant/editmitrapass'); ?>
                            <div class="col-12">
                              <input type="hidden" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                                <label class="form-label">Password Baru</label>
                              <input type="password" class="form-control" id="new-password" name="password" placeholder="Masukan Password Baru" required>
                            </div>
                            </br>
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
                          <h6 class="mb-0">Akun</h6>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('merchant/editmitradetail'); ?>
                            <input type="hidden" class="form-control" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                            <input type="hidden" class="form-control" name="id_merchant" value="<?= $mitra['id_merchant'] ?>">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="nama_mitra" placeholder="Nama Mitra" value="<?= $mitra['nama_mitra'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Partner</label>
                                <div class="col-sm-10">
                                <select id="pilih" class=" form-control custom-select  mt-15" style="width:100%" name="partner">
                                    <option id="partner" value="1" <?php if ($mitra['partner'] == 1) { ?>selected<?php } ?>>Partner</option>
                                    <option id="non" value="0" <?php if ($mitra['partner'] == 0) { ?>selected<?php } ?>>Non Partner</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                 <input type="text" class="form-control" name="alamat_mitra" value="<?= $mitra['alamat_mitra'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-9">
                                <div class="row">
                                  <div class="form-group col-2">
                                  <input type="tel" id="txtPhone" class="form-control" name="country_code_mitra" value="<?= $mitra['country_code_mitra'] ?>" required>
                                  </div>
                                  <div class=" form-group col-10">
                                    <input type="text" class="form-control" id="phone" name="phone_mitra" value="<?= $mitra['phone_mitra'] ?>" required>
                                  </div>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                            <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                            </div>
                        </div>
                            <?= form_close(); ?>
                    </div>
                  <!-- ------------------------------------------------------------------------------------ -->
				</div>
                  <!-- Tab Foto -->
					<div class="tab-pane fade" id="tab3" role="tabpanel">
                  <!-- --------------------------------- Konten ----------------------------------------- -->
                      <div class="card shadow-none border">
                      <div class="card-header py-3">
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-lg-6">
                                <h5 class="mb-0">Menu</h5>
                                </div>
                            </div>
                        </div>       
                        <div class="card-body">
                        <?php $index = 5;
                            foreach ($itemk as $itk) { ?> 
                                <table id="merctable3" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Harga Promo</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($item as $it) {
                                    if ($itk['id_kategori_item'] == $it['kategori_item']) { ?>
                                    <tr>
                                    <td><?= $i ?></td>
                                    <td><img src="<?= base_url('images/itemmerchant/') . $it['foto_item']; ?>" width="40" height="40" class="avatar-img rounded-circle"></td>
                                    <td id="namaitem<?= $i ?>"><?= $it['nama_item'] ?></td>
                                    <?php if ($it['status_promo'] == 0) { ?>
                                    <td><?= $currency['app_currency'] ?><?= rupiah($it['harga_item']) ?></td>
                                    <?php } else { ?>
                                    <td style="text-decoration: line-through;"><?= $currency['app_currency'] ?><?= rupiah($it['harga_item']) ?></td>
                                    <?php } ?>
                                    <?php if ($it['status_promo'] == 1) { ?>
                                    <td class="text-success"><?= $currency['app_currency'] ?><?= rupiah($it['harga_promo']) ?></td>
                                    <?php } else { ?>
                                    <td><label class="badge bg-danger">Not Promo</label></td>
                                    <?php } ?>
                                    <?php if ($it['status_item'] == 1) { ?>
                                    <td><label class="badge bg-primary">Active</label></td>
                                    <?php } else { ?>
                                    <td><label class="badge bg-danger">Non Active</label></td>
                                    <?php } ?>
                                    <td>
                                    <a class="btn btn-primary text-red mr-2" href=" <?= base_url(); ?>mitra/edititem/<?= $it['id_item'] ?>">
                                    Edit</a>
                                    <a class="btn btn-danger text-red mr-2" onclick="return confirm ('Are You Sure Want To Delete This Item?')" href=" <?= base_url(); ?>mitra/hapusitem/<?= $it['id_item'] ?>">
                                    Delete</a>
                                    </td>
                                    <?php }
                                    $i++;
                                    } ?>
                                    </tr>
                                    </tbody>
                                </table>
                           
                            <?php $index++;
                            } ?>
                        </div>
                      </div>
                  <!-- ------------------------------------------------------------------------------------ -->
									</div>
                  <!-- Tab Transaksi -->
                  <div class="tab-pane fade" id="tab4" role="tabpanel">
                  <!-- --------------------------------- Konten ----------------------------------------- -->
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">Riwayat</h6>
                        </div>
                        <div class="card-body">
                            <table id="merctable4" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Nota</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($transaksi as $tr) { ?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $tr['id_transaksi'] ?></td>
                            <td><?= $tr['waktu_order'] ?></td>
                            <td><?= $tr['fullnama'] ?></td>
                            <td><?= $tr['jumlah_item'] ?></td>
                            <td>
                            <?= $currency['app_currency'] ?>
                            <?= rupiah($tr['total_biaya']) ?>
                            </td>
                            <td>
                            <a href="<?= base_url(); ?>dashboard/detail/<?= $tr['id_transaksi'] ?>" class="btn btn-outline-primary">View</a>
                            </td>
                            <?php $i++;
                            } ?>
                            </tr>
                            </tbody>
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
            <img src="<?= base_url('images/merchant/') . $mitra['foto_merchant']; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
          </div>
          <div class="d-flex align-items-center justify-content-around mt-5 gap-1">
            <span class="badge bg-primary">
            <?php if ($mitra['status_mitra'] == 3) {
                echo 'Diblokir';
            } elseif ($mitra['status_mitra'] == 0) {
                echo 'Baru';
            } else {
            if ($mitra['status_merchant'] == 1) {
                echo 'Aktif';
            }
            if ($mitra['status_merchant'] == 0) {
                echo 'Nonaktif';
            }
            } ?>
              </span>
          </div>
          <div class="text-center mt-4">
            <h4 class="mb-1"><?= $mitra['nama_mitra'] ?></h4>
             
            <div class="mt-4"></div>
            <h6 class="mb-1">Kontak</h6>
            <p class="mb-0 text-secondary"><?= $mitra['telepon_mitra'] ?></p>
          </div>
          <hr>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
          Transaksi
          <span class="badge bg-primary rounded-pill"><?= $countorder ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
          Layanan
          <span class="badge bg-primary rounded-pill"><?= $mitra['fitur'] ?></span>
        </li>
        
      </ul>
    </div>
  </div>
</div><!--end row-->

</main>
<!--end page main-->
<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places">
</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?= google_maps_api ?>&sensor=false&libraries=places'></script>
<script src="<?= base_url(); ?>assets/js/locationpicker.jquery.js"></script>
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

<script>
    $('#us3').locationpicker({
        location: {
            latitude: <?= $mitra["latitude_merchant"] ?>,
            longitude: <?= $mitra["longitude_merchant"] ?>
        },
        radius: 300,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function(currentLocation, radius, isMarkerDropped) {}
    });
</script>

<script type="text/javascript">
    $(function() {
        var code = "<?= $mitra['country_code_merchant'] ?>"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>

<script type="text/javascript">
    $(function() {
        var code = "<?= $mitra['country_code_mitra'] ?>"; // Assigning value from model.
        $('#txtPhone1').val(code);
        $('#txtPhone1').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>


<script>
    function admSelectCheck(nameSelect) {
        if (nameSelect) {
            yesValue = document.getElementById("yes").value;
            noValue = document.getElementById("no").value;
            if (yesValue == nameSelect.value) {

                document.getElementById("yescheck").required = true;
                document.getElementById("yescheck").style.display = "block";
            } else if (noValue == nameSelect.value) {

                document.getElementById("yescheck").required = false;
                document.getElementById("yescheck").style.display = "none";
            }
        } else {
            document.getElementById("yescheck").style.display = "block";
            document.getElementById("yescheck").required = true;
        }
    }

    function addform() {
        return `<?= form_open_multipart('merchant/tambahcategoryitem'); ?>
                <input type="hidden" id="valmit" class="form-control" name="id_merchant" value="<?= $mitra['id_mitra'] ?>">
                <input type="hidden" id="valmer" class="form-control" name="id_mitra" value="<?= $mitra['id_merchant'] ?>">
               
                <div class="row mb-3">
                    <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="fornamkat" name="nama_kategori_item" placeholder="enter item category" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-9">
                        <button id="kirimid" type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button id="andhe" type="submit" class="btn btn-secondary mr-2">Cancel</button>
                    </div>
                </div>
                <?= form_close(); ?>`
    }
    const tomboltambah = document.getElementById('tomboltambah');
    tomboltambah.addEventListener('click', function() {
        const getformadd = document.getElementById('tambahcategory');
        getformadd.innerHTML = addform();
        const tombolback = document.getElementById('andhe');
        tombolback.addEventListener('click', function() {
            getformadd.innerHTML = backform();
        })
    })

    function backform() {
        return ``
    }

    const jumlah = document.getElementById("jumlah").innerHTML

    for (let i = 0; i < 20; i++) {

        function tombedit(i) {

            const namkat = document.getElementById(`namkat${i}`).innerHTML
            const idkat = document.getElementById(`idkat${i}`).innerHTML
            document.getElementById('editcategory').style = "display:block;";
            document.getElementById('fornamkat').value = namkat;
            document.getElementById('foridkat').value = idkat;
        }
    }

    function kembalikan() {
        document.getElementById('editcategory').style = "display:none;";
    }
</script>
