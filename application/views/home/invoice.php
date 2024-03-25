<style>
.textline {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>
<!-- Hero Start -->
<section class="bg-half-260 d-table w-100">
    <div class="bg-overlay bg-gradient-primary opacity-8"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <div class="invoice-top pb-4 border-bottom">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="logo-invoice mb-2"><?= $apps['app_name'] ?><span class="text-primary">.</span></div>
                                <a href="javascript:void(0)" class="text-primary h6"><i data-feather="link" class="fea icon-sm text-muted me-2"></i><?= $apps['app_website'] ?></a>
                            </div><!--end col-->
                            
                            <div class="col-md-4 mt-4 mt-sm-0">
                                <?php if ($transaksi['home'] == 4) { ?>
                                <h5>Merchant : <?= $transaksi['nama_merchant'] ?></h5>
                                <?php } else { ?>
                                    <h5>Info Pemesan :</h5>
                                <?php } ?>
                                <dl class="row mb-0">
                                    <dt class="col-2 text-muted"><i class="fa-solid fa-location-dot"></i></dt>
                                    <dd class="col-10 text-muted">
                                        <?php if ($transaksi['home'] == 4) { ?>
                                            <p class="textline"></i><?= $transaksi['alamat_merchant'] ?></p>
                                        <?php } else { ?>
                                            <p class="textline"></i><?= $transaksi['alamat_asal'] ?></p>
                                        <?php } ?>
                                    </dd>
                                    <?php if ($transaksi['home'] == 4) { ?>
                                        <h5>Pemesan :</h5>
                                    <?php } ?>
                                    <dt class="col-2 text-muted"><i class="fa-solid fa-square-user"></i></dt>
                                    <dd class="col-10 text-muted">
                                        <p class="mb-0"></i><?= $transaksi['fullnama'] ?></p>
                                    </dd>
                            
                                    <dt class="col-2 text-muted"><i class="fa-solid fa-square-phone"></i></dt>
                                    <dd class="col-10 text-muted">
                                        <a href="tel:+152534-468-854" class="text-muted">+<?= $transaksi['telepon_pelanggan'] ?></a>
                                    </dd>
                                </dl>
                            </div><!--end col-->
                        </div><!--end row-->
                        </div>
                            
                        <div class="invoice-middle py-4">
                        <h5>Detail Transaksi :</h5>
                        <div class="row mb-0">
                            <div class="col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">ID Transaksi. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">#<?= $transaksi['id_transaksi'] ?></dd>

                                    <dt class="col-md-3 col-5 fw-normal">Layanan. :</dt>
                                    <dd class="col-md-9 col-7 text-muted"><?= $transaksi['fitur'] ?></dd>
                                    
                                    <dt class="col-md-3 col-5 fw-normal">Driver :</dt>
                                    <dd class="col-md-9 col-7 text-muted"><?= $transaksi['nama_driver'] ?></dd>
                                    
                                    <dt class="col-md-3 col-5 fw-normal">Diantar Ke :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        <p class="textline"><?= $transaksi['alamat_tujuan'] ?></p>
                                    </dd>
                                    
                                    <dt class="col-md-3 col-5 fw-normal">Kontak :</dt>
                                    <dd class="col-md-9 col-7 text-muted">+<?= $transaksi['no_telepon'] ?></dd>
                                </dl>
                            </div>
                            
                            <div class="col-md-4 order-md-2 order-1 mt-2 mt-sm-0">
                                <dl class="row mb-0">
                                    <dt class="col-md-4 col-5 fw-normal">Tanggal :</dt>
                                    <dd class="col-md-8 col-7 text-muted"><?= date("d M Y", strtotime($transaksi['waktu'])) ?></dd>
                                </dl>
                            </div>
                        </div>
                        </div>
                       
                        <div class="invoice-table pb-4">
                        <?php if ($transaksi['home'] == 4) { ?>
                          <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center invoice-tb">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="border-bottom text-start">Layanan</th>
                                            <th scope="col" class="border-bottom">Item</th>
                                            <th scope="col" class="border-bottom">Jumlah</th>
                                            <th scope="col" class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-start"><?= $transaksi['fitur'] ?></td>
                                            <td>
                                                <?php foreach ($transitem as $item) { ?>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><?= $item['nama_item'] ?></li>
                                                    </ul>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php foreach ($transitem as $item) { ?>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><?= $item['jumlah_item'] ?></li>
                                                    </ul>
                                                <?php } ?>
                                            </td>
                                            <td class="text-right">
                                                    <?php foreach ($transitem as $item) { ?>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <?php if ($item['status_promo'] == 1) { ?>
                                                                    <?= $currency['app_currency'] ?><?= rupiah($item['harga_promo']) ?>
                                                                <?php } else { ?>
                                                                    <?= $currency['app_currency'] ?><?= rupiah($item['harga_item']) ?>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>
                                                    <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?> 
                        <div class="row">
                            <div class="col-lg-4 col-md-5 ms-auto">
                                <ul class="list-unstyled h6 fw-normal mt-4 mb-0 ms-md-5 ms-lg-4">
                                    <li class="text-muted d-flex justify-content-between">Ongkir :<span><?= $currency['app_currency'] ?><?= rupiah($transaksi['harga']) ?></span></li>
                                    <?php if ($transaksi['home'] == 4) { ?>
                                        <li class="text-muted d-flex justify-content-between">Biaya :<span><?= $currency['app_currency'] ?><?= rupiah($transaksi['total_belanja']) ?></span></li>
                                    <?php } ?>
                                    <li class="text-muted d-flex justify-content-between">Potongan :<span><?= $currency['app_currency'] ?><?= rupiah($transaksi['kredit_promo']) ?></span></li>
                                    <li class="d-flex justify-content-between">Total :<span><?= $currency['app_currency'] ?><?= rupiah($transaksi['biaya_akhir']) ?></span></li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                        </div>
                            
                        <div class="invoice-footer border-top pt-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-sm-start text-muted text-center">
                                    <h6 class="mb-0">Customer Services : <a href="tel:<?= $apps['app_contact'] ?>" class="text-warning"><?= $apps['app_contact'] ?></a></h6>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="text-sm-end text-muted text-center">
                                    <h6 class="mb-0"><a href="page-terms.html" target="_blank" class="text-primary">Terms & Conditions</a></h6>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero End -->