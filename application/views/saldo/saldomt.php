<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Saldo</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
       
        <!-- Konten -->
        <?= form_open_multipart('saldo/saldomitra/'.$this->session->flashdata('id_user')); ?>
            <input type="hidden" name="id" value="<?= $this->session->flashdata('id_user') ?>">
            <input type="hidden" name="saldolama" value="<?= $mitra['saldo'] ?>">
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Akun</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="namamitra" value="<?= $mitra['nama_mitra'] ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Saldo Saat Ini</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" value="<?= $currency['app_currency'] ?><?= rupiah($mitra['saldo']) ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Tambah Saldo</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="title" name="saldo" placeholder="0" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary mr-2">Tambah Saldo</button>
                </div>
            </div>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->