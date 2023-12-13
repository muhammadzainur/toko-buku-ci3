<!-- Begin Page Content -->
<div class="container-fluid ">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#buku"><i class="fas fa-plus"> Tambah</i></button>
      <a href="<?= base_url('buku/pdf') ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-download"> PDF</i></a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Noisbn</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th>Tahun</th>
              <th>Stok</th>
              <th>Harga Pokok</th>
              <th>Harga Jual</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($buku as $bk) : ?>
              <tr>
                <th><?= $no++ ?></th>
                <th><?= $bk->judul ?></th>
                <th><?= $bk->noisbn ?></th>
                <th><?= $bk->penulis ?></th>
                <th><?= $bk->penerbit ?></th>
                <th><?= $bk->tahun ?></th>
                <th><?= $bk->stok ?></th>
                <th><?= 'Rp. ' . number_format($bk->harga_pokok, 0, ',', '.') ?></th>
                <th><?= 'Rp. ' . number_format($bk->harga_jual, 0, ',', '.') ?></th>
                <th><img src="<?= base_url() . 'uploads/' . $bk->gambar ?>" width="100"></th>
                <td>
                  <?php echo anchor('buku/edit/' . $bk->id_buku, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
                  <div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH BUKU</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'buku/tambah' ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul">
          </div>
          <div class="form-group">
            <label>Noisbn</label>
            <input type="text" name="noisbn" class="form-control" placeholder="Masukkan Noisbn">
          </div>
          <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis">
          </div>
          <div class="form-group">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit">
          </div>
          <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" class="form-control" placeholder="Masukkan Tahun">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok">
          </div>
          <div class="form-group">
            <label>Harga Pokok</label>
            <input type="text" name="harga_pokok" class="form-control" placeholder="Masukkan Harga Pokok">
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control" placeholder="Masukkan Harga Jual">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
          </div>
      </div>
      <div class=" modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /.End Modal -->

<!-- Hapus -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HAPUS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo anchor('buku/hapus/' . $bk->id_buku, '<div class="btn btn-primary">Hapus</div>') ?>
      </div>
    </div>
  </div>
</div>
<!-- /.End Hapus-->