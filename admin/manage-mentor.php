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
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Exo+2|Anton|Open+Sans+Condensed:300" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/mentor.css">
    <link rel="stylesheet" href="css/media.queries.css">
</head>
<body>
<?php
include 'inc/sidebar.html';
include 'inc/confirm-box.html';
?>
<div class="main-content-wrapper" ng-app="app" ng-controller="deleteCtrl">
    <i class="icon ion-navicon left hide-on-large-only toggle-menu"></i>
    <h4 class="main-content-heading">Manage Mentor</h4>
    <div class="row spacing-top-lg">
        <div class="col s12">
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Mentor name</th>
                    <th>Mentor email</th>
                    <th>Mentor phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="c in mlist">
                    <td>{{c.ufname}} {{c.ulname}}</td>
                    <td>{{c.uemail}}</td>
                    <td>{{c.umobile}}</td>
                    <td><a ng-click="confirm(c.uemail)" class="btn red lighten-1 waves-effect">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/sidebar.js"></script>
<script src="js/mentorJS.js"></script>
</body>
</html>