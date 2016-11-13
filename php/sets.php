<?php
session_start();
$sess = null;
if(isset($_POST['sess'])){
    $_SESSION['uid'] = $_POST['sess'];
}