<?php
require './../../php/conn.php';
session_start();
if(!isset($_SESSION['uid'])){
    die("x");
}

$email = $_SESSION['uid'];
$name = null;
$ques = null;
$q_time = null;
$cat = null;

if(isset($_POST['question']) && isset($_POST['category']) && isset($_POST['q_timestamp'])){
    $ques = $_POST['question'];
    $q_time = $_POST['q_timestamp'];
    $cat = $_POST['category'];
}
else{
    die("0");
}

$sql_name = "select u_name from user_details where u_email = '$email'";
$r_name = mysqli_query($conn, $sql_name);

while($row = mysqli_fetch_assoc($r_name)){
    $name = $row['u_name'];
}

$sql = "insert into ask_question (question, q_timestamp, u_name, u_email, category)
values ('$ques', '$q_time', '$name', '$email', '$cat')";

if(mysqli_query($conn, $sql)){
    echo 1;
}
else{
    echo 0;
}
$conn = null;
