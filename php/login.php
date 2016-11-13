<?php
require "conn.php";
session_start();

$uid = null;
$pass = null;

if(isset($_POST['uid']) && isset($_POST['pass'])){
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];
}
else{
    return;
}

$pass = md5($pass);

$sql = "select uemail,utype from users where uemail = '$uid' and upass = '$pass' and uactive = 1";


$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        $_SESSION['uid'] = $row['uemail'];
        $_SESSION['type'] = $row['utype'];
    }
    echo 1;
}
else{
    echo 0;
}
$conn = null;