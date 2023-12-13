<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
    <?php
    $grand_total = 0;
    if ($keranjang = $this->cart->contents()) {
      foreach ($keranjang as $item) {
        $grand_total = $grand_total + $item['subtotal'];
      }
    ?>
      <div class="card-body">
        <form action="<?php echo base_url('dashboard/proses_pesanan') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Total</label>
            <input type="number" name="total" class="form-control" value="<?php echo $grand_total; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Bayar</label>
            <input type="text" name="bayar" class="form-control" placeholder="Bayar" onkeyup="hitung()">
          </div>
          <div class="form-group">
            <label>Kembalian</label>
            <input type="text" name="kembalian" class="form-control" readonly>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#bayar">Bayar</button>
      </div>
      </form>
    <?php
    } else {
      echo "Keranjang Kosong";
    }
    ?>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<script>
  function hitung() {
    var totalBelanja = <?php echo $grand_total; ?>;
    var bayar = document.getElementsByName("bayar")[0].value;
    var kembalian = bayar - totalBelanja;
    document.getElementsByName("kembalian")[0].value = kembalian;
  }
</script>