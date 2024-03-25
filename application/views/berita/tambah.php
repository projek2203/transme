<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Tambah Berita</h5>
                    </div>
                </div>
            </div>
        <div class="card-body">
        <?php if ($this->session->flashdata()) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $this->session->flashdata('demo'); ?>
            </div>
          <?php endif; ?>
        <!-- Konten -->
        <?= form_open_multipart('berita/tambah'); ?>
        <div class="row mb-3">
            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Foto Berita</label>
            <div class="col-sm-9">
                <input id="uploadProfile" type="file" class="form-control" name="foto_berita" onchange="PreviewProfile();" data-max-file-size="3mb" required />
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title" <?php if ($_POST != NULL) { ?> value="<?= $_POST['title']; ?>" <?php } ?> placeholder="Judul Berita" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-9">
            <select class="form-control" style="width:100%" name="id_kategori" id = "id_kategori" >
              <?php foreach ($news as $nw) { ?>
                <option value="<?= $nw['id_kategori_news'] ?>"><?= $nw['kategori'] ?></option>
              <?php } ?>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Konten</label>
            <div class="col-sm-9">
                <textarea id="textarea" name="content" required>Konten</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
                <select class="form-control custom-select  mt-15" style="width:100%" name="status_berita" id="status_berita">
                    <option value="1">Active</option>
                    <option value="0">NonActive</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </div>
        </div>
       
        <?= form_close(); ?>
        <!-- End Konten -->
        </div>
    </div>
</main>
<!--end page main-->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>