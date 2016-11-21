<?php
include './../php/conn.php';

$q = '%';
$cat = '%';
if(isset($_GET['q'])){
    $q = '%'.$_GET['q'].'%';
}
if(isset($_GET['c'])){
    $cat = '%'.$_GET['c'].'%';
}
$sql = "select * from ask_question where category like '$cat' and question like '$q' order by q_timestamp desc";
$r_ques = mysqli_query($conn, $sql);

function print_questions(){
    global $r_ques;
    if(mysqli_num_rows($r_ques) == 0){
        echo '<div class="col s12">';
        echo '<h5>No such questions found. Please try again with some other query or add a new question.</h5>';
        echo '</div>';
        return;
    }
    while($row = mysqli_fetch_assoc($r_ques)){
        echo '<div class="col s12">
                        <a href="view-question.php?qid='.$row['ID'].'" target="_blank" title="'.$row['question'].'"><h5>'.$row['question'].'</h5></a>
                        <p>Asked by: <a target="_blank" title="'.$row['u_name'].'" href="http://localhost/mh/view-profile.php?u='.urlencode($row['u_email']).'">'.$row['u_name'].'</a></p>
                        <p>Asked on: <span class="timestamp">'.$row['q_timestamp'].'</span></p>
                        <a href="./?c='.$row['category'].'" title="Show questions related to '.$row['category'].'"><span>'.$row['category'].'</span></a>
                    </div>';
    }
}

function get_category(){
    global $conn;
    $sql = "select distinct category from ask_question";
    $r = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($r)){
        echo '<div class="col s12">';
        echo '<a href="http://localhost/mh/ask/?c='.$row['category'].'">'.$row['category'].'</a>';
        echo '</div>';
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js"></script>

    <link rel="stylesheet" href="./../css/media.queries.css">
    <link rel="stylesheet" href="./../css/scroll.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="./../css/global.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
<?php
include "./../inc/nav.php";

if(isset($_SESSION['uid'])){
    include 'inc/add_ques.html';
}

?>

<input type="hidden" value="<?php echo isset($_GET['c'])?$_GET['c']:'%' ?>" id="category">
<div>
    <div class="page-container">
        <div class="row spacing-top-lg">
            <div class="col s12 m9">
                <h4 class="page-heading"><b>Have a question?</b></h4>
            </div>
            <div class="col s12 m3 search-question-wrapper input-field">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <i class="material-icons">search</i>
                    <input type="text" placeholder="Search question" name="q">
                </form>
            </div>
        </div>
    </div>
    <div class="page-container">
        <div class="row spacing-top">
            <div class="col s12 m9">
                <div class="row question-wrapper">
                    <?php print_questions(); ?>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="row">
                    <div class="col s12">
                        <h5 class="page-heading"><b>Categories</b></h5>
                    </div>
                    <div class="col s12">
                        <a href="http://localhost/mh/ask/" target="_self" title="Show all questions">All</a>
                    </div>
                    <?php get_category(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(window).load(function () {
        var txt = document.getElementsByClassName("timestamp");
        for(var i = 0; i < txt.length; i++){
            txt[i].innerHTML += " ("+moment(txt[i].innerHTML, 'YYYY-MM-DD HH:mm:ss').fromNow()+")";
        }
    });
</script>

<?php
include './../inc/footer.html';
?>
</body>
</html>
