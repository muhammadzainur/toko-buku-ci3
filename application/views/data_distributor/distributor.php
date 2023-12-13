<!-- Begin Page Content -->
<div class="container-fluid ">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Distributor</h6>
    </div>
    <div class="card-body">
      <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#distributor"><i class="fas fa-plus"> Tambah</i></button>
      <a href="<?= base_url('distributor/pdf') ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-download"> PDF</i></a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($distributor as $dstr) : ?>
              <tr>
                <th><?= $no++ ?></th>
                <th><?= $dstr->nama_distributor ?></th>
                <th><?= $dstr->alamat ?></th>
                <th><?= $dstr->telepon ?></th>
                <td>
                  <?php echo anchor('distributor/edit/' . $dstr->id_distributor, '<div class="btn btn-primary btn-sm mr-3"><i class="fa fa-edit"></i></div>') ?>
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
<div class="modal fade" id="distributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DISTRIBUTOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'distributor/tambah' ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Distributor</label>
            <input type="text" name="nama_distributor" class="form-control" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" placeholder="Masukkan Telepon">
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
        <?php echo anchor('distributor/hapus/' . $dstr->id_distributor, '<div class="btn btn-primary">Hapus</div>') ?>
      </div>
    </div>
  </div>
</div>
<!-- /.End Hapus-->