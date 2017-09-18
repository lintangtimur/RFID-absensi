<!DOCTYPE html>
<html lang="en">
<!-- stelindb -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perangkat Cerdas RFID</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css">

  <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="INPUTAN">Number</label>
          <input type="text" class="form-control" id="inputs" name="" value="">
          <p class="help-block">RFID akan masuk ke sini</p>
          <p id="tampilMessage"></p>
        </div>
      </div>
      <div class="col-md-6">
        <h2>Data yang telah terinput | Total: <d id="jumlahRow"></d></h2>
        <ul>
          <?php
          $con = require "core/bootstrap.php";
          $qb = new QueryBuilder($con);
          $rfids = $qb->selectAll('rfid');
          foreach ($rfids as $rfid):?>
          <li><?=$rfid->norf; ?></li>
        <?php endforeach; ?>
          </ul>
       </ul>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
  <script src="asset/js/data.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
