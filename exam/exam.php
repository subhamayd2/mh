<?php
require "php/conn.php";
session_start();
$q = array();


function get_nav(){
    $limit = $_POST['no_of_ques'];
    for($i = 1; $i <= $limit; $i++){
        if($i == 1)
            echo '<div class="chip active visited" id="nav_'.$i.'">'.$i.'</div>';
        else
            echo '<div class="chip" id="nav_'.$i.'">'.$i.'</div>';
    }
    echo '<input type="hidden" value="'.$limit.'" id="limit">';
}
function get_ques(){
    global $connection, $q;
    $limit = $_POST['no_of_ques'];
    $subid = $_POST['sub_test_id'];
    $subid = (int)$subid;
    $r = null;
    if(isset($_POST['double_type']) && $_POST['double_type'] == true){
        $dl = $_POST['d_no_of_ques'];
        $sl = $limit - $dl;
        $d_sql = "select * from tbl_".$_POST['test_id']." where qsub_id = $subid and qtype='double' order by rand() limit ".$dl;
        $s_sql = "select * from tbl_".$_POST['test_id']." where qsub_id = $subid and qtype='single' order by rand() limit ".$sl;
        $r = mysqli_query($connection, $s_sql);
        print_q($r, 1);
        $r = mysqli_query($connection, $d_sql);
        print_q($r, $sl+1);
        echo '<input type="hidden" value="'. $_POST['d_n_marks']."**". $_POST['d_p_marks'] . "**". $_POST['d_no_marks'] .'" 
        id="double">';
        echo '<input type="hidden" value="'. $dl .'" id="dl">';
    }
    else{
        $sql = "select * from tbl_".$_POST['test_id']." where qsub_id = $subid and qtype='single' order by rand() limit ".$limit;
        print_q(mysqli_query($connection, $sql), 1);
        echo '<input type="hidden" value="none" id="double">';
    }

    echo '<input type="hidden" value="'. implode(",", $q) .'" id="qid">';
    echo '<input type="hidden" value="'. $_POST['test_id'] .'" id="testid">';
    echo '<input type="hidden" value="'. $subid .'" id="subid">';
    echo '<input type="hidden" value="'. $_POST['negative']."**". $_POST['positive'] . "**". $_POST['no_answer'] .'"
     id="single">';
}

function print_q($res, $start){
    global $q;
    $index = $start;
    while($row = mysqli_fetch_assoc($res)){
        array_push($q, $row['qID']);
        if($index == 1){
            echo '<div class="question ontop" id="q_1">';
        }
        else{
            echo '<div class="question" id="q_'.$index.'">';
        }
        echo '<div class="ques">
                    <div class="row">
                        <div class="col s2"><span>'.$index.'|</span></div>
                        <div class="col s10">'.$row['qques'].'</div>
                    </div>
                </div>
                <div class="row ans">
                    <div class="col s12">
                        <p class="ans_'.$index.'">
                            <input name="ans_'.$index.'" type="radio" id="ans_'.$index.'_a" />
                            <label for="ans_'.$index.'_a">a) '.$row['qa'].'</label>
                        </p>
                        <p class="ans_1">
                            <input name="ans_'.$index.'" type="radio" id="ans_'.$index.'_b" />
                            <label for="ans_'.$index.'_b">b) '.$row['qb'].'</label>
                        </p>
                        <p class="ans_1">
                            <input name="ans_'.$index.'" type="radio" id="ans_'.$index.'_c" />
                            <label for="ans_'.$index.'_c">c) '.$row['qc'].'</label>
                        </p>
                        <p class="ans_1">
                            <input name="ans_'.$index.'" type="radio" id="ans_'.$index.'_d" />
                            <label for="ans_'.$index.'_d">d) '.$row['qd'].'</label>
                        </p>
                    </div>
                </div>
            </div>';
        $index++;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Examination on <?php echo $_POST['test_name']; ?></title>
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
    <link rel="stylesheet" href="css/exam.css">
</head>
<body>

<span id="exam-status">Not Started</span>

<div class="topbar">
    <div class="page-container center">
        <a class="btn red darken-1 waves-effect" id="final_submit">Final submit</a>
        <p id="timer" data-duration="<?php echo $_POST['duration']; ?>">0:0:0</p>
    </div>
</div>
<div class="exam-wrapper">
    <div class="row">
        <div class="col s12 m3 nav-wrapper">
            <div class="nav-content">
                <?php
                echo '<p class="page-heading">'.$_POST['test_name'].'</p>';
                get_nav();
                ?>
            </div>
            <div class="scroll-hide"></div>
        </div>
        <div class="col s12 m9">
            <div class="row">
                <div class="col s12 questions-wrapper">
                    <?php get_ques(); ?>
                </div>
                <div class="col s12 center">
                    <button id="prev" class="btn blue lighten-1 waves-effect"><i class="icon ion-ios-arrow-back left"></i> Previous</button>
                    <button id="next" class="btn blue lighten-1 waves-effect">Next <i class="icon ion-ios-arrow-forward right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/exam.js"></script>
<script src="js/timer.js"></script>
</body>
</html>