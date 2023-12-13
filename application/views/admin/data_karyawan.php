<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Status</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $kryn) : ?>
              <tr>
                <th><?= $no++ ?></th>
                <th><?= $kryn->nama ?></th>
                <th><?= $kryn->alamat ?></th>
                <th><?= $kryn->telepon ?></th>
                <th><?= $kryn->status ?></th>
                <th><?= $kryn->username ?></th>
                <th><?= $kryn->password ?></th>
                <th><?= $kryn->level ?></th>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->