<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Staff</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>staff/tambahakun" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
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
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
                
              </thead>
              <tbody>
              <?php $i = 1;
                foreach ($staff as $pkt) { ?>
              <tr>
                <td><?= $i ?></td>
                <td> <img width="50" height="50" class="avatar-img rounded-circle" src="<?= base_url('images/admin/') . $pkt['image']; ?>"></td>
                <td><?= $pkt['user_name']; ?></td>
                <td><?= $pkt['email']; ?></td>
                <td>
                    <?php if ($pkt['level'] == 'admin') { ?>
                    <label class="badge bg-success">Admin</label>
                    <?php } else { ?>
                    <label class="badge bg-danger">Staff</label>
                    <?php } ?>
                </td>
                
                <td>
                    <div class="d-flex align-items-center gap-2 fs-6">
                        <a href="<?= base_url(); ?>staff/editstaff/<?= $pkt['id']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ubah" aria-label="Ubah"><i class="fa-duotone fa-pen-to-square"></i></a>
                        <a href="<?= base_url(); ?>staff/hapusstaff/<?= $pkt['id']; ?>" class="text-danger" onclick="return confirm ('Apakah Yakin Ingin Menghapusnya ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-duotone fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php $i++;
                } ?>
              </tbody>
              <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->
