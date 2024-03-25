<style>
  .text-truncate-container {
    width: 250px;
}
.text-truncate-container p {
    -webkit-line-clamp: 4;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-60"></i>
                ID: <?= $transaksi['id'] ?>
            </small>
        </h1>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <div class="my-1"><i class="fa-solid fa-user-vneck"></i><b class="text-600"> Driver :</b><?= $driver['nama_driver'] ?></div>
                            
                            <b><span class="text-sm text-grey-m2 align-middle">Pelanggan:</span></b>
                            <span class="text-600 text-110 text-blue align-middle"><?= $pelanggan['fullnama'] ?></span>
                            <?php if ($transaksi['home'] == '4') { ?>  
                            <br>
                            <b><span class="text-sm text-grey-m2 align-middle">Merchant:</span></b>
                            <span class="text-600 text-110 text-blue align-middle"><?= $merchant['nama_merchant'] ?></span>
                        <?php } ?>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                <b>Alamat Asal:</b><p><?= $transaksi['alamat_asal'] ?></p>
                            </div>
                            <div class="my-1">
                                <b> Alamat Tujuan:</b><p><?= $transaksi['alamat_tujuan'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                    <!-- or use a table instead -->
                    <?php if ($transaksi['home'] == '4') { ?>  
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-black">
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Jml</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                    foreach ($trxmerchant as $pkt) { ?>
                                     <tr></tr>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $pkt['nama_item']; ?></td>
                                    <td><?= $pkt['jumlah_item']; ?></td>
                                    <td>
                                    <?php if ($pkt['status_promo'] == '1') { ?>
                                        <?= $apps['app_currency'] ?>
                                        <?= rupiah($pkt['harga_promo']) ?>
                                    <?php }else{ ?>
                                        <?= $apps['app_currency'] ?>
                                        <?= rupiah($pkt['harga_item']) ?>
                                     <?php } ?>
                                    </td>
                                    <td>
                                        <?= $apps['app_currency'] ?>
                                        <?= rupiah($pkt['total_harga']) ?>
                                    </td>
                                    </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>  
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            <?php if ($transaksi['status'] == '2') { ?>
                                Setatus Transaksi : <label class="badge bg-primary"><?= $status['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($transaksi['status'] == '3') { ?>
                                Setatus Transaksi : <label class="badge bg-success"><?= $status['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($transaksi['status'] == '5') { ?>
                                Setatus Transaksi : <label class="badge bg-danger"><?= $status['status_transaksi']; ?></label>
                            <?php } ?>
                            <?php if ($transaksi['status'] == '4') { ?>
                                Setatus Transaksi : <label class="badge bg-info"><?= $status['status_transaksi']; ?></label>
                            <?php } ?>
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Layanan
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1"><?= $transaksi['fitur'] ?></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Ongkir
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $apps['app_currency'] ?>
                                    <?= rupiah($transaksi['harga']) ?></span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Diskon
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $apps['app_currency'] ?>
                                    <?= rupiah($transaksi['kredit_promo']) ?></span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Pembayaran
                                </div>
                                <div class="col-5">
                                    <?php if ($transaksi['pakai_wallet']) { ?>
                                        <span class="text-110 text-secondary-d1">
                                           SALDO
                                        </span>
                                    <?php }else{ ?>
                                        <span class="text-110 text-secondary-d1">
                                            TUNAI
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Total Biaya
                                </div>
                                <div class="col-5">
                                    <b><span class="text-150 text-success-d3 opacity-2"><?= $apps['app_currency'] ?>
                                    <?= rupiah($transaksi['biaya_akhir']) ?></span></b>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                </div>
            </div>
        </div>
    </div>
</div>