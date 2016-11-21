<?php
include './../php/conn.php';

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
            echo '<div>'.$row['answer'].'</div>';
            echo '<p>'.$row['a_timestamp'].'</p>';
        }
    }

}



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
</head>
<body>
<?php
include "./../inc/nav.php";
?>

<div class="page-container">
    <div class="row">
        <div class="col s12">
            <h4><?php echo $question; ?></h4>
            <p>By: <?php echo $name; ?></p>
        </div>
    </div>
</div>
</body>
</html>
