<div class="container-fluid">
  <h3><i class="fas fa-edit">Edit Distributor</i></h3>
  <?php foreach ($distributor as $dstr) : ?>
    <form action="<?php echo base_url() . 'distributor/update' ?>" method="post">
      <div class="for-group">
        <label>Nama Distributor</label>
        <input type="text" name="nama_distributor" class="form-control" value="<?= $dstr->nama_distributor ?>">
      </div>
      <div class="for-group mt-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $dstr->alamat ?>">
      </div>
      <div class="for-group mt-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?= $dstr->telepon ?>">
      </div>
      <input type="hidden" name="id_pasok" value="<?= $dstr->id_distributor ?>">
      <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
    <?php endforeach; ?>
</div>