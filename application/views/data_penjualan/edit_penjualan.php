<div class="container-fluid">
  <h3><i class="fas fa-edit">Edit Penjualan</i></h3>
  <?php foreach ($penjualan as $pjn) : ?>
    <form action="<?php echo base_url() . 'penjualan/update' ?>" method="post">
      <div class="for-group">
        <label>Nama</label>
        <select name="nama" class="form-control">
          <?php foreach ($kasir as $ksr) : ?>
            <option value="<?php echo $ksr->id_kasir; ?>"><?php echo $ksr->nama; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="for-group mt-3">
        <label>Total</label>
        <input type="text" name="total" class="form-control" value="<?= $pjn->total ?>">
      </div>
      <div class="for-group mt-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $pjn->tanggal ?>">
      </div>
      <input type="hidden" name="id_penjualan" value="<?= $pjn->id_penjualan ?>">
      <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
    <?php endforeach; ?>
</div>