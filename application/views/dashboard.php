<div class="container-fluid">
  <div class="row text-center">
    <?php foreach ($buku as $bk) : ?>
      <div class="card ml-3" style="width: 16rem;">
        <img class="card-img-top" src="<?php echo base_url() . '/uploads/' . $bk->gambar ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title mb-1"><?php echo $bk->judul ?></h5>
          <small>Code Buku :<?php echo $bk->noisbn ?></small><br>
          <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($bk->harga_jual, 0, ',', '.') ?></span><br>
          <?php echo anchor('dashboard/keranjang/' . $bk->id_buku, '<div class="btn btn-sm btn-primary">Tambah Kerajang</div>') ?>
          <?php echo anchor('dashboard/detail/' . $bk->id_buku, '<div class="btn btn-sm btn-success">Detail</div>') ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>