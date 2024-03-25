
 <!--start content-->
 <main class="page-content">
<div class="card border shadow-none">
    <div class="card-header py-3">
         <div class="row align-items-center g-3">
            <div class="col-12 col-lg-6">
              <h5 class="mb-0">Saldo</h5>
            </div>
           
          </div>
    </div>
    <div class="card">
			<div class="card-body">
                <ul class="nav nav-tabs nav-success" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#newstab1" type="button" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="fa-solid fa-user-group font-18 me-1"></i></div>
                                <div class="tab-title">Topup</div>
                            </div>
                        </button>
                    </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#newstab2" type="button" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="fa-solid fa-user-large font-18 me-1"></i></div>
                        <div class="tab-title">Withdraw</div>
                    </div>
                    </button>
                </li>
                </ul>
        <div class="tab-content py-3">
		    <div class="tab-pane fade show active" id="newstab1" role="tabpanel">
                <table id="wttable1" class="table table-striped" data-info="false" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Akun</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Atas Nama</th>
                        <th>Rekening</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($wallet as $wlt) {
                    if ($wlt['type'] == 'topup' || $wlt['type'] == 'Topup') { ?>
                    <tr>
                    <td><?= $i ?></td>
     
                    <?php $caracter = substr($wlt['id_user'], 0, 1);
                    if ($caracter == 'P') { ?>
                    <td>Customer</td>
                    <?php } elseif ($caracter == 'M') { ?>
                    <td>Mitra</td>
                    <?php } else { ?>
                    <td>Driver</td>
                    <?php } ?>
                    <td><?= $wlt['nama_driver'] ?><?= $wlt['fullnama'] ?><?= $wlt['nama_mitra'] ?></td>
                    <td><?= $currency['app_currency'] ?><?= rupiah($wlt['jumlah']) ?></td>
                    <td><?= $wlt['bank'] ?></td>
                    <td><?= $wlt['nama_pemilik'] ?></td>
                    <?php if ($wlt['bank'] == 'QRIS') { ?>
                    <td>"QR CODE"</td>
                    <?php } else { ?>
                    <td><?= $wlt['rekening'] ?></td>
                    <td><?= date("d/m/Y", strtotime($wlt['waktu'])) ?></td>
                    <?php } ?>
                    <?php if ($wlt['status'] == '0') { ?>
                    <td>
                    <label class="badge bg-secondary text-dark">Ditunda</label>
                    </td>
                    <?php }
                    if ($wlt['status'] == '1') { ?>
                    <td>
                    <label class="badge bg-success">Berhasil</label>
                    </td>
                    <?php }
                    if ($wlt['status'] == '2') { ?>
                    <td>
                    <label class="badge bg-danger">Dibatalkan</label>
                    </td>
                    <?php } ?>
                    <td>
                    <?php if ($wlt['status'] == '0') { ?>
                    <a href="<?= base_url(); ?>saldo/tconfirm/<?= $wlt['id'] ?>/<?= $wlt['id_user'] ?>/<?= $wlt['jumlah'] ?>">
                    <button class="btn btn-primary">Konfirmasi</button></a>
                    <a href="<?= base_url(); ?>saldo/tcancel/<?= $wlt['id'] ?>/<?= $wlt['id_user'] ?>">
                    <button onclick="return confirm ('Are You Sure?')" class="btn btn-danger">Batal</button></a>
                    <?php } else { ?>
                    <span class="btn btn-muted">Selesai</span>
                    <?php } ?>
                    </td>
                    </tr>
                    <?php $i++;
                    }
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No.</th>
                        <th>Akun</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Atas Nama</th>
                        <th>Rekening</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
		    </div>
					
            <div class="tab-pane fade" id="newstab2" role="tabpanel">
            <table id="wttable2" class="table table-striped" data-info="false" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Akun</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Atas Nama</th>
                        <th>Rekening</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($wallet as $wlt) {
                    if ($wlt['type'] == 'withdraw') { ?>
                    <tr>
                    <td><?= $i ?></td>
     
                    <?php $caracter = substr($wlt['id_user'], 0, 1);
                    if ($caracter == 'P') { ?>
                    <td>Customer</td>
                    <?php } elseif ($caracter == 'M') { ?>
                    <td>Mitra</td>
                    <?php } else { ?>
                    <td>Driver</td>
                    <?php } ?>
                    <td><?= $wlt['nama_driver'] ?><?= $wlt['fullnama'] ?><?= $wlt['nama_mitra'] ?></td>
                    <td><?= $currency['app_currency'] ?><?= rupiah($wlt['jumlah']) ?></td>
                    <td><?= $wlt['bank'] ?></td>
                    <td><?= $wlt['nama_pemilik'] ?></td>
                    <?php if ($wlt['bank'] == 'QRIS') { ?>
                    <td>"QR CODE"</td>
                    <?php } else { ?>
                    <td><?= $wlt['rekening'] ?></td>
                    <td><?= date("d/m/Y", strtotime($wlt['waktu'])) ?></td>
                    <?php } ?>
                    <?php if ($wlt['status'] == '0') { ?>
                    <td>
                    <label class="badge bg-secondary text-dark">Ditunda</label>
                    </td>
                    <?php }
                    if ($wlt['status'] == '1') { ?>
                    <td>
                    <label class="badge bg-success">Berhasil</label>
                    </td>
                    <?php }
                    if ($wlt['status'] == '2') { ?>
                    <td>
                    <label class="badge bg-danger">Dibatalkan</label>
                    </td>
                    <?php } ?>
                    <td>
                    <?php if ($wlt['status'] == '0') { ?>
                    <a href="<?= base_url(); ?>saldo/wdconfirm/<?= $wlt['id'] ?>/<?= $wlt['id_user'] ?>/<?= $wlt['jumlah'] ?>">
                    <button class="btn btn-primary">Konfirmasi</button></a>
                    <a href="<?= base_url(); ?>saldo/tcancel/<?= $wlt['id'] ?>/<?= $wlt['id_user'] ?>">
                    <button onclick="return confirm ('Are You Sure?')" class="btn btn-danger">Batal</button></a>
                    <?php } else { ?>
                    <span class="btn btn-muted">Selesai</span>
                    <?php } ?>
                    </td>
                    </tr>
                    <?php $i++;
                    }
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No.</th>
                        <th>Akun</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Atas Nama</th>
                        <th>Rekening</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
	</div>
</div>
</main>
<!--end page main-->