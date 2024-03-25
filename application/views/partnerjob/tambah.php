<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Tipe Kendaraan</h5>
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
        <?= form_open_multipart('partnerjob/addpartnerjob'); ?>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="icon" id="statusjob">
                    <option value="1">Motor</option>
                    <option value="2">Mobil</option>
                    <option value="3">Truck</option>
                    <option value="4">Kurir</option>
                    <option value="5">HatchBack</option>
                    <option value="6">SUV</option>
                    <option value="7">VAN</option>
                    <option value="8">Sepeda</option>
                    <option value="9">Bajaj</option>
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama Job</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="driver_job" id="job" placeholder="Nama Job" required>
                </div>
            </div>
           
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="status_job" id="status">
                        <option value="1">Active</option>
                        <option value="0">NonActive</option>
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