<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dashtable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            columnDefs: [
              {className: "td-text-center", targets: "_all"},
              {width    : "250px", targets: [2, 3]},
              {width    : "5px", targets: [0, 1, 4, 5, 6, 7,8]}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#dashtable_wrapper .col-md-6:eq(0)' );
    } );
});
</script>
   <!--start content-->
   <main class="page-content">
              
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
              <div class="col">
                <div class="card radius-10 bg-primary">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Total Merchant</p>
                        <h4 class="mb-0 text-white"><?= count($mitra); ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bag-check-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-success">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Total Pelanggan</p>
                        <h4 class="mb-0 text-white"><?= count($user); ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-person-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-pink">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Total Driver</p>
                        <h4 class="mb-0 text-white"><?= count($hitungdriver); ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-person-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-orange">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Transaksi</p>
                        <h4 class="mb-0 text-white"><?= count($semuatrx); ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bar-chart-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-orange">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Hari Ini</p>
                        <h4 class="mb-0 text-white"><?= $currency['app_currency'] ?><?= rupiah($pendapatan_harian) ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bar-chart-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-warning">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Bulan Ini</p>
                        <h4 class="mb-0 text-white"><?= $currency['app_currency'] ?><?= rupiah($pendapatan_bulanan) ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bar-chart-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-success">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Tahun Ini</p>
                        <h4 class="mb-0 text-white"><?= $currency['app_currency'] ?><?= rupiah($pendapatan_tahunan) ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bar-chart-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col">
                <div class="card radius-10 bg-dark">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="mb-1 text-white">Pendapatan Aplikasi</p>
                        <h4 class="mb-0 text-white"><?= $currency['app_currency'] ?><?= rupiah($pendapatan_aplikasi) ?></h4>
                      </div>
                      <div class="ms-auto widget-icon bg-white-1 text-white">
                        <i class="bi bi-bar-chart-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
              </div><!--end row-->


  
              <div class="row">
                <div class="col-12 col-lg-8 col-xl-8 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-body">
                       <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                          <div class="col">
                            <h5 class="mb-0">Transaksi Bulanan</h5>
                          </div>
                       </div>
                       <div id="dashboardchart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                      <div class="row g-3 align-items-center">
                        <div class="col">
                          <h5 class="mb-0">Statistik</h5>
                        </div>
                       </div>
                    </div>
                    <div class="card-body">
                      <div id="dashboardstatic"></div>
                    </div>
                    <ul class="list-group list-group-flush mb-0">
                      <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Baru<span class="badge bg-primary badge-pill"><?= count($trxproses) ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Batal<span class="badge bg-danger badge-pill"><?= count($trxbatal) ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Selesai<span class="badge bg-success badge-pill"><?= count($trxsukses) ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><!--end row-->

              <!-- Transaksi -->
              <div class="card">
              <div class="card-header bg-transparent">
                      <div class="row g-3 align-items-center">
                        <div class="col">
                          <h5 class="mb-0">Transaksi</h5>
                        </div>
                       </div>
                    </div>
                <div class="card-body">
                <div class="card-body">
                  <?php if ($this->session->flashdata('demo') or $this->session->flashdata('gagal')) : ?>
                  <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('demo'); ?>
                  <?php echo $this->session->flashdata('gagal'); ?>
                  </div>
              <?php endif; ?>
              <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('sukses')) : ?>
                  <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('ubah'); ?>
                  <?php echo $this->session->flashdata('sukses'); ?>
                  </div>
              <?php endif; ?>
                <table id="dashboard-trx" class="table table-striped" data-info="false" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                      <th>#ID</th>
                      <th>Fitur</th>
                      <th>Pelanggan</th>
                      <th>Driver</th>
                      <th>Layanan</th>
                      <th>Biaya</th>
                      <th>Metode</th>
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
                    <td><?= $tr['fullnama'] ?></td>
                    <td><?= $tr['nama_driver'] ?></td>
                    <td><span class="badge bg-primary"><?= $tr['fitur']; ?></span></td>
                    <td><?= $currency['app_currency'] ?><?= rupiah($tr['biaya_akhir']) ?></td>
                    <td>
                    <?php if ($tr['pakai_wallet'] == '0'): ?>
                    <span class="badge bg-orange">Tunai</span>
                    <?php else: ?>
                    <span class="badge bg-success">Saldo</span>
                    <?php endif ?>
                    </td>
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
                      <a href="<?= base_url(); ?>dashboard/cancletransaction/<?= $tr['id_transaksi']; ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Batalkan" onclick="return confirm('Apakah Kamu Ingin Membatalkan Transaksi ?')" aria-label="Batalkan"><i class="bi bi-x-square-fill"></i></a> 
                      <a href="<?= base_url(); ?>dashboard/dashboarddelete/<?= $tr['id_transaksi']; ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" onclick="return confirm('Apakah Kamu Ingin Menghapus Transaksi ?')" aria-label="Hapus"><i class="bi bi-trash-fill"></i></i></a> 
                      <?php if ($tr['status'] == '3') { ?>
                        <a href="<?= base_url(); ?>dashboard/dashboardselesai/<?= $tr['id_driver']; ?>/<?= $tr['id_transaksi']; ?>/<?= $tr['token']; ?>/<?= $tr['reg_id']; ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Selesai" onclick="return confirm('Apakah Kamu Ingin Menyelesaikan Transaksi ?')" aria-label="Selesai"><i class="fa-duotone fa-circle-check"></i></i></a> 
                      <?php } ?>
                      <a href="http://maps.google.com/maps?saddr=<?= $tr['start_latitude']; ?>,<?= $tr['start_longitude']; ?>&daddr=<?= $tr['end_latitude']; ?>,<?= $tr['end_longitude']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Buka Map" aria-label="Buka Map"><i class="bi bi-map-fill"></i></a> 
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
                      <th>Layanan</th>
                      <th>Biaya</th>
                      <th>Metode</th>
                      <th>Status</th>
                      <th>Waktu</th>
                      <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <!-- End Transaksi -->

            </main>
         <!--end page main-->
  