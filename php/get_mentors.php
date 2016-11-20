<?php
require 'conn.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$l = null;
$email = '';

$r_email = mysqli_query($conn, "select uemail from users where utype = 'Mentor'");
while($r_row = mysqli_fetch_assoc($r_email)){
    $email .= ',\'' . $r_row['uemail'] . '\'';
}
$str = substr($email, 1);
$sql = "select * from user_details where u_email in ($str)";

$r = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($r)){
    $l[] = array('data'=> $row);
}
$j['children'] = $l;
$json['data'] = $j;

echo json_encode($json);