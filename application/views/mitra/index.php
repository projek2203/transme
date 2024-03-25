<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Mitra</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata('tambah') or $this->session->flashdata('ubah')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('tambah'); ?>
                <?php echo $this->session->flashdata('ubah'); ?>
            </div>
        <?php endif; ?>
            <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('demo'); ?>
                <?php echo $this->session->flashdata('hapus'); ?>
            </div>
        <?php endif; ?>
        <!-- Konten -->
        <!-- Navtab -->
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
                <div class="tab-icon"><i class="fa-solid fa-user-clock font-18 me-1"></i></div>
                <div class="tab-title">Baru</div>
              </div>
            </button>
          </li>
        </ul>
        <!-- End Navtab -->
        <!-- Konten Nav -->
        <div class="tab-content py-3">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                <table id="dtable" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                         
                        foreach ($mitra as $mtr) {
                        
                        if ($mtr['status_mitra'] != 0) { ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td><?= $mtr['id_mitra'] ?></td>
                        <td>
                        <img src="<?= base_url('images/merchant/') . $mtr['foto_merchant']; ?>" class="rounded-circle" width="50" height="50">
                        </td>
                        <td><?= $mtr['nama_merchant'] ?></td>
                        <td><?= $mtr['telepon_mitra'] ?></td>
                        <td><?= $mtr['nama_mitra'] ?></td>
                        <td><?= $mtr['fitur'] ?></td>
                        <td><?= $mtr['nama_kategori'] ?></td>
                        <td><?= $mtr['kota'] ?></td>
                        <td>
                        <?php if ($mtr['status_mitra'] == 3) { ?>
                        <label class="badge bg-dark">Diblokir</label>
                        <?php } else { ?>
                        <label class="badge bg-primary">Aktif</label>
                        <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3 fs-6">
                                <a href="<?= base_url(); ?>merchant/detail/<?= $mtr['id_mitra'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Detail" aria-label="Detail"><i class="fa-solid fa-eye"></i></a>
                                <a href="<?= base_url(); ?>saldo/saldomitra/<?= $mtr['id_mitra'] ?>" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Tambah Saldo" aria-label="Tambah Saldo"><i class="fa-duotone fa-money-bill"></i></a>
                                <?php
                                if ($mtr['status_mitra'] == 1) { ?>
                                <a href="?= base_url(); ?>merchant/block/<?= $mtr['id_mitra'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Blokir" aria-label="Blokir"><i class="fa-solid fa-lock"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url(); ?>merchant/unblock/<?= $mtr['id_mitra'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Unblokir" aria-label="Unblokir"><i class="fa-solid fa-unlock"></i></a>
                                <?php } ?>
                                <a href="<?= base_url(); ?>merchant/hapus/<?= $mtr['id_mitra'] ?>>" onclick="return confirm ('Apa Kamu Yakin ?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                        </tr> 
                        <?php $i++;
                        }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- tab 2 -->
            <div class="tab-pane fade show" id="tab2" role="tabpanel">
                <table id="dtable2" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                        foreach ($mitra as $mtr) {
                        
                        if ($mtr['status_mitra'] == 1) { ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td><?= $mtr['id_mitra'] ?></td>
                        <td>
                        <img src="<?= base_url('images/merchant/') . $mtr['foto_merchant']; ?>" class="rounded-circle" width="50" height="50">
                        </td>
                        <td><?= $mtr['nama_merchant'] ?></td>
                        <td><?= $mtr['telepon_mitra'] ?></td>
                        <td><?= $mtr['nama_mitra'] ?></td>
                        <td><?= $mtr['fitur'] ?></td>
                        <td><?= $mtr['nama_kategori'] ?></td>
                        <td><?= $mtr['kota'] ?></td>
                        <td>
                        <?php if ($mtr['status_mitra'] == 3) { ?>
                        <label class="badge bg-dark">Diblokir</label>
                        <?php } else { ?>
                        <label class="badge bg-primary">Aktif</label>
                        <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($mtr['status_mitra'] == 1) { ?>
                                <a href="<?= base_url(); ?>merchant/block/<?= $mtr['id_mitra'] ?>"><button class="btn btn-dark text-red mr-2">Block</button></a>
                            <?php } else { ?>
                             <a href="<?= base_url(); ?>merchant/unblock/<?= $mtr['id_mitra'] ?>"><button class="btn btn-success text-red mr-2">Unblock</button></a>
                            <?php } ?>
                                <a href="<?= base_url(); ?>merchant/hapus/<?= $mtr['id_mitra'] ?>">
                                <button onclick="return confirm ('Are you sure want to delete this Partner?')" class="btn btn-danger text-red mr-2">Delete</button>
                                </a>
                            </td>
                        </tr> 
                        <?php $i++;
                        }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- tab 3 -->
            <div class="tab-pane fade show" id="tab3" role="tabpanel">
                <table id="dtable3" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                        foreach ($mitra as $mtr) {
                         
                        if ($mtr['status_mitra'] == 3) { ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td><?= $mtr['id_mitra'] ?></td>
                        <td>
                        <img src="<?= base_url('images/merchant/') . $mtr['foto_merchant']; ?>" class="rounded-circle" width="50" height="50">
                        </td>
                        <td><?= $mtr['nama_merchant'] ?></td>
                        <td><?= $mtr['telepon_mitra'] ?></td>
                        <td><?= $mtr['nama_mitra'] ?></td>
                        <td><?= $mtr['fitur'] ?></td>
                        <td><?= $mtr['nama_kategori'] ?></td>
                        <td><?= $mtr['kota'] ?></td>
                        <td>
                        <?php if ($mtr['status_mitra'] == 3) { ?>
                        <label class="badge bg-dark">Diblokir</label>
                        <?php } else { ?>
                        <label class="badge bg-primary">Aktif</label>
                        <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($mtr['status_mitra'] == 1) { ?>
                                <a href="<?= base_url(); ?>merchant/block/<?= $mtr['id_mitra'] ?>"><button class="btn btn-dark text-red mr-2">Block</button></a>
                            <?php } else { ?>
                             <a href="<?= base_url(); ?>merchant/unblock/<?= $mtr['id_mitra'] ?>"><button class="btn btn-success text-red mr-2">Unblock</button></a>
                            <?php } ?>
                                <a href="<?= base_url(); ?>merchant/hapus/<?= $mtr['id_mitra'] ?>">
                                <button onclick="return confirm ('Are you sure want to delete this Partner?')" class="btn btn-danger text-red mr-2">Delete</button>
                                </a>
                            </td>
                        </tr> 
                        <?php $i++;
                        }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- tab 4 -->
            <div class="tab-pane fade show" id="tab4" role="tabpanel">
                <table id="dtable4" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                        foreach ($mitra as $mtr) {
                         
                        if ($mtr['status_mitra'] == 0) { ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td><?= $mtr['id_mitra'] ?></td>
                        <td>
                        <img src="<?= base_url('images/merchant/') . $mtr['foto_merchant']; ?>" class="rounded-circle" width="50" height="50">
                        </td>
                        <td><?= $mtr['nama_merchant'] ?></td>
                        <td><?= $mtr['telepon_mitra'] ?></td>
                        <td><?= $mtr['nama_mitra'] ?></td>
                        <td><?= $mtr['fitur'] ?></td>
                        <td><?= $mtr['nama_kategori'] ?></td>
                        <td><?= $mtr['kota'] ?></td>
                        <td><label class="badge bg-primary">Baru</label></td>
                        <td>
                            <?php
                            if ($mtr['status_mitra'] == 0) { ?>
                                <a href="<?= base_url(); ?>merchant/confirmmitra/<?= $mtr['id_mitra'] ?>"><button class="btn btn-success mr-2">Konfirmasi</button></a>
                            <?php }  ?>
                            <a href="<?= base_url(); ?>merchant/hapus/<?= $mtr['id_mitra'] ?>">
                                <button onclick="return confirm ('Are you sure want to delete this Partner?')" class="btn btn-danger text-red mr-2">Tolak</button>
                            </a>
                        </td>
                        </tr> 
                        <?php $i++;
                        }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pemilik</th>
                        <th>Layanan</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- End Konten Nav -->
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->