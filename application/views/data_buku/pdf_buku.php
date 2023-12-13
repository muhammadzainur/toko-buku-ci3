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
  <h1>PDF Report - Penjualan Toko Buku</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Noisbn</th>
        <th>Penulis</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Harga Pokok</th>
        <th>Harga Jual</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($buku as $bk) :
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $bk->judul ?></td>
          <td><?= $bk->noisbn ?></td>
          <td><?= $bk->penulis ?></td>
          <td><?= $bk->tahun ?></td>
          <td><?= $bk->stok ?></td>
          <td><?= 'Rp. ' . number_format($bk->harga_pokok, 0, ',', '.') ?></th>
          <td><?= 'Rp. ' . number_format($bk->harga_jual, 0, ',', '.') ?></th>
        </tr>
      <?php
      endforeach;
      ?>
    </tbody>
  </table>
</body>

</html>