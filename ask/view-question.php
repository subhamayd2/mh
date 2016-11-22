<?php
require './../php/conn.php';

$qid = null;
if(isset($_GET['qid'])){
    $qid = $_GET['qid'];
}
else{
    header("location: ./");
}
$question = null;
$name = null;
$email = null;
$q_timestamp = null;
$category = null;

$sql = "select * from ask_question where ID = $qid";
$r = mysqli_query($conn, $sql);

if(mysqli_num_rows($r) < 1)
    header("location: ./");

while($row = mysqli_fetch_assoc($r)){
    $question = $row['question'];
    $name = $row['u_name'];
    $email = $row['u_email'];
    $q_timestamp = $row['q_timestamp'];
    $category = $row['category'];
}

function get_answers(){
    global $conn;
    $qid = $_GET['qid'];

    $sql = "select * from ask_answer where q_id = $qid ORDER by a_timestamp DESC";
    $r = mysqli_query($conn, $sql);

    if(mysqli_num_rows($r) < 1){
        echo '<div class="col s12"><h4>Not answered yet.</h4></div>';
    }
    else{
        while($row =  mysqli_fetch_assoc($r)){
            echo '<div class="col s12">';
            echo '<img src="./../profile_pic/'.$row['u_email'].'/pp.jpg" width="40" alt="" class="circle left"> ';
            echo '<h5>'.$row['u_name'].'</h5>';

            $email = $row['u_email'];
            $rr = mysqli_query($conn, "select u_job_title, u_job_org from user_details where u_email = '$email'");
            while($_row = mysqli_fetch_assoc($rr)){
                echo '<span>'.$_row['u_job_title'].' at '.$_row['u_job_org'].'</span>';
            }
            echo '<hr width="100%" size="1">';
            echo '<div class="spacing-top">'.$row['answer'].'</div>';
            echo '<p>'.$row['a_timestamp'].'</p>';
            echo '</div>';
        }
    }

}

$conn = null;

?>
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
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./../css/media.queries.css">
    <link rel="stylesheet" href="./../css/scroll.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="./../css/global.css">
    <link rel="stylesheet" href="css/view_question.css">

    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
</head>
<body>
<?php
require "./../php/conn.php";
include "./../inc/nav.php";
?>

<div class="page-container">
    <div class="row">
        <div class="col s12 question-wrapper">
            <h4><?php echo $question; ?></h4>
            <p>By: <?php echo $name; ?></p>
            <p>Asked on: <?php echo $q_timestamp; ?></p>
            <a href="./?c=<?php echo $category; ?>" title="Show questions related to <?php echo $category; ?>"><span><?php echo $category; ?></span></a>
        </div>
    </div>
    <div class="row answer-wrapper">
        <?php get_answers(); ?>
    </div>
</div>

<?php
if(isset($_SESSION['uid']) && $_SESSION['type'] == "Mentor"){
    $_email = $_SESSION['uid'];
    $_name = null;
    $res = mysqli_query($conn, "select u_name from user_details where u_email = '$_email'");
    while($__row = mysqli_fetch_assoc($res)){
        $_name = $__row['u_name'];
    }
    echo '<div class="page-container">
<h4 class="page-heading spacing-top-lg">Submit your answer</h4>
<input type="hidden" id="qid" value="'.$qid.'">
<input type="hidden" id="mname" value="'.$_name.'">
<input type="hidden" id="memail" value="'.$_email.'">
    <form class="row">
        <div class="input-field col s12">
            <textarea id="answer-text" class="materialize-textarea"></textarea>
            <label for="answer-text"></label>
        </div>
        <div class="col s12 center spacing-top">
            <a class="btn blue lighten-1 waves-effect" id="submit-answer">Submit answer</a>
        </div>
    </form>
</div>
<script src="js/answer.js"></script>
<script>
    tinymce.init({ selector:\'#answer-text\',
        plugins : \'advlist autolink link image lists charmap print preview\',
        height: 300,
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true });
</script>';
}
?>


<?php
include './../inc/footer.html';
?>
</body>
</html>
