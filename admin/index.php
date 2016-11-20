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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.queries.css">
</head>
<body>
<?php
include 'inc/sidebar.html';
include 'inc/confirm-box.html';
?>
<div class="main-content-wrapper" ng-app="app" ng-controller="callsCtrl">
    <i class="icon ion-navicon left hide-on-large-only toggle-menu"></i>
    <h4 class="main-content-heading">Connect Mentees with Mentors</h4>
    <div id="call_alert" class="center">
        <p>You have <span id="alert_text"></span> new call(s)</p>
        <a class="btn btn-flat white darken-2" ng-click="close_alert()">Ok</a>
    </div>
    <div class="row spacing-top-lg">
        <div class="col s12">
            <table class="responsive-table striped">
                <thead>
                <tr>
                    <th>Mentee name</th>
                    <th>Mentee email</th>
                    <th>Mentee phone</th>
                    <th>Mentor name</th>
                    <th>Mentor phone</th>
                    <th>Date & time</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="c in clist">
                    <td>{{c.uname}}</td>
                    <td>{{c.uemail}}</td>
                    <td>{{c.uphone}}</td>
                    <td>{{c.mname}}</td>
                    <td>{{c.mphone}}</td>
                    <td>{{c.c_timestamp}}</td>
                    <td><a ng-click="done(c.ID)" id="status_{{c.ID}}" ng-class="{status_done:(c.cstatus == 'done'), status_pending:(c.cstatus != 'done')}" class="btn lighten-1 waves-effect">{{c.cstatus}}</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script async src="js/index.js"></script>
<script src="js/callsJS.js"></script>
<script src="js/sidebar.js"></script>
</body>
</html>