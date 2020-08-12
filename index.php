<?php
//echo"<script>window.location.href='http://197.248.7.200/weclines/index.php'</script>";

require_once('db_fns.php');
date_default_timezone_set('Africa/Nairobi');
if (isset($_SESSION['valid_user'])) {
    $old_user = $_SESSION['valid_user'];
    $resulta = mysql_query("DELETE from logintable where username='" . $_SESSION['valid_user'] . "'");
    $resultb = mysql_query("insert into log values('','" . $_SESSION['valid_user'] . " logs out of system-COMPUTER IP ADDRESS:" . $_SERVER['REMOTE_ADDR'] . "','" . $_SESSION['valid_user'] . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
// store  to test if they *were* logged in
    unset($_SESSION['valid_user']);
    $result_dest = session_destroy();
    if (!empty($old_user)) {
        if ($result_dest) {
            // if they were logged in and are now logged out
            echo "<script>window.location.href = \"index.php\";</script>";
        } else {// they were logged in and could not be logged out
            echo "<script>window.location.href = \"index.php\";</script>";
        }
    } else {// if they weren't logged in but came to this page somehow
        echo "<script>window.location.href = \"index.php\";</script>";
    }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Weclines HR Login</title>
    <meta name="keywords" content="Q-HRM"/>
    <meta name="description" content="Q-HRM"/>
    <link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
    <link rel="stylesheet" href="css/theme.css">
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
    <script type="text/javascript" src="js/jquery.custom.alerts.js"></script>


    <!-- CSS -->

    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"><![endif]-->
    <link href="css/font-entypo.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
    <link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">


    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]>
    <link href="css/ie.css" rel="stylesheet"> <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->


    <!-- Responsive CSS -->
    <link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css">
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css">


    <!-- for specific page in style css -->

    <!-- for specific page responsive in style css -->


    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#username').focus();
        });
        document.onkeydown = keydown;

        function keydown(evt) {
            if (!evt) evt = event;
            if (evt.keyCode == 13) { //enter
                if ($('#username').val != '' && $('#passwd').val() != '') {
                    login();
                } else {
                    $('#passwd').focus();
                }
            }
        }

        function login() {
            var username = $('#username').val();
            var passwd = $('#passwd').val();
            if (username == '') {
                $().customAlert();
                swal('Error!', '<p>Enter your Username!</p>');
                e.preventDefault();
            } else if (passwd == '') {
                $().customAlert();
                swal('Error!', '<p>Enter your password!</p>');
                e.preventDefault();
            } else {
                $('#message').html('<img id="img-spinner" src="images/load.gif" style="margin-top:20px" alt="Loading"/>');
                $.ajax({
                    url: 'login.php',
                    data: {username: username, passwd: passwd},
                    success: function (data) {
                        if (data == 0) {
                            // $('#message').html('');
                            swal("Success","Login successful. redirecting......","success");

                        } else $('#message').html(data);

                        if (data == 0) {
                            window.location.href = "test1.php";
                        }
                    }
                });
            }
        }


    </script>

</head>
<body id="pages"
      class="full-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar login-layout   clearfix"
      data-active="pages " data-smooth-scrolling="1">
<div class="vd_body">
    <!-- Header Start -->

    <!-- Header Ends -->
    <div class="content">
        <div class="container">

            <!-- Middle Content Start -->

            <div class="vd_content-wrapper">
                <div class="vd_container">
                    <div class="vd_content clearfix">
                        <div class="vd_content-section clearfix" style="padding:0">
                            <div class="vd_login-page">
                                <div class="heading clearfix">

                                </div>
                                <div class="panel widget" style="background:#fff">
                                    <div class="panel-body" style="border:1px solid #ddd">
                                        <img src="images/clogo.png" style="margin-bottom:10px;"/>
                                        <label class="control-label" for="username"
                                               style="font-size:20px;font-weight:bold;text-align: center;margin-bottom:10px;">Wec
                                            Kenya Human Resource Management System</label>
                                        <form class="form-horizontal" id="login-form" action="#" role="form">
                                            <div class="form-group  mgbt-xs-20">
                                                <div class="col-md-12">
                                                    <div class="label-wrapper sr-only">
                                                        <label class="control-label" for="username">Username</label>
                                                    </div>
                                                    <div class="vd_input-wrapper" id="email-input-wrapper"><span
                                                                class="menu-icon"> <i class="fa fa-user"></i> </span>
                                                        <input type="text" placeholder="Username" id="username"
                                                               name="username" class="required" required>
                                                    </div>
                                                    <div class="label-wrapper">
                                                        <label class="control-label sr-only"
                                                               for="password">Password</label>
                                                    </div>
                                                    <div class="vd_input-wrapper" id="password-input-wrapper"><span
                                                                class="menu-icon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="password" placeholder="Password" id="passwd"
                                                               name="password" class="required" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i
                                                        class="fa fa-exclamation-circle fa-fw"></i> Please fill the
                                                necessary field
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 text-center mgbt-xs-5">
                                                    <button class="btn vd_bg-green vd_white width-100" type="button"
                                                            id="login-submit" onclick="login()">Login <span
                                                                id="message"></span></button>
                                                    <div id="message"></div>
                                                    <small><a style="cursor:pointer;margin-top:20px" class="text-center"
                                                              onclick="window.open('http://www.qet.co.ke')">&copy; QET
                                                            SYSTEMS 2011-<?php echo date('Y') ?></a></small>
                                                </div>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Panel Widget -->
                            </div>
                            <!-- vd_login-page -->

                        </div>
                        <!-- .vd_content-section -->

                    </div>
                    <!-- .vd_content -->
                </div>
                <!-- .vd_container -->
            </div>
            <!-- .vd_content-wrapper -->

            <!-- Middle Content End -->

        </div>
        <!-- .container -->
    </div>
    <!-- .content -->


    <!-- Footer Start -->
    <footer class="footer-2" id="footer">
        <div class="vd_bottom ">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-12">
                        <div class="copyright text-center">
                            Copyright &copy;<?php echo date('Y') ?> QET SYSTEMS. All Rights Reserved
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        </div>
    </footer>
    <!-- Footer END -->

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
</body>
</html>
