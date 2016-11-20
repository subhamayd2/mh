<?php
require "./../php/conn.php";
require "php/conn.php";
session_start();
if(!isset($_SESSION['uid']) || !isset($_POST['test_id'])){
    header("location: ./../");
}

$time = $_POST['time'];
$dtime = $_POST['dtime'];
$r_timestamp = $_POST['r_timestamp'];

$fname = null;
$lname = null;
$r_name = mysqli_query($conn, "select ufname,ulname from users where uemail = '". $_SESSION['uid'] ."'");
while($rrow = mysqli_fetch_assoc($r_name)){
    $fname = $rrow['ufname'];
    $lname = $rrow['ulname'];
}

$single = $_POST['single'];
$double = $_POST['double'];

$s_n = explode("**", $single)[0];
$s_p = explode("**", $single)[1];
$s_no = explode("**", $single)[2];

$d_n = 0;
$d_p = 0;
$d_no = 0;
$dl = 0;

if($double != "none"){
    $d_n = explode("**", $double)[0];
    $d_p = explode("**", $double)[1];
    $d_no = explode("**", $double)[2];
    $dl = $_POST['dl'];
}

$score = 0;
$correct = 0;
$wrong = 0;
$no_ans = 1;

$test_id = $_POST['test_id'];
$sub_id = $_POST['sub_id'];
$qid = $_POST['qid'];
$qid_arr = explode(",", $qid);
$aid = $_POST['aid'];
$ans_arr = explode(",", $aid);

$sql = "select qID, qans, qtype from tbl_$test_id where qID in ($qid)";
$r = mysqli_query($connection, $sql);

while($row = mysqli_fetch_assoc($r)){
    $pos = array_search($row['qID'], $qid_arr);
    if($pos != false || $pos == 0){
        if($row['qans'] == $ans_arr[$pos]){
            $correct++;
            if($row['qtype'] == "single") $score = $score + (float)$s_p;
            if($row['qtype'] == "double") $score = $score + (float)$d_p;
        }
        else if($row['qans'] != $ans_arr[$pos] && $ans_arr[$pos] != 'x'){
            $wrong++;
            if($row['qtype'] == "single") $score = $score - (float)$s_n;
            if($row['qtype'] == "double") $score = $score - (float)$d_n;
        }
        else if($ans_arr[$pos] == "x"){
            $no_ans++;
            if($row['qtype'] == "single") $score = $score - (float)$s_no;
            if($row['qtype'] == "double") $score = $score - (float)$d_no;
        }
    }
}

$total = 0;
if($dl > 0){
    $total = ((count($ans_arr) - $dl) * $s_p) + ($dl * $d_p);
}
else{
    $total = count($ans_arr) * $s_p;
}

