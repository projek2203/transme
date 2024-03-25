<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Ubah Banner</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata('demo')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('demo'); ?>
            </div>
        <?php endif; ?>
        <!-- Konten -->
        <?= form_open_multipart('banner/ubah/' . $id); ?>
        <input type="hidden" name="id" value='<?= $id ?>'>
        <div class="row mb-2">
            <label for="birthdate" class="col-sm-3 col-form-label">Foto Banner</label>
            <div class="col-sm-9">
                <input type="hidden" name=" id " value=<?= $id ?>>
                <input type="file" class="form-control" name="foto" data-max-file-size="3mb" data-default-file="<?= base_url('images/promo/') . $foto ?>" />
            </div>
        </div>
        <div class="row mb-2">
            <label for="birthdate" class="col-sm-3 col-form-label">Masa Aktif</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="birthdate" name="tanggal_berakhir" value="<?= $tanggal_berakhir ?>">
            </div>
        </div>
        <div class="row mb-2">
            <label for="type" class="col-sm-3 col-form-label">Tipe</label>
            <div class="col-sm-9">
            <select id="getFname" onchange="admSelectCheck(this);" class="form-control custom-select  mt-15" style="width:100%" name="type_promosi">
                <option id="service" value="service" <?php if ($type_promosi == 'service') { ?>selected<?php } ?>>Service</option>
                <option id="link" value="link" <?php if ($type_promosi == 'link') { ?>selected<?php } ?>>Link</option>
            </select>
            </div> 
        </div>
        <?php if ($type_promosi == 'service') {  ?>
        <div class="row mb-2">
            <label id="lservicecheck" style="display:block;" for="fitur_promosi" class="col-sm-3 col-form-label">Fitur</label>
            <div id="servicecheck" style="display:block;" class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="fitur_promosi">
                    <?php foreach ($fitur as $ftr) { ?>
                    <option value="<?= $ftr['id_fitur'] ?>" <?php if ($fitur_promosi == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <label id="llinkcheck" style="display:none;" for="link" class="col-sm-3 col-form-label">Link</label>
            <div id="linkcheck" style="display:none;" class="col-sm-9">
                <input type="text" class="form-control" id="linktes" name="link_promosi" placeholder="enter link">
            </div>
        </div>
        <?php } else { ?>
        <div class="row mb-2">
            <label id="lservicecheck" style="display:none;" for="fitur_promosi" class="col-sm-3 col-form-label">Service</label>
            <div id="servicecheck" style="display:none;" class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="fitur_promosi">
                <?php foreach ($fitur as $ftr) { ?>
                    <option value="<?= $ftr['id_fitur'] ?>" <?php if ($fitur_promosi == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                <?php } ?>
                </select>
            </div>   
        </div>
        <div class="row mb-2">
            <label id="llinkcheck" style="display:block;" for="link" class="col-sm-3 col-form-label">Link</label>
            <div id="linkcheck" style="display:block;" class="col-sm-9">
                <input type="text" class="form-control" id="linktes" name="link_promosi" value="<?= $link_promosi ?>" required>
            </div>
        </div>
        
        <?php } ?>
        <div class="row mb-2">
            <label id="llinkcheck" style="display:block;" for="link" class="col-sm-3 col-form-label">Kota</label>
            <div id="linkcheck" style="display:block;" class="col-sm-9">
                <input type="text" class="form-control" id="linktes" name="kota" placeholder="ketik all jika untuk umum" value="<?= $lokasi ?>" required>
            </div>
        </div>
        <div class="row mb-2">
            <label for="gender" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" name="is_show" style="width:100%">
                    <option value="1" <?php if ($is_show == '1') { ?>selected<?php } ?>>Aktif</option>
                    <option value="0" <?php if ($is_show == '0') { ?>selected<?php } ?>>Nonaktif</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->
<script>
    function admSelectCheck(nameSelect) {
        console.log(nameSelect);
        if (nameSelect) {
            serviceValue = document.getElementById("service").value;
            linkValue = document.getElementById("link").value;
            if (serviceValue == nameSelect.value) {
                document.getElementById("linktes").required = false;
                document.getElementById("lservicecheck").style.display = "block";
                document.getElementById("llinkcheck").style.display = "none";
                document.getElementById("servicecheck").style.display = "block";
                document.getElementById("linkcheck").style.display = "none";
            } else if (linkValue == nameSelect.value) {
                document.getElementById("linktes").required = true;
                document.getElementById("llinkcheck").style.display = "block";
                document.getElementById("lservicecheck").style.display = "none";
                document.getElementById("linkcheck").style.display = "block";
                document.getElementById("servicecheck").style.display = "none";
            }
        } else {
            <?php if ($type_promosi == 'service') {  ?>
                document.getElementById("llinkcheck").style.display = "none";
                document.getElementById("lservicecheck").style.display = "block";
                document.getElementById("linkcheck").style.display = "none";
                document.getElementById("servicecheck").style.display = "block";
            <?php } else { ?>
                document.getElementById("llinkcheck").style.display = "block";
                document.getElementById("lservicecheck").style.display = "none";
                document.getElementById("linkcheck").style.display = "block";
                document.getElementById("servicecheck").style.display = "none";
            <?php } ?>
        }
    }
</script>