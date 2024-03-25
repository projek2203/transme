 <!--start content-->
<main class="page-content">
<div class="card border shadow-none">
            <div class="card-header py-3">
                  <div class="row align-items-center g-3">
                        <div class="col-12 col-lg-6">
                            <h5 class="mb-0">Promo</h5>
                        </div>
                        <div class="col-12 col-lg-6 text-md-end">
                         <a href="<?= base_url(); ?>promo/tambah" class="btn btn-sm btn-primary me-2"><i class="bi bi-plus"></i>Tambah</a>
                        </div>
                  </div>
             </div>
				<div class="card">
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
					<div class="card-body">
						<div class="table-responsive">
                        <table id="promotable" class="table table-striped" style="width:100%">
								<thead>
									<tr>
                                        <th>Image</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Diskon</th>
                                        <th>Layanan</th>
                                        <th>Expired</th>
                                        <th>Minimal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach ($promocode as $prc): ?>
                                    <tr>
                                    <td class="align-middle">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border">
                                            <img src="<?= base_url('images/promo/') . $prc['image_promo']; ?>" alt="">
                                        </div>
                                    </div>
                                    </td>
                                    <td class="align-middle"><?= $prc['nama_promo']; ?></td>
                                    <td class="align-middle"><?= $prc['kode_promo']; ?></td>
                                    <?php if ($prc['type_promo'] == 'persen') { ?>
                                    <td class="align-middle"><?= $prc['nominal_promo']; ?>%</td>
                                        <?php } else { ?>
                                    <td class="align-middle">Rp<?= rupiah($prc['nominal_promo']) ?></td>
                                        <?php } ?>
                                   <td class="align-middle"><?= $prc['fitur']; ?></td>
                                   <td class="align-middle"><?= $prc['expired']; ?></td>
                                    <td class="align-middle">
                                    <?php if ($prc['minimal'] == 0) { ?>
                                        <label class="badge bg-danger">Tidak</label>
                                    <?php } else { ?>
                                        <label class="badge bg-success">Rp<?= rupiah($prc['minimal']) ?></label>
                                    <?php } ?>
                                    </td>
                                    <td class="align-middle">
                                    <?php if ($prc['status'] == 1) { ?>
                                        <label class="badge bg-success">Active</label>
                                    <?php } else { ?>
                                        <label class="badge bg-danger">Non Active</label>
                                    <?php } ?>
                                    </td>
                                    <td>
                                    <div class="d-flex align-items-center gap-2 fs-6">
                                        <a href="<?= base_url(); ?>promo/editpromocode/<?= $prc['id_promo']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ubah" aria-label="Ubah"><i class="fa-duotone fa-pen-to-square"></i></a>
                                        <a href="<?= base_url(); ?>promo/hapus/<?= $prc['id_promo']; ?>" class="text-danger" onclick="return confirm ('Apakah Yakin Ingin Menghapusnya ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-duotone fa-trash"></i></a>
                                    </div>
                                    </td>
                                    </tr>
                                    <?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
                                        <th>Image</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Diskon</th>
                                        <th>Layanan</th>
                                        <th>Expired</th>
                                        <th>Minimal</th>
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