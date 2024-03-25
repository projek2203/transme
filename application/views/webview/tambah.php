<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Web</h5>
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
        <?= form_open_multipart('webview/addweb'); ?>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="ikon" data-max-file-size="3mb" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="nama" placeholder="Ex: Nama Web" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="url" placeholder="https://google.com" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="status" id="status">
                        <option value="1">Active</option>
                        <option value="0">NonActive</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                </div>
            </div>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->