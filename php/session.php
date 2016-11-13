<?php
require "conn.php";
session_start();

$name = null;
$phone = null;
$email = null;
$addr = null;
$city = "Select City";
$log = "Login";

if(isset($_SESSION['uid'])){
    $phone = $_SESSION['uid'];
}
else{
    return;
}

$sql = "select * from users where uphone = '$phone'";
$r = mysqli_query($conn, $sql);
if(mysqli_num_rows($r) > 0){
    while($row = mysqli_fetch_assoc($r)){
        $name = $row['uname'];
        $email = $row['uemail'];
        $addr = $row['uaddr'];
        $city = $row['ucity'];
    }
    $log = "Logout";
}