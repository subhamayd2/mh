<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find the perfect mentor for yourself</title>
    <meta name="viewport" content="initial-width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Anton|Open+Sans+Condensed:300" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="css/mentor.css">
    <link rel="stylesheet" href="css/media.queries.css">
    <link rel="stylesheet" href="css/scroll.css">

    <link rel="stylesheet" href="css/global.css">
</head>
<body ng-app="app">
<?php
include 'inc/nav.php';
?>
<div ng-controller="searchCtrl">

    <div class="search-bar">
        <div class="page-container">
            <div class="row">
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">room</i>
                    <select ng-model="byCity">
                        <option value="" disabled selected>Choose a city</option>
                        <option value="">All</option>
                        <?php include 'inc/cities.inc'; ?>
                    </select>
                    <label>Select City</label>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">language</i>
                    <select ng-model="byLang" multiple>
                        <option value="" disabled selected>Choose a language</option>
                        <option value='English'>English</option>
                        <option value='Hindi'>Hindi</option>
                        <option value='Bengali'>Bengali</option>
                        <option value='Telugu'>Telugu</option>
                        <option value='Marathi'>Marathi</option>
                        <option value='Tamil'>Tamil</option>
                        <option value='Kannada'>Kannada</option>
                        <option value='Oriya'>Oriya</option>
                        <option value='Malayalam'>Malayalam</option>
                        <option value='Punjabi'>Punjabi</option>
                        <option value='Assamese'>Assamese</option>
                        <option value='Maithili'>Maithili</option>
                        <option value='Santhali'>Santhali</option>
                        <option value='Kashmiri'>Kashmiri</option>
                        <option value='Nepali'>Nepali</option>
                        <option value='Konkani'>Konkani</option>
                        <option value='Sindhi'>Sindhi</option>
                        <option value='Dogri'>Dogri</option>
                        <option value='Manipuri'>Manipuri</option>
                        <option value='Bodo'>Bodo</option>
                        <option value='Sanskrit'>Sanskrit</option>
                        <option value='Other'>Other</option>
                    </select>
                    <label>Select Language</label>
                </div>
                <div class="input-field col s12 m4">
                    <i class="material-icons prefix">search</i>
                    <input placeholder="Name or expertise" type="text" id="search-box" ng-init="query = '<?php echo isset($_GET['q'])?$_GET['q']:""; ?>'" ng-model="query">
                    <label for="search-box">Find a Mentor</label>
                </div>
            </div>
        </div>
    </div>

    <div class="page-container">
        <h3 class="page-heading center">FIND MENTORS ACROSS <b>INDIA</b></h3>
    </div>

    <div class="content page-container">
        <div class="row spacing-top-lg">
            <div class="col s12 m3" ng-repeat="m in list = (mlist | lang:byLang | filter:{u_name:query, u_city: byCity})">
                <div class="profile-box center">
                    <img src="profile_pic/user.png" hires="profile_pic/{{m.u_email}}/pp.jpg" class="circle" alt="{{m.u_name}}" width="100">
                    <h5>{{m.u_name}}</h5>
                    <p>Project Engineer</p>
                    <p>Cognizant</p>
                    <p>IT Solutions</p>
                    <a data-name="{{m.u_name}}" data-mobile="{{m.u_mobile}}" class="register-call btn blue waves-effect"><i class="icons ion-ios-telephone"></i></a>
                </div>
            </div>
            <div class="col s12" ng-show="!list[0]">
                <h3>{{err_msg}}</h3>
            </div>
        </div>
    </div>

</div>








<?php
include 'inc/footer.html';
?>

<script src="js/searchJS.js"></script>
<script src="js/our-mentor.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
</body>
</html>