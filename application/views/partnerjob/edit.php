<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Ubah Tipe Kendaraan</h5>
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
        <?= form_open_multipart('partnerjob/editpartnerjob/' . $partnerjob['id']); ?>
            <div class="row mb-3">
                <input type="hidden" name="id" value="<?= $partnerjob['id'] ?>">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                <select class="form-control" style="width:100%" name="icon" id="statusjob">
                <option value="1" <?php if ($partnerjob['icon'] == '1') { ?>selected<?php } ?>>Motor</option>
                <option value="2" <?php if ($partnerjob['icon'] == '2') { ?>selected<?php } ?>>Mobil</option>
                <option value="3" <?php if ($partnerjob['icon'] == '3') { ?>selected<?php } ?>>Truck</option>
                <option value="4" <?php if ($partnerjob['icon'] == '4') { ?>selected<?php } ?>>Kurir</option>
                <option value="5" <?php if ($partnerjob['icon'] == '5') { ?>selected<?php } ?>>HatchBack</option>
                <option value="6" <?php if ($partnerjob['icon'] == '6') { ?>selected<?php } ?>>SUV</option>
                <option value="7" <?php if ($partnerjob['icon'] == '7') { ?>selected<?php } ?>>VAN</option>
                <option value="8" <?php if ($partnerjob['icon'] == '8') { ?>selected<?php } ?>>Sepeda</option>
                <option value="9" <?php if ($partnerjob['icon'] == '9') { ?>selected<?php } ?>>Bajaj</option>
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama Job</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="driver_job" id="job" placeholder="enter job title" value="<?= $partnerjob['driver_job'] ?>" required>
                </div>
            </div>
           
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="status_job" id="statusjob">
                    <option value="1" <?php if ($partnerjob['status_job'] == '1') { ?>selected<?php } ?>>Active</option>
                    <option value="0" <?php if ($partnerjob['status_job'] == '0') { ?>selected<?php } ?>>NonActive</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </div>
            </div>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->