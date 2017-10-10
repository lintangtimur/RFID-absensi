<!DOCTYPE html>
<html>
<body>
	<?php require "partial/nav.php"; ?>
	<div class="container"><span class="float-md-right"><i class="fa fa-clock-o" aria-hidden="true"></i><st id="time"></st></span>
		<h2 class="text-primary mt-4">Put Your RFID Card to Your Scanner </h2>

		<div class="form-group">
			<label for="rfidnumber">RFID Tag Number</label>
			<input type="text" class="form-control" id="inputs" aria-describedby="rfidnumber" placeholder="RFID Number will shown here">
			<small id="rfidnumber" class="form-text text-muted">This System Automatically Record Your Abscence</small>
		</div>

		<div class="container mb-4">
			<h3 id="classInformation"></h3>
			<div class="p-3 mb-2 text-white" id="tampilMessage">
				<!-- <b>Name</b> : Daniel Aditama <b>Course</b> : ERP Planning <b>Date/Time</b> : Mon,9-10-17/07:59:59 <b>Status</b>: Early -->
			</div>
			<div class="alert" role="alert"></div>
		</div>

		<div class="container">
			<?php
            require "vendor/autoload.php";
            $con = require "core/bootstrap.php";
            use Carbon\Carbon;

            $qb = new QueryBuilder($con);
            $HARI = [
                   0 => "Minggu",
                   1 => "Senin",
                   2 => "Selasa",
                   3 => "Rabu",
                   4 => "Kamis",
                   5 => "Jumat",
                   6 => "Sabtu"
                 ];
            $sekarang = Carbon::now('Asia/Jakarta')->dayOfWeek;
            $hasil = $qb->RAW("SELECT * from jadwal where hari = ?", $HARI[$sekarang]);
             ?>
			<div class="row">
				<div class="col-md-2">
<h2> <?=$HARI[$sekarang]; ?> </h2>
				</div>
				<div class="col-md-10">
					<?php
                    $cariMakulabsen = $qb->RAW("SELECT * FROM jadwal where hari = ?", "Selasa");
                    foreach ($cariMakulabsen as $key => $value) {
                        $mulai = Carbon::parse($value->jam_mulai, 'Asia/Jakarta')->hour;
                        $mulaiMenit = Carbon::parse($value->jam_mulai, 'Asia/Jakarta')->addminutes(15);

                        $akhir = Carbon::parse($value->jam_akhir, 'Asia/Jakarta')->hour;
                        $sekarang = Carbon::now('Asia/Jakarta')->hour ;


                        if ($sekarang > $mulai && $sekarang < $akhir) { //10 > 8 && 10 < 12
                            $makul = "<span class=\"badge badge-success float-md-right\">Available</span>";
                            break;
                        } else {
                            $makul = "<span class=\"badge badge-danger float-md-right\">Not Available</span>";
                        }
                    }
                    echo "<h2>{$makul}</h2>";
                     ?>
				</div>
			</div>
		</div>





		<table class="table table-striped table-responsive">
			<thead>
				<tr>
					<th>#</th>
					<th>Mata kuliah</th>
					<th>Jam mulai</th>
					<th>Jam berakhir</th>
				</tr>
			</thead>
			<tbody>
				<?php
        $i = 1;
        foreach ($hasil as $key => $value):?>
				<tr>
					<th><?= $i?></th>
					<td><?= $value->makul;?></td>
					<td><?= $value->jam_mulai;?></td>
					<td><?= $value->jam_mulai;?></td>
				</tr>
			<?php $i++;endforeach; ?>
			</tbody>
		</table>

	</div>
	<?php require "partial/footer.php"; ?>
	<script type="text/javascript">
		var timestamp = "<?=date('H:i:s');?>";

		function updateTime() {
			$('#time').html(Date(timestamp));
			timestamp++;
		}
		$(function() {
			setInterval(updateTime, 1000);
		});
	</script>
</body>

</html>
