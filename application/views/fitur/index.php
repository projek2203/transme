<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Fitur</h5>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>fitur/tambahfitur" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
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
            <th>Fitur</th>
            <th>Ikon</th>
            <th>Harga</th>
            <th>Jarak</th>
            <th>Komisi</th>
            <th>Diskon</th>
            <th>Min Harga</th>
            <th>Jarak Driver</th>
            <th>Jarak Pesanan</th>
            <th>Min Saldo</th>
            <th>Job</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        foreach ($service as $s) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $s['fitur']; ?></td>
            <td>
                <img width="50" height="50" class="avatar-img rounded-circle" src="<?= base_url('images/fitur/') . $s['icon']; ?>">
            </td>
            <td><?= $duit ?><?= rupiah($s['biaya']) ?></td>
            <td><?= $s['keterangan_biaya']; ?></td>
            <td><?= $s['komisi']; ?> %</td>
            <td><?= $s['promo']; ?> %</td>
            <td><?= $duit ?>
            <?= rupiah($s['biaya_minimum']) ?></td>
            <td><?= $s['jarak_driver']; ?>km</td>
            <td><?= $s['maks_distance']; ?>km</td>
            <td><?= $duit ?><?= rupiah($s['wallet_minimum']) ?></td>
            <?php foreach ($driverjob as $dj) {
            if ($s['driver_job'] == $dj['id']) { ?>
            <td><?= $dj['driver_job']; ?></td>
            <?php }
            } ?>
            <td>
            <?php if ($s['active'] == 1) { ?>
            <label class="badge bg-success">Aktif</label>
            <?php } else { ?>
            <label class="badge bg-danger">Nonaktif</label>
            <?php } ?>
            </td>
            <td>
            <a href="<?= base_url(); ?>fitur/ubahfitur/<?= $s['id_fitur']; ?>">
            <button class="btn btn-primary">Ubah</button>
            </a>
            <a href="<?= base_url(); ?>fitur/hapusfitur/<?= $s['id_fitur']; ?>" onclick="return confirm ('are you sure?')">
            <button class="btn btn-danger">Hapus</button></a>
            </td>
        <?php $i++;
        } ?>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Fitur</th>
            <th>Ikon</th>
            <th>Harga</th>
            <th>Jarak</th>
            <th>Komisi</th>
            <th>Diskon</th>
            <th>Min Harga</th>
            <th>Jarak Driver</th>
            <th>Jarak Pesanan</th>
            <th>Min Saldo</th>
            <th>Job</th>
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