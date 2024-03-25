
 <!--start content-->
 <main class="page-content">
<div class="card border shadow-none">
    <div class="card-header py-3">
         <div class="row align-items-center g-3">
            <div class="col-12 col-lg-6">
              <h5 class="mb-0">Berita</h5>
            </div>
            <div class="col-12 col-lg-6 text-md-end">
              <a href="<?= base_url(); ?>berita/tambah" class="btn btn-sm btn-primary me-2"><i class="fa-solid fa-user-plus"></i>Berita</a>
              <a href="<?= base_url(); ?>berita/addkategori" class="btn btn-sm btn-primary me-2"><i class="fa-solid fa-user-plus"></i>Kategori</a>
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
                                <div class="tab-title">Beita</div>
                            </div>
                        </button>
                    </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#newstab2" type="button" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="fa-solid fa-user-large font-18 me-1"></i></div>
                        <div class="tab-title">Kategori</div>
                    </div>
                    </button>
                </li>
                </ul>
        <div class="tab-content py-3">
		    <div class="tab-pane fade show active" id="newstab1" role="tabpanel">
                <table id="newstable1" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Kelola</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($news as $nw) { ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td>
                        <img width="80" height="80" src="<?= base_url('images/berita/') . $nw['foto_berita']; ?>">
                        </td>
                        <td><?= $nw['title']; ?></td>
                        <td><?= $nw['created_berita']; ?></td>
                        <td><?= $nw['kategori']; ?></td>
                        <td>
                        <?php if ($nw['status_berita'] == 1) { ?>
                        <label class="badge bg-success">Active</label>
                        <?php } else { ?>
                        <label class="badge bg-danger">Non Active</label>
                        <?php } ?>
                        </td>
                        <td>
                        <div class="d-flex align-items-center gap-2 fs-6">
                            <a href="<?= base_url(); ?>berita/ubah/<?= $nw['id_berita']; ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ubah" aria-label="Ubah"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="<?= base_url(); ?>berita/hapus/<?= $nw['id_berita']; ?>" class="text-danger" onclick="return confirm ('Apakah Yakin Ingin Menghapusnya ?')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Hapus" aria-label="Hapus"><i class="fa-duotone fa-trash"></i></a>
                        </div>
                        </td>
                        </tr>
                        <?php $i++;
                        } ?>
                        </tbody>
                    <tfoot>
                        <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
		    </div>
					
            <div class="tab-pane fade" id="newstab2" role="tabpanel">
                <table id="newstable2" class="table table-striped table-hover dt-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($kategori as $knw) { ?>
                    <tr>
                    <td><?= $i ?></td>
                    <td><?= $knw['kategori']; ?></td>
                    <td><?= $knw['created']; ?></td>
                    <td>
                    <a href="<?= base_url(); ?>berita/hapuscategory/<?= $knw['id_kategori_news']; ?>"><button class="btn btn-outline-danger">Delete</button></a>
                    </td>
                    <?php $i++;
                    } ?>
                    </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
	</div>
</div>
</main>
<!--end page main-->