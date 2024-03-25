
 <!--start content-->
<main class="page-content">
<div class="card border shadow-none">
    <div class="card-header py-3">
         <div class="row align-items-center g-3">
            <div class="col-12 col-lg-6">
              <h5 class="mb-0">Informasi Driver</h5>
            </div>
            <div class="col-12 col-lg-6 text-md-end">
              <a href="<?= base_url(); ?>driver/tambahakun" class="btn btn-sm btn-primary me-2"><i class="fa-solid fa-user-plus"></i>Tambah</a>
           </div>
          </div>
    </div>
    <div class="card">
			<div class="card-body">
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
                <div class="tab-icon"><i class="fa-solid fa-user-large font-18 me-1"></i></div>
                <div class="tab-title">Aktif</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-solid fa-user-xmark font-18 me-1"></i></div>
                <div class="tab-title">Nonaktif</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-solid fa-user-slash font-18 me-1"></i></div>
                <div class="tab-title">Diblokir</div>
              </div>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-selected="false">
              <div class="d-flex align-items-center">
                <div class="tab-icon"><i class="fa-solid fa-user-clock font-18 me-1"></i></div>
                <div class="tab-title">Baru</div>
              </div>
            </button>
          </li>
        </ul>
        <div class="tab-content py-3">
					<div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <table id="dtable" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>ID Driver</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Saldo</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Layanan</th>
					<th>Kota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($driver as $drv) {
                    if ($drv['status'] != 0) { ?>
                    <tr>
                    <td><?= $drv['id'] ?></td>
                    <td>
                    <img src="<?= base_url('images/fotodriver/') . $drv['foto']; ?>" class="rounded-circle" width="50" height="50">
                    </td>
                    <td><?= $drv['nama_driver'] ?></td>
                    <td><?= $currency['app_currency'] ?><?= rupiah($drv['saldo']) ?></td>
                    <td><?= $drv['no_telepon'] ?></td>
                    <td><?= $drv['email'] ?></td>
                    <td><?= $drv['driver_job'] ?></td>
					<td><?= $drv['kota'] ?></td>
                    <td>
                    <?php if ($drv['status'] == 3) { ?>
                    <label class="badge bg-dark">Banned</label>
                    <?php } elseif ($drv['status'] == 0) { ?>
                    <label class="badge bg-primary">Baru</label>
                    <?php } else {
                    if ($drv['status_job'] == 1) { ?>
                    <label class="badge bg-primary">Aktif</label>
                    <?php }
                    if ($drv['status_job'] == 2) { ?>
                    <label class="badge bg-info">Memproses</label>
                    <?php }
                    if ($drv['status_job'] == 3) { ?>
                    <label class="badge bg-success">Mengantar</label>
                    <?php }
                    if ($drv['status_job'] == 4) { ?>
                    <label class="badge bg-danger">Nonaktif</label>
                    <?php }
                    if ($drv['status_job'] == 5) { ?>
                    <label class="badge bg-danger">Keluar</label>
                    <?php }
                    } ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                          <a href="<?= base_url(); ?>driver/detail/<?= $drv['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                          <?php if ($this->session->userdata('level') == 'admin') { ?>
                            <a href="<?= base_url(); ?>saldo/saldodriver/<?= $drv['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Tambah Saldo" aria-label="Tambah Saldo"><i class="fa-duotone fa-money-bill"></i></a>
                          <?php } ?>
                        <?php
                        if ($drv['status'] != 0) {
                        if ($drv['status'] != 3) { ?>
                          <a href="<?= base_url(); ?>driver/block/<?= $drv['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url(); ?>driver/unblock/<?= $drv['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                        <?php }
                        } ?>
                          <a href="<?= base_url(); ?>driver/hapus/<?= $drv['id'] ?>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                      </div>
                    </td>
                    </tr> 
                    <?php $i++;
                    }
                    } ?>
                </tbody>
                <tfoot>
                
                    <tr>
                        <th>ID Driver</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Saldo</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Layanan</th>
						 <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                
                </tfoot>
          </table>
					</div>
					
					<div class="tab-pane fade" id="tab2" role="tabpanel">
          <table id="dtable2" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>ID Driver</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Layanan</th>
                    <th>Kota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1;
                  foreach ($driver as $drv) {
                  if ($drv['status'] != 3) {
                  if ($drv['status_job'] == 1 or $drv['status_job'] == 2 or $drv['status_job'] == 3) { ?>
                      <tr>
                      <td><?= $drv['id'] ?></td>
                      <td>
                      <img src="<?= base_url('images/fotodriver/') . $drv['foto']; ?>" class="rounded-circle" width="50" height="50">
                      </td>
                      <td><?= $drv['nama_driver'] ?></td>
                      <td><?= $drv['no_telepon'] ?></td>
                      <td><?= $drv['email'] ?></td>
                      <td><?= $drv['driver_job'] ?></td>
                      <td><?= $drv['kota'] ?></td>
                      <td>
                      <?php if ($drv['status'] == 3) { ?>
                      <label class="badge bg-dark">Banned</label>
                      <?php } elseif ($drv['status'] == 0) { ?>
                      <label class="badge bg-primary">Baru</label>
                      <?php } else {
                      if ($drv['status_job'] == 1) { ?>
                      <label class="badge bg-primary">Aktif</label>
                      <?php }
                      if ($drv['status_job'] == 2) { ?>
                      <label class="badge bg-info">Memproses</label>
                      <?php }
                      if ($drv['status_job'] == 3) { ?>
                      <label class="badge bg-success">Mengantar</label>
                      <?php }
                      if ($drv['status_job'] == 4) { ?>
                      <label class="badge bg-danger">Nonaktif</label>
                      <?php }
                      if ($drv['status_job'] == 5) { ?>
                      <label class="badge bg-danger">Keluar</label>
                      <?php }
                      } ?>
                      </td>
                      <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                          <a href="<?= base_url(); ?>driver/detail/<?= $drv['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                          <?php
                          if ($drv['status'] != 0) {
                          if ($drv['status'] != 3) { ?>
                            <a href="<?= base_url(); ?>driver/block/<?= $drv['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                          <?php } else { ?>
                            <a href="<?= base_url(); ?>driver/unblock/<?= $drv['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                          <?php }
                          } ?>
                            <a href="<?= base_url(); ?>driver/hapus/<?= $drv['id'] ?>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </td>
                      </tr> 
                    <?php $i++;
                   }
                  }
                  } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Driver</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Layanan</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
          </table>
					</div>

          <div class="tab-pane fade" id="tab3" role="tabpanel">
          <table id="dtable3" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>ID Driver</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Layanan</th>
                    <th>Kota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($driver as $drv) {
                    if ($drv['status_job'] == 4 or $drv['status_job'] == 5 and $drv['status'] != 0 and $drv['status'] != 3) { ?>
                    <tr>
                    <td><?= $drv['id'] ?></td>
                    <td>
                    <img src="<?= base_url('images/fotodriver/') . $drv['foto']; ?>" class="rounded-circle" width="50" height="50">
                    </td>
                    <td><?= $drv['nama_driver'] ?></td>
                    <td><?= $drv['no_telepon'] ?></td>
                    <td><?= $drv['email'] ?></td>
                    <td><?= $drv['driver_job'] ?></td>
                    <td><?= $drv['kota'] ?></td>
                    <td>
                    <?php if ($drv['status'] == 3) { ?>
                    <label class="badge bg-dark">Banned</label>
                    <?php } elseif ($drv['status'] == 0) { ?>
                    <label class="badge bg-primary">Baru</label>
                    <?php } else {
                    if ($drv['status_job'] == 1) { ?>
                    <label class="badge bg-primary">Aktif</label>
                    <?php }
                    if ($drv['status_job'] == 2) { ?>
                    <label class="badge bg-info">Memproses</label>
                    <?php }
                    if ($drv['status_job'] == 3) { ?>
                    <label class="badge bg-success">Mengantar</label>
                    <?php }
                    if ($drv['status_job'] == 4) { ?>
                    <label class="badge bg-danger">Nonaktif</label>
                    <?php }
                    if ($drv['status_job'] == 5) { ?>
                    <label class="badge bg-danger">Keluar</label>
                    <?php }
                    } ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                          <a href="<?= base_url(); ?>driver/detail/<?= $drv['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                          <?php
                          if ($drv['status'] != 0) {
                          if ($drv['status'] != 3) { ?>
                            <a href="<?= base_url(); ?>driver/block/<?= $drv['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                          <?php } else { ?>
                            <a href="<?= base_url(); ?>driver/unblock/<?= $drv['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                          <?php }
                          } ?>
                            <a href="<?= base_url(); ?>driver/hapus/<?= $drv['id'] ?>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                    </tr> 
                    <?php $i++;
                    }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Driver</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Layanan</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
          </table>
					</div>
          <div class="tab-pane fade" id="tab4" role="tabpanel">
          <table id="dtable4" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>ID Driver</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Layanan</th>
                    <th>Kota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($driver as $drv) {
                    if ($drv['status'] == 3) { ?>
                    <tr>
                    <td><?= $drv['id'] ?></td>
                    <td>
                    <img src="<?= base_url('images/fotodriver/') . $drv['foto']; ?>" class="rounded-circle" width="50" height="50">
                    </td>
                    <td><?= $drv['nama_driver'] ?></td>
                    <td><?= $drv['no_telepon'] ?></td>
                    <td><?= $drv['email'] ?></td>
                    <td><?= $drv['driver_job'] ?></td>
                    <td><?= $drv['kota'] ?></td>
                    <td>
                    <?php if ($drv['status'] == 3) { ?>
                    <label class="badge bg-dark">Banned</label>
                    <?php } elseif ($drv['status'] == 0) { ?>
                    <label class="badge bg-primary">Baru</label>
                    <?php } else {
                    if ($drv['status_job'] == 1) { ?>
                    <label class="badge bg-primary">Aktif</label>
                    <?php }
                    if ($drv['status_job'] == 2) { ?>
                    <label class="badge bg-info">Memproses</label>
                    <?php }
                    if ($drv['status_job'] == 3) { ?>
                    <label class="badge bg-success">Mengantar</label>
                    <?php }
                    if ($drv['status_job'] == 4) { ?>
                    <label class="badge bg-danger">Nonaktif</label>
                    <?php }
                    if ($drv['status_job'] == 5) { ?>
                    <label class="badge bg-danger">Keluar</label>
                    <?php }
                    } ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                          <a href="<?= base_url(); ?>driver/detail/<?= $drv['id'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                          <?php
                          if ($drv['status'] != 0) {
                          if ($drv['status'] != 3) { ?>
                            <a href="<?= base_url(); ?>driver/block/<?= $drv['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                          <?php } else { ?>
                            <a href="<?= base_url(); ?>driver/unblock/<?= $drv['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                          <?php }
                          } ?>
                            <a href="<?= base_url(); ?>driver/hapus/<?= $drv['id'] ?>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                    </tr> 
                    <?php $i++;
                    }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Driver</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Layanan</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
          </table>
					</div>
          <div class="tab-pane fade" id="tab5" role="tabpanel">
          <table id="dtable5" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>ID Driver</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Layanan</th>
                    <th>Kota</th>
                    <th>Berkas</th>
                    <th>Saldo</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($driver as $drv) {
                    if ($drv['status'] == 0) { ?>
                    <tr>
                    <td><?= $drv['id'] ?></td>
                    <td>
                    <img src="<?= base_url('images/fotodriver/') . $drv['foto']; ?>" class="square" width="50" height="50">
                    </td>
                    <td><?= $drv['nama_driver'] ?></td>
                    <td><?= $drv['no_telepon'] ?></td>
                    <td><?= $drv['email'] ?></td>
                    <td><?= $drv['driver_job'] ?></td>
                    <td><?= $drv['kota'] ?></td>
                    <td>
                      <a href="<?= base_url(); ?>driver/berkas/<?= $drv['id'] ?>" target="_blank" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Berkas" aria-label="Berkas"><i class="fa-regular fa-ban"></i>Lihat</a>
                    </td>
                    <td><?= $currency['app_currency'] ?><?= rupiah($drv['saldo']) ?></td>
                    <td>
                    <?php if ($drv['status'] == 3) { ?>
                    <label class="badge bg-dark">Banned</label>
                    <?php } elseif ($drv['status'] == 0) { ?>
                    <label class="badge bg-primary">Baru</label>
                    <?php } else {
                    if ($drv['status_job'] == 1) { ?>
                    <label class="badge bg-primary">Aktif</label>
                    <?php }
                    if ($drv['status_job'] == 2) { ?>
                    <label class="badge bg-info">Memproses</label>
                    <?php }
                    if ($drv['status_job'] == 3) { ?>
                    <label class="badge bg-success">Mengantar</label>
                    <?php }
                    if ($drv['status_job'] == 4) { ?>
                    <label class="badge bg-danger">Nonaktif</label>
                    <?php }
                    if ($drv['status_job'] == 5) { ?>
                      <label class="badge bg-danger">Keluar</label>
                    <?php }
                    } ?>
                    </td>
                   
                    <td>
                      <div class="d-flex align-items-center gap-2 fs-6">
                            <a href="<?= base_url(); ?>driver/confirm/<?= $drv['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Terima" aria-label="Terima"><i class="fa-light fa-circle-check"></i></a>
                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Tolak" aria-label="Tolak"><i class="fa-regular fa-ban"></i></a>
                      </div>
                    </td>
                    </tr> 
                    <?php $i++;
                    }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Driver</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Layanan</th>
                        <th>Kota</th>
                        <th>Berkas</th>
                        <th>Saldo</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
          </table>
					</div>

				</div>
    </div>
</div>
</main>
<!--end page main-->
