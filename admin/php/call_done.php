<?php
require 'conn.php';
header("Access-Control-Allow-Origin: *");

$id = null;
$data = json_decode( file_get_contents('php://input') );

$id = $data->id;

$sql = "update calls set cstatus = 'done' where ID = $id";

if(mysqli_query($conn, $sql)) echo 1;
else echo 0;

$conn = null;