<?php include('db_fns.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$photo=stripslashes($row['photo']);
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.slashdown.nl/starhotel/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 01 Oct 2014 05:34:01 GMT --><head>
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
<link rel="stylesheet" type="text/css" href="jquery.confirm/jquery.confirm.css" />
<script src="jquery.confirm/jquery.confirm.js"></script> 
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>

<script>
document.onkeydown = keydown;
    	function keydown(evt){
      	if (!evt) evt = event;
		
		if (evt.keyCode==118){ //f7
		evt.preventDefault();
		
		 var a = $('#shortvalue').val();
		 if(a==0){
		$('#shortie').fadeIn(0);$('#shortvalue').val(1);
		 }else{$('#shortie').fadeOut(0);$('#shortvalue').val(0);}
      	}
		
		if (evt.keyCode==122){ //f11
		evt.preventDefault();
			document.documentElement.mozRequestFullScreen();	
		}
}
 window.onload = setupRefresh;
  var timer=0;
  function setupRefresh(){
	timer=setInterval("auto_logout();",600000);	
}

function reset_interval(){
	if(timer!=0){
		clearInterval(timer);
		timer=0;
		timer=setInterval("auto_logout();",600000);
	}
}
function auto_logout(){
	main();
}
$(function() {$( "#radio" ).buttonset();});
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
				if (canvas.getContext)
				{
					ctx = canvas.getContext('2d');
					canvas.addEventListener('mousemove', onmouse, false);
					
					document.getElementById('title').onclick = function(e) {
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
				center = [canvas.width/2, canvas.height/2];
				max_radius = Math.min(canvas.height, canvas.width) / 2;
				clear();
				
				// New star ([angle, distance from center])
				stars.push([(3*ticks%400) / 400.0, 0]);
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
				for (var i=0; i<stars.length; i++) {
					// Update
					stars[i][1] += (max_radius - stars[i][1]) / spread_slowness;
					
					// Compute
					y_off = stars[i][1] * Math.sin(Math.PI * 2 * stars[i][0]);
					x_off = stars[i][1] * Math.cos(Math.PI * 2 * stars[i][0]);
					
					var x = center[0]+x_off;
					var y = center[1]+y_off;
					
					// Mouse effect
					if (mouse_effect_enabled) {
						var mouse_dist = Math.sqrt(Math.pow(x-mouse_x, 2) + Math.pow(y-mouse_y, 2));
						var mouse_angle = Math.atan((y-mouse_y) / (x-mouse_x));
						switch (mouse_effect_type) {
							case "Magnify":
								var mouse_effect = (mouse_dist<mouse_effect_size) ? mouse_effect_size-mouse_dist : 0;
								break;
							case "Attract":
								var mouse_effect = (mouse_dist<mouse_effect_size) ? mouse_dist-mouse_effect_size : 0;
								break;
						}
						y += mouse_effect_intensity * mouse_effect * (y-mouse_y);
						x += mouse_effect_intensity * mouse_effect * (x-mouse_x);
					}
					
					// Draw the stuff
					// Dot mode
					if (dots)
						ctx.rect(x, y, 2, 2);
					// Line Mode
					else
						(i==0) ? ctx.moveTo(x, y) : ctx.lineTo(x, y);	
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
			function hidescreen(){
				clear();
				$('#screensaver').fadeOut(0);
			}
		</script>

</head>

<body id="body" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
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
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="index.html" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo" style="float:left"> 
        <img id="default-logo" src="images/clogo.png" alt="Starhotel" style="height:50px;"> <img id="retina-logo" src="images/clogo.png" alt="Q-HRM" style="height:50px;"> </div>
       
        
        </a> </div>
        
        
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <?PHP
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

			echo'  <li> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-users fa-lg" style="margin-right:2px"></i>Employees<b class="caret"></b></a>
          		<ul class="dropdown-menu" style="cursor:pointer">';
				if($arr[201]=='YES'){
             	 echo'<li><a onclick="newemp();">Add New Employee</a></li>';
				}else {echo'<li><p style="color:#ccc" >Add New Employee</p></li>';}
				if($arr[202]=='YES'){
              	echo'<li><a onclick="seeemp(5);">Edit Employee Info</a></li>';
				}else {echo'<li><p style="color:#ccc">Edit Employee Info</p></li>';}
				if($arr[204]=='YES'){
               	echo' <li><a onclick="findemp();">Find Employee</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Find Employee</p></li>';}
				if($arr[205]=='YES'){
            	 	echo'<li><a onclick="seeemp(10);">Archive Employee Record</a></li>';
					}else {echo'<li><p style="color:#ccc" disabled="disabled">Archive Employee Record</p></li>';}
				//  if($arr[203]=='YES'){
                // 	echo'  <li><a onclick="seeemp(7)">Employee File</a></li>';
				// 	}else {echo'<li><p style="color:#ccc" disabled="disabled">Employee File</p></li>';}
				if($arr[203]=='YES'){
					echo'<li><a onclick="employeefile();">Employee File Record</a></li>';
				   }else {echo'<li><p style="color:#ccc" disabled="disabled">Employee File</p></li>';}

				  if($arr[206]=='YES'){
                	echo'<li><a onclick="exemp()">Ex-Employees Panel</a></li>';
					}else {echo'<li><p style="color:#ccc" disabled="disabled">Ex-Employees Panel</p></li>';}
				 echo'
              	</ul>
          
          </li>
          <li> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-tasks fa-lg" style="margin-right:2px"></i>Tasks<b class="caret"></b></a>
          <ul class="dropdown-menu" style="cursor:pointer">';
		  if($arr[207]=='YES'){
          		echo'<li><a onclick="dashboard();">Dashboard</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Dashboard</p></li>';}
				
				if($arr[208]=='YES'){
              	echo'<li><a onclick="discipline();">Discipline Employee</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Discipline Employee</p></li>';}
				if($arr[208]=='YES'){
              	echo'<li><a onclick="terminate();">Terminate Employment</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Terminate Employment</p></li>';}
				if($arr[208]=='YES'){
              	echo'<li><a onclick="reinstate();">Reinstate Employee</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Lift Suspension</p></li>';}
				if($arr[209]=='YES'){
               echo' <li><a onclick="documents();">Download Documents</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Download Documents</p></li>';}
              echo' </ul>
          
          </li>';
		  
		  if($arr[210]=='YES'){
               echo' <li>
		    <a  href="#" onclick="takeatt();" class="dropdown-toggle js-activated"><i class="fa fa-calendar fa-lg" style="margin-right:2px"></i>Attendance</a>   </li>';
				}else {echo'<li><a style="color:#ccc" class="dropdown-toggle js-activated"><i class="fa fa-calendar fa-lg" style="margin-right:2px"></i>Attendance</a></li>';}
         echo'
          
           <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-plane fa-lg" style="margin-right:2px"></i>Leave<b class="caret"></b></a>
          <ul class="dropdown-menu" style="cursor:pointer">
		  ';
		  if($arr[211]=='YES'){
          		echo'	<li><a onclick="reqleave();">Request for Leave</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Request for Leave</p></li>';}
				if($arr[212]=='YES'){
              	echo'<li><a onclick="authleave();">Authorize Leave</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Authorize Leave</p></li>';}
				if($arr[213]=='YES'){
               echo'<li><a onclick="leavecal();">Leave Calendar</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Leave Calendar</p></li>';}

				if($arr[233]=='YES'){
               echo'<li><a onclick="alterleave();">Alter Leave Days</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Alter Leave Days</p></li>';}

				if($arr[232]=='YES'){
               echo'<li><a onclick="leavesett();">Leave Settings</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Leave Settings</p></li>';}
              echo'
              
              	
                
                </ul>
          
          </li>
		  <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-money fa-lg" style="margin-right:2px"></i>Payroll<b class="caret"></b></a>
          <ul class="dropdown-menu" style="cursor:pointer">
		   ';
		  if($arr[214]=='YES'){
          		echo'<li><a onclick="newpay();">New Payroll</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">New Payroll</p></li>';}
				if($arr[215]=='YES'){
              	echo'<li><a onclick="editpay();">Edit Payroll</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Edit Payroll</p></li>';}
				if($arr[216]=='YES'){
               echo'<li><a onclick="paysett();">Payroll Settings</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Payroll Settings</p></li>';}
				/*
				if($arr[217]=='YES'){
               echo' <li><a onclick="">Individual Returns</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Individual Returns</p></li>';}
				if($arr[218]=='YES'){
               echo'<li><a onclick="empben()">Employee Benefits</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Employee Benefits</p></li>';}
				*/
              echo'
              	 </ul>
          
          </li>
          <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-signal fa-lg" style="margin-right:2px"></i>Reports<b class="caret"></b></a>
          <ul class="dropdown-menu" style="cursor:pointer;width:330px">
			<li style="width:164px; border-right:1px  dashed #ccc; float:left">';
		  if($arr[219]=='YES'){
          		echo'   <a onclick="monthrep()">Detailed Monthly Report</a>
					<a onclick="monthbank()">Monthly Bank Summary</a>
					<a onclick="monthind()">Individual Bank Report</a>';
					echo"<a onclick=\"window.open('output.php?id=5&code=1')\">Salaries Summary</a>";
                 echo'   <a onclick="empsum()">Employee Summary</a>
                 <a onclick="indpayslip()">Individual Pay Slips</a>
					<a onclick="payslip()">All Pay Slips</a>
					 <a onclick="payerep()">Monthly Allow/Deds Rep</a>

					 <a onclick="empdeds()">Employee Deds. Report</a>
					 <a onclick="saltrack()">Salary Tracking Report</a>
					

					 <a onclick="pnine()">Individual P9A Report</a>
					 <a onclick="allp9()">All P9A Reports</a>
					 <a onclick="pten()">P10 Reports</a>
					 <a onclick="ptena()">P10A Reports</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Payroll Reports</p>';}

				 echo'</li>
                  <li style="width:164px; border-right:0px  dashed #000; float:left">';

				if($arr[220]=='YES'){
              	echo' <a onclick="attendancerep()">Attendance Report</a>
              	     <a onclick="attendrep()">Biometric Attendance Rep</a>
              		  <a onclick="attendancerepemp()">Employee Att. Summary</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Attendance Report</p>';}
				if($arr[221]=='YES'){
               echo'<a onclick="leaverep()">Leave Report</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Leave Report</p>';}

				if($arr[221]=='YES'){
                echo'<a onclick="leavesumm()">Leave Summary</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Leave Summary</p>';}

				if($arr[221]=='YES'){
                echo'<a onclick="leavestate()">Leave Statement</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Leave Statement</p>';}

				if($arr[222]=='YES'){
               echo'<a onclick="emplist()">Employees List</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Employees List</p>';}
				if($arr[223]=='YES'){
               echo'<a onclick="mesrep(2)">Mails Reports</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Mails Reports</p>';}
				if($arr[224]=='YES'){
               echo' <a onclick="logrepuser()">Activity Log</a>';
				}else {echo'<p style="color:#ccc" disabled="disabled">Activity Log</p>';}
              echo'</li>

              <li></li>
               </ul>
          
          </li>
         <li><a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><i class="fa fa-gear fa-lg" style="margin-right:2px"></i>Settings<b class="caret"></b></a>
          <ul class="dropdown-menu" style="cursor:pointer">
		  ';
		  
		  		if($arr[226]=='YES'){
          		echo'<li><a onclick="company();">Company Details</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">New Payroll</p></li>';}
				if($arr[227]=='YES'){
              	echo'	<li><a onclick="adduser(5);">System Users Manager</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Edit Payroll</p></li>';}
				if($arr[228]=='YES'){
               echo' <li><a onclick="useraccess();">User Access Rights</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Individual Returns</p></li>';}
				if($arr[225]=='YES'){
               echo'<li><a onclick="changelogin();">Edit Account Details</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Employee Benefits</p></li>';}
				if($arr[229]=='YES'){
               echo'<li><a onclick="sysvar();">System Variables</a></li>';
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Employee Benefits</p></li>';}
				
				
				if($arr[230]=='YES'){
              echo"<li><a onclick=\"window.open('http://$server/phpmyadmin/index.php?token=fd48725802dc5e54c6495e7c509943ff#PMAURL:server=1&target=server_import.php&token=fd48725802dc5e54c6495e7c509943ff');\">Import Database</a></li>
                   <li><a onclick=\"window.open('http://$server/phpmyadmin/index.php?db=hr&token=0b8f67207311cbf3278b4a49eb48f627#PMAURL:db=hr&server=1&target=db_export.php&token=0b8f67207311cbf3278b4a49eb48f627');\">Export Database</a></li>";
				}else {echo'<li><p style="color:#ccc" disabled="disabled">Import/Export Database</p></li>';}
              
				
				?>
              </ul>
          
          </li>
        </ul>
      </div>
      
       
      
    </div>
  </div>
</header>

 
<section class="usp" id="mainp">
<?php
$result =mysql_query("select * from messages where  name='".$username."' and status=0");
$mes = mysql_num_rows($result);	
$result =mysql_query("select * from mytasks where status=1 and Stamp='".date('Ymd')."' and Username='".$username."' order by Stamp");
$tasks = mysql_num_rows($result);	
?>
  
     <script>
	 $().customAlert();
		swal('success', '<p>WELCOME ADMIN.<br/>YOU HAVE:<br/><b style="cursor:pointer" onclick="dashboard()"><u><?php echo $mes ?> NEW MESSAGES.</u></b><br/><b><?php echo $tasks ?></b> TASKS FOR THE DAY.<input type="hidden" class="okBtn" value="OK"  /></p>');
		e.preventDefault();	
	 </script>
     
    
  

</section>       


 <div id="shortie" style="display:none" class="usp">
    <div id="modalDiv"></div>
		<div id="home"  class="bounceIn appear" data-start="0">
        <input type="hidden" value="0" id="shortvalue"/>
        	<div class="box_1 home_box1 color1">
    <?php if($arr[207]=='YES'){echo' <div class="box-icon"  onClick="dashboard()">';	 }else{echo' <div class="box-icon">';	} ?>
            <div class="circle"><i class="fa fa-bar-chart-o fa-lg"></i></div>
               </div>
             <h3>Dashboard</h3>
            </div>
            
            <div class="box_2 home_box1 color2">
            <?php if($arr[201]=='YES'){echo' <div class="box-icon"  onClick="newemp()">';	 }else{echo' <div class="box-icon">';	} ?>
               		 <div class="circle"><i class="fa fa-group fa-lg"></i></div>
               </div>
             <h3>New Employee</h3>
            </div>
            
          <div class="box_3 home_box1 color6 no_mr">
          <?php if($arr[227]=='YES'){echo' <div class="box-icon"  onClick="adduser()">';	 }else{echo' <div class="box-icon">';	} ?>
               		 <div class="circle"><i class="fa fa-cogs fa-lg"></i></div>
               </div>
             <h3>System Users</h3>
           </div>
            
            <div class="box_4 home_box1 color9">
           <?php if($arr[213]=='YES'){echo' <div class="box-icon"  onClick="leavecal()">';	 }else{echo' <div class="box-icon">';	} ?>
               		 <div class="circle"><i class="fa fa-smile-o fa-lg"></i></div>
               </div>
             <h3>Leave Calendar</h3>
            </div>
            
            <div class="box_5 home_box1 color8">
            
             <div id="clock">
             <SCRIPT LANGUAGE="JavaScript">var clocksize=100;</SCRIPT>
			<SCRIPT LANGUAGE="JavaScript">
            var clocksize;
			if(!clocksize||clocksize=='SIZE')clocksize='100';
			
			document.write('<OBJECT CLASSID="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="'+clocksize+'" HEIGHT="'+clocksize+'"  BGCOLOR="#FFFFFF">');
			
			document.write('<PARAM NAME="movie" VALUE="clockswf.swf">');
			document.write('<PARAM NAME="quality" VALUE="high">');
			document.write('<PARAM NAME="color" VALUE="#FFFFFF">');
			document.write('<PARAM NAME="wmode" VALUE="transparent">');
			document.write('<PARAM NAME="menu" VALUE="false">');
			
			document.write('<EMBED SRC="clockswf.swf" WIDTH="'+clocksize+'" HEIGHT="'+clocksize+'" QUALITY="high" WMODE="transparent" MENU="false" BGCOLOR="#FFFFFF"></EMBED>');
			
			document.write('</OBJECT>');
            
            </SCRIPT>
            </div>
            
            </div>
            
            <div class="box_6 home_box1 color3 no_mr">
             <?php if($arr[209]=='YES'){echo' <div class="box-icon"  onClick="documents()">';	 }else{echo' <div class="box-icon">';	} ?>
               		 <div class="circle"><i class="fa fa-briefcase fa-lg"></i></div>
               </div>
             <h3>Documents</h3>
             </div>
            
            <div class="box_7 home_box1 color4">
             <?php if($arr[214]=='YES'){echo' <div class="box-icon"  onClick="newpay()">';	 }else{echo' <div class="box-icon">';	} ?>
               		 <div class="circle"><i class="fa fa-dollar fa-lg"></i></div>
               </div>
             <h3>Payroll</h3>
             </div>
            
            <div class="box_8 home_box1  color7">
            
             
            <?php if($arr[210]=='YES'){echo' <div class="box-icon"  onClick="takeatt()">';	 }else{echo' <div class="box-icon">';	} ?>
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
<b><small style="color:#ffdd17; float:left; margin-left:10px;">Logged In As:<?PHP echo strtoupper($username) ?></small></b>
<a href="http://weclines.com" style="color:#ffdd17; text-align:center; font-size:18PX">WEC KENYA H/R MANAGEMENT SYSTEM</a>
<small style="color:#ffdd17; float:right; margin-right:10px;cursor:pointer" onClick="logout()">LOGOUT</small></b>
</section> 
  <?php 

	//year register
	$year=date('Y');

	$result =mysql_query("select * from yearregister  where name='".$year."'");
	$num_results = mysql_num_rows($result);	
	if($num_results==0){
					//holidays
		

					$result =mysql_query("select * from holidays");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
					$row=mysql_fetch_array($result);
					$code=stripslashes($row['id']);
					$a=substr(stripslashes($row['date']),0,2);
					$b=substr(stripslashes($row['date']),3,2);
					$date=$a.'/'.$b.'/'.$year;
					$resultx = mysql_query("update holidays set date='".$date."' where id='".$code."'");	
					}

					$resulta =mysql_query("select * from users where position='HrHead' or  position='Admin'");
					$num_resultsa = mysql_num_rows($resulta);	
					for ($i=0; $i <$num_resultsa; $i++) {
					$rowa=mysql_fetch_array($resulta);  
					$resultx = mysql_query("insert into messages values('0','".stripslashes($rowa['name'])."','System','Update Holiday Days for the New Year-".$year.".','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
					}
					

					//sick days and leave days

					$resulta =mysql_query("select * from employee where status=1 order by fname");
					$num_resultsa = mysql_num_rows($resulta);	
					for ($i=0; $i <$num_resultsa; $i++) {
						$row=mysql_fetch_array($resulta);
						$emp=stripslashes($row['emp']);
						$leavac=stripslashes($row['leaveac']);
						$empname=stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']);
						$sickac=7;
						
						if($leavac>10){
							$leavac=10;
							$resulty = mysql_query("insert into leavetrack values('0','Annual','".$emp."','".$empname."','".date('m_Y')."','".$leavac."','".$leavac."','dr','Opening Balance for Year ".date('Y')."','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
						}
						//into leavetrack

						$resulty = mysql_query("insert into leavetrack values('0','Sick','".$emp."','".$empname."','".date('m_Y')."','".$sickac."','".$sickac."','dr','Opening Balance for Year ".date('Y')."','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
						
						$resultx = mysql_query("update employee set sickac='".$sickac."',leaveac='".$leavac."' where emp='".$emp."'");	
					}


		$resulty = mysql_query("insert into yearregister values('','".$year."')");


	}

	//check if month is registered in attendancelog
	$cur=date('m_Y');
	$arr=array();
	
	$result =mysql_query("select * from attendance  where month='".$cur."'");
	$num_results = mysql_num_rows($result);	
	if($num_results==0){
		$result = mysql_query("insert into attendancelog values('','".$cur."',0)");
		$resultc =mysql_query("select * from employee where status=1");
		$num_resultsc = mysql_num_rows($resultc);
		for ($a=0; $a <$num_resultsc; $a++) {
		$rowb=mysql_fetch_array($resultc);
		$leavac=stripslashes($rowb['leaveac']);
		$emp=stripslashes($rowb['emp']);
		$empname=$name=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);
		$resultd = mysql_query("insert into attendance values('','".$cur."','".stripslashes($rowb['emp'])."','".stripslashes($rowb['branch'])."','".$name."','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')");								
		
		//add leave days to staff
		$leavac=$leavac+2.08;
		$resulty = mysql_query("insert into leavetrack values('0','Annual','".$emp."','".$empname."','".date('m_Y')."','2.08','".$leavac."','dr','Leave days awarded for Month of ".$cur."','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
		$resultx = mysql_query("update employee set leaveac='".$leavac."' where emp='".$emp."'");


		}

		
		
	}





//check bm_log register
$time=date('Hi');
echo "<script>alert('')</script>";
if($time>1100){
  $result =mysql_query("select * from bmlog_register where name='".date('Ymd')."'");
  $num_results = mysql_num_rows($result);
  if($num_results==0){

              $resulta =mysql_query("select * from biometric_log where stamp='".date('Ymd')."'");
              $num_resultsa = mysql_num_rows($resulta);
              if($num_resultsa>0){

                  echo "<script>syncattendance();</script>";

              }

  }

}



/*

//update leaves on attendance table


 							$cur=date('m_Y');
						    $today=date('d/m/Y');
							$from=date('Ym').'01';
							$to=date('Ym').'31';
							$dd=date('d').'c';
							$result =mysql_query("select * from backup  where name='".$today."'");
							$num_results = mysql_num_rows($result);	
							if($num_results==0){
								$result = mysql_query("insert into backup values('','".$today."')");


								$resultc =mysql_query("select * from leaves where status=2 and ((".$to.">=commstamp and ".$from."<=commstamp) or (".$to.">=endstamp and ".$from."<=endstamp))");
								$num_resultsc = mysql_num_rows($resultc);
								for ($a=0; $a <$num_resultsc; $a++) {
								$rowb=mysql_fetch_array($resultc);
								$emp=stripslashes($rowb['emp']);
								$start=stripslashes($rowb['commstamp']);
								$end=stripslashes($rowb['endstamp']);
								$leavetype=stripslashes($rowb['leavetype']);

										while($start<=$end){


											
											 $dd=substr($start,6,2).'c';
											 
										     if($leavetype=='Sick'){$status=3;}else{$status=2;}

										     $resultx = mysql_query("update attendance set ".$dd."='".$status."' where pfno='".$emp."' and month='".$cur."'") or die (mysql_error());

										     
										     $start = new DateTime($start);
										     $start->modify('+1day');
										     $start= $start->format('Ymd');

										 

										}

								
								}
								
							}


*/
	
 ?>
    
<script type="text/javascript" src="js/custom.js"></script>    
</body>
</html>