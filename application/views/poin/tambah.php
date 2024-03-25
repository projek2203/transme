<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Poin</h5>
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
        <?= form_open_multipart('poin/tambah'); ?>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="ikon" data-max-file-size="3mb" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="kode" placeholder="Ex: PN1000" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="nama" placeholder="Ex: Point 5RB" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="keterangan" placeholder="Tuker Poin 5RB" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Poin</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="title" name="poin" placeholder="Ex: 10" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Reward</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="title" name="nilai" placeholder="0" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="tipe" id="tipe">
                        <option value="1">Driver</option>
                        <option value="0">Customer</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Expire</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="expire" placeholder="Expire" required>
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
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </div>
            </div>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->