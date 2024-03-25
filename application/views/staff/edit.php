<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Staff</h5>
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
            <?= form_open_multipart('staff/editstaff/' . $staff['id']); ?>
            <input type="hidden" name="id" value="<?= $staff['id'] ?>">
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="ikon" data-max-file-size="3mb" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="username" value="<?= $staff['user_name'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="email" value="<?= $staff['email'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="title" name="password" placeholder="Ex: Password" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="kota" value="<?= $staff['kota'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="level" id="level">
                    <option value="admin" <?php if ($staff['level'] == 'admin') { ?>selected<?php } ?>>Admin</option>
                    <option value="staff" <?php if ($staff['level'] == 'staff') { ?>selected<?php } ?>>Staff</option>
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