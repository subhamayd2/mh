<?php

$SERVER = '198.71.225.63:3306';
$USERNAME = 'AztechCorps';
$PASSWORD = 'Amansingh@2';
$DB = 'DBmentorzhub';

$conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}