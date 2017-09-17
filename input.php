<?php
require "core/Database/Connection.php";

$con = Connection::connect();
$id = $_POST['id'];
$sql = "insert into rfid (id, norf) values ('',:id)";
$result = $con->prepare($sql);
$result->execute([
  ":id" => $id
]);
if (!empty($result)) {
    echo "SUKSES";
}
