<div class="container-fluid">
  <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Penjualan: <?php echo $penjualan->id_penjualan ?></div>
  </h4>

  <table class="table table-bordered table-hover table-striped">
    <tr>
      <th>Id Buku</th>
      <th>Judul</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Sub Total</th>
    </tr>

    <?php
    $total = 0;
    foreach ($detail as $dtl) :
      $subtotal = $dtl->jumlah * $dtl->harga;
      $total   += $subtotal;
      $judul = $this->db->get_where('buku', array('id_buku' => $dtl->id_buku))->row()->judul;
    ?>

      <tr>
        <td><?php echo $dtl->id_buku ?></td>
        <td><?php echo $judul ?></td>
        <td><?php echo $dtl->jumlah ?></td>
        <td><?php echo number_format($dtl->harga, 0, ',', '.') ?></td>
        <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
      </tr>

    <?php endforeach; ?>

    <tr>
      <td colspan="4" align="right">Grand Total</td>
      <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
    </tr>

  </table>
  <a href="<?php echo base_url('admin/data_admin/index') ?>">
    <div class="btn btn-sm btn-primary">Kembali</div>
  </a>
</div>