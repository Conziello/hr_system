<?php include('db_fns.php');
if (isset($_SESSION['valid_user'])) {
    $username = $_SESSION['valid_user'];
    $result = mysql_query("select * from users where name='" . $username . "'");
    $row = mysql_fetch_array($result);
    $usertype = stripslashes($row['position']);
    $photo = stripslashes($row['photo']);
    include('functions.php');
} else {
    echo "<script>window.location.href = \"index.php\";</script>";
}
$arr=array();
$result =mysql_query("select * from accesstbl");
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
    $row=mysql_fetch_array($result);
    $var=stripslashes($row[$usertype]);
    $code=stripslashes($row['AccessCode']);
    $arr[$code]=$var;
}

if($arr[231]=='YES'){
    $_SESSION['clearance']='(clearance=1 or clearance=2)';
    $_SESSION['level']=2;
}else {$_SESSION['clearance']='clearance=1';
    $_SESSION['level']=1;}
?>
<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.slashdown.nl/starhotel/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 01 Oct 2014 05:34:01 GMT -->
<head>
    <meta charset="utf-8">
    <title>Wec Lines HR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="favicon.png">

    <!-- Stylesheets -->
    <!-- CSS -->

    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="css/font-entypo.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
    <link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">


    <link href="plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">


    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]>
    <link href="css/ie.css" rel="stylesheet"> <![endif]-->
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->


    <!-- Responsive CSS -->
    <link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css">


    <!-- Specific CSS -->
    <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css">
    <link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css">
    <link href="plugins/introjs/css/introjs.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-wysiwyg/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="css/autocomplete.css" rel="stylesheet" type="text/css">
    <link href="css/select2.css" rel="stylesheet" type="text/css">
    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->


    <!-- Javascripts -->


    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/theme.css"> -->
    <link rel="stylesheet" href="css/colors/turquoise.css" id="switch_style">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="ui/jquery.ui.all.css">
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

    <script src="ui/jquery.ui.core.js"></script>
    <script src="ui/jquery.ui.widget.js"></script>
    <script src="ui/jquery.ui.button.js"></script>


    <script src="ui/jquery.ui.datepicker.js"></script>
    <script src="ui/jquery.ui.position.js"></script>
    <script src="ui/jquery.ui.dialog.js"></script>
    <script src="ui/jquery.ui.tabs.js"></script>
    <script src="ui/jquery.effects.core.js"></script>
    <script src="ui/jquery.effects.blind.js"></script>
    <script src="ui/jquery.effects.bounce.js"></script>
    <script src="ui/jquery.effects-explode.js"></script>
    <script src="ui/jquery.ui.autocomplete.js"></script>
    <script src="ui/jquery.ui.tooltip.js"></script>
    <script src="ui/jquery.ui.resizable.js"></script>
    <script src="ui/jquery.ui.mouse.js"></script>

    <script src="ui/jquery.ui.menu.js"></script>
    <script src="ui/jquery.ui.draggable.js"></script>
    <script src="ui/jquery.ui.mouse.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>


    <script type="text/javascript" src="js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.confirm/jquery.confirm.css"/>
    <script src="jquery.confirm/jquery.confirm.js"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
    <script type="text/javascript" src="js/jquery.custom.alerts.js"></script>

    <script>
        document.onkeydown = keydown;

        function keydown(evt) {
            if (!evt) evt = event;

            if (evt.keyCode == 118) { //f7
                evt.preventDefault();

                var a = $('#shortvalue').val();
                if (a == 0) {
                    $('#shortie').fadeIn(0);
                    $('#shortvalue').val(1);
                } else {
                    $('#shortie').fadeOut(0);
                    $('#shortvalue').val(0);
                }
            }

            if (evt.keyCode == 122) { //f11
                evt.preventDefault();
                document.documentElement.mozRequestFullScreen();
            }
        }

        window.onload = setupRefresh;
        var timer = 0;

        function setupRefresh() {
            timer = setInterval("auto_logout();", 600000);
        }

        function reset_interval() {
            if (timer != 0) {
                clearInterval(timer);
                timer = 0;
                timer = setInterval("auto_logout();", 600000);
            }
        }

        function auto_logout() {
            main();
        }

        $(function () {
            $("#radio").buttonset();
        });
    </script>
    <script>
        // Options
        var dots = true;
        var MAX_STARS = 1000;
        var fps = 60;
        var spread_slowness = 100;
        var mouse_effect_enabled = true;
        var mouse_effect_type = "Magnify";
        var mouse_effect_intensity = 0.01;
        var mouse_effect_size = 100;

        // State variables
        var mspf = 100 / fps;
        var updateInterval;
        var ctx;
        var stars = new Array();
        var canvas;
        var ticks = 0;
        var center;
        var y_off = 0;
        var x_off = 0;
        var mouse_x = -1;
        var mouse_y = -1;

        function main() {
            $('#screensaver').fadeIn(0);
            canvas = document.getElementById('canvas');
            if (canvas.getContext) {
                ctx = canvas.getContext('2d');
                canvas.addEventListener('mousemove', onmouse, false);

                document.getElementById('title').onclick = function (e) {
                    var div = document.getElementById('controls');
                    div.className = (div.className == "collapsed") ? "" : "collapsed";
                };

                document.getElementById('dotsToggle').onchange = changedSetting;
                document.getElementById('effectToggle').onchange = changedSetting;
                document.getElementById('effectType').onchange = changedSetting;
                document.getElementById('effectSize').onchange = changedSetting;
                document.getElementById('spreadSlowness').onchange = changedSetting;
                document.getElementById('fpsRate').onchange = changedSetting;

                updateInterval = window.setInterval("update()", mspf);
            }
        }

        function update() {
            canvas.height = window.innerHeight;
            canvas.width = window.innerWidth;
            center = [canvas.width / 2, canvas.height / 2];
            max_radius = Math.min(canvas.height, canvas.width) / 2;
            clear();

            // New star ([angle, distance from center])
            stars.push([(3 * ticks % 400) / 400.0, 0]);
            if (stars.length > MAX_STARS) {
                stars.shift();
            }

            // Update and draw stars
            if (dots)
                ctx.fillStyle = "#FFFFFF";
            else
                ctx.strokeStyle = "#FFFFFF";
            ctx.beginPath();
            ctx.moveTo(center[0], center[1]);
            for (var i = 0; i < stars.length; i++) {
                // Update
                stars[i][1] += (max_radius - stars[i][1]) / spread_slowness;

                // Compute
                y_off = stars[i][1] * Math.sin(Math.PI * 2 * stars[i][0]);
                x_off = stars[i][1] * Math.cos(Math.PI * 2 * stars[i][0]);

                var x = center[0] + x_off;
                var y = center[1] + y_off;

                // Mouse effect
                if (mouse_effect_enabled) {
                    var mouse_dist = Math.sqrt(Math.pow(x - mouse_x, 2) + Math.pow(y - mouse_y, 2));
                    var mouse_angle = Math.atan((y - mouse_y) / (x - mouse_x));
                    switch (mouse_effect_type) {
                        case "Magnify":
                            var mouse_effect = (mouse_dist < mouse_effect_size) ? mouse_effect_size - mouse_dist : 0;
                            break;
                        case "Attract":
                            var mouse_effect = (mouse_dist < mouse_effect_size) ? mouse_dist - mouse_effect_size : 0;
                            break;
                    }
                    y += mouse_effect_intensity * mouse_effect * (y - mouse_y);
                    x += mouse_effect_intensity * mouse_effect * (x - mouse_x);
                }

                // Draw the stuff
                // Dot mode
                if (dots)
                    ctx.rect(x, y, 2, 2);
                // Line Mode
                else
                    (i == 0) ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            }
            if (dots)
                ctx.fill();
            else
                ctx.stroke();

            ticks++;
        }

        function clear() {

            ctx.fillStyle = "#000000";
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
            ctx.rect(0, 0, canvas.width, canvas.height);
            ctx.closePath();
            ctx.fill();
        }

        function onmouse(ev) {
            if (ev.layerX || ev.layerX == 0) { // Firefox
                ev._x = ev.layerX;
                ev._y = ev.layerY;
            }
            if (ev.offsetX || ev.offsetX == 0) { // Opera
                ev._x = ev.offsetX;
                ev._y = ev.offsetY;
            }

            mouse_x = ev._x;
            mouse_y = ev._y;
        }

        function changedSetting(e) {
            if (!e) var e = window.event;

            switch (e.target.id) {
                case "dotsToggle":
                    dots = !dots;
                    break;
                case "effectToggle":
                    mouse_effect_enabled = !mouse_effect_enabled;
                    break;
                case "effectType":
                    mouse_effect_type = e.target.options[e.target.selectedIndex].value;
                    break;
                case "effectSize":
                    mouse_effect_size = e.target.value;
                    break;
                case "spreadSlowness":
                    spread_slowness = e.target.value;
                    break;
                case "fpsRate":
                    fps = e.target.value;
                    mspf = 1000 / fps;
                    window.clearInterval(updateInterval);
                    updateInterval = window.setInterval("update()", mspf);
                    break;
            }
        }

        function hidescreen() {
            clear();
            $('#screensaver').fadeOut(0);
        }
    </script>

