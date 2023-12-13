<div class="container-fluid">
  <h3><i class="fas fa-edit"></i> Edit Pasok</h3>
  <?php foreach ($pasok as $psk) : ?>
    <form action="<?php echo base_url() . 'pasok/update' ?>" method="post">
      <div class="form-group">
        <label>Nama Distributor</label>
        <select name="distributor" id="distributor" class="form-control">
          <?php foreach ($distributor as $dstr) : ?>
            <option value="<?php echo $dstr->id_distributor; ?>" <?php echo ($dstr->id_distributor == $psk->id_distributor) ? 'selected' : ''; ?>><?php echo $dstr->nama_distributor; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Buku</label>
        <select name="buku" id="buku" class="form-control">
          <?php foreach ($buku as $bk) : ?>
            <option value="<?php echo $bk->id_buku; ?>" <?php echo ($bk->id_buku == $psk->id_buku) ? 'selected' : ''; ?>><?php echo $bk->judul; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group mt-3">
        <label>Jumlah</label>
        <input type="text" name="jumlah" class="form-control" value="<?= $psk->jumlah ?>">
      </div>
      <div class="form-group mt-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $psk->tanggal ?>">
      </div>
      <input type="hidden" name="id_pasok" value="<?= $psk->id_pasok ?>">
      <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
    <?php endforeach; ?>
</div>