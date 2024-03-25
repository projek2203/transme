 <!--start content-->
 <main class="page-content">
          <div class="card border shadow-none">
		  	<div class="card-header py-3">
                  <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Promo</h5>
                    </div>
                  </div>
             </div>
             
            <div class="card-body">
			<div class="table-responsive">
			<?= form_open_multipart('promo/tambah'); ?>
				<div class="form-group">
					<input type="file" class="form-control" name="image_promo" data-max-file-size="3mb" required />
				</div>
				<div class="form-group">
					<label for="birthdate">Promo Title</label>
					<input type="text" class="form-control" id="nama_promo" name="nama_promo" placeholder="promo title" required>
				</div>
				<div class="form-group">
					<label for="birthdate">Promo Code</label>
					<input type="text" class="form-control" id="kode_promo" name="kode_promo" placeholder="enter promo code" required>
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
				</div>
				<div class="form-group">
					<label for="birthdate">Minimal Transaksi ( Ketik 0 Jika Tidak Di Batasi)</label>
					<input type="text" class="form-control" id="minimal" name="minimal" placeholder="enter minimal" required>
				</div>
				<div class="form-group">
					<label for="gender">Promo Type</label>
					<select class="form-control custom-select  mt-15" onchange="admSelectCheck(this);"  name="type_promo" style="width:100%">
						<option id="persen" value="persen">Persentase</option>
						<option id="fix" value="fix">Nominal</option>
					</select>
				</div>
				<div id="persencheck" class="form-group" style="display:block;">
					<label>Percentage Promo Amount</label>
					<input id="persencheckrequired" type="text" class="form-control" id="nominal_promo" name="nominal_promo_persen" placeholder="enter promo amount" required>
				</div>
				<div id="fixcheck" class="form-group" style="display:none;">
					<label>Fix Promo Amount</label>
					<input id="fixcheckrequired" type="text"  class="form-control" id="nominal_promo" name="nominal_promo" placeholder="enter promo amount">
				</div>

				<div class="form-group">
					<label for="birthdate">Exp On</label>
					<input type="date" class="form-control" id="expired" name="expired" placeholder="" required>
				</div>
				<div class="form-group">
					<label for="type">Service</label>
					<select class="form-control custom-select  mt-15" name="fitur" style="width:100%">
					<?php foreach ($fitur as $ft) { ?>
							<option value="<?= $ft['id_fitur'] ?>"><?= $ft['fitur'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label for="gender">Jenis</label>
					<select class="form-control custom-select  mt-15" name="jenis" style="width:100%">
						<option value="saldo">Saldo</option>
						<option value="semua">Semua</option>
					</select>
				</div>

				<div class="form-group">
					<label for="gender">status</label>
					<select class="form-control custom-select  mt-15" name="status" style="width:100%">
						<option value="1">Active</option>
						<option value="0">Nonactive</option>
					</select>
				</div>
				<hr>
				<button type="submit" class="btn btn-success mr-2">Tambahkan</button>
				<a class="btn btn-danger text-white" href="<?= base_url(); ?>promo">Batalkan</a>
				<?= form_close(); ?>
			</div>
              <!-- Konten -->
			  
              <!-- End Konten -->
             </div>
           </div>

          </main>
       <!--end page main-->
	   <script>
    function admSelectCheck(nameSelect) {
        console.log(nameSelect);
        if (nameSelect) {
            serviceValue = document.getElementById("persen").value;
            linkValue = document.getElementById("fix").value;
            if (serviceValue == nameSelect.value) {
                document.getElementById("persencheckrequired").required = true;
                document.getElementById("fixcheckrequired").required = false;
                document.getElementById("persencheck").style.display = "block";
                document.getElementById("fixcheck").style.display = "none";
            } else if (linkValue == nameSelect.value) {
                document.getElementById("fixcheckrequired").required = true;
                document.getElementById("persencheckrequired").required = false;
                document.getElementById("fixcheck").style.display = "block";
                document.getElementById("persencheck").style.display = "none";
            }
        } else {
            document.getElementById("persencheck").style.display = "block";
        }
    }
</script>