<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Ubah Kategori</h5>
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
        <?= form_open_multipart('digiflazz/editkategori/' . $digiflazz['id']); ?>
            <input type="hidden" name="id" value="<?= $digiflazz['id'] ?>">
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="ikon" data-max-file-size="3mb" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="nama" placeholder="Ex: Pulsa" value="<?= $digiflazz['nama'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="kategori" placeholder="Ex: PULSA" value="<?= $digiflazz['kategori'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="tipe" id="tipe">
                    <option value="Prabayar" <?php if ($digiflazz['tipe'] == 'Prabayar') { ?>selected<?php } ?>>Prabayar</option>
                    <option value="Pascabayar" <?php if ($digiflazz['tipe'] == 'Pascabayar') { ?>selected<?php } ?>>Pascabayar</option>
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="status" id="status">
                    <option value="1" <?php if ($digiflazz['status'] == '1') { ?>selected<?php } ?>>Active</option>
                    <option value="0" <?php if ($digiflazz['status'] == '0') { ?>selected<?php } ?>>NonActive</option>
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