<?php
require "php/conn.php";

$_uid = null;
$hash = null;

$_fname = null;
$lname = null;
$gender = null;
$dob = null;
$mobile = null;
$lang = null;
$addr = null;
$area = null;
$city = null;
$pincode = null;
$quali = null;
$interest = null;
$job_title = null;
$job_org = null;
$job_industry = null;
$hedu_title = null;
$hedu_subj = null;
$hedu_inst = null;
$uedu_title = null;
$uedu_subj = null;
$uedu_inst = null;
$sec_edu = null;

if(isset($_GET['u']) && isset($_GET['h'])){
    $_uid = urldecode($_GET['u']);
    $hash = $_GET['h'];
}
else{
    header("location: ./");
    return;
}
$r = mysqli_query($conn, "select * from user_details where u_email = '$_uid'");
if(mysqli_num_rows($r) < 1){
    header("location: ./");
}
else{
    $res = mysqli_query($conn, "select utype from users where uemail = '$_uid'");
    $utype = null;
    while($_row = mysqli_fetch_assoc($res)){
        $utype = $_row['utype'];
    }
    while($row = mysqli_fetch_assoc($r)){
        $_fname = $row['u_fname'];
        $lname = $row['u_lname'];
        $gender = $row['u_gender'];
        $dob = $row['u_dob'];
        $mobile = $row['u_mobile'];
        $lang = $row['u_lang'];
        $addr = $row['u_addr'];
        $area = $row['u_area'];
        $city = $row['u_city'];
        $pincode = $row['u_pincode'];
        $quali = $row['u_quali'];
        $interest = $row['u_interest'];
        $job_title = $row['u_job_title'];
        $job_org = $row['u_job_org'];
        $job_industry = $row['u_job_industry'];
        $hedu_title = $row['u_hedu_title'];
        $hedu_subj = $row['u_hedu_subj'];
        $hedu_inst = $row['u_hedu_inst'];
        $uedu_title = $row['u_uedu_title'];
        $uedu_subj = $row['u_uedu_subj'];
        $uedu_inst = $row['u_uedu_inst'];
        $sec_edu = $row['u_sec_edu'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo 'Here\'s '. $_fname . '\'s profile'; ?></title>
    <meta name="viewport" content="initial-width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Anton|Open+Sans+Condensed:300" rel="stylesheet">

    <link rel="stylesheet" href="css/media.queries.css">
    <link rel="stylesheet" href="css/scroll.css">

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/view_profile.css">
</head>
<body>
<?php
include "inc/nav.php";
?>

<div class="banner">
    <div class="row page-container">
        <div class="col s12 m3 center">
            <img src="profile_pic/bloodyshower@gmail.com/pp.jpg" class="circle responsive-sm invisible">
        </div>
        <div class="col s12 m7 invisible">
            <h1><?php echo $_fname . " " . $lname; ?></h1>
            <h4><?php echo $utype; ?></h4>
            <p><?php echo (isset($interest)) ? 'Interest: ' .$interest : ""; ?></p>
            <p><?php echo (isset($quali)) ? 'Highest Qualification: ' .$quali : ""; ?></p>
        </div>
        <div class="col s12 m2 invisible call-wrapper center">
            <?php
            if(isset($_SESSION['type']) && ($utype != $_SESSION['type'])){
                    echo '<a href="#!"><i class="material-icons medium">call</i></a>';
            }
            ?>
        </div>
        <?php
        if($quali == null && isset($_SESSION['uid']) && $_uid == $_SESSION['uid']){
            echo '<div class="col s12 center spacing-top">
                    <a class="btn blue lighten-1 waves-effect">Activate your account</a>
                  </div>';
        }
        else if($quali != null && isset($_SESSION['uid']) && $_uid == $_SESSION['uid']){
            echo '<div class="col s12 center spacing-top">
                    <a class="btn blue lighten-1 waves-effect">Edit profile</a>
                  </div>';
        }
        ?>
    </div>
</div>



<?php
include "inc/footer.html";
?>
<script src="js/view_profile.js"></script>
</body>
</html>