</head>

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix"
      data-active="dashboard " data-smooth-scrolling="1" onmousemove="reset_interval()" onclick="reset_interval()"
      onkeypress="reset_interval()" onscroll="reset_interval()">

<div class="vd_body">
    <!-- Header Start -->
    <header class="header-1" id="header">
        <div class="vd_top-menu-wrapper">
            <div class="container ">
                <div class="vd_top-nav vd_nav-width  ">
                    <div class="vd_panel-header">
                        <div class="logo">
                            <a href="#" style="font-size:12px">KPA CENTRAL CRM</a>
                        </div>
                        <!-- logo -->
                        <div class="vd_panel-menu  hidden-sm hidden-xs"
                             data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation."
                             data-step=1>
            		                	<span class="nav-medium-button menu" data-toggle="tooltip"
                                              data-placement="bottom" data-original-title="Medium Nav Toggle"
                                              data-action="nav-left-medium">
	                    <i class="fa fa-bars"></i>
                    </span>

                            <span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom"
                                  data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span>

                        </div>
                        <div class="vd_panel-menu left-pos visible-sm visible-xs">

                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>


                        </div>
                        <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>

                            <span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                            <i class="fa fa-comments"></i>
                        </span>

                        </div>
                        <!-- vd_panel-menu -->
                    </div>
                    <!-- vd_panel-header -->

                </div>
                <div class="vd_container">
                    <div class="row">
                        <div class="col-sm-5 col-xs-12">

                            <div class="vd_menu-search">
                                <form id="search-box" method="post" action="#">
                                    <input type="text" name="search" id="searchfield"
                                           class="vd_menu-search-text width-60" placeholder="Search">
                                    <div class="vd_menu-search-category"><span data-action="click-trigger"> <span
                                                    class="separator"></span> <span class="text">Category</span> <span
                                                    class="icon"> <i class="fa fa-caret-down"></i></span> </span>
                                        <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm"
                                             data-action="click-target">
                                            <div class="child-menu">
                                                <div class="content-list content-menu content">
                                                    <ul class="list-wrapper">
                                                        <li>
                                                            <label>
                                                                <input type="radio" name="category" value="tenants"
                                                                       checked>
                                                                <span>Members</span></label>
                                                        </li>

                                                        <li>
                                                            <label>
                                                                <input type="radio" name="category" value="invoices">
                                                                <span>Invoices</span></label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" name="category" value="receipts">
                                                                <span>Receipts</span></label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" name="category" value="tendocs">
                                                                <span>Documents</span></label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="vd_menu-search-submit" onclick="searchdash()"><i
                                                class="fa fa-search"></i> </span>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <div class="vd_mega-menu-wrapper">
                                <div class="vd_mega-menu pull-right">
                                    <ul class="mega-ul">
                                        <li id="top-menu-2" class="one-icon mega-li">
                                            <a href="index-2.html" class="mega-link" data-action="click-trigger">
                                                <span class="mega-icon" onclick="loadtasks()"><i
                                                            class="fa fa-tasks"></i></span>
                                                <span class="badge vd_bg-red" id="taskscount">2</span>
                                            </a>
                                            <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 width-lg-4 right-xs left-sm"
                                                 data-action="click-target">
                                                <div class="child-menu">
                                                    <div class="title">
                                                        Tasks
                                                    </div>
                                                    <div class="content-list content-image" id="maintasks">

                                                        <div class="closing text-center" style="">
                                                            <a href="#" onclick="dashboard()">See All Tasks <i
                                                                        class="fa fa-angle-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- child-menu -->
                                            </div>   <!-- vd_mega-menu-content -->
                                        </li>
                                        <li id="top-menu-3" class="one-icon mega-li">
                                            <a href="index-2.html" class="mega-link" data-action="click-trigger">
                                                <span class="mega-icon" onclick="loadnotifications()"><i
                                                            class="fa fa-globe"></i></span>
                                                <span class="badge vd_bg-red" id="notificationscount">29</span>
                                            </a>
                                            <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm"
                                                 data-action="click-target">
                                                <div class="child-menu">
                                                    <div class="title">
                                                        Notifications
                                                        <div class="vd_panel-menu">
                                                        </div>
                                                    </div>
                                                    <div class="content-list" id="mainnotifications">

                                                        <div class="closing text-center" style="">
                                                            <a href="#" onclick="dashboard()">See All Notifications <i
                                                                        class="fa fa-angle-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- child-menu -->
                                            </div>   <!-- vd_mega-menu-content -->
                                        </li>

                                        <li id="top-menu-profile" class="profile mega-li">
                                            <a href="#" class="mega-link" data-action="click-trigger">
            <span class="mega-image">
                <img src="img/users/1.jpg" alt="Profile"/>
            </span>
                                                <span class="mega-name">SYSTEM<i class="fa fa-caret-down fa-fw"></i>
            </span>
                                            </a>
                                            <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm"
                                                 data-action="click-target">
                                                <div class="child-menu">
                                                    <div class="content-list content-menu">
                                                        <ul class="list-wrapper pd-lr-10">
                                                            <li><a href="#" onclick="changelogin()">
                                                                    <div class="menu-icon"><i class=" fa fa-cogs"></i>
                                                                    </div>
                                                                    <div class="menu-text">Change Password</div>
                                                                </a></li>
                                                            <li><a href="#" onclick="logout()">
                                                                    <div class="menu-icon"><i
                                                                                class=" fa fa-sign-out"></i></div>
                                                                    <div class="menu-text">Log Out</div>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                    <!-- Head menu search form ends -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- container -->
        </div>
        <!-- vd_primary-menu-wrapper -->

    </header>
    <!-- Header Ends -->
    <div class="content">
        <div class="container">

            <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">
                <div class="navbar-tabs-menu clearfix">
                    <span class="expand-menu" data-action="expand-navbar-tabs-menu"></span>
                </div>
                <div class="navbar-menu clearfix">
                    <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom"
                  data-action="expand-all" class="menu"
                  data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu."
                  data-step=4>
                <i class="fa fa-sort-amount-asc"></i>
            </span>
                    </div>
                    <div class="vd_menu">

                        <ul class="menuitem">

                            <li style="">
                                <a><span class="menu-text">This copy is licensed to:</span></a>
                                <div style="background: #f00">
                                    <img src="images/clogo.jpg" style="float:left;margin-bottom:10px;width:100%"/>
                                </div>
                                <div style="clear:both"></div>
                                <a><span class="menu-text"><b>Weclines H/R Management System</span></a></b>
                            </li>
                            <div style="clear:both;width:100%"></div>

                            <li>
                                <a href="#" onclick="dashboard()">
                                    <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
                                    <span class="menu-text">Dashboard</span>
                                </a></li>


                            <li>
                                <a href="javascript:void(0);" data-action="click-trigger">
                                    <span class="menu-icon"><i class="fa fa-users"> </i></span>
                                    <span class="menu-text">Employees</span>
                                    <span class="menu-badge"><span class="badge vd_bg-black-30"><i
                                                    class="fa fa-angle-down"></i></span></span>
                                </a>
                                <div class="child-menu" data-action="click-target">
                                    <ul>
                                        <?php
                                        if ($arr[201] == 'YES') {
                                            echo '<li><a onclick="newemp();">Add New Employee</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc" >Add New Employee</p></li>';
                                        }
                                        if ($arr[202] == 'YES') {
                                            echo '<li><a onclick="seeemp(5);">Edit Employee Info</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc">Edit Employee Info</p></li>';
                                        }
                                        if ($arr[204] == 'YES') {
                                            echo ' <li><a onclick="findemp();">Find Employee</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc" disabled="disabled">Find Employee</p></li>';
                                        }
                                        if ($arr[205] == 'YES') {
                                            echo '<li><a onclick="seeemp(10);">Archive Employee Record</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc" disabled="disabled">Archive Employee Record</p></li>';
                                        }
                                        if ($arr[203] == 'YES') {
                                            echo '  <li><a onclick="seeemp(7)">Employee File</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc" disabled="disabled">Employee File</p></li>';
                                        }
                                        if ($arr[206] == 'YES') {
                                            echo '<li><a onclick="exemp()">Ex-Employees Panel</a></li>';
                                        } else {
                                            echo '<li><p style="color:#ccc" disabled="disabled">Ex-Employees Panel</p></li>';
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-action="click-trigger">
                                    <span class="menu-icon"><i class="fa fa-tasks"> </i></span>
                                    <span class="menu-text">Tasks</span>
                                    <span class="menu-badge"><span class="badge vd_bg-black-30"><i
                                                    class="fa fa-angle-down"></i></span></span>
                                </a>
                                <div class="child-menu" data-action="click-target">
                                    <ul>

                                        <li>
                                            <a href="#" onclick="cardregister()">
                                                <span class="menu-text">Card Registry</span>
                                            </a></li>


                                        <li>
                                            <a href="#" onclick="findcards()">
                                                <span class="menu-text">Find Cards</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="assigncard()">
                                                <span class="menu-text">Card Assignment</span>
                                            </a></li>


                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="javascript:void(0);" data-action="click-trigger">
                                    <span class="menu-icon"><i class="fa fa-plane"> </i></span>
                                    <span class="menu-text">Leave</span>
                                    <span class="menu-badge"><span class="badge vd_bg-black-30"><i
                                                    class="fa fa-angle-down"></i></span></span>
                                </a>
                                <div class="child-menu" data-action="click-target">
                                    <ul>
                                        <li>
                                            <a href="#" onclick="cmeregistry()">
                                                <span class="menu-text">CME Registry</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="findcme()">
                                                <span class="menu-text">Find CME</span>
                                            </a></li>


                                        <li>
                                            <a href="#" onclick="seecme(1)">
                                                <span class="menu-text">Edit CME</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="seecme(2)">
                                                <span class="menu-text">Delete CME</span>
                                            </a></li>

                                        <li>
                                            <a href="#" onclick="seecme(3)">
                                                <span class="menu-text">CME File</span>
                                            </a></li>


                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="javascript:void(0);" data-action="click-trigger">
                                    <span class="menu-icon"><i class="fa fa-money"> </i></span>
                                    <span class="menu-text">Payroll</span>
                                    <span class="menu-badge"><span class="badge vd_bg-black-30"><i
                                                    class="fa fa-angle-down"></i></span></span>
                                </a>
                                <div class="child-menu" data-action="click-target">
                                    <ul>
                                        <li>
                                            <a href="#" onclick="workregistry()">
                                                <span class="menu-text">Workshops Registry</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="findworkshops()">
                                                <span class="menu-text">Find Workshops</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="seeworkshop(1)">
                                                <span class="menu-text">Edit Workshop</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="seeworkshop(2)">
                                                <span class="menu-text">Delete Workshop</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="seeworkshop(3)">
                                                <span class="menu-text">Workshop File</span>
                                            </a></li>

                                        <li>
                                            <a href="#" onclick="seeworkshop(4)">
                                                <span class="menu-text">Workshop Attendance</span>
                                            </a></li>


                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="javascript:void(0);" data-action="click-trigger">
                                    <span class="menu-icon"><i class="fa fa-gears"> </i></span>
                                    <span class="menu-text">Tools & Settings</span>
                                    <span class="menu-badge"><span class="badge vd_bg-black-30"><i
                                                    class="fa fa-angle-down"></i></span></span>
                                </a>
                                <div class="child-menu" data-action="click-target">
                                    <ul>
                                        <li>
                                            <a href="#" onclick="company()">
                                                <span class="menu-text">Company Details</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="adduser()">
                                                <span class="menu-text">System Users Manager</span>
                                            </a></li>

                                        <li>
                                            <a href="#" onclick="useraccess()">
                                                <span class="menu-text">User Access Rights</span>
                                            </a></li>
                                        <li>
                                            <a href="#" onclick="variables()">
                                                <span class="menu-text">Add/Edit System Variables</span>
                                            </a></li>


                                        <li>
                                            <a href="#" onclick="changelogin()">
                                                <span class="menu-text">Change Password</span>
                                            </a></li>

                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#" onclick="reports()">
                                    <span class="menu-icon"><i class="fa fa-calendar"> </i></span>
                                    <span class="menu-text">Attendance</span>
                                </a>

                            </li>

                            <li>
                                <a href="#" onclick="reports()">
                                    <span class="menu-icon"><i class="fa fa-signal"> </i></span>
                                    <span class="menu-text">Reports</span>
                                </a>

                            </li>


                            <li>
                                <a href="#" onclick="logout()">
                                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>
                                    <span class="menu-text">Logout</span>
                                </a>

                            </li>

                            <li style="height:100px">
                                <a href="index.php">
                                    <span class="menu-text"></span>
                                </a>

                            </li>


                        </ul>


                        <!-- Head menu search form ends -->     </div>
                </div>
            </div>

            <div class="vd_navbar vd_nav-width vd_navbar-chat vd_bg-black-80 vd_navbar-right   ">
                <div class="navbar-tabs-menu clearfix">

                    <div class="menu-container">
                        <div class="navbar-search-wrapper">
                            <div class="navbar-search vd_bg-black-30">
                                <span class="append-icon"><i class="fa fa-search"></i></span>
                                <input type="text" placeholder="Search"
                                       class="vd_menu-search-text no-bg no-bd vd_white width-70" name="search">
                                <div class="pull-right search-config">
                                    <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><span
                                                class="prepend-icon vd_grey"><i class="fa fa-cog"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="navbar-menu clearfix">
                    <div class="content-list content-image content-chat">

                    </div>


                </div>
                <div class="navbar-spacing clearfix">
                </div>
            </div>
            <!-- Middle Content Start -->
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <div class="vd_panel-menu hidden-sm hidden-xs"
                         data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code."
                         data-step=5 data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle"
                             data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"><i
                                    class="fa fa-arrows-h"></i></div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle"
                             data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"><i
                                    class="fa fa-arrows-v"></i></div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle"
                             data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"><i
                                    class="glyphicon glyphicon-fullscreen"></i></div>
                        <div class="fullscreen-button menu" data-original-title="Previous Window" data-toggle="tooltip"
                             data-placement="bottom" onclick="linkup1()"><i class="fa fa-reply"></i></div>
                        <div class="fullscreen-button menu" data-original-title="Reload Window" data-toggle="tooltip"
                             data-placement="bottom" onclick="linkup2()"><i class="fa fa-refresh"></i></div>
                        <div class="fullscreen-button menu" data-original-title="Close Window" data-toggle="tooltip"
                             data-placement="bottom"><i class="icon-logout" onclick="hidecont()"></i></div>

                    </div>

                </div>
            </div>
            <!-- vd_head-section -->
            <!--            <input type="hidden" id="thekey" value="0" style="float:right;width:30px"/>-->
            <!--            <div id="keyresponse"></div>-->
            <!--            <div id="refreshnotif"></div>-->
            <div class="vd_content-wrapper" id="mainp" style="margin-bottom:20px">
                <?php
                $result = mysql_query("select * from messages where  name='" . $username . "' and status=0");
                $mes = mysql_num_rows($result);
                $result = mysql_query("select * from mytasks where status=1 and Stamp='" . date('Ymd') . "' and Username='" . $username . "' order by Stamp");
                $tasks = mysql_num_rows($result);
                ?>

                <script>
                    $().customAlert();
                    alert('WELCOME!', '<p>WELCOME ADMIN.<br/>YOU HAVE:<br/><b style="cursor:pointer" onclick="dashboard()"><u><?php echo $mes ?> NEW MESSAGES.</u></b><br/><b><?php echo $tasks ?></b> TASKS FOR THE DAY.<input type="hidden" class="okBtn" value="OK"  /></p>');
                    e.preventDefault();
                </script>


            </div>
            <!-- .vd_content-wrapper -->

            <!-- Middle Content End -->

        </div>
        <!-- .container -->
    </div>
    <!-- .content -->

    <div id="automate"></div>

    <!-- Footer Start -->
    <footer class="footer-1" id="footer">
        <div class="vd_bottom ">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-12">
                        <div class="copyright" style="text-align:center">
                            Copyright &copy;2013-2020 QET SYSTEMS. All Rights Reserved.
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        </div>
    </footer>
    <!-- Footer END -->

    <!-- .vd_body END  -->
    <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

    <!--
    <a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a>';} ?> -->

    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/theme.js"></script>


    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/excanvas.js"></script>
    <![endif]-->

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
    <script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <script type="text/javascript" src="js/caroufredsel.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>

    <script type="text/javascript" src="plugins/breakpoints/breakpoints.js"></script>
    <script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>

    <script type="text/javascript" src="plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="plugins/tagsInput/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
    <script type="text/javascript" src="plugins/pnotify/js/jquery.pnotify.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>


    <!-- Intro JS (Tour) -->

    <script type="text/javascript" src="plugins/introjs/js/intro.min.js"></script>
    <script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>


    <!-- Sky Icons -->

    <script type="text/javascript" src="plugins/skycons/skycons.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>
    <script type="text/javascript" src="js/autocomplete.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script src="js/date.js" type="text/javascript"></script>
    <script src="js/blockui.js" type="text/javascript"></script>
    <script src="js/idle-timer.min.js" type="text/javascript"></script>
    <script src="js/jquery.ba-dotimeout.js" type="text/javascript"></script>
    <script src="js/select2.js" type="text/javascript"></script>


    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

    <script src="ui/jquery.ui.core.js"></script>
    <script src="ui/jquery.ui.widget.js"></script>
    <script src="ui/jquery.ui.button.js"></script>


    <script src="ui/jquery.ui.datepicker.js"></script>
    <script src="ui/jquery.ui.position.js"></script>
    <script src="ui/jquery.ui.dialog.js"></script>
    <script src="ui/jquery.ui.tabs.js"></script>
    <script src="ui/jquery.effects.core.js"></script>
    <script src="ui/jquery.effects.blind.js"></script>
    <script src="ui/jquery.effects.bounce.js"></script>
    <script src="ui/jquery.effects-explode.js"></script>
    <script src="ui/jquery.ui.autocomplete.js"></script>
    <script src="ui/jquery.ui.tooltip.js"></script>
    <script src="ui/jquery.ui.resizable.js"></script>
    <script src="ui/jquery.ui.mouse.js"></script>

    <script src="ui/jquery.ui.menu.js"></script>
    <script src="ui/jquery.ui.draggable.js"></script>
    <script src="ui/jquery.ui.mouse.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>


    <script type="text/javascript" src="js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.confirm/jquery.confirm.css"/>
    <script src="jquery.confirm/jquery.confirm.js"></script>
    <link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
    <script type="text/javascript" src="js/jquery.custom.alerts.js"></script>

    <script type="text/javascript" src="js/custom.js"></script>
    <script>
        document.onkeydown = keydown;

        function keydown(evt) {
            if (!evt) evt = event;

            if (evt.keyCode == 118) { //f7
                evt.preventDefault();

                var a = $('#shortvalue').val();
                if (a == 0) {
                    $('#shortie').fadeIn(0);
                    $('#shortvalue').val(1);
                } else {
                    $('#shortie').fadeOut(0);
                    $('#shortvalue').val(0);
                }
            }

            if (evt.keyCode == 122) { //f11
                evt.preventDefault();
                document.documentElement.mozRequestFullScreen();
            }
        }

        window.onload = setupRefresh;
        var timer = 0;

        function setupRefresh() {
            timer = setInterval("auto_logout();", 600000);
        }

        function reset_interval() {
            if (timer != 0) {
                clearInterval(timer);
                timer = 0;
                timer = setInterval("auto_logout();", 600000);
            }
        }

        function auto_logout() {
            main();
        }

        $(function () {
            $("#radio").buttonset();
        });


        // Options
        var dots = true;
        var MAX_STARS = 1000;
        var fps = 60;
        var spread_slowness = 100;
        var mouse_effect_enabled = true;
        var mouse_effect_type = "Magnify";
        var mouse_effect_intensity = 0.01;
        var mouse_effect_size = 100;

        // State variables
        var mspf = 100 / fps;
        var updateInterval;
        var ctx;
        var stars = new Array();
        var canvas;
        var ticks = 0;
        var center;
        var y_off = 0;
        var x_off = 0;
        var mouse_x = -1;
        var mouse_y = -1;

        function main() {
            $('#screensaver').fadeIn(0);
            canvas = document.getElementById('canvas');
            if (canvas.getContext) {
                ctx = canvas.getContext('2d');
                canvas.addEventListener('mousemove', onmouse, false);

                document.getElementById('title').onclick = function (e) {
                    var div = document.getElementById('controls');
                    div.className = (div.className == "collapsed") ? "" : "collapsed";
                };

                document.getElementById('dotsToggle').onchange = changedSetting;
                document.getElementById('effectToggle').onchange = changedSetting;
                document.getElementById('effectType').onchange = changedSetting;
                document.getElementById('effectSize').onchange = changedSetting;
                document.getElementById('spreadSlowness').onchange = changedSetting;
                document.getElementById('fpsRate').onchange = changedSetting;

                updateInterval = window.setInterval("update()", mspf);
            }
        }

        function update() {
            canvas.height = window.innerHeight;
            canvas.width = window.innerWidth;
            center = [canvas.width / 2, canvas.height / 2];
            max_radius = Math.min(canvas.height, canvas.width) / 2;
            clear();

            // New star ([angle, distance from center])
            stars.push([(3 * ticks % 400) / 400.0, 0]);
            if (stars.length > MAX_STARS) {
                stars.shift();
            }

            // Update and draw stars
            if (dots)
                ctx.fillStyle = "#FFFFFF";
            else
                ctx.strokeStyle = "#FFFFFF";
            ctx.beginPath();
            ctx.moveTo(center[0], center[1]);
            for (var i = 0; i < stars.length; i++) {
                // Update
                stars[i][1] += (max_radius - stars[i][1]) / spread_slowness;

                // Compute
                y_off = stars[i][1] * Math.sin(Math.PI * 2 * stars[i][0]);
                x_off = stars[i][1] * Math.cos(Math.PI * 2 * stars[i][0]);

                var x = center[0] + x_off;
                var y = center[1] + y_off;

                // Mouse effect
                if (mouse_effect_enabled) {
                    var mouse_dist = Math.sqrt(Math.pow(x - mouse_x, 2) + Math.pow(y - mouse_y, 2));
                    var mouse_angle = Math.atan((y - mouse_y) / (x - mouse_x));
                    switch (mouse_effect_type) {
                        case "Magnify":
                            var mouse_effect = (mouse_dist < mouse_effect_size) ? mouse_effect_size - mouse_dist : 0;
                            break;
                        case "Attract":
                            var mouse_effect = (mouse_dist < mouse_effect_size) ? mouse_dist - mouse_effect_size : 0;
                            break;
                    }
                    y += mouse_effect_intensity * mouse_effect * (y - mouse_y);
                    x += mouse_effect_intensity * mouse_effect * (x - mouse_x);
                }

                // Draw the stuff
                // Dot mode
                if (dots)
                    ctx.rect(x, y, 2, 2);
                // Line Mode
                else
                    (i == 0) ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            }
            if (dots)
                ctx.fill();
            else
                ctx.stroke();

            ticks++;
        }

        function clear() {

            ctx.fillStyle = "#000000";
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();
            ctx.rect(0, 0, canvas.width, canvas.height);
            ctx.closePath();
            ctx.fill();
        }

        function onmouse(ev) {
            if (ev.layerX || ev.layerX == 0) { // Firefox
                ev._x = ev.layerX;
                ev._y = ev.layerY;
            }
            if (ev.offsetX || ev.offsetX == 0) { // Opera
                ev._x = ev.offsetX;
                ev._y = ev.offsetY;
            }

            mouse_x = ev._x;
            mouse_y = ev._y;
        }

        function changedSetting(e) {
            if (!e) var e = window.event;

            switch (e.target.id) {
                case "dotsToggle":
                    dots = !dots;
                    break;
                case "effectToggle":
                    mouse_effect_enabled = !mouse_effect_enabled;
                    break;
                case "effectType":
                    mouse_effect_type = e.target.options[e.target.selectedIndex].value;
                    break;
                case "effectSize":
                    mouse_effect_size = e.target.value;
                    break;
                case "spreadSlowness":
                    spread_slowness = e.target.value;
                    break;
                case "fpsRate":
                    fps = e.target.value;
                    mspf = 1000 / fps;
                    window.clearInterval(updateInterval);
                    updateInterval = window.setInterval("update()", mspf);
                    break;
            }
        }

        function hidescreen() {
            clear();
            $('#screensaver').fadeOut(0);
        }
    </script>


    <!-- Specific Page Scripts END -->


    <script type="text/javascript">

        window.onload = setupRefresh;
        var timer = 0;

        function setupRefresh() {
            timer = setInterval("auto_logout();", 600000);
            timer3 = setInterval("refreshnotif();", 300000);
        }


        function refreshnotif() {

            $("#refreshnotif").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
            $.ajax({
                url: 'bridge.php',
                data: {id: 181},
                success: function (data) {
                    $('#refreshnotif').html(data);
                }
            });
        }


        function reset_interval() {
            if (timer != 0) {
                clearInterval(timer);
                timer = 0;
                timer = setInterval("auto_logout();", 600000);
            }
        }

        function auto_logout() {
            var b = $('#remote').val();
            window.location.href = "logout.php";
        }

        var comname = 'Weclines H/R System';

        function getClockTime() {
            return comname + '<BR/><BR/>' + Date.parse('now').toString('dddd, MMMM d, yyyy') + '<br><BR/>' + Date.parse('now').toString('h:mm:ss tt');
        }

        function updateScreensaverClock() {
            $('#screenSaverTime').html(getClockTime());
            $.doTimeout('screensaverClockTimer', 500, function () {
                updateScreensaverClock();
            });
        }

        function stopScreensaverClock() {
            $.doTimeout('screensaverClockTimer');
        }

        function startScreensaver() {
            $.blockUI({
                fadeIn: 1000,
                constrainTabKey: true,
                bindEvents: true,
                baseZ: 100000,
                fadeOut: 1000,
                message: '<div id="screenSaverTime">' + getClockTime() + '<\/div>',
                overlayCSS: {
                    opacity: 0.78
                },
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: 0.8,
                    color: '#fff',
                    fontSize: '20px',
                    fontWeight: 'bold'
                },
                onOverlayClick: $.unblockUI,
                ignoreIfBlocked: true,
                focusInput: true,
                onBlock: updateScreensaverClock,
                onUnblock: stopScreensaverClock
            });
        }

        $(function () {
            $.idleTimer(60000);  // 300000 = 5 minutes
            $(document).on('idle.idleTimer', function (e, elem, obj) {
                e.stopPropagation();
                startScreensaver();
            });
            $(document).on('active.idleTimer', function (e, elem, obj, triggerevent) {
                $.unblockUI();
            });
        });

        refreshnotif();
        updatescript();
    </script>

