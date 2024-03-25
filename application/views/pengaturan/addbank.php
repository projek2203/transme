<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Data Bank</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata('demo')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('demo'); ?>
            </div>
        <?php endif; ?>
        <!-- Konten -->
        <?= form_open_multipart('pengaturan/adddatabank'); ?>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Logo Bank</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="image_bank" onchange="PreviewProfile();" data-max-file-size="3mb" />
                </div>
             </div>
             <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama Bank</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="nama_bank" placeholder="BRI" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">No Rekening</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="title" name="rekening_bank" placeholder="Nomor Rekening" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status_bank" style="width:100%">
                        <option value="1">Active</option>
                        <option value="0">Nonactive</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary mr-2">Simpan Pengaturan</button>
                </div>
            </div>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->