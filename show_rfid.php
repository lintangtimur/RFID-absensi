<?php
header("Content-type:application/json");
require "core/Database/Connection.php";
$con = Connection::Connect();
$select = "SELECT * FROM rfid";
$result = $con->prepare($select);
$result->execute();
$rowCount = $result->rowCount();
$li = "";
while ($row = $result->fetch()) {
    $li .= "<li>".$row['norf']."</li>";
}
$data['li'] = $li;
$data['jumlahBaris'] = $rowCount;
echo json_encode($data);
