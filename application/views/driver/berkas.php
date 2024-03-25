
 <!--start content-->
 <main class="page-content">
<div class="card border shadow-none">
    <div class="card-header py-3">
         <div class="row align-items-center g-3">
            <div class="col-12 col-lg-6">
              <h5 class="mb-0">Nama Driver : <?= $driver['nama_driver']; ?></h5>
            </div>
        </div>
    </div>
    <div class="card">
	<div class="card-body">
      <!-- Hero Start -->
      <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                        <h6 class="mb-0 text-uppercase">Foto KTP [ <?= $driver['no_ktp']; ?> ]</h6>
                                <hr/>
                                <img src="<?= base_url('images/fotoberkas/ktp/') . $driver['foto_ktp']; ?>" class="square" width="512" height="256">
                                </br></br>
                                <h6 class="mb-0 text-uppercase">Foto SIM [ <?= $driver['id_sim']; ?> ]</h6>
                                <hr/>
                                <img src="<?= base_url('images/fotoberkas/sim/') . $driver['foto_sim']; ?>" class="square" width="512" height="256">
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->
    </div>
    </div>
</div>
</main>
<!--end page main-->
