<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Poin</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>poin/tambah" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
                    </div>
                </div>
            </div>  
        <div class="card-body">
            <?php if ($this->session->flashdata('ubah')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('ubah'); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('demo')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('demo'); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('hapus')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('hapus'); ?>
            </div>
            <?php endif; ?>
        <!-- Konten -->
        <table id="fiturtable" class="table table-striped table-hover dt-responsive display nowrap" data-info="false" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Ikon</th>
            <th>Poin</th>
            <th>Keterangan</th>
            <th>Reward</th>
            <th>Expire</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        foreach ($poin as $s) { ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <img width="50" height="50" class="avatar-img rounded-circle" src="<?= base_url('images/poin/') . $s['image_poin']; ?>">
            </td>
            <td><?= $s['nama']; ?></td>
            <td><?= $s['keterangan']; ?></td>
            <td><?= $duit ?><?= rupiah($s['nilai']) ?></td>
            <td><?= $s['expire']; ?></td>
            <td>
                <?php if ($s['status'] == 1) { ?>
                <label class="badge bg-success">Active</label>
                <?php } else { ?>
                <label class="badge bg-danger">Non Active</label>
                <?php } ?>
            </td>
            <td>
                <a href="<?= base_url(); ?>poin/hapus/<?= $s['id']; ?>" onclick="return confirm ('are you sure?')">
                <button class="btn btn-danger">Hapus</button></a>
            </td>
        <?php $i++;
        } ?>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Ikon</th>
            <th>Poin</th>
            <th>Keterangan</th>
            <th>Reward</th>
            <th>Expire</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
		</tfoot>
        </table>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->