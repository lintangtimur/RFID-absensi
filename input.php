<?php
$con = require "core/bootstrap.php";

$qb = new QueryBuilder($con);

//Insert ke dalam table
$result = $qb->insert('rfid', [
  "id" => '',
  "norf" => $_POST['id']
]);

if (!empty($result)) {
    echo "SUKSES";
}
