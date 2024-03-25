<!--start content-->
<main class="page-content">
    <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-0">Kirim Notifikasi</h5>
                    </div>
                </div>
            </div>
             
        <div class="card-body">
        <?php if ($this->session->flashdata()) : ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('send'); ?>
            </div>
          <?php endif; ?>
        <!-- Konten -->
        <?= form_open_multipart('Appnotifikasi/send'); ?>
          
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Ex: Hallo" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Pesan</label>
                <div class="col-sm-9">
                <textarea id="textarea" class="form-control" name="message" 
            placeholder = "Masukan Isi Pesan Disini"
            required> </textarea>
                </div>
            </div>
           
            <div class="row mb-3">
                <label for="inputEnterYourName" class="col-sm-2 col-form-label">Aplikasi</label>
                <div class="col-sm-9">
                    <select class="form-control" style="width:100%" name="topic" id="status">
                        <option value="pelanggan">Pelanggan</option>
                        <option value="driver">Driver</option>
                        <option value="mitra">Merchant Partner</option>
                        <option value="gojasa">Semua</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary mr-2">Kirim Notifikasi</button>
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