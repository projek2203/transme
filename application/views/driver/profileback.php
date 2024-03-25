<div class="card-body">
<h5 class="mb-0">Akun Driver</h5>
<hr>
<div class="card shadow-none border">
  <div class="card-header">
    <h6 class="mb-0">Informasi Akun</h6>
  </div>
  <div class="card-body">
  <?= form_open_multipartclass('driver/ubahid'); ?>
    <input type="hidden" name="id" value="<?= $driver['id'] ?>">
       <div class="col-6">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama_driver" value="<?= $driver['nama_driver'] ?>" required>
       </div>
       <div class="col-6">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="<?= $driver['email'] ?>" required>
      </div>
        <div class="col-6">
          <label class="form-label">Kontak</label>
          <div class="row">
            <div class="form-group col-2">
            <input type="tel" id="txtPhone" class="form-control" name="countrycode" value="<?= $driver['countrycode'] ?>" required>
            </div>
            <div class=" form-group col-10">
              <input type="text" class="form-control" id="phone" name="phone" value="<?= $driver['phone'] ?>" required>
            </div>
          </div>
      </div>
        <div class="col-6">
          <label class="form-label">Jenis Kelamin</label>
          <select class="form-control custom-select" style="width:100%" name="gender">
            <option value="Male" <?php if ($driver['gender'] == 'Male') { ?>selected<?php } ?>>Laki-laki</option>
            <option value="Female" <?php if ($driver['gender'] == 'Female') { ?>selected<?php } ?>>Perempuan</option>
        </select>
      </div>
      <div class="col-12">
          <label class="form-label">Alamat Lengkap</label>
          <textarea class="form-control" rows="2" cols="2" name="alamat_driver" required><?= $driver['alamat_driver'] ?></textarea>
      </div>
      <button type="submit" class="btn btn-success mr-2">Perbarui</button>
      <?= form_close(); ?>
  </div>
</div>
<div class="card shadow-none border">
  <div class="card-header">
    <h6 class="mb-0">CONTACT INFORMATION</h6>
  </div>
  <div class="card-body">
    <form class="row g-3">
      <div class="col-12">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" value="47-A, city name, United States">
       </div>
       <div class="col-6">
          <label class="form-label">City</label>
          <input type="text" class="form-control" value="@jhon">
       </div>
       <div class="col-6">
        <label class="form-label">Country</label>
        <input type="text" class="form-control" value="xyz@example.com">
      </div>
        <div class="col-6">
          <label class="form-label">Pin Code</label>
          <input type="text" class="form-control" value="jhon">
      </div>
      <div class="col-6">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" value="Deo">
      </div>
      <div class="col-12">
        <label class="form-label">About Me</label>
        <textarea class="form-control" rows="4" cols="4" placeholder="Describe yourself..."></textarea>
       </div>
    </form>
  </div>
</div>
<div class="text-start">
  <button type="button" class="btn btn-primary px-4">Save Changes</button>
</div>
</div>