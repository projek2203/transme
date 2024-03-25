<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Banner</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>banner/tambah" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
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
            <div class="alert alert-succees" role="alert">
            <?php echo $this->session->flashdata('ubah'); ?>
            <?php echo $this->session->flashdata('tambah'); ?>
            </div>
        <?php endif; ?>
        <!-- Konten -->
        <table id="bannertable" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Masa Aktif</th>
                  <th>Tipe</th>
                  <th>Fitur</th>
                  <th>Link</th>
                  <th>Kota</th>
                  <th>Status</th>
                  <th>Kelola</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($promo as $pr) { ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td>
                      <img width="80" height="80" src="<?= base_url('images/promo/') . $pr['foto']; ?>">
                    </td>
                    <td><?= $pr['tanggal_berakhir']; ?></td>
                    <td><?= $pr['type_promosi']; ?></td>
                    <td>
                      <?php if ($pr['fitur_promosi'] == 0) {
                        echo 'Link';
                      } else {
                        echo $pr['fitur'];
                      } ?>
                    </td>
                    <td>
                      <?php if ($pr['link_promosi'] == NULL) { ?>
                        Service
                      <?php } else {
                        echo $pr['link_promosi'];
                      } ?>
                    </td>
                    <td><?= $pr['kota']; ?></td>
                    <td>
                      <?php if ($pr['is_show'] == 1) { ?>
                        <label class="badge bg-success">Active</label>
                      <?php } else { ?>
                        <label class="badge bg-danger">Non Active</label>
                      <?php } ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2 fs-6">
                            <a href="<?= base_url(); ?>banner/ubah/<?= $pr['id']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ubah" aria-label="Ubah"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="<?= base_url(); ?>banner/hapus/<?= $pr['id']; ?>" class="text-danger" onclick="return confirm ('Apakah Yakin Ingin Menghapusnya ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-duotone fa-trash"></i></a>
                        </div>
                    </td>
                  </tr>
                <?php $i++;
                } ?>
              </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Masa Aktif</th>
                  <th>Tipe</th>
                  <th>Fitur</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Kelola</th>
                </tr>
				</tfoot>
            </table>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->