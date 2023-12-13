<div class="container-fluid">
  <div class="card">
    <h5 class="card-header">Detail Buku</h5>
    <div class="card-body">
      <?php foreach ($buku as $bk) : ?>
        <div class=" row">
          <div class="col-md-4">
            <img src="<?php echo base_url() . '/uploads/' . $bk->gambar ?>" class="card-img-top">
          </div>
          <div class="col-md-8">
            <table class="table">
              <tr>
                <td>Judul Buku</td>
                <td><strong><?php echo $bk->judul ?></strong></td>
              </tr>
              <tr>
                <td>Code Buku</td>
                <td><strong><?php echo $bk->noisbn ?></strong></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td><strong><?php echo $bk->stok ?></strong></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><strong>
                    <div class="btn btn-sm btn-success">Rp. <?php echo number_format($bk->harga_jual, 0, ',', '.') ?></div>
                  </strong></td>
              </tr>
            </table>
            <?php echo anchor('dashboard/keranjang/' . $bk->id_buku, '<div class="btn btn-sm btn-primary">Tambah Ke keranjang</div>') ?>
            <?php echo anchor('dashboard/index/', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>