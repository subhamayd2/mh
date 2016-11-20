<?php

require 'conn.php';
$type = null;
$func = null;

if(isset($_POST['func'])){
    $func = $_POST['func'];
}

if(isset($_POST['type'])){
    $type = $_POST['type'];
}

if($func == 'checkEmail'){
    checkEmail();
}
else if($func == 'setUser'){
    setUser();
}

function setMentee(){
    global $conn;
    $addr = $_POST['addr'];
    $area = $_POST['area'];
    $dob = $_POST['dob'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];
    $lang = $_POST['language'];
    $mobile = $_POST['phone'];
    $pincode = $_POST['pincode'];
    $quali = $_POST['quali'];
    $city = $_POST['city'];

    $sql = "insert into user_details (u_fname, u_lname, u_email, u_gender, u_dob, u_mobile, u_lang, u_addr, u_area, u_city, u_pincode, u_quali, u_interest)
values ('$fname', '$lname', '$email', '$gender', '$dob', '$mobile', '$lang', '$addr', '$area', '$city', '$pincode', '$quali', '$interest')";
    if(mysqli_query($conn, $sql)){
        sendConfirm();
    }
    else{
        die("0");
    }
}

function setMentor(){
    
}

function checkEmail(){
    global $conn;
    $email = $_POST['email'];
    $sql = "select uemail from users where uemail = '$email'";
    $r = mysqli_query($conn, $sql);
    if(mysqli_num_rows($r) > 0){
        echo 1;
    }
    else{
        echo 0;
    }
}

function setUser(){
    global $conn, $type;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $hash = md5(rand(1000,9999));
    $sql = "insert into users (ufname, ulname, uemail, umobile, upass, utype, uhash) values ('$fname', '$lname', '$email', '$mobile', '$pass', '$type', '$hash');
insert into user_details (u_fname, u_lname, u_name, u_email, u_mobile) values ('$fname', '$lname', '$fname $lname', '$email', '$mobile')";
    if(!mysqli_multi_query($conn, $sql)){
        echo 0;
    }
    else{
        echo $_SERVER['DOCUMENT_ROOT'].'/mh/php/PHPMailer/config.php';return;
        $name = $fname. ' ' .$lname;
        sendConfirm($name, $email, $hash);
    }
}



function sendConfirm($name, $email, $hash){
    require_once $_SERVER['DOCUMENT_ROOT'].'mh/php/PHPMailer/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'mh/php/PHPMailer/class.phpmailer.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'mh/php/PHPMailer/class.smtp.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'mh/php/PHPMailer/PHPMailerAutoload.php';

    $mailer = new PHPMailer();
    $mailer->IsSMTP();  // telling the class to use SMTP
    $mailer->Host     = gethostbyname("smtpout.asia.secureserver.net"); // SMTP server
    $mailer->Port = "80";
    $mailer->Username = "support@aztechcorps.com";
    $mailer->Password = "Aptitudo@95";
    $mailer->From     = "no-reply@aztechcorps.com";
    $mailer->FromName = "AztechCorps Support";
    $mailer->SMTPAuth = true;
    $mailer->Sender = "no-reply@aztechcorps.com";
    $mailer->SMTPSecure = '';



// Set the subject
    $mailer->Subject = 'You have successfully registered on MentorzHub';

// Body
    $mailer->Body = '

Dear '.$name.',

You have successfully registered on MentorzHub. To start using our services please complete your registration process by clicking on the 
following link :

http://localhost/MentorzHub/confirmation/?u='.$email.'&h='.$hash.'


Thank you for choosing us.

With regards,
Support Team,
AztechCorps

';

// Add an address to send to.
    $mailer->AddAddress($email, $name);
    $mailer->send();
}