</div>

</body>
<!-- Mirrored from vendroid.venmond.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Feb 2015 17:33:23 GMT -->
</html>
<?php

//year register
$year = date('Y');

$result = mysql_query("select * from yearregister  where name='" . $year . "'");
$num_results = mysql_num_rows($result);
if ($num_results == 0) {
    //holidays


    $result = mysql_query("select * from holidays");
    $num_results = mysql_num_rows($result);
    for ($i = 0; $i < $num_results; $i++) {
        $row = mysql_fetch_array($result);
        $code = stripslashes($row['id']);
        $a = substr(stripslashes($row['date']), 0, 2);
        $b = substr(stripslashes($row['date']), 3, 2);
        $date = $a . '/' . $b . '/' . $year;
        $resultx = mysql_query("update holidays set date='" . $date . "' where id='" . $code . "'");
    }

    $resulta = mysql_query("select * from users where position='HrHead' or  position='Admin'");
    $num_resultsa = mysql_num_rows($resulta);
    for ($i = 0; $i < $num_resultsa; $i++) {
        $rowa = mysql_fetch_array($resulta);
        $resultx = mysql_query("insert into messages values('0','" . stripslashes($rowa['name']) . "','System','Update Holiday Days for the New Year-" . $year . ".','','" . date('d/m/Y-H:i') . "','" . date('Ymd') . "',0)");
    }


    //sick days and leave days

    $resulta = mysql_query("select * from employee where status=1 order by fname");
    $num_resultsa = mysql_num_rows($resulta);
    for ($i = 0; $i < $num_resultsa; $i++) {
        $row = mysql_fetch_array($resulta);
        $emp = stripslashes($row['emp']);
        $leavac = stripslashes($row['leaveac']);
        $empname = stripslashes($row['fname']) . ' ' . stripslashes($row['mname']) . ' ' . stripslashes($row['lname']);
        $sickac = 7;

        if ($leavac > 10) {
            $leavac = 10;
            $resulty = mysql_query("insert into leavetrack values('0','Annual','" . $emp . "','" . $empname . "','" . date('m_Y') . "','" . $leavac . "','" . $leavac . "','dr','Opening Balance for Year " . date('Y') . "','" . date('d/m/Y') . "','" . date('Ymd') . "',1)") or die (mysql_error());
        }
        //into leavetrack

        $resulty = mysql_query("insert into leavetrack values('0','Sick','" . $emp . "','" . $empname . "','" . date('m_Y') . "','" . $sickac . "','" . $sickac . "','dr','Opening Balance for Year " . date('Y') . "','" . date('d/m/Y') . "','" . date('Ymd') . "',1)") or die (mysql_error());

        $resultx = mysql_query("update employee set sickac='" . $sickac . "',leaveac='" . $leavac . "' where emp='" . $emp . "'");
    }


    $resulty = mysql_query("insert into yearregister values('','" . $year . "')");


}

