<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      margin-top: 40px;
      /* Add margin-top to adjust the spacing */
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 44px;
      /* Add margin-top to adjust the spacing */
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h1>PDF Report - Distributor Toko Buku</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($distributor as $d) :
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $d->nama_distributor ?></td>
          <td><?= $d->alamat ?></td>
          <td><?= $d->telepon ?></td>
        </tr>
      <?php
      endforeach;
      ?>
    </tbody>
  </table>
</body>

</html>