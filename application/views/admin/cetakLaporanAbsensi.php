<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <!-- Menyertakan Bootstrap CSS dari CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      color: #212529;
      background-color: #f8f9fa;
    }

    center {
      margin-bottom: 20px;
    }

    h2 {
      color: #2196f3;
    }

    table {
      margin-top: 20px;
      margin-bottom: 20px;
    }

    @media print {

      th,
      td {
        background-color: #f8f9fa !important;
      }
      
    }
  </style>
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="text-center">
      <h1 class="display-4">Mecon</h1>
      <h2 class="mb-4">Laporan Kehadiran Pegawai</h2>
    </div>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
      $bulanTahun = $bulan . $tahun;
    } else {
      $bulan = date('m');
      $tahun = date('Y');
      $bulanTahun = $bulan . $tahun;
    }
    ?>

    <table class="table table-bordered">
      <tr>
        <td>Bulan</td>
        
        <td><?= $bulan; ?></td>
      </tr>
      <tr>
        <td>Tahun</td>
       
        <td><?= $tahun; ?></td>
      </tr>
    </table>

    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pegawai</th>
          <th scope="col">NIK</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Hadir</th>
          <th scope="col">Sakit</th>
          <th scope="col">Alpha</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($lap_kehadiran as $l) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $l->nama_pegawai; ?></td>
            <td><?= $l->nik; ?></td>
            <td><?= $l->nama_jabatan; ?></td>
            <td><?= $l->hadir; ?></td>
            <td><?= $l->sakit; ?></td>
            <td><?= $l->alfa; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  <!-- Menyertakan Bootstrap JS dan Popper.js (dibutuhkan oleh Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    window.print();
  </script>

</body>

</html>