$sql_res = "insert into result (uemail, test_id, sub_id, qid, aid, score)
values ('".$_SESSION['uid']."', '$test_id', $sub_id, '$qid', '$aid', $score)";
if(!mysqli_query($connection, $sql_res)){

}
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
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
    <link rel="stylesheet" href="css/result.css">

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-svg-round-progressbar/0.4.4/roundProgress.min.js"></script>
</head>
<body>
<div class="banner center">
    <div class="page-container">
        <div class="row">
            <div class="col s12">
                <h5>Congratulations, <b><?php echo $fname . " " . $lname; ?></b></h5>
            </div>
            <div class="col s12 score">
                <h5><?php echo 'You scored <b>'. ($score). '</b> out of <b>'. $total.'</b>'; ?></h5>
            </div>
            <div class="col s12 m4 spacing-top-lg">
                <div class="row">
                    <div class="col s12 data-top">
                        <span><?php echo $score.'/'.$total; ?></span>
                    </div>
                    <div class="col s12 data-label">
                        <p>Score</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 spacing-top-lg">
                <div class="row">
                    <div class="col s12 data-top">
                        <span><?php echo ($correct + $wrong); ?></span>
                    </div>
                    <div class="col s12 data-label">
                        <p>Qs attempted</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 spacing-top-lg">
                <div class="row">
                    <div id="time" class="col s12 data-top">
                        <span><?php echo $time; ?></span>
                    </div>
                    <div class="col s12 data-label">
                        <p>Time spent</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="report spacing-top-lg" ng-app="app">
    <div class="page-container">
        <div class="row center" ng-controller="reportCtrl">
            <div class="col s12">
                <h3 class="page-heading">Assessment report</h3>
            </div>
            <div class="col s12 m6">
                <h5>Your score</h5>
                <round-progress
                    max="<?php echo $total; ?>"
                    current="<?php echo $score; ?>"
                    color="#00acc1"
                    bgcolor="#eeeeee"
                    radius="100"
                    stroke="50"
                    semi="false"
                    rounded="false"
                    clockwise="true"
                    responsive="false"
                    duration="800"
                    animation="easeInOutQuart"
                    animation-delay="0"></round-progress>
                <p><i class="icon ion-android-checkbox-blank cyan-text darken-1"></i> Your score: <?php echo $score; ?></p>
                <p><i class="icon ion-android-checkbox-blank grey-text lighten-3"></i> Total score: <?php echo $total; ?></p>
            </div>
            <div class="col s12 m6">
                <h5>Correct answers</h5>
                <round-progress
                    max="<?php echo count($ans_arr); ?>"
                    current="<?php echo $correct; ?>"
                    color="#90caf9"
                    bgcolor="#eeeeee"
                    radius="100"
                    stroke="50"
                    semi="false"
                    rounded="false"
                    clockwise="true"
                    responsive="false"
                    duration="800"
                    animation="easeInOutQuart"
                    animation-delay="0"></round-progress>
                <p><i class="icon ion-android-checkbox-blank blue-text lighten-3"></i> Correct answer: <?php echo $correct; ?></p>
                <p><i class="icon ion-android-checkbox-blank grey-text lighten-3"></i> Total questions: <?php echo count($ans_arr); ?></p>
            </div>
            <div class="col s12 m6">
                <h5>Questions attempted</h5>
                <round-progress
                    max="<?php echo count($ans_arr); ?>"
                    current="<?php echo ($correct + $wrong); ?>"
                    color="#7986cb"
                    bgcolor="#eeeeee"
                    radius="100"
                    stroke="50"
                    semi="false"
                    rounded="false"
                    clockwise="true"
                    responsive="false"
                    duration="800"
                    animation="easeInOutQuart"
                    animation-delay="0"></round-progress>
                <p><i class="icon ion-android-checkbox-blank indigo-text lighten-2"></i> Questions attempted: <?php echo ($correct + $wrong); ?></p>
                <p><i class="icon ion-android-checkbox-blank grey-text lighten-3"></i> Total questions: <?php echo count($ans_arr); ?></p>
            </div>
            <div class="col s12 m6">
                <h5>Time taken</h5>
                <round-progress
                    max="<?php echo $dtime; ?>"
                    current="<?php echo $time; ?>"
                    color="#4db6ac"
                    bgcolor="#eeeeee"
                    radius="100"
                    stroke="50"
                    semi="false"
                    rounded="false"
                    clockwise="true"
                    responsive="false"
                    duration="800"
                    animation="easeInOutQuart"
                    animation-delay="0"></round-progress>
                <p><i class="icon ion-android-checkbox-blank teal-text lighten-2"></i> Time taken: <?php echo $time; ?>s</p>
                <p><i class="icon ion-android-checkbox-blank grey-text lighten-3"></i> Total time: <?php echo $dtime; ?>s</p>
            </div>
        </div>
    </div>
</div>

<div class="page-container spacing-top-lg center">
    <a class="btn blue lighten-1 waves-effect" href="./../"><i class="icon ion-ios-home left"></i> Go back to Home</a>
</div>

<?php
include "./../inc/footer.html";
?>
<script src="js/result.js"></script>
<script src="js/resultJS.js"></script>
</body>
</html>