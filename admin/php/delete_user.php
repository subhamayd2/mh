<?php
require 'conn.php';

$email = null;

if(isset($_POST['email'])){
    $email = $_POST['email'];
}
else{
    die('0');
}

$sql = "delete from users where uemail = '$email'; delete from user_details where u_email = '$email'";
if(mysqli_multi_query($conn, $sql)){
    echo 1;
}
else echo 0;

$conn = null;