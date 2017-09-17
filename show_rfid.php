<?php
header("Content-type:application/json");

$con = require "core/bootstrap.php";
$qb = new QueryBuilder();
$result = $con->prepare(
  $qb->select('*')
  ->from('rfid')
  ->result()
);
$result->execute();
$rowCount = $result->rowCount();
$li = "";
while ($row = $result->fetch()) {
    $li .= "<li>".$row['norf']."</li>";
}
$data['li'] = $li;
$data['jumlahBaris'] = $rowCount;
echo json_encode($data);
