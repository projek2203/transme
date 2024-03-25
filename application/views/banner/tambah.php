<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Banner</h5>
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
        <?= form_open_multipart('banner/tambah'); ?>
            <div class="row mb-2">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Foto Banner</label>
                <div class="col-sm-9">
                    <input id="uploadProfile" type="file" class="form-control" name="foto" onchange="PreviewProfile();" data-max-file-size="3mb" required />
                </div>
            </div>
            <div class="row mb-2">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Masa Aktif</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="tanggal_berakhir" placeholder="Change date of Birth" required>
                </div>
            </div>
            <div class="row mb-2">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tipe</label>
                <div class="col-sm-9">
                    <select id="getFname" onchange="admSelectCheck(this);" class="form-control custom-select  mt-15" style="width:100%" name="type_promosi">
                            <option id="service" value="service">Service</option>
                            <option id="link" value="link">Link</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Atur</label>
                <div id="servicecheck" style="display:block;" class="col-sm-9">
                    <select class="form-control custom-select  mt-15" style="width:100%" name="fitur_promosi">
                        <?php foreach ($fitur as $ft) { ?>
                            <option value="<?= $ft['id_fitur'] ?>"><?= $ft['fitur'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="linkcheck" style="display:none;" class="col-sm-9">
                        <input type="text" class="form-control" id="linktes" name="link_promosi" placeholder="enter link">
                </div>
            </div>
            <div class="row mb-2">
                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select class="form-control custom-select  mt-15" name="is_show" style="width:100%">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
            <label id="llinkcheck" style="display:block;" for="link" class="col-sm-3 col-form-label">Kota</label>
            <div id="linkcheck" style="display:block;" class="col-sm-9">
                <input type="text" class="form-control" id="linktes" name="kota" placeholder="ketik all jika untuk umum" required>
            </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
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
                document.getElementById("servicecheck").style.display = "block";
                document.getElementById("linkcheck").style.display = "none";
            } else if (linkValue == nameSelect.value) {
                document.getElementById("linktes").required = true;
                document.getElementById("linkcheck").style.display = "block";
                document.getElementById("servicecheck").style.display = "none";
            }
        } else {
            document.getElementById("servicecheck").style.display = "block";
        }
    }
</script>