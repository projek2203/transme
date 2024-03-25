<!-- Hero Start -->
<section class="bg-half-260 d-table w-100" style="background: url('<?= base_url(); ?>homeasset/images/hosting/bg.png') center center;" id="home">
            <div class="bg-overlay bg-gradient-primary opacity-8"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-12">
                        <div class="title-heading text-center">
                            <h1 class="heading title-dark text-white mb-3">Cari Transaksi</h1>
                            <p class="para-desc para-dark mx-auto text-white-50">Kamu Bisa Mencari Transaksi Kamu Disini.</p>
                                <?php if ( $this->session->flashdata('gagal') == 'gagal') : ?>
                                    <div class="alert bg-soft-danger fw-medium" role="alert"> <i class="uil uil-info-circle fs-5 align-middle me-1"></i> Transaksi Tidak Ditemukan </div>
                                <?php endif; ?>
                            <div class="text-center subcribe-form mt-4 pt-2">
                                <?= form_open_multipart('home/invoice'); ?>
                                    <input type="text" id="idtrx" name="idtrx" class="rounded-pill bg-white-50 border" placeholder="ID Transaksi :">
                                    <button type="submit" class="btn btn-pills btn-primary">Cari <i class="uil uil-arrow-right"></i></button>
                                <?= form_close(); ?><!--end form-->
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container--> 
</section><!--end section-->