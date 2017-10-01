<?php
$con = require "core/bootstrap.php";
require "vendor/autoload.php";
use Carbon\Carbon;

$now = new Carbon;
$now->setTimezone('Asia/Jakarta');

$qb = new QueryBuilder($con);
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $siswa = $qb->RAW(
    "SELECT nama, last_update, kelas, NOW()
    AS absen from siswa where norf = ?",
     $id);

    if (array_key_exists(0, $siswa)) {
        $siswa = $siswa[0];
        $date = Carbon::parse($siswa->absen, 'Asia/Jakarta');
        $formatTampilan = "<b>Nama:</b> %s, <b>Kelas:</b> %s, <b>Jam Absen:</b> %s, %s";
        echo sprintf($formatTampilan, $siswa->nama, $siswa->kelas, $date, $date->diffForHumans());
    } else {
        echo "err";
    }
}
