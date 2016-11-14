<?php
session_start();
$prefix_img = "./../";
if(!isset($conn)){
    require "./php/conn.php";
    $prefix_img = "";
}
$fname = "Sign in";
$hash = null;
if(isset($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
    $r = mysqli_query($conn, "select ufname, uhash from users where uemail = '$uid'");
    while($row = mysqli_fetch_assoc($r)){
        $fname = $row['ufname'];
        $hash = $row['uhash'];
    }
}
?>
<!--<div class="navbar-fixed navbar-pos-fix">-->

<?php
if(isset($_SESSION['uid'])){
    echo '<ul id="user-options" class="dropdown-content">
    <li><a href="view-profile.php?u='.urlencode($_SESSION['uid']).'&h='.$hash.'" title="View profile">View profile</a></li>
    <li><a href="php/logout.php" title="Logout">Logout</a></li>
</ul>';
}
?>
    <nav class="page-navbar">
        <div class="nav-wrapper page-container">
            <a href="./../" class="brand-logo page-title"><strong>Mentorz</strong>Hub</a>
            <a href="#" data-activates="mobile-side-nav" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="take-test">Test</a></li>
                <li><a href="badges.html">Blog</a></li>
                <li><a href="collapsible.html">Our Mentors</a></li>
                <li><a href="mobile.html">Be an Mentor</a></li>
                <li><a class="login-trigger dropdown-button" data-activates="user-options" title="<?php echo $fname; ?>">
                        <span><?php if(!isset($_SESSION['uid'])){
                                echo '<span class="material-icons">perm_identity</span> ';
                            }
                            else{
                                if(file_exists($prefix_img.'profile_pic/'. $_SESSION['uid'] .'/pp.jpg'))
                                    echo '<img src="'.$prefix_img.'profile_pic/'. $_SESSION['uid'] .'/pp.jpg" class="circle" width="20" alt="">';
                                else
                                    echo '<img src="'.$prefix_img.'profile_pic/user.png" class="circle" width="20" alt="">';
                            }
                            ?>
                            <span class="user-name"><?php echo $fname; ?></span>
                            <?php if(isset($_SESSION['uid'])) echo '<span class="material-icons">arrow_drop_down</span> '; ?>
                        </span></a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-side-nav">
                <li><a href="sass.html">Test</a></li>
                <li><a href="badges.html">Blog</a></li>
                <li><a href="collapsible.html">Our Mentors</a></li>
                <li><a href="mobile.html">Be an Mentor</a></li>
                <li><a class="login-trigger" title="<?php echo $fname; ?>"><span><?php echo $fname; ?></span></a></li>
                <?php if(isset($_SESSION['uid'])) echo '<li><a class="red-text" href="php/logout.php" title="Logout">Logout</a></li>'; ?>
            </ul>
        </div>
    </nav>
<div class="login-box">
    <div class="login-wrapper">
        <a id="close-login-box"><i class="material-icons">close</i></a>
        <iframe id="login-frame" src="inc/login.html"></iframe>
    </div>
</div>
    <script>
        $(document).ready(function () {
            $(".dropdown-button").dropdown({hover: false, belowOrigin: true});
            $(".button-collapse").sideNav();

            $(".login-trigger").click(function () {
                if($(".user-name").text() == "Sign in"){
                    show_login_box();
                }
            });
            $("#close-login-box").click(function () {
                hide_login_box();
            });
            $(".take-test").click(function (e) {
                e.preventDefault();
                if($(".user-name").text() == "Sign in"){
                    show_login_box();
                }
                else {
                    window.location.assign("exam/");
                }
            });
            
        });
        function show_login_box(){
            __listen();
            $(".login-box").css({display: 'block'});
            setTimeout(function () {
                $(".login-box").css({opacity: '1'});
            }, 100)
        }
        function hide_login_box(){
            $(".login-box").css({opacity: '0'});
            setTimeout(function () {
                $(".login-box").css({display: 'none'});
            }, 350)
        }
        var __listen = function () {
            setInterval(function () {
                if(window.localStorage.getItem("__id") == "one-time"){
                    window.localStorage.removeItem("__id");
                    window.location.reload();
                }
            },3000);
        };
    </script>
<!--</div>-->
