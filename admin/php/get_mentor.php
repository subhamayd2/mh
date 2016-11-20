<?php
require 'conn.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$l = null;

$sql = "select * from users where utype = 'Mentor' order by ID desc";

$r = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($r)){
    $l[] = array('data'=> $row);
}
$j['children'] = $l;
$json['data'] = $j;

echo json_encode($json);