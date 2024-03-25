<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Partner Job</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>Partnerjob/addpartnerjob" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('demo'); ?>
          <?php echo $this->session->flashdata('hapus'); ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('ubah'); ?>
          <?php echo $this->session->flashdata('tambah'); ?>
        </div>
      <?php endif; ?>
        <!-- Konten -->
        <div class="table-responsive">
        <table id="pakettable" class="table table-striped table-hover dt-responsive display nowrap" data-info="false" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Ikon Job</th>
                  <th>Kendaraan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                
              </thead>
              <tbody>
              <?php $i = 1;
                foreach ($partnerjob as $prj) { ?>
              <tr>
                <td><?= $i ?></td>
                <td>
                  <?php if ($prj['icon'] == 1) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/motor.png'); ?>">
                  <?php } else if ($prj['icon'] == 2) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/icmobil.png'); ?>">
                  <?php } else if ($prj['icon'] == 3) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/truck.png'); ?>"> 
                    <?php } else if ($prj['icon'] == 4) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/deliverybike.png'); ?>"> 
                    <?php } else if ($prj['icon'] == 5) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/hatchback.png'); ?>">
                    <?php } else if ($prj['icon'] == 6) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/suv.png'); ?>"> 
                    <?php } else if ($prj['icon'] == 7) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/van.png'); ?>">  
                    <?php } else if ($prj['icon'] == 8) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/bicycle.png'); ?>"> 
                    <?php } else if ($prj['icon'] == 9) {?>
                    <img width="80" height="80" src="<?= base_url('images/icon/tuktuk.png'); ?>"> 
                    <?php } ?> 
                    
                    
                </td>
                <td><?= $prj['driver_job']; ?></td>
                <td>
                    <?php if ($prj['status_job'] == 1) { ?>
                    <label class="badge bg-success">Active</label>
                    <?php } else { ?>
                    <label class="badge bg-danger">Non Active</label>
                    <?php } ?>
                </td>
                <td><a href="<?= base_url(); ?>partnerjob/editpartnerjob/<?= $prj['id']; ?>">
                        <button class="btn btn-outline-primary">Edit</button></a>
                      <a href="<?= base_url(); ?>partnerjob/deletepartnerjob/<?= $prj['id']; ?>" onclick="return confirm ('are you sure?')">
                        <button class="btn btn-outline-danger">Delete</button></a></td>
                </tr>
                <?php $i++;
                } ?>
              </tbody>
            </table>
        </div>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->
