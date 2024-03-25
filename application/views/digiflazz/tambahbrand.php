<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Kategori</h5>
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
        <?= form_open_multipart('digiflazz/tambahproduk'); ?>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="ikon" data-max-file-size="3mb" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="nama" placeholder="Ex: Telkomsel" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" style="text-transform:uppercase" name="brand" placeholder="Ex: TELKOMSEL" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="keterangan" placeholder="Ex: Topup Pulsa Telkomsel" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Admin</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="title" name="fee" placeholder="Ex: 200" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" name="tipe" style="width:100%">
                    <?php foreach ($listbrand as $digkat) { ?>
                        <option value="<?= $digkat['kategori'] ?>"><?= $digkat['kategori'] ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
        
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="status" id="status">
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
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