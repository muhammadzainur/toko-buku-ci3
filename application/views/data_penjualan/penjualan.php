<!-- Begin Page Content -->
<div class="container-fluid ">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#penjualan"><i class="fas fa-plus"> Tambah</i></button>
      <a href="<?= base_url('penjualan/pdf') ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-download"> PDF</i></a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penjualan as $pjn) : ?>
              <tr>
                <th><?= $no++ ?></th>
                <th><?= $pjn->nama ?></th>
                <th><?= 'Rp. ' . number_format($pjn->total, 0, ',', '.') ?></th>
                <th><?= $pjn->tanggal ?></th>
                <td>
                  <?php echo anchor('penjualan/edit/' . $pjn->id_penjualan, '<div class="btn btn-primary btn-sm mr-3"><i class="fa fa-edit"></i></div>') ?>
                  <div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>fcecferdc4fq2
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="penjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH PENJUALAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'penjualan/tambah' ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama</label>
            <select name="nama" class="form-control">
              <?php foreach ($kasir as $ksr) : ?>
                <option value="<?php echo $ksr->id_kasir; ?>"><?php echo $ksr->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" class="form-control" placeholder="Masukkan Total">
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal">
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
        <?php echo anchor('penjualan/hapus/' . $pjn->id_penjualan, '<div class="btn btn-primary">Hapus</div>') ?>
      </div>
    </div>
  </div>
</div>
<!-- /.End Hapus-->