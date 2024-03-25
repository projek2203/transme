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
        <?= form_open_multipart('berita/addkategori'); ?>
            <div class="row mb-4">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori" required>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->