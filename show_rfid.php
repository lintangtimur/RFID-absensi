<?php
header("Content-type:application/json");

$con = require "core/bootstrap.php";
$qb = new QueryBuilder($con);

$result = $qb->selectAll('rfid');
$rowCount = count($result);
$li = "";
foreach ($result as $res) {
    $li .= "<li>".$res->norf."</li>";
}

$data['li'] = $li;
$data['jumlahBaris'] = $rowCount;
echo json_encode($data);
