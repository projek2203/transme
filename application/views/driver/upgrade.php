<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Upgrade Prioritas</h5>
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
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                
              </thead>
              <tbody>
              <?php $i = 1;
                foreach ($upgrade as $pkt) { ?>
              <tr>
                <td><?= $i ?></td>
                <td> 
                <img src="<?= base_url('images/fotodriver/') . $pkt['foto']; ?>" class="avatar-img rounded-circle" width="50" height="50">
                <td><?= $pkt['iddriver']; ?></td>
                <td><?= $pkt['nama_driver']; ?></td>
                <td><?= $pkt['tgl']; ?></td>
                <td>
                    <?php if ($pkt['setatus'] == '1') { ?>
                    <label class="badge bg-success">Approved</label>
                    <?php } else { ?>
                    <label class="badge bg-danger">Waiting</label>
                    <?php } ?>
                </td>
                <td>
                <?php if ($pkt['setatus'] == 1) { ?>
                    <div class="d-flex align-items-center gap-2 fs-6">
                        <a href="#">
                            <button class="btn btn-secondary">Disetujui</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="d-flex align-items-center gap-2 fs-6">
                        <a href="<?= base_url(); ?>driver/apprupgrade/<?= $pkt['iddriver']; ?>">
                            <button class="btn btn-outline-primary">Setujui</button>
                        </a>
                    </div>
                <?php } ?>
                    
                </td>
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