//check if month is registered in attendancelog
$cur = date('m_Y');
$arr = array();

$result = mysql_query("select * from attendance  where month='" . $cur . "'");
$num_results = mysql_num_rows($result);
if ($num_results == 0) {
    $result = mysql_query("insert into attendancelog values('','" . $cur . "',0)");
    $resultc = mysql_query("select * from employee where status=1");
    $num_resultsc = mysql_num_rows($resultc);
    for ($a = 0; $a < $num_resultsc; $a++) {
        $rowb = mysql_fetch_array($resultc);
        $leavac = stripslashes($rowb['leaveac']);
        $emp = stripslashes($rowb['emp']);
        $empname = $name = stripslashes($rowb['fname']) . ' ' . stripslashes($rowb['mname']) . ' ' . stripslashes($rowb['lname']);
        $resultd = mysql_query("insert into attendance values('','" . $cur . "','" . stripslashes($rowb['emp']) . "','" . stripslashes($rowb['branch']) . "','" . $name . "','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')");

        //add leave days to staff
        $leavac = $leavac + 2.08;
        $resulty = mysql_query("insert into leavetrack values('0','Annual','" . $emp . "','" . $empname . "','" . date('m_Y') . "','2.08','" . $leavac . "','dr','Leave days awarded for Month of " . $cur . "','" . date('d/m/Y') . "','" . date('Ymd') . "',1)") or die (mysql_error());
        $resultx = mysql_query("update employee set leaveac='" . $leavac . "' where emp='" . $emp . "'");


    }


}


//check bm_log register
$time = date('Hi');
echo "<script>alert('')</script>";
if ($time > 1100) {
    $result = mysql_query("select * from bmlog_register where name='" . date('Ymd') . "'");
    $num_results = mysql_num_rows($result);
    if ($num_results == 0) {

        $resulta = mysql_query("select * from biometric_log where stamp='" . date('Ymd') . "'");
        $num_resultsa = mysql_num_rows($resulta);
        if ($num_resultsa > 0) {

            echo "<script>syncattendance();</script>";

        }

    }

}


?>
