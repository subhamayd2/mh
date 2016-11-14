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

<div id="rules" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="btn red darken-1 waves-effect start-test">Start test</a>
    </div>
</div>

<div class="page-container">
    <h1 class="page-heading"><i class="icon ion-university"></i> Choose a TEST</h1>
    <ul class="collapsible spacing-top-lg" data-collapsible="accordion">
        <li>
            <div class="collapsible-header waves-effect waves-blue"><i class="icon ion-compose"></i>GATE</div>
            <div class="collapsible-body exam-selector">
                <p><a class="btn blue lighten-1 waves-effect" data-testid="gate" data-subid="1">Computer Science & Engineering</a></p>
                <p><a class="btn blue lighten-1 waves-effect" data-testid="gate" data-subid="2">Electrical Engineering</a></p>
            </div>
        </li>
        <li>
            <div class="collapsible-header waves-effect waves-blue"><i class="icon ion-compose"></i>Aptitude</div>
            <div class="collapsible-body exam-selector">
                <p><a class="btn blue lighten-1 waves-effect" data-testid="aptitude" data-subid="1">Quantitative</a></p>
                <p><a class="btn blue lighten-1 waves-effect" data-testid="aptitude" data-subid="2">Verbal</a></p>
            </div>
        </li>

    </ul>
</div>

<script src="js/settings.js"></script>
<script src="js/setup.js"></script>
</body>
</html>