<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.slashdown.nl/starhotel/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 01 Oct 2014 05:34:01 GMT -->
<head>
    <meta charset="utf-8">
    <title>Wec Lines HR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="favicon.png">

    <!-- Stylesheets -->


    <!-- Javascripts -->


    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/theme.css">
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

<body id="body" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()"
      onscroll="reset_interval()">
<div id="screensaver" style="display:none" onclick="hidescreen()" onkeypress="hidescreen()" onscroll="hidescreen()">
    <canvas width="100%" height="100%" id="canvas">Sorry, no canvas for you!</canvas>
    <div id="controls" class="">
        <div id="title"></div>
        <form style="display:none">
            <input checked="checked" id="dotsToggle" type="checkbox"><br>
            <input id="effectToggle" checked="checked" type="checkbox"><br>
            <select id="effectType">
                <option>Magnify</option>
                <option selected="selected">Attract</option>
            </select><br>
            <input id="effectSize" min="0" max="400" value="116" type="range"><br>
            <input id="spreadSlowness" min="1" max="1000" value="264" type="range"><br>
            <input id="fpsRate" min="15" max="120" value="111" type="range"><br>
        </form>
    </div>
</div>
<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="navbar-brand">
                    <!-- Logo -->
                    <div id="logo" style="float:left">
                        <img id="default-logo" src="images/clogo.png" alt="Starhotel" style="height:50px;"> <img
                                id="retina-logo" src="images/clogo.png" alt="Q-HRM" style="height:50px;"></div>


                </a></div>


            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-users fa-lg" style="margin-right:2px"></i>Employees<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer">
                            <li><a onclick="newemp();">Add New Employee</a></li>
                            <li><a onclick="seeemp(5);">Edit Employee Info</a></li>
                            <li><a onclick="findemp();">Find Employee</a></li>
                            <li><a onclick="seeemp(10);">Archive Employee Record</a></li>
                            <li><a onclick="seeemp(7)">Employee File</a></li>
                            <li><a onclick="exemp()">Ex-Employees Panel</a></li>
                        </ul>

                    </li>
                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-tasks fa-lg" style="margin-right:2px"></i>Tasks<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer">
                            <li><a onclick="dashboard();">Dashboard</a></li>
                            <li><a onclick="discipline();">Discipline Employee</a></li>
                            <li><a onclick="terminate();">Terminate Employment</a></li>
                            <li><a onclick="reinstate();">Reinstate Employee</a></li>
                            <li><a onclick="documents();">Download Documents</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="#" onclick="takeatt();" class="dropdown-toggle js-activated"><i
                                    class="fa fa-calendar fa-lg" style="margin-right:2px"></i>Attendance</a></li>

                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-plane fa-lg" style="margin-right:2px"></i>Leave<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer">
                            <li><a onclick="reqleave();">Request for Leave</a></li>
                            <li><a onclick="authleave();">Authorize Leave</a></li>
                            <li><a onclick="leavecal();">Leave Calendar</a></li>
                            <li><a onclick="alterleave();">Alter Leave Days</a></li>
                            <li><a onclick="leavesett();">Leave Settings</a></li>


                        </ul>

                    </li>
                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-money fa-lg" style="margin-right:2px"></i>Payroll<b class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer">
                            <li><a onclick="newpay();">New Payroll</a></li>
                            <li><a onclick="editpay();">Edit Payroll</a></li>
                            <li><a onclick="paysett();">Payroll Settings</a></li>
                        </ul>

                    </li>
                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-signal fa-lg" style="margin-right:2px"></i>Reports<b class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer;width:330px">
                            <li style="width:164px; border-right:1px  dashed #ccc; float:left"><a onclick="monthrep()">Detailed
                                    Monthly Report</a>
                                <a onclick="monthbank()">Monthly Bank Summary</a>
                                <a onclick="monthind()">Individual Bank Report</a><a
                                        onclick="window.open('output.php?id=5&code=1')">Salaries Summary</a> <a
                                        onclick="empsum()">Employee Summary</a>
                                <a onclick="indpayslip()">Individual Pay Slips</a>
                                <a onclick="payslip()">All Pay Slips</a>
                                <a onclick="payerep()">Monthly Allow/Deds Rep</a>

                                <a onclick="empdeds()">Employee Deds. Report</a>
                                <a onclick="saltrack()">Salary Tracking Report</a>


                                <a onclick="pnine()">Individual P9A Report</a>
                                <a onclick="allp9()">All P9A Reports</a>
                                <a onclick="pten()">P10 Reports</a>
                                <a onclick="ptena()">P10A Reports</a></li>
                            <li style="width:164px; border-right:0px  dashed #000; float:left"><a
                                        onclick="attendancerep()">Attendance Report</a>
                                <a onclick="attendrep()">Biometric Attendance Rep</a>
                                <a onclick="attendancerepemp()">Employee Att. Summary</a><a onclick="leaverep()">Leave
                                    Report</a><a onclick="leavesumm()">Leave Summary</a><a onclick="leavestate()">Leave
                                    Statement</a><a onclick="emplist()">Employees List</a><a onclick="mesrep(2)">Mails
                                    Reports</a> <a onclick="logrepuser()">Activity Log</a></li>

                            <li></li>
                        </ul>

                    </li>
                    <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i
                                    class="fa fa-gear fa-lg" style="margin-right:2px"></i>Settings<b class="caret"></b></a>
                        <ul class="dropdown-menu" style="cursor:pointer">
                            <li><a onclick="company();">Company Details</a></li>
                            <li><a onclick="adduser(5);">System Users Manager</a></li>
                            <li><a onclick="useraccess();">User Access Rights</a></li>
                            <li><a onclick="changelogin();">Edit Account Details</a></li>
                            <li><a onclick="sysvar();">System Variables</a></li>
                            <li>
                                <a onclick="window.open('http://localhost/phpmyadmin/index.php?token=fd48725802dc5e54c6495e7c509943ff#PMAURL:server=1&target=server_import.php&token=fd48725802dc5e54c6495e7c509943ff');">Import
                                    Database</a></li>
                            <li>
                                <a onclick="window.open('http://localhost/phpmyadmin/index.php?db=hr&token=0b8f67207311cbf3278b4a49eb48f627#PMAURL:db=hr&server=1&target=db_export.php&token=0b8f67207311cbf3278b4a49eb48f627');">Export
                                    Database</a></li>
                        </ul>

                    </li>
                </ul>
            </div>


        </div>
    </div>
