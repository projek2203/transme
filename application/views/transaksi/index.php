<!--start content-->
<main class="page-content">
          <div class="card border shadow-none">
             <div class="card-header py-3">
                  <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Transaksi</h5>
                    </div>
                  </div>
             </div>
            <div class="card-body">
              <!-- Konten -->
              <div class="table-responsive">
				<table id="dashtable2" class="table table-striped" style="width:100%">
				<thead>
				<tr>
                <th>#ID</th>
                <th>Fitur</th>
                <th>Pelanggan</th>
                <th>Driver</th>
                <th>Metode</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Aksi</th>
				</tr>
				</thead>
				<tbody>
                <?php foreach ($transaksi as $tr): ?>
                <tr class="align-middle">
                <td>#<?= $tr['id_transaksi'] ?></td>
                <td>
                <div class="d-flex align-items-center gap-3">
                <div class="product-box border">
                <img style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" src="<?= base_url('images/fitur/') . $tr['icon']; ?>" alt="">
                </div>
                </div>
                </td>
                <td><?= $tr['fullnama'] ?></td>
                <td><?= $tr['nama_driver'] ?></td>
                <td>
                <?php if ($tr['pakai_wallet'] == '0'): ?>
                <span class="badge bg-orange">Tunai</span>
                <?php else: ?>
                <span class="badge bg-success">Saldo</span>
                <?php endif ?>
                </td>
                <td><?= $currency['app_currency'] ?><?= rupiah($tr['biaya_akhir']) ?></td> 
                <td>
                <?php if ($tr['status'] == '2') { ?>
                <span class="badge bg-primary"><?= $tr['status_transaksi']; ?></span>
                <?php } ?>
                <?php if ($tr['status'] == '3') { ?>
                <span class="badge bg-success"><?= $tr['status_transaksi']; ?></span>
                <?php } ?>
                <?php if ($tr['status'] == '5') { ?>
                <span class="badge bg-danger"><?= $tr['status_transaksi']; ?></span>
                <?php } ?>
                <?php if ($tr['status'] == '4') { ?>
                <span class="badge bg-info"><?= $tr['status_transaksi']; ?></span>
                <?php } ?>
                </td>
                <td><?= date("d-m-Y", strtotime($tr['waktu'])); ?></td>
                <td>
                  <div class="d-flex align-items-center gap-2 fs-6">
                    <?php foreach ($akses as $aks): ?>
                    <?php if ($aks['kode'] == 'dashboard_hapus'): ?>
                    <a href="<?= base_url(); ?>dashboard/delete/<?= $tr['id_transaksi']; ?>" class="text-danger" data-bs-toggle="tooltip" onclick="return confirm('Apakah Kamu Ingin Menghapus Transaksi ?')" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-duotone fa-trash"></i></a> 
                    <?php endif ?>
                    <?php endforeach ?>
                    <a href="http://maps.google.com/maps?saddr=<?= $tr['start_latitude']; ?>,<?= $tr['start_longitude']; ?>&daddr=<?= $tr['end_latitude']; ?>,<?= $tr['end_longitude']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Buka Map" aria-label="Buka Map"><i class="fa-duotone fa-map-location"></i></a> 
                  </div>
                </td>
                </tr>
                <?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
                  <th>#ID</th>
                  <th>Fitur</th>
                  <th>Pelanggan</th>
                  <th>Driver</th>
                  <th>Metode</th>
                  <th>Biaya</th>
                  <th>Status</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
									</tr>
								</tfoot>
							</table>
						</div>
              <!-- End Konten -->
             </div>
           </div>
</main>
<!--end page main-->