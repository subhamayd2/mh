<?php
require './../../php/conn.php';
session_start();
if(!isset($_SESSION['uid'])){
    die("0");
}

$qid = null;
$ans = null;
$a_timestamp = null;
$email = null;
$name = null;

if(isset($_POST['qid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ans']) && isset($_POST['a_timestamp'])){
    $qid = $_POST['qid'];
    $ans = $_POST['ans'];
    $a_timestamp = $_POST['a_timestamp'];
    $email = $_POST['email'];
    $name = $_POST['name'];
}
else{
    die("0");
}

try{
    $sql = mysqli_prepare($conn, "insert into ask_answer (q_id, answer, a_timestamp, u_email, u_name) values (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($sql,"issss", $qid, $ans, $a_timestamp, $email, $name);
    echo mysqli_stmt_execute($sql) ? 1 : mysqli_stmt_error($sql);
}
catch (Exception $e){
    echo $e->getMessage();
}
$conn = null;