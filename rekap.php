<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php require "partial/nav.php"; ?>

    <div class="container">
  <!-- Content here -->
<h2>Daftar <small class="text-muted">Rekap Absen Mahasiswa IKOM</small></h2>
  <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>NIM</th>
      <th>Hari</th>
      <th>Mata Kuliah</th>
      <th>Waktu Absen</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con = require "core/bootstrap.php";
    require "vendor/autoload.php";
    use Carbon\Carbon;

    $qb = new QueryBuilder($con);
    $table = "<tr>";
    $i = 1;
    $hasil = $qb->selectAll('rekap_absen');
    $hasil = $qb->RAW("SELECT siswa.nama,siswa.NIM, rekap_absen.makul_absen, rekap_absen.tanggal_absen
    FROM siswa
    INNER JOIN rekap_absen ON siswa.norf=rekap_absen.norf", "");

    foreach ($hasil as $index => $value) {
        $date = Carbon::parse($value->tanggal_absen, 'Asia/Jakarta');
        $table .= "<td>$i</td>";
        $table .= "<td>$value->nama</td>";
        $table .= "<td>$value->makul_absen</td>";
        $table .= "<td>".$date->diffForHumans()."</td>";
        $table .= "</tr>";
        $i++;
    }
    echo $table;
    ?>
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
