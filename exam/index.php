<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="initial-width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Anton|Open+Sans+Condensed:300" rel="stylesheet">

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./../css/media.queries.css">
    <link rel="stylesheet" href="./../css/scroll.css">

    <link rel="stylesheet" href="./../css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
include "./../php/conn.php";
include "./../inc/nav.php";
?>

<div class="page-container">
    <h1 class="page-heading"><i class="icon ion-university"></i> Choose a TEST</h1>
    <ul class="collapsible spacing-top-lg" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="icon ion-compose"></i>GATE</div>
            <div class="collapsible-body">
                <p><a>Computer Science & Engineering</a></p>
                <p><a>Computer Science & Engineering</a></p>
                <p><a>Computer Science & Engineering</a></p>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="icon ion-compose"></i>Aptitude</div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>

    </ul>
</div>
</body>
</html>