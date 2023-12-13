<!-- Begin Page Content -->
<div class="container-fluid ">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pasok</h6>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#pasok"><i class="fas fa-plus"> Tambah</i></button>
      <a href="<?= base_url('pasok/pdf') ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-download"> PDF</i></a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Distributor</th>
              <th>Buku</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pasok as $psk) : ?>
              <tr>
                <th><?= $no++ ?></th>
                <th><?= $psk->nama_distributor ?></th>
                <th><?= $psk->judul ?></th>
                <th><?= $psk->jumlah ?></th>
                <th><?= $psk->tanggal ?></th>
                <td>
                  <?php echo anchor('pasok/edit/' . $psk->id_pasok, '<div class="btn btn-primary btn-sm mr-3"><i class="fa fa-edit"></i></div>') ?>
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
<div class="modal fade" id="pasok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DISTRIBUTOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'pasok/tambah' ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Distributor</label>
            <select name="distributor" class="form-control">
              <?php foreach ($distributor as $dstr) : ?>
                <option value="<?php echo $dstr->id_distributor; ?>"><?php echo $dstr->nama_distributor; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Buku</label>
            <select name="buku" class="form-control">
              <?php foreach ($buku as $bk) : ?>
                <option value="<?php echo $bk->id_buku; ?>"><?php echo $bk->judul; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah">
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal">
          </div>
      </div>
      <div class="modal-footer">
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
        <?php echo anchor('pasok/hapus/' . $psk->id_pasok, '<div class="btn btn-primary">Hapus</div>') ?>
      </div>
    </div>
  </div>
</div>
<!-- /.End Hapus-->