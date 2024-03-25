<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Pelanggan</h5>
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
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('ubah'); ?>
                <?php echo $this->session->flashdata('tambah'); ?>
        </div>
        <?php endif; ?>
        <!-- Tab Nav -->
        <ul class="nav nav-tabs nav-success" role="tablist">
            <li class="nav-item" role="presentation">
				<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-selected="true">
					<div class="d-flex align-items-center">
						<div class="tab-icon"><i class="fa-solid fa-user-group font-18 me-1"></i></div>
						 <div class="tab-title">Semua</div>
				    </div>
				</button>
		    </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class="fa-solid fa-user-slash font-18 me-1"></i></div>
                    <div class="tab-title">Diblokir</div>
                </div>
                </button>
            </li>
        </ul>
        <!-- Konten -->
        <div class="tab-content py-3">
        <!-- Tab All Pelanggan -->
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <table id="dtable" class="table table-striped table-hover dt-responsive display nowrap" data-info="false" cellspacing="0" width="100%">
                <thead>
                <tr>
                <th>No</th>
                <th>#ID</th>
                <th>Profil</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Status</th>
                <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;
                foreach ($user as $us) { ?>
                <tr>
                <td><?= $i ?></td>
                <td><?= $us['id'] ?></td>
                <td>
                <img class="avatar-img rounded-circle" src="<?= base_url('images/pelanggan/') . $us['fotopelanggan']; ?>" width="50" height="50">
                </td>
                <td><?= $us['fullnama'] ?></td>
                <td><?= $us['email'] ?></td>
                <td><?= $us['no_telepon'] ?></td>
                <td>
                <?php if ($us['status'] == 1) { ?>
                <label class="badge bg-success">Aktif</label>
                <?php } else { ?>
                <label class="badge bg-dark">Diblokir</label>
                <?php } ?>
                </td>
                <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="<?= base_url(); ?>pelanggan/detail/<?= $us['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                    <a href="<?= base_url(); ?>saldo/saldocs/<?= $us['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Tambah Saldo" aria-label="Tambah Saldo"><i class="fa-duotone fa-money-bill"></i></a>
                    <?php if ($us['status'] == 0) { ?>
                        <a href="<?= base_url(); ?>pelanggan/userunblock/<?= $us['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                    <?php } else { ?>
                        <a href="<?= base_url(); ?>pelanggan/userblock/<?= $us['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                    <?php } ?>
                    <a href="<?= base_url(); ?>pelanggan/hapususers/<?= $us['id'] ?>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    <?php $i++;
                    } ?>
                </div>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>#ID</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Tab All Pelanggan -->
        <!-- Tab Block Pelanggan -->
        <div class="tab-pane fade" id="tab2" role="tabpanel">
            <table id="dtable2" class="table table-striped table-hover dt-responsive display nowrap" data-info="false" cellspacing="0" width="100%">
                <thead>
                <tr>
                <th>No</th>
                <th>#ID</th>
                <th>Profil</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Status</th>
                <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;
                foreach ($user as $us) {
                if ($us['status'] == 0) { ?>
                <tr>
                <td><?= $i ?></td>
                <td><?= $us['id'] ?></td>
                <td>
                <img class="avatar-img rounded-circle" src="<?= base_url('images/pelanggan/') . $us['fotopelanggan']; ?>" width="50" height="50">
                </td>
                <td><?= $us['fullnama'] ?></td>
                <td><?= $us['email'] ?></td>
                <td><?= $us['no_telepon'] ?></td>
                <td>
                <?php if ($us['status'] == 1) { ?>
                <label class="badge bg-success">Aktif</label>
                <?php } else { ?>
                <label class="badge bg-dark">Diblokir</label>
                <?php } ?>
                </td>
                <td>
                <a href="<?= base_url(); ?>pelanggan/userunblock/<?= $us['id'] ?>">
                <button class="btn btn-success text-red mr-2">Unblokir</button>
                </a>
                </td>
                <?php $i++;
                    }
                } ?>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>#ID</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Tab Block Pelanggan -->
        </div>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->