<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Fitur</h5>
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
        <?= form_open_multipart('fitur/tambahfitur'); ?>
        <div class="mb-3">
            <input type="file" class="form-control" name="icon" data-max-file-size="3mb" required />
        </div>
        <div class="mb-3">
            <label for="newstitle">Nama</label>
            <input type="text" class="form-control" id="newstitle" name="fitur" required>
        </div>
        <div class="mb-3">
            <label for="newscategory">Tipe Layanan</label>
            <select class="form-control custom-select  mt-15" name="home" style="width:100%">
                <option value="1" >Transportasi</option>
                <option value="2" >Pengiriman</option>
                <option value="3" >Rental</option>
                <option value="4" >Merchant</option>
                <option value="5" >Belanja</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Harga</label>
            <input type="text"  class="form-control" id="newstitle" name="biaya"  required>
        </div>
        <div class="mb-3">
            <label for="promo">Diskon (%)</label>
            <input type="text" class="form-control" id="promo" name="promo" placeholder="ex 10%">
        </div>
        <div class="mb-3">
            <label for="newscategory">Jarak</label>
            <select class="form-control custom-select  mt-15" name="keterangan_biaya" style="width:100%">
                <option value="KM" >Per Km</option>
                <option value="Hr" >Per Jam</option>
                <option value="Dy" >Per Hari</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Komisi (%)</label>
            <input type="text" class="form-control" id="newstitle" name="komisi" placeholder="ex 10%" required>
        </div>
        <div class="mb-3">
            <label for="newscategory">Kendaraan</label>
            <select class="form-control custom-select  mt-15" name="driver_job" style="width:100%">
                <?php foreach ($driverjob as $drj) { ?>
                    <option value="<?= $drj['id'] ?>"><?= $drj['driver_job'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="newstitle">Minimal Harga</label>
            <input type="text"  class="form-control" id="newstitle" name="biaya_minimum" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Jarak Driver</label>
            <input type="text" class="form-control" id="newstitle" name="jarak_driver" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Min Jarak Order</label>
            <input type="text" class="form-control" id="newstitle" name="jarak_minimum" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Maks Jarak Order</label>
            <input type="text" class="form-control" id="newstitle" name="maks_distance" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Minimal Saldo</label>
            <input type="text"  class="form-control" id="newstitle" name="wallet_minimum" required>
        </div>
        <div class="mb-3">
            <label for="newstitle">Deskripsi</label>
            <input type="text" class="form-control" id="newstitle" name="keterangan" required>
        </div>   
        <div class="card-title d-flex align-items-center">
                 <h6 class="mb-0">Background Fitur</h6>
        </div>             
        <div class="row mb-4 col-sm-12">
            <label class="col-sm-2 col-form-label">Star Color</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="startcolor" value="#4c84ff" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">End Color</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="endcolor" value="#4c84ff" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Radius</label>
            <div class="col-sm-2">
                <input type="number" width="50" name="angel" value="10" required></br>
            </div>
           
        </div>
        <div class="card-title d-flex align-items-center">
                 <h6 class="mb-0">Warna Fitur</h6>
        </div>
        <div class="row mb-4 col-sm-12">
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Warna</label>
            <div class="col-sm-2">
                <input type="color" id="head" name="tint" value="#e4e0ff" required>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tint</label>
            <div class="col-sm-2">
            <select class="form-control custom-select  mt-15" name="usedtint" style="width:100%">
                <option value="0" >Tidak</option>
                <option value="1" >Ya</option>
            </select>
            </div>
            <label for="inputEnterYourName" class="col-sm-2 col-form-label">Padding</label>
            <div class="col-sm-2">
                <input type="number" id="head" name="padding" value="0" required>
            </div>
        </div>
       
        
        <div class="mb-3">
            <label for="newscategory">Status</label>
            <select class="form-control custom-select  mt-15" name="active" style="width:100%">
                <option value="0" >Nonactive</option>
                <option value="1" >Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <a href="<?= base_url() ?>services" class="btn btn-danger">Cancel</a>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->