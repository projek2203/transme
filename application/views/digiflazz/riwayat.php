<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Riwayat</h5>
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
                  <th>ID</th>
                  <th>Pelanggan</th>
                  <th>Reff</th>
                  <th>Produk</th>
                  <th>Kota</th>
                  <th>Harga Modal</th>
                  <th>Fee Admin</th>
                  <th>Harga Jual</th>
                  <th>Tujuan</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
                
              </thead>
              <tbody>
              <?php $i = 1;
              $rdgIds = array();
                foreach ($histori as $pkt)
                foreach ($brand as $pkt2)
                if (!in_array($pkt['id'], $rdgIds))
                { ?>
                <?php
                
                $jml = $pkt['harga'] + $pkt2['fee'];
                ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $pkt['id']; ?></td>
                <td><?= $pkt['fullnama']; ?></td>
                <td><?= $pkt['reffid']; ?></td>
                <td><?= $pkt['provider']; ?></td>
                <td><?= $pkt['kota']; ?></td>
                <td><?= $apps['app_currency'] ?><?= rupiah($pkt['harga']) ?></td>
                <td><?= $apps['app_currency'] ?><?= rupiah($pkt2['fee']) ?></td>
                <td><?= $apps['app_currency'] ?><?= rupiah($jml) ?></td>
                <td><?= $pkt['tujuan']; ?></td>
                <td>
                    <?php if ($pkt['status'] == 'Sukses') { ?>
                    <label class="badge bg-success">Sukses</label>
                    <?php } else if ($pkt['status'] == 'Gagal') { ?>
                    <label class="badge bg-danger">Gagal</label>
                    <?php } else { ?>
                    <label class="badge bg-primary">Pending</label>
                    <?php } ?>
                </td>
                <td><?= date("d-m-Y H:i:s", strtotime($pkt['tanggal'])); ?></td>
                </tr>
                <?php 
                $rdgIds[] = $pkt['id'];
                $i++;
                } ?>
              </tbody>
              <tfoot>
                <tr>
                <th>No</th>
                  <th>ID</th>
                  <th>Pelanggan</th>
                  <th>Reff</th>
                  <th>Produk</th>
                  <th>Kota</th>
                  <th>Harga Modal</th>
                  <th>Fee Admin</th>
                  <th>Harga Jual</th>
                  <th>Tujuan</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->