</header>


<section class="usp" id="mainp">

    <script>
        $().customAlert();
        alert('WELCOME!', '<p>WELCOME ADMIN.<br/>YOU HAVE:<br/><b style="cursor:pointer" onclick="dashboard()"><u>0 NEW MESSAGES.</u></b><br/><b>0</b> TASKS FOR THE DAY.<input type="hidden" class="okBtn" value="OK"  /></p>');
        e.preventDefault();
    </script>


</section>


<div id="shortie" style="display:none" class="usp">
    <div id="modalDiv"></div>
    <div id="home" class="bounceIn appear" data-start="0">
        <input type="hidden" value="0" id="shortvalue"/>
        <div class="box_1 home_box1 color1">
            <div class="box-icon" onClick="dashboard()">
                <div class="circle"><i class="fa fa-bar-chart-o fa-lg"></i></div>
            </div>
            <h3>Dashboard</h3>
        </div>

        <div class="box_2 home_box1 color2">
            <div class="box-icon" onClick="newemp()">
                <div class="circle"><i class="fa fa-group fa-lg"></i></div>
            </div>
            <h3>New Employee</h3>
        </div>

        <div class="box_3 home_box1 color6 no_mr">
            <div class="box-icon" onClick="adduser()">
                <div class="circle"><i class="fa fa-cogs fa-lg"></i></div>
            </div>
            <h3>System Users</h3>
        </div>

        <div class="box_4 home_box1 color9">
            <div class="box-icon" onClick="leavecal()">
                <div class="circle"><i class="fa fa-smile-o fa-lg"></i></div>
            </div>
            <h3>Leave Calendar</h3>
        </div>

        <div class="box_5 home_box1 color8">

            <div id="clock">
                <SCRIPT LANGUAGE="JavaScript">var clocksize = 100;</SCRIPT>
                <SCRIPT LANGUAGE="JavaScript">
                    var clocksize;
                    if (!clocksize || clocksize == 'SIZE') clocksize = '100';

                    document.write('<OBJECT CLASSID="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="' + clocksize + '" HEIGHT="' + clocksize + '"  BGCOLOR="#FFFFFF">');

                    document.write('<PARAM NAME="movie" VALUE="clockswf.swf">');
                    document.write('<PARAM NAME="quality" VALUE="high">');
                    document.write('<PARAM NAME="color" VALUE="#FFFFFF">');
                    document.write('<PARAM NAME="wmode" VALUE="transparent">');
                    document.write('<PARAM NAME="menu" VALUE="false">');

                    document.write('<EMBED SRC="clockswf.swf" WIDTH="' + clocksize + '" HEIGHT="' + clocksize + '" QUALITY="high" WMODE="transparent" MENU="false" BGCOLOR="#FFFFFF"></EMBED>');

                    document.write('</OBJECT>');

                </SCRIPT>
            </div>

        </div>

        <div class="box_6 home_box1 color3 no_mr">
            <div class="box-icon" onClick="documents()">
                <div class="circle"><i class="fa fa-briefcase fa-lg"></i></div>
            </div>
            <h3>Documents</h3>
        </div>

        <div class="box_7 home_box1 color4">
            <div class="box-icon" onClick="newpay()">
                <div class="circle"><i class="fa fa-dollar fa-lg"></i></div>
            </div>
            <h3>Payroll</h3>
        </div>

        <div class="box_8 home_box1  color7">


            <div class="box-icon" onClick="takeatt()">
                <div class="circle"><i class="fa fa-calendar fa-lg"></i></div>
            </div>
            <h3>Attendance</h3>

        </div>

        <div class="box_9 home_box1 color5 no_mr">
            <div class="box-icon" onClick="logout();">
                <div class="circle"><i class="fa fa-power-off fa-lg"></i></div>
            </div>
            <h3>Logout</h3>
        </div>

    </div> <!-- END of home -->
</div>


<section class="usp" id="footing">
    <b><small style="color:#ffdd17; float:left; margin-left:10px;">Logged In As:PM001</small></b>
    <a href="http://weclines.com" style="color:#ffdd17; text-align:center; font-size:18PX">WEC KENYA H/R MANAGEMENT
        SYSTEM</a>
    <small style="color:#ffdd17; float:right; margin-right:10px;cursor:pointer" onClick="logout()">LOGOUT</small></b>
</section>
<script>alert('')</script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>