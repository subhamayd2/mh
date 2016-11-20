<?php
require 'conn.php';
session_start();
if(!isset($_SESSION['uid'])){
    die('2');
}
$uname = null;
$uemail = $_SESSION['uid'];
$umobile = null;

$mname = null;
$mmobile = null;

if(isset($_POST['name']) && isset($_POST['mobile'])){
    $mname = $_POST['name'];
    $mmobile = $_POST['mobile'];
}
else{
    die("0");
}

$sql_fetch = "select u_name, u_mobile from user_details where u_email = '$uemail'";
$r = mysqli_query($conn, $sql_fetch);

while($row = mysqli_fetch_assoc($r)){
    $uname = $row['u_name'];
    $umobile = $row['u_mobile'];
}

$sql = "insert into calls (uemail, uname, uphone, mname, mphone) values ('$uemail', '$uname', '$umobile', '$mname', '$mmobile')";
if(mysqli_query($conn, $sql)){
    echo 1;
}
else{
    echo 0;
}
$conn = null;