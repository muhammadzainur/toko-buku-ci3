<div class="container-fluid">
  <h3><i class="fas fa-edit">Edit Distributor</i></h3>
  <?php foreach ($buku as $bk) : ?>
    <form action="<?php echo base_url() . 'buku/update' ?>" method="post">
      <div class="for-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= $bk->judul ?>">
      </div>
      <div class="for-group mt-3">
        <label>Noisbn</label>
        <input type="text" name="noisbn" class="form-control" value="<?= $bk->noisbn ?>">
      </div>
      <div class="for-group mt-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?= $bk->penulis ?>">
      </div>
      <div class="for-group mt-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" value="<?= $bk->penerbit ?>">
      </div>
      <div class="for-group mt-3">
        <label>Tahun</label>
        <input type="text" name="tahun" class="form-control" value="<?= $bk->tahun ?>">
      </div>
      <div class="for-group mt-3">
        <label>Stok</label>
        <input type="text" name="stok" class="form-control" value="<?= $bk->stok ?>">
      </div>
      <div class="for-group mt-3">
        <label>Harga_pokok</label>
        <input type="text" name="harga_pokok" class="form-control" value="<?= $bk->harga_pokok ?>">
      </div>
      <div class="for-group mt-3">
        <label>Harga_jual</label>
        <input type="text" name="harga_jual" class="form-control" value="<?= $bk->harga_jual ?>">
      </div>
      <div class="for-group mt-3">
        <label>Gambar</label><br>
        <img src="<?= base_url() . 'uploads/' . $bk->gambar ?>" width="100">
        <input type="file" name="gambar" class="form-control mt-3">
      </div>
      <input type="hidden" name="id_buku" value="<?= $bk->id_buku ?>">
      <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
    <?php endforeach; ?>
</div>