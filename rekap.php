<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap</title>

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
      <div class="row">
        <div class="col-md-8">
    <?php
    $con = require "core/bootstrap.php";
    require "vendor/autoload.php";
    use Carbon\Carbon;

    $qb = new QueryBuilder($con);
    $jadwal = $qb->RAW("SELECT siswa.nama,siswa.NIM, rekap_absen.makul_absen, rekap_absen.tanggal_absen
        FROM siswa
        INNER JOIN rekap_absen ON siswa.norf=rekap_absen.norf
        GROUP BY makul_absen", []);
    foreach ($jadwal as $index => $value) {
        $rekabAbsen = $qb->RAW("SELECT siswa.nama,siswa.NIM, rekap_absen.makul_absen, rekap_absen.tanggal_absen
        FROM siswa
        INNER JOIN rekap_absen ON siswa.norf=rekap_absen.norf
        AND rekap_absen.makul_absen = ?", [$value->makul_absen]);
        echo "<h2 class=\"mt-4\">{$value->makul_absen}</h2>";
        $i = 1;
        $table = "<table class=\"table\">
        <thead class=\"table-info\">
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jam</th>
            <th>History</th>
          </tr>
        </thead>
        <tbody>";
        foreach ($rekabAbsen as $key => $nilai) {
            $date = Carbon::parse($nilai->tanggal_absen, 'Asia/Jakarta');
            $table .= "<tr>";
            $table .= "<td>$i</td>";
            $table .= "<td>$nilai->nama</td>";
            $table .= "<td>$nilai->NIM</td>";
            $table .= "<td>".$date->toDayDateTimeString()."</td>";
            $table .= "<td>".$date->diffForHumans()."</td>";
            $table .= "</tr>";
            $i++;
        }
        $table .= "
        </tbody>
      </table>";
        echo $table;
    }
    ?>
  </div>
  <div class="col-md-4">

  </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
