<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Confirmation</title>
    <meta name="viewport" content="initial-width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Anton|Open+Sans+Condensed:300" rel="stylesheet">
    <style>
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .box.cred {
            color: #f44336;
        }
        .box.cgreen{
            color: #4caf50;
        }
        .box p{
            font-weight: bold;
            opacity: 0.6;
        }
    </style>
</head>
<body>
<?php
require "./../php/conn.php";
$email = $_GET['u'];
$hash = $_GET['h'];

$sql_chk = "select uemail from users where uemail = '$email' and uhash = '$hash' and uactive = 0";
if(mysqli_num_rows(mysqli_query($conn, $sql_chk)) > 0){
    $sql = "update users set uactive = 1 where uemail = '$email' and uhash = '$hash'";
    if(mysqli_query($conn, $sql)){
        echo '<div class="box center cgreen">';
        echo '<h1><i class="material-icons large">thumb_up</i></h1>';
        echo '<h3>All done</h3>';
        echo '<p>You will be automatically redirected</p>';
        echo '</div>';
    }
    else{
        echo '<div class="box center cred">';
        echo '<h1><i class="material-icons large">thumb_down</i></h1>';
        echo '<h3>Error</h3>';
        echo '<p>You will be automatically redirected</p>';
        echo '</div>';
    }
}
else{
    echo '<div class="box center cred">';
    echo '<h1><i class="material-icons large">thumb_down</i></h1>';
    echo '<h3>Error</h3>';
    echo '<p>You will be automatically redirected</p>';
    echo '</div>';
}

?>

<script>
    setTimeout(function () {
        window.location.assign("http://localhost/MentorzHub/");
    }, 5000);
</script>
</body>
</html>