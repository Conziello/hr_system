<?php include('db_fns.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$branch=stripslashes($row['branch']);
include('functions.php');
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<link rel="stylesheet" href="css/style.css">
<script src="js/functions.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<link href="css/page.css" rel="stylesheet" type="text/css" />
<link href='css/fullcalendar.css' rel='stylesheet' />
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>
$(function() {
	$("#radio" ).buttonset();
	$("#radio2" ).buttonset();
	
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		
		$( "#dob" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			yearRange: 'c-60:c'
		});
		
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: 'c-20:c'
		});
		$( "#datepicker3, #datepicker4, #datepicker5, .datepick" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: 'c-20:c+20'
		});
		$( "#datepicker6" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/yy',
			yearRange: 'c-20:c+20'
		});
		
		$( "#datepicker7" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm_yy',
			yearRange: 'c-20:c+20'
		});

		$( "#datepicker8" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy',
			yearRange: 'c-20:c+20'
		});

		$( "#datepicker9" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm_yy',
			yearRange: 'c-20:c+20'
		});
	
	});
	
$('input').live('keypress',function
(e){
	if(e.keyCode==13){
		var inputs=
		$(this).parents('form').eq(0).find
		(':input');
		var idx=inputs.index
		(this);
		if(idx ==
		inputs.length-1){
			inputs[0].select()
		}else{
			inputs[idx +
			1].focus();
			inputs[idx +
			1].select();
		}
		return false;
	}
});
</script>
<script>
	
</script>
<style>
	.ui-combobox {
		position: relative;
		display: inline-block;
		
	}
	.ui-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
		/* adjust styles for IE 6/7 */
		*height: 1.7em;
		*top: 0.1em;
	}
	.ui-combobox-input {
		margin: 0;
		padding: 5px;
	}
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		/* add padding to account for vertical scrollbar */
		padding-right: 20px;
	}
	</style>
	<script>
	
	</script>
<?php
$id=$_GET['id'];
switch($id){
	
case 1:	
							$_SESSION['lan']=$_SESSION['skl']=$_SESSION['hobby']=$_SESSION['exp']=$_SESSION['edu']=array();
							$result =mysql_query("select * from employee order by serial desc limit 0,1");
							$row=mysql_fetch_array($result);
							if(mysql_num_rows($result)==0){
							$emp=1;
							}else {
							$len=strlen(stripslashes($row['emp']))-1;
							$emp=substr(stripslashes($row['emp']),1,$len);
							$emp+=1;
							}

							$emp=sprintf("%05d",$emp);
							$emp='K'.$emp;



			$result = mysql_query("insert into log values('','".$username." accesses New Employee Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			
			echo"<script>$('.combos').parent().find('input:first').width(180);	</script>";	
								echo'<script>
								$(window).bind("keydown",
								function(evt){
									
									if(evt.ctrlKey&&(evt.which==83)){
									addnewemp(1);
									evt.preventDefault();
									return false;	
									}
									});
									
									
							  
							   </script>';
								
								
							
								echo'
								<div class="vd_container">
								<div class="vd_content clearfix">

								<div class="vd_content-section clearfix">
								<div class="row" id="form-basic">
								  <div class="col-md-12">
									<div class="panel widget">
								
			
								
								<div class="panel-heading ">
									
									<h3 class ="panel-title" style="color:#0a0a0a; margin-top:3px"> <span class="menu-icon"> <i class="fa fa-th-list"></i></span>NEW EMPLOYEE INFORMATION
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>
								</div>
								
								
								
								<div style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:5px 5px; border-color:#fff; background:#75c5cf; float:right; cursor:pointer;width:50px" class="in_field" onclick="addnewemp(1);"/>
								</div>
								<div id="newemployee" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</h3>
							</div>
							
						
								</div>
								
							
							
								<div class="col-sm-6 mar" id="personal">
								<div class="panel widget">

								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>PERSONAL DETAILS</h5>
								</div>
								<div class="panel-body">

								<form class="form-horizontal" role="form">
								           <div class="form-group">
                        <label style="float:left" class="col-sm-4">PF No:</label>
                        <div class="col-sm-8 controls">
								
                                <input type="text" id="emp" name="emp" class="in_field" value="'.$emp.'" style="border-color:#f00"/> 
								
								</div>
                        </div>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Biometric Id</label>
                        <div class="col-sm-8 controls">
								
                                <input type="text" id="biomid" name="biomid" class="in_field" value="" style=""/> 
                                </div>
                        </div>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">F.Name:</label>
                        <div class="col-sm-8 controls">
								
                                <input type="text" id="fname" name="field" class="in_field" onkeyup="validatealp(\'fname\')"/>
								</div>
								</div>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">M. Name:</label>
                        <div class="col-sm-8 controls">
								 
                                <input type="text" id="mname" name="field" class="in_field"/>
                                </div>
                                </div>
                                 
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">L. Name:</label>
                        <div class="col-sm-8 controls">
								 
                                <input type="text" id="lname" name="field" class="in_field"/>
                                </div>
                                </div>
                                 
									<div class="form-group">
                        <label style="float:left" class="col-sm-4">D.O.B:</label>
                        <div class="col-sm-8 controls">
								 
							  <input id="dob" name="dob" class="in_field" placeholder="" type="text" readonly="readonly">
							  </div>
							  </div>
							  
							   <div class="form-group">
                        <label style="float:left" class="col-sm-4">Mar. Status:</label>
                        <div class="col-sm-8 controls">
								 
                                <select class="select" id="mar" name="mar" style="float:right; text-transform:uppercase">
								<option value="Single">Single</option>
								<option value="Engaged">Engaged</option>
								<option value="Married">Married</option>
								<option value="Divorced">Divorced</option>
								<option value="Widowed">Widowed</option>
								</select> 
								
								</div>
								</div>
								<br/>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Languages:</label>
                        <div class="col-sm-8 controls">
								 
                               		
								<div class="ui-widget"  style="float:right; margin-right:8%">
	<select id="language" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from languages order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
							$k=stripslashes($row['id']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select>
<div id="languages" style="width:100%;"></div>
</div>

</div>




								         <div class="form-group">
                        <label style="float:left" class="col-sm-4">Gender:</label>
                        <div class="col-sm-8 controls">
								 
								
								<div id="radio">
		<input  id="maleGender" name="gender" type="radio" checked="checked" value="male" class="radio"/><label for="maleGender">Male</label>
		<input  id="femaleGender" name="gender" type="radio" value="female" class="radio"/><label for="femaleGender">Female</label>
		
								</div>
								</div>
								</div>
								<br/>
								     <div class="form-group">
                        <label style="float:left" class="col-sm-4">ID NO:</label>
                        <div class="col-sm-8 controls">
			
                                <input type="text" id="idno" name="field" class="in_field" onkeyup="validatenum(\'idno\')"/>
								</div>
								</div>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone No:</label>
                        <div class="col-sm-8 controls">
								
						
								 <input type="text" id="phone" name="phone" class="in_field" onkeyup="validatenum(\'phone\')"/> 
								</div>
								</div>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone No[2]:</label>
                        <div class="col-sm-8 controls">
								<div id="music"></div>
								
								 <input type="text" id="phone2" name="phone2" class="in_field" onkeyup="validatenum(\'phone2\')"/> 
								</div>
								</div>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Email Add:</label>
                        <div class="col-sm-8 controls">
								
								 <input type="text" id="emailadd" name="emailadd" class="in_field" style="text-transform:lowercase"/> 
								 </div>
								 </div>
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Phy Add:</label>
                        <div class="col-sm-8 controls">
                        								
                                <input type="text" id="phyadd" name="phyadd" class="in_field"/> 
                                </div>
                                </div>
                                <br/>
                                
									<div class="form-group">
                        <label style="float:left" class="col-sm-4">Location:</label>
                        <div class="col-sm-8 controls">
								
                               		
								<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="town" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from towns order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
</div>
</div>
<div class="cleaner_h5"></div>
						
								
								</div>
								</div>
								</div>
								
								</form>
								</div>
							
							
								<div class="col-sm-6 mar" id="personal">
								<div class="panel widget">
								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>EMPLOYMENT DETAILS</h5>
								</div>
								
								<div class="panel body">
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Basic Sal:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input type="text" id="sal" name="sal" class="in_field" onkeyup="validatenum(\'sal\')"/>
								
								</div>
								</div>
								<br/>
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Emp Category:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                                <select class="select" id="empcateg" name="empcateg" style="float:right; text-transform:uppercase">
								<option value="Normal">Normal</option>
								<option value="NIL_PAYE">NIL PAYE</option>
								<option value="NIL_NSSF">NIL NSSF</option>
								</select> 
								</div>
								</div>
								<br/>
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">D.O.E:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								

								<input id="datepicker2" name="doe" class="in_field"  type="text" readonly="readonly">
								</div>
								</div>
								<br/>
								<br/>
							 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Emp Type:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								
								<div id="radio2">
		<input  id="Permanent" name="emptype" type="radio" checked="checked" value="Permanent" class="radio" onclick="hidecontract()"/><label for="Permanent">Permanent</label>
		<input  id="Contract" name="emptype" type="radio" value="Contract" class="radio" onclick="showcontract()"/><label for="Contract">Contract</label>
		<input  id="Temporary" name="emptype" type="radio" value="Temporary" class="radio" onclick="hidecontract()"/><label for="Temporary">Temporary</label>
		</div>
		</div>
		</div>
		<br/><br/>
			
								<div id="contract" style="display:none">
									 <div class="form-group">
                        <label style="float:left" class="col-sm-4">From:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input type="text" id="from" name="from" class="in_field"/>
								</div>
								</div>
								<br/>
								
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">To:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input type="text" id="to" name="to" class="in_field"/>
								</div>
								</div>
								</div>
								<br/>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Branch:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="branch" class="combos">
	<option value="" selected="selected" disabled="disabled">Select One...</option>
								';
		$resulta =mysql_query("select * from branchtbl order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
</div>
</div><br/>
										<div class="form-group">
                        <label style="float:left" class="col-sm-4">Dept:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                                <div class="ui-widget" style="float:right; margin-right:8%">
	<select id="dept" class="combos"><option value="" selected="selected" disabled="disabled">Select One...</option>
								';
		$resulta =mysql_query("select * from dept order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
</div>

</div>
<br/>

										<div class="form-group">
                        <label style="float:left" class="col-sm-4">Position:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                               		<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="pos" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from positions order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
</div>
</div>
<br/>
<br/>
								<div class="cleaner_h5"></div>
								<div style="display:none">
								<a class="labels">Clearance:</a>
                                <select class="select" id="clearance" name="clearance" style="float:right ;text-transform:uppercase">
								<option value="1">Level 1</option>
								<option value="2">Level 2</option>
								</select>
								<div class="cleaner_h5"></div>
								</div>
								
								<a class="labels">Job Description:</a>
								<textarea class="textarea" id="jobdesc"></textarea>
					</div>
						
						</div>
								</div>
								<br/>
								
								
								
								
								

								<div class="cleaner_h5"></div>
								<div class="col-md-6">
								<div class="panel widget">
								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>MEDICAL DETAILS</h5>
								</div>
								<div class="panel-body">
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">B.Group:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                                <select class="select" id="bgroup" name="bgroup" style="float:right ;text-transform:uppercase">
								 <option value="" selected="selected" disabled="disabled">Select One...</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								</div>
								</div>
								<br/>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Known Health Problems/Alergies:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
							
								<div class="cleaner_h5"></div>
								<textarea class="textarea" id="alergy"></textarea>
								<div class="cleaner_h5"></div>
								
								</div>
								</div>
						

								</div>
								</div>
								</div>
								
								
								<div class="col-sm-6 mar" id="personal">
								<div class="panel widget">
								
								<div class="panel-heading vd_bg-grey">
								
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>EMERGENCY CONTACT DETAILS</h5>
								</div>
								
								<div class="panel-body">
								
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

								
								 <input id="ename" name="ename" class="in_field" placeholder="" type="text"  onkeyup="validatealp(\'ename\')">
						</div>
						</div>
						<br/><br/>
							 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Phone:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                               <input id="ephone" name="dob" class="in_field" placeholder="" type="text"  onkeyup="validatenum(\'ephone\')">
								</div>
								</div>
								<br/><br/>
									 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Postal Add:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                        
								
                               <input id="epostal" name="dob" class="in_field" placeholder="" type="text"  onkeyup="validatealp(\'fname\')">
								</div>
								</div>
								
								<div class="cleaner"></div>
								</div>
								</div>
								</div>
							

								<div class="col-md-6">
								<div class="panel widget">
								
								<div class="panel-heading vd_bg-grey">
								
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>EDUCATION DETAILS</h5>
								</div>
								
								<div class="panel-body">
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Course:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

								
								<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="certificate"  class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from courses order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								$k=stripslashes($row['id']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select></div>
</div>
</div>
		<div class="cleaner_h5"></div>

	
	
		
		<div id="bachelors" style="width:100%;"></div>
	<div class="cleaner"></div>
	</div>
	</div>
	</div>



	<div class="col-md-6">
	<div class="panel-widget">
	<div class="panel-heading vd_bg-grey">							
							<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>EXPERIENCE DETAILS</h5>	
							</div>
<div class="panel-body">
 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Experience:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
					
                               		
								<div class="ui-widget"  style="float:right; margin-right:8%">
	<select id="experience" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from experience order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$k=stripslashes($row['id']);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
								
	<div id="experiences" style="width:100%;"></div>
	</div>
</div>
	</div>
	</div>
	</div>
	
		<div class="cleaner"></div>		
		<div class="col-md-6">
		<div class="panel widget">
		<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>PAYSLIP DETAILS</h5>
								</div>
								<div class="panel-body">
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Bank:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
					
		                       <div class="ui-widget"  style="float:right; margin-right:8%">
						<select id="bank" class="combos">
				<option value="">Select one...</option>';
				$resulta =mysql_query("select * from banktbl order by name");
									$num_resultsa = mysql_num_rows($resulta);	
									for ($i=0; $i <$num_resultsa; $i++) {
										$row=mysql_fetch_array($resulta);
										$name=stripslashes($row['name']);
										$bid=stripslashes($row['id']);
										echo"<option value=\"".$bid."#".$name."\">".$name."</option>";
								}
								echo'</select>
								</div>
								</div>
								</div>
								<br/>
						
						
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Brnach Name:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

								 
                                <input type="text" id="branchname" name="field" class="in_field"/> 
                                </div>
                                </div><br/>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">EFT CODE:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

							
                                <input type="text" id="eftcode" name="field" class="in_field"/> 
                                </div></div><br/>
                                
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Acc No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">

								
                                <input type="text" id="acno" name="field" class="in_field"/> 
                                </div>
                                </div>
                                <br/>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Pin No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
						

                                <input type="text" id="pinno" name="field" class="in_field"/> 
                                </div>
                                </div>
                                <br/>
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">NHIF No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								
                                <input type="text" id="nhif" name="field" class="in_field"/> 
                                </div>
                                </div>
                                <br/>
                                
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">NSSF No:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								 
                                <input type="text" id="nssf" name="field" class="in_field"/> 
                                </div>
                                </div>
                                
								<div class="cleaner_h5"></div>						
									
								</div>
								</div>
								</div>
								</div>
									
									<div class="col-md-6">
									<div class="panel widget">
									<div class="panel-heading vd_bg-grey">
																
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>SKILLS</h5>
								
								</div>
								<div class="panel-body">
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Skill:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input style=" text-transform:uppercase" type="text" id="skill" name="field" class="in_field" placeholder="Type a Skill Press and Enter..."/> 
								</div>
								</div>
								
								<div class="cleaner_h5"></div>
								<div id="skills" style="width:100%;"></div>
								</div>
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="panel widget">
								<div class="panel-heading vd_bg-grey">
							
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>HOBBIES</h5>
								</div>
								<div class="panel-body">
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Hobby:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input type="text" id="hobby" name="field" class="in_field" placeholder="Type a Hobby Press and Enter..."/> 
								</div>
								</div>
								<div class="cleaner_h5"></div>
								<div id="hobbies" style="width:100%;"></div>
								<div class="cleaner"></div>
								
								</div>
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="panel widget">
								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>PROFILE PICTURE UPLOAD</h5>
								</div>
								<div class="panel-body">
								
								</form>
								
								<div class="col-sm-8">            
                    <div class="tab-content mgbt-xs-20">
                      <div class="tab-pane active" id="tab6">

								
								<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
      							 <dd class="custuploadblock_js">
                        <input style="opacity:0; float:left;" name="image" id="photoupload"  
                        class="transfileform_js" type="file">
                        </dd>
								
								<iframe name="leiframe" id="leiframe" class="leiframe">
								</iframe>
                            	<input type="hidden" id="stamp" name="stamp" value="'.$emp.'"/>
								<input type="hidden" id="id" name="id"  value="1"/>
								<div class="cleaner_h5"></div>
     							<input type="submit" value="upload" id="send"  style="width:40%;margin-left:40%; float:left; cursor:pointer"class="in_field"/>
								</form>
								</div>
								</div>
								</div>
								
								<div class="cleaner_h5"></div>
								<h5 class="panel-title">OTHER FILES UPLOAD</h5>
								<div class="cleaner_h5"></div>
								<div class="content">
											<div id="drop-files" ondragover="return false">
												Drop Images/Documents Here
											</div>
											
											<div id="uploaded-holder">
												<div id="dropped-files">
													<div id="upload-button">
														<a href="#" class="upload">Upload!</a>
														<a href="#" class="delete">delete</a>
														<span>0 Files</span>
													</div>
												</div>
												<div id="extra-files">
													<div class="number">
														0
													</div>
													<div id="file-list">
														<ul></ul>
													</div>
												</div>
											</div>
											
											<div id="loading">
												<div id="loading-bar">
													<div class="loading-color"> </div>
												</div>
												<div id="loading-content"></div>
											</div>
											</div>
								
							</div>
								</div>
								</div>
								</div>

								</div>
								</div>
								</div>
								</div>
								
   							';
							
							break;	
							
					case 2:
					$cat=$_GET['cat'];
					$k=$_GET['k'];
					$param=$_GET['param'];
					$_SESSION[$cat][$k]=$param;
					
				
					break;
					
					case 3:
					$cat=$_GET['cat'];
					$param=$_GET['param'];
					unset($_SESSION[$cat][$param]);
					
					break;
					
						case 4:
						
						$a=$_GET['a'];
						echo"<script>$('#emp1').parent().find('input:first').focus().width(250);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">SELECT AN EMPLOYEE:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
						<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
						<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="emp1" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1 and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
				</div>';
				
							
							break;
							
							case 5:
							
							$_SESSION['lan']=$_SESSION['skl']=$_SESSION['hobby']=$_SESSION['exp']=$_SESSION['edu']=array();
							$result = mysql_query("insert into log values('','".$username." accesses Edit Employee Panel.Employee No:".$_GET['param']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							$param=$_GET['param'];		
							$resultx =mysql_query("select * from employee where emp='".$param."'");		
							$rowx=mysql_fetch_array($resultx);
							$emp=stripslashes($rowx['emp']);
							echo"<script>$('.combos').parent().find('input:first').width(180);	</script>";	
								echo'<script>
								$(window).bind("keydown",
								function(evt){
									
									if(evt.ctrlKey&&(evt.which==83)){
									addnewemp(2);
									evt.preventDefault();
									return false;	
									}
									});
									
									
							  
							   </script>';
								
								
							
								echo'
								<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EDIT EMPLOYEE INFORMATION:'.stripslashes($rowx['fname']).' '.stripslashes($rowx['mname']).' '.stripslashes($rowx['lname']).'-P.F No:'.stripslashes($rowx['emp']).'
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								
								<div style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:5px 5px; border-color:#fff; background:#75c5cf; float:right; cursor:pointer;width:50px" class="in_field" onclick="addnewemp(2);"/>
								</div>
								<div id="newemployee" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</h3>
								</div>
								
								<div id="newstude" class="col-sm-12 " style="overflow-y:auto">
								<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
								<div class="col-sm-3 mar" id="personal">
								<h5>PERSONAL DETAILS</h5>
								<form>
								<a class="labels">PF No:<span>*</span></a>
                                <input type="text" id="emp" name="emp" class="in_field" value="'.$emp.'" style="border-color:#f00" disabled="disabled"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Biometric Id:<span>*</span></a>
                                <input type="text" id="biomid" name="biomid" class="in_field" value="'.stripslashes($rowx['biomid']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">F.Name:<span>*</span></a>
                                <input type="text" id="fname" name="field" class="in_field"onkeyup="validatealp(\'fname\')" value="'.stripslashes($rowx['fname']).'"/>
								<div class="cleaner_h5"></div>
								 <a class="labels">M. Name:</a>
                                <input type="text" id="mname" name="field" class="in_field" value="'.stripslashes($rowx['mname']).'"/> 
								<div class="cleaner_h5"></div>
								 <a class="labels">L. Name:<span>*</span></a>
                                <input type="text" id="lname" name="field" class="in_field"  value="'.stripslashes($rowx['lname']).'"/> 
								<div class="cleaner_h5"></div>
								 <a class="labels">D.O.B:</a>
							  <input id="dob" name="dob" class="in_field" placeholder="" type="text" readonly="readonly" value="'.stripslashes($rowx['dob']).'">
							   <div class="cleaner_h5"></div>
								 <a class="labels">Mar. Status:</a>
								 <select class="select" id="mar" name="mar" style="float:right; text-transform:uppercase">
								 <option value="'.stripslashes($rowx['marital']).'" selected="selected">'.stripslashes($rowx['marital']).'</option>
								<option value="Single">Single</option>
								<option value="Engaged">Engaged</option>
								<option value="Married">Married</option>
								<option value="Divorced">Divorced</option>
								<option value="Widowed">Widowed</option>
								</select> 
								<div class="cleaner_h5"></div>
								 <a class="labels">Languages:</a>
                               		
								<div class="ui-widget"  style="float:right; margin-right:8%">
	<select id="language" class="combos">
		<option value="">Select one...</option>';
		
		$resulta =mysql_query("select * from languages order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								$k=stripslashes($row['id']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
<div class="cleaner_h5"></div>
<div id="languages" style="width:100%;">';
$parts=explode(';',stripslashes($rowx['languages']));
		foreach ($parts as $key => $val) {
		$_SESSION['lan'][$key]=$val;
		if(strlen($val)>0){
		echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismisslan(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
		}
		}
echo'</div>
								<div class="cleaner_h5"></div>
								
								 
								
								<a class="labels" style="margin-right:30px">Gender:<span>*</span></a>
								<div id="radio">';
								
		if(stripslashes($rowx['gender'])=='MALE'){
			 echo'<input  id="maleGender" name="gender" type="radio" checked="checked" value="male" class="radio"/><label for="maleGender">Male</label>
		<input  id="femaleGender" name="gender" type="radio" value="female" class="radio"/><label for="femaleGender">Female</label>'; 
								 }
							 else{
          echo'<input  id="maleGender" name="gender" type="radio" value="male" class="radio"/><label for="maleGender">Male</label>
		<input  id="femaleGender" name="gender" type="radio" value="female"  checked="checked" class="radio"/><label for="femaleGender">Female</label>';}
		echo'
								</div>
			
								<a class="labels">ID NO:<span>*</span></a>
                                <input type="text" id="idno" name="field" class="in_field" onkeyup="validatenum(\'idno\')"  value="'.stripslashes($rowx['idno']).'"/>
								<div class="cleaner_h5"></div>
								 <a class="labels">Pin No:</a>
                                <input type="text" id="pinno" name="field" class="in_field" value="'.stripslashes($rowx['pinno']).'" /> 
								<div class="cleaner_h5"></div>	
								<a class="labels">Phone No:<span>*</span></a>
								 <input type="text" id="phone" name="phone" class="in_field"  value="'.stripslashes($rowx['phone']).'" onkeyup="validatenum(\'phone\')"/> 
								<div class="cleaner_h5"></div>
								<div id="music"></div>
								<a class="labels">Phone No[2]:</a>
								 <input type="text" id="phone2" name="phone2" class="in_field"  value="'.stripslashes($rowx['phone2']).'" onkeyup="validatenum(\'phone2\')"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Email Add:</a>
								 <input type="text" id="emailadd" name="emailadd"  value="'.stripslashes($rowx['email']).'" class="in_field" style="text-transform:lowercase"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Phy Add:</a>
                                <input type="text" id="phyadd" name="phyadd"  value="'.stripslashes($rowx['phyadd']).'" class="in_field"/> 
								<div class="cleaner_h5"></div>
								 <a class="labels">Location:</a>
                               		
								<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="town" class="combos">
			 <option value="'.stripslashes($rowx['town']).'" selected="selected">'.stripslashes($rowx['town']).'</option>';
		$resulta =mysql_query("select * from towns order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
<div class="cleaner_h5"></div>
						
								
								</div>
							
								<div class="col-sm-3 mar" id="personal">
								
								<div class="panel-heading vd_bg-grey">
								<h5>EMPLOYMENT DETAILS</h5>
								</div>
								
								<a class="labels">Basic Sal:<span>*</span></a>
								<input type="text" id="sal" name="sal" class="in_field" onkeyup="validatenum(\'sal\')"  value="'.stripslashes($rowx['salary']).'" />
								<div class="cleaner_h5"></div>
								 <a class="labels">Emp Category:</a>
                                <select class="select" id="empcateg" name="empcateg" style="float:right; text-transform:uppercase">
                                <option value="'.stripslashes($rowx['empcateg']).'" selected="selected">'.stripslashes($rowx['empcateg']).'</option>
								<option value="Normal">Normal</option>
								<option value="NIL_PAYE">NIL PAYE</option>
								<option value="NIL_NSSF">NIL NSSF</option>
								</select> 
								<div class="cleaner_h5"></div>


								 <a class="labels">D.O.E:<span>*</span></a>
								<input id="datepicker2" name="doe" class="in_field"  type="text" readonly="readonly"   value="'.stripslashes($rowx['employdate']).'" >
							   <div class="cleaner_h5"></div>
								
								<a class="labels" style="margin-right:30px">Emp. Type:<span>*</span></a>
								<div id="radio2">';
								
		if(stripslashes($rowx['emptype'])=='PERMANENT'){
			 echo'<input  id="Permanent" name="emptype" type="radio" checked="checked" value="Permanent" class="radio" onclick="hidecontract()"/><label for="Permanent">Permanent</label>
		<input  id="Contract" name="emptype" type="radio" value="Contract" class="radio" onclick="showcontract()"/><label for="Contract">Contract</label>
		<input  id="Other" name="emptype" type="radio" value="Other" class="radio" onclick="hidecontract()"/><label for="Other">Other</label>
		'; 
								 }
								 else if(stripslashes($rowx['emptype'])=='CONTRACT'){
			 echo'<input  id="Permanent" name="emptype" type="radio" value="Permanent" class="radio" onclick="hidecontract()"/><label for="Permanent">Permanent</label>
		<input  id="Contract" name="emptype" type="radio" value="Contract"  checked="checked" class="radio" onclick="showcontract()"/><label for="Contract">Contract</label>
		<input  id="Other" name="emptype" type="radio" value="Other" class="radio" onclick="hidecontract()"/><label for="Other">Other</label>
		'; 
								 }
							 else{
          echo'<input  id="Permanent" name="emptype" type="radio" value="Permanent" class="radio" onclick="hidecontract()"/><label for="Permanent">Permanent</label>
		<input  id="Contract" name="emptype" type="radio" value="Contract" class="radio" onclick="showcontract()"/><label for="Contract">Contract</label>
		<input  id="Temporary" name="emptype" type="radio" value="Temporary"  checked="checked" class="radio" onclick="hidecontract()"/><label for="Temporary">Temporary</label>
	';}
		echo'</div>
			
								<div id="contract" style="display:none">
								<a class="labels">From:<span>*</span></a>
								<input type="text" id="from" name="from" class="in_field"  value="'.stripslashes($rowx['contractfrom']).'"/>
								<div class="cleaner_h5"></div>
								<a class="labels">To:<span>*</span></a>
								<input type="text" id="to" name="to" class="in_field" value="'.stripslashes($rowx['contractto']).'"/>
								</div>
								
								<div class="cleaner_h5"></div>
								
									<a class="labels">Branch:<span>*</span></a>
                                <div class="ui-widget" style="float:right; margin-right:8%">
	<select id="branch" class="combos"><option value="" selected="selected" disabled="disabled">Select One...</option>
	<option value="'.stripslashes($rowx['branch']).'" selected="selected">'.stripslashes($rowx['branch']).'</option>							';
		$resulta =mysql_query("select * from branchtbl order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select></div>
								<div class="cleaner_h5"></div>
								
								<a class="labels">Dept:<span>*</span></a>
                                  <div class="ui-widget" style="float:right; margin-right:8%">
	<select id="dept" class="combos"><option value="" selected="selected" disabled="disabled">Select One...</option>
		<option value="'.stripslashes($rowx['dept']).'" selected="selected">'.stripslashes($rowx['dept']).'</option>';
		$resulta =mysql_query("select * from dept order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select></div>
								<div class="cleaner_h5"></div>
								<a class="labels">Position:<span>*</span></a>
                               		<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="pos" class="combos">
		<option value="'.stripslashes($rowx['position']).'" selected="selected">'.stripslashes($rowx['position']).'</option>';
		$resulta =mysql_query("select * from positions order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
								<div class="cleaner_h5"></div>
								<div style="display:none">
								<a class="labels">Clearance:</a>
                                <select class="select" id="clearance" name="clearance" style="float:right ;text-transform:uppercase">
                                <option value="'.stripslashes($rowx['clearance']).'" selected="selected">LEVEL '.stripslashes($rowx['clearance']).'</option>
								<option value="1">Level 1</option>
								<option value="2">Level 2</option>
								</select>
								<div class="cleaner_h5"></div>
								</div>
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Job description:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<textarea class="textarea" id="jobdesc">'.stripslashes($rowx['jobdesc']).'</textarea>
								
								</div>
								</div>
								<div class="cleaner"></div>
								</div>
								</div>
								</div>
								
								  <div class="col-md-6">
                 <div class="panel widget">
								


								<div class="col-sm-6 mar" id="personal">

								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>MEDICAL DETAILS</h5>
								</div>


								<a class="labels">B.Group:</a>
                                <select class="select" id="bgroup" name="bgroup" style="float:right ;text-transform:uppercase">
								 <option value="'.stripslashes($rowx['bgroup']).'" selected="selected">'.stripslashes($rowx['bgroup']).'</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								<div class="cleaner_h5"></div>
								<a class="labels">Known Health Problems/Alergies:</a>
								<div class="cleaner_h5"></div>
								<textarea class="textarea" id="alergy">'.stripslashes($rowx['alergy']).'</textarea>
								<div class="cleaner_h5"></div>
						

								</div>

								</form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
			  <!-- col-md-6 --> 

			  <div class="col-md-6">
                 <div class="panel widget">
								


								<div class="col-sm-6 mar" id="personal">
								
								<div class="panel-heading vd_bg-grey">
								<h5>EMERGENCY CONTACT DETAILS</h5>
								</div>


								<a class="labels">Name:</a>
                               <input id="ename" name="ename" class="in_field" placeholder=""  value="'.stripslashes($rowx['ename']).'" type="text"  onkeyup="validatealp(\'ename\')">
								<div class="cleaner_h5"></div>
								<a class="labels">Phone:</a>
                               <input id="ephone" name="dob" class="in_field" placeholder="" type="text"  value="'.stripslashes($rowx['ephone']).'" onkeyup="validatenum(\'ephone\')">
								<div class="cleaner_h5"></div>
								<a class="labels">Postal Add:</a>
                               <input id="epostal" name="dob" class="in_field" placeholder="" type="text"  value="'.stripslashes($rowx['epostal']).'" onkeyup="validatealp(\'fname\')">
								<div class="cleaner"></div>

								<div class="panel-heading vd_bg-grey">
								<h5>EDUCATION DETAILS</h5>
								</div>
								
								<a class="labels">Course:</a>
								<div class="ui-widget" style="float:right; margin-right:8%">
	<select id="certificate"  class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from courses  order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								$k=stripslashes($row['id']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select></div><div class="cleaner_h5"></div>
		
		<div id="bachelors" style="width:100%;">';
$parts=explode(';',stripslashes($rowx['education']));
		foreach ($parts as $key => $val) {
		$_SESSION['edu'][$key]=$val;
		if(strlen($val)>0){
		echo'<div class="tag alert-info alert-dismissable" id="edutag'.$key.'"><button type="button" class="close" onclick="dismissbach(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
		}
		}
echo'</div>
	<div class="cleaner"></div>							
							<h5>EXPERIENCE DETAILS</h5>		
						<a class="labels">Experience:</a>
                               		
								<div class="ui-widget"  style="float:right; margin-right:8%">
	<select id="experience" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from experience order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								$k=stripslashes($row['id']);
								echo"<option value=\"".$k."θ".$name."\">".$name."</option>";
						}
		echo'</select>
</div>

			<div class="cleaner_h5"></div>								
	<div id="experiences" style="width:100%;">';
		$parts=explode(';',stripslashes($rowx['experience']));
		foreach ($parts as $key => $val) {
		$_SESSION['exp'][$key]=$val;
		if(strlen($val)>0){
		echo"<div class=\"tag alert-info alert-dismissable\" id=\"exptag".$key."\"><button type=\"button\" class=\"close\" onclick=\"dismissexp('".$key."')\"  aria-hidden=\"true\">&times;</button>".$val."</div>";
		}
		}
echo'</div>
		<div class="cleaner"></div>	
		
		<div class="panel-heading vd_bg-grey">
								<h5>PAYSLIP DETAILS</h5>
</div>

								<a class="labels">Bank:</a>
                               <div class="ui-widget"  style="float:right; margin-right:8%">
				<select id="bank" class="combos">
		<option value="'.stripslashes($rowx['bid']).'#'.stripslashes($rowx['bname']).'" selected="selected">'.stripslashes($rowx['bname']).'</option>';
		$resulta =mysql_query("select * from banktbl order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysql_fetch_array($resulta);
								$name=stripslashes($row['name']);
								$bid=stripslashes($row['id']);
								echo"<option value=\"".$bid."#".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
								<div class="cleaner_h5"></div>

								 <a class="labels">Branch Name:</a>
                                <input type="text" id="branchname" name="field" class="in_field" value="'.stripslashes($rowx['branchname']).'" /> 
								<div class="cleaner_h5"></div>

								 <a class="labels">EFT Code:</a>
                                <input type="text" id="eftcode" name="field" class="in_field" value="'.stripslashes($rowx['eftcode']).'" /> 
								<div class="cleaner_h5"></div>


								 <a class="labels">A/C No:</a>
                                <input type="text" id="acno" name="field" class="in_field" value="'.stripslashes($rowx['acno']).'" /> 
								<div class="cleaner_h5"></div>
								<a class="labels">NHIF No.:</a>
                                <input type="text" id="nhif" name="field" class="in_field" value="'.stripslashes($rowx['nhif']).'" /> 
								<div class="cleaner_h5"></div>
								 <a class="labels">NSSF No.:</a>
                                <input type="text" id="nssf" name="field" class="in_field" value="'.stripslashes($rowx['nssf']).'" /> 
								<div class="cleaner_h5"></div>						
									
								</div>
										<div class="col-sm-3" id="personal">
								
										<div class="panel-heading vd_bg-grey">
										<h5>SKILLS</h5>
										</div>

								<a class="labels">Skill:</a>
								<input style=" text-transform:uppercase" type="text" id="skill" name="field" class="in_field" placeholder="Type a Skill Press and Enter..."/> 
								<div class="cleaner_h5"></div>
								<div id="skills" style="width:100%;">';
		$parts=explode(';',stripslashes($rowx['skills']));
		foreach ($parts as $key => $val) {
		$_SESSION['skl'][$key]=$val;
		if(strlen($val)>0){
		echo"<div class=\"tag alert-info alert-dismissable\" id=\"skilltag".$key."\"><button type=\"button\" class=\"close\" onclick=\"dismissskl('".$key."')\"  aria-hidden=\"true\">&times;</button>".$val."</div>";
		}
		}
echo'</div>
								<div class="cleaner"></div>

								<div class="panel-heading vd_bg-grey">
								<h5>HOBBIES</h5>
								</div>


								<a class="labels">Hobby:</a>
								<input type="text" id="hobby" name="field" class="in_field" placeholder="Type a Hobby Press and Enter..."/> 
								<div class="cleaner_h5"></div>
								<div id="hobbies" style="width:100%;">';
		$parts=explode(';',stripslashes($rowx['hobbies']));
		foreach ($parts as $key => $val) {
		$_SESSION['hobby'][$key]=$val;
		if(strlen($val)>0){
		echo"<div class=\"tag alert-info alert-dismissable\" id=\"hobbytag".$key."\"><button type=\"button\" class=\"close\" onclick=\"dismisshobby('".$key."')\"  aria-hidden=\"true\">&times;</button>".$val."</div>";
		}
		}
echo'</div>
								<div class="cleaner"></div>

								<div class="panel-heading vd_bg-grey">
								<h5>PROFILE PICTURE UPLOAD</h5>
								</div>
								
								<div class="cleaner_h5"></div>
								</form>
								<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
      							
								<dd class="custuploadblock_js">
								<input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe">
								</iframe>
                            	<input type="hidden" id="stamp" name="stamp" value="'.$emp.'"/>
								<input type="hidden" id="id" name="id"  value="2"/>
								<div class="cleaner_h5"></div>
     							<input type="submit" value="upload" id="send"  style="width:40%;margin-left:40%; float:left; cursor:pointer"class="in_field"/>
								</form>
								<div class="cleaner_h5"></div>

								<div class="panel-heading vd_bg-grey">
								<h5>OTHER FILES UPLOAD</h5>
								</div>
								
								
								<div class="cleaner_h5"></div>
								<div class="content">
											<div id="drop-files" ondragover="return false">
												Drop Images/Documents Here
											</div>
											
											<div id="uploaded-holder">
												<div id="dropped-files">
													<div id="upload-button">
														<a href="#" class="upload">Upload!</a>
														<a href="#" class="delete">delete</a>
														<span>0 Files</span>
													</div>
												</div>
												<div id="extra-files">
													<div class="number">
														0
													</div>
													<div id="file-list">
														<ul></ul>
													</div>
												</div>
											</div>
											
											<div id="loading">
												<div id="loading-bar">
													<div class="loading-color"> </div>
												</div>
												<div id="loading-content"></div>
											</div>
											</div>
								
							</div>
								</div>

								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-6 --> 
								
								<script>
								var body = document.body,
   								 html = document.documentElement;
								var height = Math.max( body.scrollHeight, body.offsetHeight, 
                      			 html.clientHeight, html.scrollHeight, html.offsetHeight );
								 
								</script>
   							';
							
							break;	
							case 6:
							echo"<script>$('.emp2').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Employee Search Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo'
								<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EMPLOYEE SEARCH PANEL
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
								<div id="findstude">';							
	
echo'
	<div id="op1">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp21" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$empno=stripslashes($row['emp']);
			echo'<option value="'.$empno.'">'.stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']).'</option>';
							}
		echo'</select>
		</div>
	</div>
	<div id="op2" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp22" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by emp");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$empno=stripslashes($row['emp']);
								echo'<option value="'.$empno.'">'.stripslashes($row['emp']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op3" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp23" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by ename");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$empno=stripslashes($row['emp']);
								echo'<option value="'.$empno.'">'.stripslashes($row['ename']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op4" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp24" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by phone");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$empno=stripslashes($row['emp']);
								echo'<option value="'.$empno.'">'.stripslashes($row['phone']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	
	<div id="op5" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp25" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>
								<option value="SINGLE">SINGLE</option>
								<option value="ENGAGED">ENGAGED</option>
								<option value="MARRIED">MARRIED</option>
								<option value="DIVORCED">DIVORCED</option>
								<option value="WIDOWED">WIDOWED</option>
								</select> 
		</div>
	</div>
	
	<div id="op6" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp26" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from languages order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$lan=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$lan.'">'.$lan.'</option>';
							}
		echo'
			</select>
		</div>
	</div>

	
		<div id="op7" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp27" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>
								<option value="MALE">MALE</option>
								<option value="FEMALE">FEMALE</option>
								</select> 
		</div>
	</div>
	
	<div id="op8" style="display:none">
	   <input type="text" id="emp28" name="empfield" class="in_field"  style="float:left; width:27%"/> 
	</div>
	
	<div id="op9" style="display:none">
	   <input type="text" id="emp29" name="empfield" class="in_field"  style="float:left; width:27%"/> 
	</div>
	
	<div id="op10" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp210" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from towns order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$town=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$town.'">'.$town.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op11" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp211" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>
								<option value="PERMANENT">PERMANENT</option>
								<option value="CONTRACT">CONTRACT</option>
								<option value="TEMPORARY">TEMPORARY</option>
								</select> 
		</div>
	</div>
	
	<div id="op12" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp212" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from dept order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$dept=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$dept.'">'.$dept.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op20" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp220" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from branchtbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$name=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$name.'">'.$name.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op13" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp213" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from positions order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$pos=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$pos.'">'.$pos.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op14" style="display:none">
	   <input type="text" id="emp214" name="empfield" class="in_field"  style="float:left; width:27%"/> 
	</div>
	
	<div id="op15" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp215" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from banktbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$name=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$name.'">'.$name.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op16" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp216" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from courses order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$name=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$name.'">'.$name.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
		<div id="op17" style="display:none">
		<div class="ui_widget"  style="margin:0 10px 0 10px;float:left; width:270px">
		<select id="emp217" class="emp2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysql_query("select * from experience order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$name=strtoupper(stripslashes($row['name']));
								echo'<option value="'.$name.'">'.$name.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op18" style="display:none">
	   <input type="text" id="emp218" name="empfield" class="in_field"  style="float:left; width:27%"/> 
	</div>
	
	<div id="op19" style="display:none">
	   <input type="text" id="emp219" name="empfield" class="in_field"  style="float:left; width:27%"/> 
	</div>
	
		<select class="select" id="menusearch" style="float:right; margin-right:10px; width:20%">
		<option value="1θemp" onclick="menuop(1)">Employee Name</option>
		<option value="2θemp" onclick="menuop(2)">PF No</option>
		<option value="3θemp" onclick="menuop(3)">Emergency Contact</option>
		<option value="4θemp" onclick="menuop(4)">Phone No</option>
		<option value="5θmarital" onclick="menuop(5)">Marital Status</option>
		<option value="6θlanguages" onclick="menuop(6)">Languages</option>
		<option value="7θgender" onclick="menuop(7)">Gender</option>
		<option value="8θidno" onclick="menuop(8)">ID No</option>
		<option value="9θpinno" onclick="menuop(9)">PIN No</option>
		<option value="10θtown" onclick="menuop(10)">Location</option>
		<option value="11θemptype" onclick="menuop(11)">Emp Type</option>
		<option value="20θbranch" onclick="menuop(20)">Branch</option>
		<option value="12θdept" onclick="menuop(12)">Dept</option>
		<option value="13θposition" onclick="menuop(13)">Position</option>
		<option value="14θjobdesc" onclick="menuop(14)">Job Desc</option>
		<option value="15θbname" onclick="menuop(15)">Bank</option>
		<option value="16θeducation" onclick="menuop(16)">Education</option>
		<option value="17θexperience" onclick="menuop(17)">Experience</option>
		<option value="18θskills" onclick="menuop(18)">Skills</option>
		<option value="19θhobbies" onclick="menuop(19)">Hobbies</option>
	</select>
	<a class="labels" style="float:right;margin-right:10px; font-weight:bold">Search By:</a>';			
	echo'<div id="results">';
										
										if(isset($_GET['param'])){
										$param=$_GET['param'];}
										else $param='default';
										echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:90%;"></div>
                						<div class="cleaner_h5"></div>';
                    					if($param=='default'){
                    					echo "<script>paginate(1,'".$param."');</script>";
										recent(1,2);
										}
										
											else {
											echo "<script>paginate(2,'".$param."');</script>";
										recent(1,2);
											}	
									
							break;
							
							case 7:
							
$result = mysql_query("insert into log values('','".$username." accesses Employee Chart Panel.Registration No:".$_GET['param']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$emp=$_GET['param'];
							$result =mysql_query("select * from employee where emp='".$emp."'");		
							$row=mysql_fetch_array($result);
							
							
							echo'
								<div style="width:100%; background:#272727; padding:3px 0 1px 0" id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EMPLOYEE FILE PANEL-'.stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']).'-P.F No:'.stripslashes($row['emp']).'
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
								<input type="hidden" id="stamp" value="'.$emp.'"/>
								<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							<div id="newstude" class="col-sm-12 ">
<div id="wrapper" style="width:100%;  margin:0 auto;border-right:2px solid #75c5cf; border-left:2px solid #75c5cf;border-top:2px solid #75c5cf;">
<div style="float:left; width:19%">
<img src="'.stripslashes($row['photo']).'" alt="Photo" style="max-width:95%; float:left; margin:2%; border:1px solid #272727" />

 </div>
<div style="float:left; width:80%;  border-left:2px solid #75c5cf;">
	<ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Personal Details</h>
            <li class=""><strong>P.F No: </strong>'.stripslashes($row['emp']).'</li>
			 <li class=""><strong>Names: </strong>'.stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']).'</li>
             <li class=""><strong>D.O.B: </strong>'.stripslashes($row['dob']).'</li>
			  <li class=""><strong>Gender: </strong>'.stripslashes($row['gender']).'</li>
			   <li class=""><strong>Marital Status: </strong>'.stripslashes($row['marital']).'</li>
              <li class=""><strong>Phone: </strong>'.stripslashes($row['phone']).'</li>
			    <li class=""><strong>ID No: </strong>'.stripslashes($row['idno']).'</li>
				  <li class=""><strong>Pin No: </strong>'.stripslashes($row['pinno']).'</li>
              <li class=""><strong>Languages: </strong>'.stripslashes($row['languages']).'</li>
       		 <li class=""><strong>Address: </strong>'.stripslashes($row['phyadd']).'</li>
			  <li class=""><strong>Location: </strong>'.stripslashes($row['town']).'</li>
             </ul>
			 
			  <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Employment Details</h>
            <li class=""><strong>Salary: </strong>'.stripslashes($row['salary']).'</li>
             <li class=""><strong>D.O.E: </strong>'.stripslashes($row['employdate']).'</li>
			  <li class=""><strong>Emp Type: </strong>'.stripslashes($row['emptype']).'</li>';
			  if(stripslashes($row['emptype'])=='CONTRACT'){
				echo'<li class=""><strong>From: </strong>'.stripslashes($row['contractfrom']).'</li>
			  <li class=""><strong>To: </strong>'.stripslashes($row['contractto']).'</li>';  
			  }
			  
			   echo'<li class=""><strong>Branch: </strong>'.stripslashes($row['branch']).'</li>
			   <li class=""><strong>Dept: </strong>'.stripslashes($row['dept']).'</li>
              <li class=""><strong>Position: </strong>'.stripslashes($row['position']).'</li>
              <li class=""><strong>Clearance Level: </strong>'.stripslashes($row['clearance']).'</li>
			    <li class=""><strong>Job Desc: </strong>'.stripslashes($row['jobdesc']).'</li>
			     <li class=""><strong>Leave Days Pending: </strong>'.stripslashes($row['leaveac']).'</li>';
				 if(stripslashes($row['status'])=='0'){
			echo'<li class=""><strong>Termination Date: </strong>'.stripslashes($row['terminationdate']).'</li>
			  <li class=""><strong>Termination Reason: </strong>'.stripslashes($row['terminationreason']).'</li>';  
			  }
			  
				
            echo' </ul>
			
<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>


			  <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Medical Details</h>
            <li class=""><strong>Blood Group: </strong>'.stripslashes($row['bgroup']).'</li>
             <li class=""><strong>Known Problems: </strong>'.stripslashes($row['alergy']).'</li>
			   <div class="cleaner_h10"></div>  
			 <h style="font-size:15px; text-decoration:underline; color:#75c5cf">Emergency Contact Details</h>
            <li class=""><strong>Names: </strong>'.stripslashes($row['ename']).'</li>
             <li class=""><strong>Phone: </strong>'.stripslashes($row['ephone']).'</li>
			 <li class=""><strong>Postal Address: </strong>'.stripslashes($row['epostal']).'</li>
			  <div class="cleaner_h10"></div>  
			 <h style="font-size:15px; text-decoration:underline; color:#75c5cf">Payslip Details</h>
            <li class=""><strong>Bank: </strong>'.stripslashes($row['bname']).'</li>
             <li class=""><strong>A/C No: </strong>'.stripslashes($row['acno']).'</li>
			 <li class=""><strong>NSSF No: </strong>'.stripslashes($row['nssf']).'</li>
			 <li class=""><strong>NHIF No: </strong>'.stripslashes($row['nhif']).'</li>
			 </ul>
			 
			 <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Education Details</h>
            <li class="">'.stripslashes($row['education']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Experience Details</h>
            <li class="">'.stripslashes($row['experience']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Skills</h>
            <li class="">'.stripslashes($row['skills']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Hobbies</h>
            <li class="">'.stripslashes($row['hobbies']).'</li>
			 </ul>
			 
	<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>

<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Discpilinary Information</h> <div class="cleaner_h5"></div> ';

$resultd =mysql_query("select * from discipline where emp='".$emp."' order by stamp desc");
$num_results = mysql_num_rows($resultd);$a=1;
for ($i=0; $i <$num_results; $i++) {		
$rowd=mysql_fetch_array($resultd);
echo '<p  style="text-align:left;margin-left:5px"><b>'.$a.'. '.stripslashes($rowd['date']).' [ '.stripslashes($rowd['measure']).' ]-</b>'.stripslashes($rowd['details']).'</p><br/>';

$a++;
}

			  
			 
echo'<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Documents</h> <div class="cleaner_h5"></div> 
';

$resultd =mysql_query("select * from documents where empno='".$emp."' order by stamp desc");
$num_results = mysql_num_rows($resultd);
for ($i=0; $i <$num_results; $i++) {		
$rowd=mysql_fetch_array($resultd);
echo'<div id="photo'.stripslashes($rowd['id']).'" style="float:left;position:relative;width:19%;height:200px; margin-left:2%;border:1px solid; cursor:pointer " onclick="showphoto('.stripslashes($rowd['id']).')">';
if(exif_imagetype('upload/'.stripslashes($rowd['image']).'')){
echo'
  <img src="upload/'.stripslashes($rowd['image']).'" alt="Photo" style="float:left;width:100%; height:90%">';
}
else{
	echo'<img src="images/adobe.png" alt="Photo" style="float:left; ;width:100%; height:90%">';
}
echo'<h5>'.stripslashes($rowd['image']).'['.stripslashes($rowd['name']).']</h5></div>';					
}
		  	 
echo'
 <div id="picreview"  class="usp"></div>

<div class="cleaner_h5"></div>
								<h5>OTHER FILES UPLOAD</h5><div class="cleaner_h5"></div>
								<div class="content">
											<div id="drop-files" ondragover="return false" style="width:100%">
												Drop Images/Documents Here
											</div>
											
											<div id="uploaded-holder">
												<div id="dropped-files">
													<div id="upload-button">
														<a href="#" class="upload">Upload!</a>
														<a href="#" class="delete">delete</a>
														<span>0 Files</span>
													</div>
												</div>
												<div id="extra-files">
													<div class="number">
														0
													</div>
													<div id="file-list">
														<ul></ul>
													</div>
												</div>
											</div>
											
											<div id="loading">
												<div id="loading-bar">
													<div class="loading-color"> </div>
												</div>
												<div id="loading-content"></div>
											</div>
											</div>

  <div class="cleaner_h50"></div>  <div class="cleaner_h50"></div>
 </div>
     
        	

							
							
							</div>';				
							
								break;
								
								case 8:
								$param=$_GET['param'];
								$resultd =mysql_query("select * from documents where id='".$param."'");
								$rowd=mysql_fetch_array($resultd);
								echo'<div id="modalDiv"></div>
		<div id="alertDiv"  class="bounceIn appear" data-start="200" style="width:40%; height:40%; left:30%">
		<div style="float:left;width:35%; height:100%;">';
		if(exif_imagetype('upload/'.stripslashes($rowd['image']).'')){
echo'
  <img src="upload/'.stripslashes($rowd['image']).'" alt="Photo" style="float:left;width:100%; height:100%">';
}
else{
	echo'<img src="images/adobe.png" alt="Photo" style="float:left; ;width:100%; height:100%">';
}
		echo'</div>
		<div style="float:left;width:65%; height:100%;padding:2%">
			<a class="labels">File Name:<span>*</span></a>
			<input type="text" id="fname" name="sal" class="in_field"  value="'.stripslashes($rowd['name']).'" style="text-transform:none" />
				<div class="cleaner_h5"></div>  
			<a class="labels">File Description:</a>
				<textarea class="textarea" id="filedesc">'.stripslashes($rowd['filedesc']).'</textarea>
		<div class="cleaner_h5"></div>  
			<a class="labels">Uploaded on:</a>
				<input type="text" style="border-color:#f00" id="datepicker" name="sal" class="in_field"  value="'.stripslashes($rowd['date']).'" disabled="disabled" />
				<div class="cleaner_h20"></div>  
				 <a class="btn btn-sm btn-success" onclick="updatephoto('.stripslashes($rowd['id']).')"><i class="fa fa-save"></i>UPDATE</a>';
		echo"<a class=\"btn btn-sm btn-info\"  href=\"#\" onclick=\"window.open('http://".$server."/hr/upload/".stripslashes($rowd['image'])."')\">
				 <i class=\"fa fa-info-circle\"></i> VIEW</a>";
				  echo'<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a> <a class="btn btn-sm btn-danger" onclick="deletephoto('.stripslashes($rowd['id']).')"><i class="fa fa-trash-o"></i> DELETE</a>
				 	<div class="cleaner_h5"></div>  
				<div id="uphoto" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
		</div>
		
		
	 
		
		</div>
	</div>';
								break;
								
								case 9:
								echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Ex Employee Search Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo'
								<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EX-EMPLOYEE SEARCH PANEL
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
								<div id="findstude">';	
															
echo'<div class="ui-widget" style="margin:10px; float:left">
	<select id="emp3">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=0  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'</option>';
							}
	echo'</select>
	</div>
	
									<div id="results" style="min-height:350px;">';
									
									 	$per_page = 10;
                    					$result =mysql_query("select * from employee where status=0  and ".$_SESSION['clearance']." ");
                    					$count = mysql_num_rows($result);
                    					$pages = ceil($count/$per_page);
										if(isset($_GET['param'])){
										$param=$_GET['param'];}
										else $param='default';
										echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:310px;"></div>
                						<div class="cleaner_h5"></div>';
                    					if($param=='default'){
                    					echo "<script>paginate(3,'".$param."');</script>";
										recent(2,4);
										}
										
											else {
											echo "<script>paginate(4,'".$param."');</script>";
											recent(2,4);
											}	
											
						
							break;
							
							case 10:
						
$result = mysql_query("insert into log values('','".$username." archives employee record.Employee No:".$_GET['param']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$emp=$_GET['param'];
							$resulta = mysql_query("update employee set status=0 where emp='".$emp."'");
							if($resulta){
							echo"
										<script>
										$().customAlert();
										alert('Success!', '<p>Delete Successful.</p>');
										</script>";	
							}
							
							
							break;
							
							case 11:
								echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
									echo"<script>$('#user1').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Dashboard','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">DASHBOARD:'.strtoupper(getuser($username)).'
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
							
	 <ul class="nav nav-tabs">
        <li><a href="#tasks" data-toggle="tab" style="outline:0">Tasks Manager</a></li>
        <li  class="active"><a href="#events" data-toggle="tab" style="outline:0">Mails Manager  <img src="images/plus.png" style="width:20px; height:20px; float:right; cursor:pointer" onclick="addtopay()" title="Add New Message"></a></li>
     	 <li><a href="#myinfo" data-toggle="tab" style="outline:0">My Info</a></li>
     	 <li><a href="#mypay" data-toggle="tab" style="outline:0">My Payslips</a></li>
     	  <li><a href="#mydeduct" data-toggle="tab" style="outline:0">Deductions/Contributions Summary</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">

       <div class="tab-pane fade" id="myinfo">';

        $result =mysql_query("select * from users where name='".$username."'");		
		$row=mysql_fetch_array($result);
		$emp=stripslashes($row['pfno']);

       $result =mysql_query("select * from employee where emp='".$emp."'");		
		$row=mysql_fetch_array($result);


			echo'<div style="float:left; width:100%;height:400px;overflow-y:auto ">
			<ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Personal Details</h>
            <li class=""><strong>P.F No: </strong>'.stripslashes($row['emp']).'</li>
			 <li class=""><strong>Names: </strong>'.stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']).'</li>
             <li class=""><strong>D.O.B: </strong>'.stripslashes($row['dob']).'</li>
			  <li class=""><strong>Gender: </strong>'.stripslashes($row['gender']).'</li>
			   <li class=""><strong>Marital Status: </strong>'.stripslashes($row['marital']).'</li>
              <li class=""><strong>Phone: </strong>'.stripslashes($row['phone']).'</li>
			    <li class=""><strong>ID No: </strong>'.stripslashes($row['idno']).'</li>
				  <li class=""><strong>Pin No: </strong>'.stripslashes($row['pinno']).'</li>
              <li class=""><strong>Languages: </strong>'.stripslashes($row['languages']).'</li>
       		 <li class=""><strong>Address: </strong>'.stripslashes($row['phyadd']).'</li>
			  <li class=""><strong>Location: </strong>'.stripslashes($row['town']).'</li>
             </ul>
			 
			  <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Employment Details</h>
            <li class=""><strong>Salary: </strong>'.stripslashes($row['salary']).'</li>
             <li class=""><strong>D.O.E: </strong>'.stripslashes($row['employdate']).'</li>
			  <li class=""><strong>Emp Type: </strong>'.stripslashes($row['emptype']).'</li>';
			  if(stripslashes($row['emptype'])=='CONTRACT'){
				echo'<li class=""><strong>From: </strong>'.stripslashes($row['contractfrom']).'</li>
			  <li class=""><strong>To: </strong>'.stripslashes($row['contractto']).'</li>';  
			  }
			  
			   echo'<li class=""><strong>Branch: </strong>'.stripslashes($row['branch']).'</li>
			   <li class=""><strong>Dept: </strong>'.stripslashes($row['dept']).'</li>
              <li class=""><strong>Position: </strong>'.stripslashes($row['position']).'</li>
              <li class=""><strong>Clearance Level: </strong>'.stripslashes($row['clearance']).'</li>
			    <li class=""><strong>Job Desc: </strong>'.stripslashes($row['jobdesc']).'</li>
			     <li class=""><strong>Leave Days Pending: </strong>'.stripslashes($row['leaveac']).'</li>';
				 if(stripslashes($row['status'])=='0'){
			echo'<li class=""><strong>Termination Date: </strong>'.stripslashes($row['terminationdate']).'</li>
			  <li class=""><strong>Termination Reason: </strong>'.stripslashes($row['terminationreason']).'</li>';  
			  }
			  
				
            echo' </ul>
			
			<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>


			  <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Medical Details</h>
            <li class=""><strong>Blood Group: </strong>'.stripslashes($row['bgroup']).'</li>
             <li class=""><strong>Known Problems: </strong>'.stripslashes($row['alergy']).'</li>
			   <div class="cleaner_h10"></div>  
			 <h style="font-size:15px; text-decoration:underline; color:#75c5cf">Emergency Contact Details</h>
            <li class=""><strong>Names: </strong>'.stripslashes($row['ename']).'</li>
             <li class=""><strong>Phone: </strong>'.stripslashes($row['ephone']).'</li>
			 <li class=""><strong>Postal Address: </strong>'.stripslashes($row['epostal']).'</li>
			  <div class="cleaner_h10"></div>  
			 <h style="font-size:15px; text-decoration:underline; color:#75c5cf">Payslip Details</h>
            <li class=""><strong>Bank: </strong>'.stripslashes($row['bname']).'</li>
             <li class=""><strong>A/C No: </strong>'.stripslashes($row['acno']).'</li>
			 <li class=""><strong>NSSF No: </strong>'.stripslashes($row['nssf']).'</li>
			 <li class=""><strong>NHIF No: </strong>'.stripslashes($row['nhif']).'</li>
			 </ul>
			 
			 <ul style="list-style:none; width:40%; float:left; text-align:left">
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Education Details</h>
            <li class="">'.stripslashes($row['education']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Experience Details</h>
            <li class="">'.stripslashes($row['experience']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Skills</h>
            <li class="">'.stripslashes($row['skills']).'</li>
			<div class="cleaner_h10"></div>  
			<h style="font-size:15px; text-decoration:underline; color:#75c5cf">Hobbies</h>
            <li class="">'.stripslashes($row['hobbies']).'</li>
			 </ul>
			 
	</div>


       </div>
        <div class="tab-pane fade" id="tasks">
			 <div id="title">
			 <div class="figure1" id="tdate" style="float:left;margin-left:0px;width:100%; border-bottom:1px solid #75c5cf">
			  <img src="images/plus.png" style="width:20px; height:20px; float:right; cursor:pointer" onclick="newtask(1)" title="Add New Task">
			<b style="float:left;margin-top:5px">Date: </b>
			 <input id="datepicker3" name="doe" class="in_field" value="'.date('d/m/Y').'"  type="text" readonly="readonly" style="width:20%;float:left; margin-left:10px"> 
			   <img src="images/zoom.png" style="width:30px; height:30px; float:left; margin-left:10px; cursor:pointer" onclick="showtasks()" title="View Tasks">
			</div>
			 </div>
			 
         
		 			<div id="title">
									<div id="figure1" style="margin-left:0px;width:20%">Time</div>
									<div id="figure1" style="width:80%">Task</div>
					</div>
					<div id="display2" style="overflow-x:hidden;width:100%">';
					$result =mysql_query("select * from mytasks where status=1 and Stamp='".date('Ymd')."' and Username='".$username."' order by Stamp");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
									echo'<div class="normal1" onclick="edittask(2,'.stripslashes($row['Event_id']).')" style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
									}else{
										echo'<div  class="normal2" onclick="edittask(2,'.stripslashes($row['Event_id']).')" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
									}	
									
									echo"
									<div id=\"figure2\" style=\"width:20%\" >".stripslashes($row['StartTime'])."</div>
									<div id=\"figure2\" style=\"width:80%\" >".stripslashes($row['Reason'])."</div>
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
		 
       echo'</div> 
	    <div id="newtask"  class="usp"></div>
	   	<div class="cleaner_h50"></div> 
		
		
	 </div>

	  <div class="tab-pane fade" id="mypay">
			 
			 <div id="loading" ></div>
			<div id="display" style="height:90%;"></div>
			<div class="cleaner_h5"></div>';
			echo "<script>paginate(5,'".$emp."');</script>";
		
		
	 echo'</div>

	 <div class="tab-pane fade" id="mydeduct">

	
		<a class="labels" style="margin-left:20px">Category:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="category" style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>
					<option value="pfund">PROVIDENT FUND</option>
					<option value="paye">PAYE</option>
					<option value="sacco">WEC SACCO</option>
					<option value="loans">LOANS</option>
					<option value="medical">MEDICAL</option>
					<option value="nhif">NHIF</option>
					<option value="nssf">NSSF</option>
					<option value="pfund">PROVIDENT FUND</option>
					<option value="helb">HELB</option>
					<option value="advance">Advance</option>
					<option value="sal">BASIC SALARY</option>
					<option value="hallow">H/ALLOWANCE</option>
					<option value="cash">CASH</option>
					<option value="airtime">AIRTIME</option>
					<option value="car">CAR ALLOWANCE</option>
					<option value="leaveallow">LEAVE ALLOWANCE</option>
					<option value="bonus">BONUS</option>
					<option value="thirteen">THIRTEENTH MONTH</option>
					<option value="notice">NOTICE</option>
					<option value="totalot">OVERTIME</option>
					

				</select>
				</div>


				<div class="cleaner_h5"></div>
				<input type="button" value="Submit" style="float:left; margin-left:150px; 
									cursor:pointer; width:80px" class="select" onclick="enterempdeds2(\''.$emp.'\');"/>
						<div class="cleaner_h5"></div>	 
		
		
		
	 </div>

        <div class="tab-pane fade  in active" id="events" style="">
        <div style="height:350px;width:100%;overflow-y:auto">';
		
							$result =mysql_query("select * from messages where sender='".$username."' or name='".$username."' order by id desc limit 0,100");
							$num_results = mysql_num_rows($result);	
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$id=stripslashes($row['id']);
								$message=stripslashes($row['message']);
								$from=stripslashes($row['sender']);
								$name=stripslashes($row['name']);
								$sta=stripslashes($row['status']);
								if($from==$username){
									$im="images/redarrow.png";$in=$name;
								}else {$im="images/right.png";$in=$from;}
								echo"<div id=\"mes".$i."\">";
								echo"<div class=\"cleaner\"></div><img src=\"".$im."\" style=\"width:20px; height:20px; float:left; margin-top:2px\"/>";
								if($sta==0){echo"
								<a  id=\"lebo".$i."\" style=\"float:left;margin-left:10px;font-size:11px; cursor:pointer; font-weight:bold; color:#666;\" >".$message."";
								echo'<input id="check'.$i.'" type="checkbox" style="float:left; margin:0px 3px 0 10px" onclick="checkmess('.$i.','.$id.');" title="Mark as Read"/><br/><small style="float:right; font-weight:normal;color:#666">['.stripslashes($row['date']).']-<b style="color:#f00">'.$in.'</b></small></a>';
								}else{echo"<a  style=\"float:left;margin-left:10px; cursor:pointer;color:#666;font-weight:normal;font-size:11px; \" >".$message."";echo'<br/><small style="float:left; font-weight:normal; margin-left:10px">['.stripslashes($row['date']).']-<b style="color:#f00">'.$in.'</b></small></a>';}
								echo'</div><div class=\"cleaner_h5\"></div>';
								$resultx= mysql_query("update messages set status=1 where id=".$id."");
								}
				
	  echo' 
	  </div>
	  <div id="empadd" style="display:none">   
			<div id="modalDiv"></div>
			<div id="alertDiv"  class="bounceIn appear" data-start="0" style="opacity:1000; width:30%">
			<p class="title" style="margin-top:0">CREATE NEW MESSAGE
			<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv2()"></p>
			<div class="message" style="padding:5px 15px">
		
			<a class="labels">To:<span>*</span></a>
			<div class="ui-widget" style="margin:0 10px 0 0px;  float:left; width:120px">
	<select id="user1" class="combos">
		<option value="">Select one...</option>';
	$resulta =mysql_query("select * from users where name!='".$username."' order by name");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="1'.stripslashes($rowa['name']).'"><b>'.stripslashes($rowa['name']).'-'.stripslashes($rowa['fullname']).' ['.stripslashes($rowa['dept']).']</option>';	
								
							}
							
							$result =mysql_query("select * from dept order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
			echo"<option value=\"2".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo"<option value=\"3All\">Everyone</option>";
	echo'</select>
	</div>
		<div class="cleaner_h5"></div>
	<form action="#" method="get">
	<a class="labels">Message:<span>*</span></a>
		<div class="cleaner"></div>
		<div id="taskadd" class="input_field" style="float:left;margin:5px 10px 10px 0px;width:330px; padding:0; background:#fff">
		<textarea  id="mezzage"  class="textarea" style="float:left;width:100%; font-size:11px;background:#fff; height:60px"></textarea>
		  <div class="cleaner_h10"></div> ';
		
		echo"<input class=\"in_field\" type=\"button\" value=\"Send\" id=\"submit\"  style=\"padding:5px 5px; border-color:#fff; background:#0f3; float:left; cursor:pointer;width:50px; margin-left:10px; border:1px solid #333\" onclick=\"sendmessage('".$username."')\" />";
				
			echo'</div>
			</div>
    </div>	
	  <div class="cleaner_h50"></div> 
		
		
		
		</div>
   
      </div>
  	</div>';
	
						
							break;
	
	
							case 12:
							
					$result =mysql_query("select * from mytasks where status=1 and Stamp='".$_GET['stamp']."' and Username='".$username."' order by Stamp");
					$num_results = mysql_num_rows($result);	
					if($num_results==0){
					echo'<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          No existing tasks for this date.</div>
      </div>';exit;
					}
					
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  onclick="edittask(2,'.stripslashes($row['Event_id']).')" style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2"  onclick="edittask(2,'.stripslashes($row['Event_id']).')" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" >';
	}	
									
									echo"
									<div id=\"figure2\" style=\"width:20%\" >".stripslashes($row['StartTime'])."</div>
									<div id=\"figure2\" style=\"width:80%\" >".stripslashes($row['Reason'])."</div>
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
							
							break;
							
							case 13:
							
								$a=$_GET['a'];$param=$_GET['param'];
								$resultd =mysql_query("select * from mytasks where Event_id='".$param."'");
								$rowd=mysql_fetch_array($resultd);
								echo'<div id="modalDiv"></div>
		<div id="alertDiv"  class="bounceIn appear" data-start="200" style="width:30%; min-height:40%; left:30%; top:20%;">';
		if($a==1){
			echo'<p class="title" style="margin-top:0">ADD NEW TASK</p>';
		}else{
			echo'<p class="title" style="margin-top:0">UPDATE TASK</p>';
		}
		
		echo'<div style="padding:2%"><a class="labels" style="">Subject:<span>*</span></a>
		<input type="text" id="subject"  class="in_field" value="'.stripslashes($rowd['Reason']).'" style="width:80%;float:right; text-transform:none; margin-left:10px"/> 
					<div class="cleaner_h10"></div>
					';
					$resultc =mysql_query("select * from tasks order by name asc");
					$num_resultsc = mysql_num_rows($resultc);
					echo'<a class="labels" style="">Category:</a>
					<select class="select" id="category" style="float:right; width:80%; margin-left:10px">';
							
							for ($i=0; $i <$num_resultsc; $i++) {
								$rowc=mysql_fetch_array($resultc);
								if(stripslashes($rowd['Category'])==stripslashes($rowc['id'])){
									echo'<option  selected="selected" value="'.stripslashes($rowc['id']).'">'.stripslashes($rowc['name']).'</option>';
								}else{
									echo'<option value="'.stripslashes($rowc['id']).'">'.stripslashes($rowc['name']).'</option>';
								}
							   
							}
							echo'
					</select>
					<div class="cleaner_h10"></div>
					
					<a class="labels" >Date:<span>*</span></a>
					<input type="text" id="datepicker4" class="in_field"  value="'.stripslashes($rowd['StartDate']).'" style="float:left;width:30%;margin-left:5px"/> 
					<a class="labels" style="margin-left:10px">Time:<span>*</span></a>
					<div class="ui-widget"  style="float:right; margin-right:8%">
					<select class="combos" id="timer1">
						<option value="'.stripslashes($rowd['StartTime']).'" selected="selected">'.stripslashes($rowd['StartTime']).'</option>
						<option value="12:00am">12:00am</option>
						<option value="12:30am">12:30am</option>
						<option value="01:00am">1:00am</option>
						<option value="01:30am">1:30am</option>
						<option value="02:00am">2:00am</option>
						<option value="02:30am">2:30am</option>
						<option value="03:00am">3:00am</option>
						<option value="03:30am">3:30am</option>
						<option value="04:00am">4:00am</option>
						<option value="04:30am">4:30am</option>
						<option value="05:00am">5:00am</option>
						<option value="05:30am">5:30am</option>
						<option value="06:00am">6:00am</option>
						<option value="06:30am">6:30am</option>
						<option value="07:00am">7:00am</option>
						<option value="07:30am">7:30am</option>
						<option value="08:00am">8:00am</option>
						<option value="08:30am">8:30am</option>
						<option value="09:00am">9:00am</option>
						<option value="09:30am">9:30am</option>
						<option value="10:00am">10:00am</option>
						<option value="10:30am">10:30am</option>
						<option value="11:00am">11:00am</option>
						<option value="11:30am">11:30am</option>
						<option value="12:00pm">12:00pm</option>
						<option value="12:30pm">12:30pm</option>
						<option value="01:00pm">1:00pm</option>
						<option value="01:30pm">1:30pm</option>
						<option value="02:00pm">2:00pm</option>
						<option value="02:30pm">2:30pm</option>
						<option value="03:00pm">3:00pm</option>
						<option value="03:30pm">3:30pm</option>
						<option value="04:00pm">4:00pm</option>
						<option value="04:30pm">4:30pm</option>
						<option value="05:00pm">5:00pm</option>
						<option value="05:30pm">5:30pm</option>
						<option value="06:00pm">6:00pm</option>
						<option value="06:30pm">6:30pm</option>
						<option value="07:00pm">7:00pm</option>
						<option value="07:30pm">7:30pm</option>
						<option value="08:00pm">8:00pm</option>
						<option value="08:30pm">8:30pm</option>
						<option value="09:00pm">9:00pm</option>
						<option value="09:30pm">9:30pm</option>
						<option value="10:00pm">10:00pm</option>
						<option value="10:30pm">10:30pm</option>
						<option value="11:00pm">11:00pm</option>
						<option value="11:30pm">11:30pm</option>
						
						
					</select></div>
					<div class="cleaner_h10"></div>
					<a class="labels" style="">Status:</a>
					<select class="select" id="status" style="float:left; width:40%; margin-left:5px;">
					<option value="'.stripslashes($rowd['TaskStatus']).'" selected="selected">'.stripslashes($rowd['TaskStatus']).'</option>
						<option value="Not Started">Not Started</option>
						<option value="In Progress">In Progress</option>
						<option value="Completed">Completed</option>
						<option value="Waiting on Someone Else">Waiting on Someone Else</option>
						<option value="Deferred">Deferred</option>
					</select>
					<a class="labels" style="margin-left:5px">Priority:</a>
					<select class="select" id="priority" style="float:left; width:30%; margin-left:5px;">
						<option value="'.stripslashes($rowd['Priority']).'" selected="selected">'.stripslashes($rowd['Priority']).'</option>
						<option value="Normal">Normal</option>
						<option value="High">High</option>
						<option value="Low">Low</option>
					</select>
					<div class="cleaner_h10"></div>
				
					<a class="labels">Reminder?</a>
					<input type="checkbox" name="remind" id="remind" style="float:left;margin:8px 0 0 5px" onclick="showrem()" value="1"/>
					<div id="showrem" style="display:none">
					<a class="labels" style="margin-left:5px">Date:</a>
					<input type="text" id="datepicker5" name="oname"  class="in_field" value="'.stripslashes($rowd['ReminderDate']).'" style="float:left;width:25%;margin-left:5px"/> 
					
					<div class="ui-widget"  style="float:right; margin-right:8%">
					<select class="combos" id="timer2">
					<option value="'.stripslashes($rowd['ReminderTime']).'" selected="selected">'.stripslashes($rowd['ReminderTime']).'</option>
						<option value="12:00am">12:00am</option>
						<option value="12:30am">12:30am</option>
						<option value="01:00am">1:00am</option>
						<option value="01:30am">1:30am</option>
						<option value="02:00am">2:00am</option>
						<option value="02:30am">2:30am</option>
						<option value="03:00am">3:00am</option>
						<option value="03:30am">3:30am</option>
						<option value="04:00am">4:00am</option>
						<option value="04:30am">4:30am</option>
						<option value="05:00am">5:00am</option>
						<option value="05:30am">5:30am</option>
						<option value="06:00am">6:00am</option>
						<option value="06:30am">6:30am</option>
						<option value="07:00am">7:00am</option>
						<option value="07:30am">7:30am</option>
						<option value="08:00am">8:00am</option>
						<option value="08:30am">8:30am</option>
						<option value="09:00am">9:00am</option>
						<option value="09:30am">9:30am</option>
						<option value="10:00am">10:00am</option>
						<option value="10:30am">10:30am</option>
						<option value="11:00am">11:00am</option>
						<option value="11:30am">11:30am</option>
						<option value="12:00pm">12:00pm</option>
						<option value="12:30pm">12:30pm</option>
						<option value="01:00pm">1:00pm</option>
						<option value="01:30pm">1:30pm</option>
						<option value="02:00pm">2:00pm</option>
						<option value="02:30pm">2:30pm</option>
						<option value="03:00pm">3:00pm</option>
						<option value="03:30pm">3:30pm</option>
						<option value="04:00pm">4:00pm</option>
						<option value="04:30pm">4:30pm</option>
						<option value="05:00pm">5:00pm</option>
						<option value="05:30pm">5:30pm</option>
						<option value="06:00pm">6:00pm</option>
						<option value="06:30pm">6:30pm</option>
						<option value="07:00pm">7:00pm</option>
						<option value="07:30pm">7:30pm</option>
						<option value="08:00pm">8:00pm</option>
						<option value="08:30pm">8:30pm</option>
						<option value="09:00pm">9:00pm</option>
						<option value="09:30pm">9:30pm</option>
						<option value="10:00pm">10:00pm</option>
						<option value="10:30pm">10:30pm</option>
						<option value="11:00pm">11:00pm</option>
						<option value="11:30pm">11:30pm</option>
						
						
					</select>
					
					</div>
					</div>
					<div class="cleaner"></div>
					<a class="labels" style="">Notes</a>
					<div class="cleaner_h10"></div>
					<textarea id="notes" style="float:right;height:60px; width:100%" class="textarea" >'.stripslashes($rowd['Notes']).'</textarea>
					<div class="cleaner_h10"></div>
					<a class="btn btn-sm btn-success" onclick="updatetask('.$a.','.$param.')"><i class="fa fa-save"></i>UPDATE</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px ;margin-right:10px "></div>	';
					if(stripslashes($rowd['ReminderStatus'])==1){
						echo'<script>
						$("#showrem").show();
						$("#remind").prop("checked",true);
						</script>';
					}
					
					echo'		
	
		<div class="cleaner_h20"></div>
		
	 </div>
		
		</div>
		
	</div>';
							
							break;
							
								case 14:
			$result = mysql_query("insert into log values('','".$username." accesses Terminate Employment Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo"<script>$('#emp55').parent().find('input:first').focus().width(200);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;padding:3%">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">TERMINATE EMPLOYMENT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">Employee:<span>*</span></a>
					<div class="ui_widget"  style="margin-right:10%;float:right;">
				<select id="emp55" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px">Date:<span>*</span></a>
		<input type="text" id="datepicker4"  class="in_field" value="'.date('d/m/Y').'" style="width:70%;float:right;margin-right:10px; text-transform:none; "/> 
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px">Reason:<span>*</span></a>
<textarea id="reason" style="float:right;height:60px; width:90%; float:left; margin-left:10px" class="textarea" ></textarea>
					<div class="cleaner_h10"></div>
					<a class="btn btn-sm btn-success" onclick="termemp()"><i class="fa fa-save"></i>UPDATE</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px  "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;

							case 14.1:
			$result = mysql_query("insert into log values('','".$username." accesses Discipline Employee Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo"<script>$('#emp55').parent().find('input:first').focus().width(200);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px;top:20%"  class="bounceIn appear" data-start="200">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">DISCIPLINE EMPLOYEE:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
				<a class="labels" style="margin-left:5px">Employee:<span>*</span></a>
					<div class="ui_widget"  style="margin-right:10%;float:right;">
				<select id="emp55" class="combos" name="emp55">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px">Measure:<span>*</span></a>
		<select class="select" id="measure" name="measure" style="float:right ;margin-right:10px;text-transform:uppercase">
								 <option value="" selected="selected" disabled="disabled">Select One...</option>
								<option value="Verbal Warning">Verbal Warning</option>
								<option value="Written Warning">Written Warning</option>
								<option value="Suspension without Pay">Suspension without Pay</option>
									</select>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Reason:<span>*</span></a>
<textarea id="reason" style="float:right;height:60px; width:90%; float:left; margin-left:10px" class="textarea" ></textarea>
					<div class="cleaner_h10"></div>

					<h5>DOCUMENT (ATTACHMENT) UPLOAD</h5><div class="cleaner_h5"></div>
								
								
      							
								<dd class="custuploadblock_js" style="margin-right:50px">
								<input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe">
								</iframe>
                            	<input type="hidden" id="id" name="id"  value="6"/>
								<div class="cleaner_h5"></div>
     							<input type="submit" value="upload" id="send"  style="width:40%;margin-left:30%; float:left; cursor:pointer"class="in_field"/>
								</form>
						<div class="cleaner_h5"></div>		
					<a class="btn btn-sm btn-success" onclick="discemp()"><i class="fa fa-save"></i>UPDATE</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px  "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;

							case 14.2:
			$result = mysql_query("insert into log values('','".$username." accesses Reinstate Employee Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo"<script>$('#emp56').parent().find('input:first').focus().width(200);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;padding:3%">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">REINSTATE EMPLOYEE:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">Employee:<span>*</span></a>
					<div class="ui_widget"  style="margin-right:10%;float:right;">
				<select id="emp56" class="combos">
		<option value="">Select one...</option>';
							$resulta =mysql_query("select * from suspended");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$emp=stripslashes($rowa['emp']);

									$resultb =mysql_query("select * from employee where emp='".$emp."'");
									$rowb=mysql_fetch_array($resultb);
										echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']).'-'.stripslashes($rowa['emp']).'</option>';
									}
		echo'
	</select>
	</div>
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;
							
					
								case 15:
								echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Ex Employee Search Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo'
								<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">DOWNLOAD DOCUMENTS
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
						<div style="width:25%; border-right:2px solid #75c5cf; height:100%; overflow-y:auto; float:left; padding:2%">';
						
						$resulta =mysql_query("select * from hrmdocs order by name");
							$num_resultsa = mysql_num_rows($resulta);
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$len=strlen(stripslashes($rowa['name']));
								$a=$len-3;
								$type=substr(stripslashes($rowa['name']),$a,3);
								if($type=='pdf'){
									$x='adobe';
								}
								else if($type=='xls'){
									$x='excel';
								}
								else if($type=='doc'||$type=='rtf'){
									$x='word';
								}
								echo"<div style=\"border:1px solid #333; margin-bottom:10px;\" >";
								echo"<img  onclick=\"loadpdf('".stripslashes($rowa['name'])."')\" src=\"images/".$x.".png\" alt=\"Photo\" style=\"float:left; width:40%; height:100px; cursor:pointer\">
								<a href=\"hrmdocs/".stripslashes($rowa['name'])."\"><img src=\"images/save.jpg\" alt=\"Save\" style=\"float:right; cursor:pointer; margin:1% \"></a>
									<div class=\"cleaner\"></div>
								".stripslashes($rowa['name'])."
								</div>";
							}
								
							echo'<div class="cleaner_h50"></div></div>
							<div style="width:75%;  height:100%; overflow-y:auto; float:left; " id="display">
							</div>		
									
									
									</div>';
									
									 
						
							break;		
							
									case 16:
			$result = mysql_query("insert into log values('','".$username." accesses Leave Request Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px;top:15%"  class="bounceIn appear" data-start="200" style="opacity:1000;padding:3%;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">LEAVE REQUEST:';						
			echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">PF No:<span>*</span></a>
		<input type="text" id="pfno"  class="in_field" value="" style="width:70%;float:right;margin-right:10px; text-transform:none; "/> 
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px">Leave Type:<span>*</span></a>
				<div class="ui_widget"  style="margin-right:35px;float:right;">
				<select id="leavetype" style="width:260px; margin-left:10px;" class="combos">
				<option value="">Select one...</option>
				<option value="Work">Work leave</option>
				<option value="Sick">Sick leave</option>
				<option value="Maternity">Maternity leave</option>
				<option value="Paternity">Paternity leave</option>
				<option value="Compassionate">Compassionate leave</option>
				<option value="Annual">Annual leave</option>
				<option value="Exam">Exam leave</option>

				';
	
		echo'
	</select>
	</div>
<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Start Date:<span>*</span></a>
		<input type="text" id="datepicker4"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; "/> 
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px">End Date:<span>*</span></a>
		<input type="text" id="datepicker5"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; "/> 
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:5px" title=Person to take duties">Person to take duties:<span>*</span></a>
	<input type="text" id="shadow"  class="in_field" value="" style="width:50%;float:right;margin-right:10px; text-transform:none; "/> 
					<div class="cleaner"></div>

	<a class="labels" style="margin-left:5px">Reason:<span>*</span></a>
	<textarea id="reason" style="float:right;height:60px; width:90%; float:left; margin-left:10px" class="textarea" ></textarea>
	<div class="cleaner_h5"></div>


					<a class="btn btn-sm btn-success" onclick="submleave()"><i class="fa fa-save"></i>SUBMIT</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;
							
							case 17:
						
$result = mysql_query("insert into log values('','".$username." accesses Leave Authorization Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">LEAVE AUTHORIZATION								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 " style="padding:1%">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
									<div style="height:400px;overflow-y:auto">
									<div id="title">
									<div id="figure1" style="margin-left:0px;width:10%">Date</div>
									<div id="figure1" style="width:5%">PF No.</div>
									<div id="figure1" style="width:15%">Name</div>
									<div id="figure1" style="width:10%">Leave Type</div>
									<div id="figure1" style="width:15%">Position</div>
									<div id="figure1" style="width:10%">Start Date</div>
									<div id="figure1" style="width:10%">End Date</div>
									<div id="figure1" style="width:5%">Days</div>
									<div id="figure1" style="width:10%">Shadow</div>
									<div id="figure1" style="width:10%">Action</div>
									
									
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result =mysql_query("select * from leaves where status=0 order by stamp asc");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
									echo'<div class="normal1" title="'.stripslashes($row['reason']).'"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer" id="leave'.stripslashes($row['id']).'">';
									}else{
										echo'<div  class="normal2"  title="'.stripslashes($row['reason']).'"  style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" id="leave'.stripslashes($row['id']).'">';
									}	
																	
									echo"
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['date'])."</div>
									<div id=\"figure2\" style=\"width:5%\" >".stripslashes($row['emp'])."</div>
									<div id=\"figure2\" style=\"width:15%\" >".stripslashes($row['name'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['leavetype'])."</div>
									<div id=\"figure2\" style=\"width:15%\" >".stripslashes($row['position'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['commencedate'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['enddate'])."</div>
									<div id=\"figure2\" style=\"width:5%\" >".stripslashes($row['days'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['shadow'])."</div>
										<div id=\"figure2\" style=\"width:10%;padding:3px\" >
										<select class=\"\" style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
										<option value=\"0\" selected=\"selected\" disabled=\"disabled\">Select</option>
										<option value=\"Deny\"  onclick=\"leaveauth(".stripslashes($row['id']).")\" >Deny</option>
										<option value=\"Approve\"  onclick=\"leaveauth(".stripslashes($row['id']).")\" >Approve</option>
										</select>
										</div>
									</div>
									";
					}
		 
		 
       echo'</div> 

       </div>
	    
															

	</div>';
	
						
							break;
							
							
							
							case 18:

						
$result = mysql_query("insert into log values('','".$username." accesses Leave Calendar Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">LEAVE CALENDAR								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 " style="padding:1%">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
				 <div id="title">
			 <div class="figure1" id="tdate" style="float:left;margin-left:0px;width:100%; border-bottom:1px solid #75c5cf">';
			
			$date=strtotime(date('Y-m-d'));
			$newdate=date('Y-m-d', strtotime('+1 month', $date));
			$a=substr($newdate,8,2);
			$b=substr($newdate,5,2);
			$c=substr($newdate,0,4);
			$date2=$a.'/'.$b.'/'.$c;
			$stamp2=$c.$b.$a;
			
			 echo'<b style="float:left;margin-top:5px">From: </b><input id="datepicker3" name="doe" class="in_field" value="'.date('d/m/Y').'"  type="text" readonly="readonly" style="width:20%;float:left; margin-left:10px"> 
			<b style="float:left;margin-top:5px">To: </b> <input id="datepicker4" name="doe" class="in_field" value="'.$date2.'"  type="text" readonly="readonly" style="width:20%;float:left; margin-left:10px"> 
			   <img src="images/zoom.png" style="width:30px; height:30px; float:left; margin-left:10px; cursor:pointer" onclick="showleaves()" title="View Leaves">
			</div>
			 </div>
							
<div id="title">
									<div id="figure1" style="width:10%">PF No.</div>
									<div id="figure1" style="width:25%">Name</div>
									<div id="figure1" style="width:10%">Branch</div>
									<div id="figure1" style="width:15%">Position</div>
									<div id="figure1" style="width:10%">Start Date</div>
									<div id="figure1" style="width:10%">End Date</div>
									<div id="figure1" style="width:10%">Days</div>
									<div id="figure1" style="width:10%">Shadow</div>
								
									
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result =mysql_query("select * from leaves where status=2 and  ((commstamp>='".date('Ymd')."' and commstamp<='".$stamp2."')OR(endstamp>='".date('Ymd')."' and endstamp<='".$stamp2."')) order by stamp asc");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer" id="leave'.stripslashes($row['id']).'">';
	}else{
		echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" id="leave'.stripslashes($row['id']).'">';
	}	
									
									echo"
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['emp'])."</div>
									<div id=\"figure2\" style=\"width:25%\" >".stripslashes($row['name'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['branch'])."</div>
									<div id=\"figure2\" style=\"width:15%\" >".stripslashes($row['position'])."</div>";
									if(stripslashes($row['commstamp'])>= date('Ymd') && stripslashes($row['commstamp'])<=$stamp2){
									echo"<div id=\"figure2\" style=\"width:10%; background:#f00\" >".stripslashes($row['commencedate'])."</div>";
									}else{echo"<div id=\"figure2\" style=\"width:10%;\" >".stripslashes($row['commencedate'])."</div>";}
									
									if(stripslashes($row['endstamp'])>= date('Ymd') && stripslashes($row['endstamp'])<=$stamp2){
									echo"<div id=\"figure2\" style=\"width:10%; background:#0f6\" >".stripslashes($row['enddate'])."</div>";
									}else{echo"<div id=\"figure2\" style=\"width:10%;\" >".stripslashes($row['enddate'])."</div>";}
									echo"
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['days'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['shadow'])."</div>
									
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
		 
       echo'</div> </div>';
					break;
					
						case 19:
							
						$result =mysql_query("select * from leaves where status=2 and  ((commstamp>='".$_GET['stamp1']."' and commstamp<='".$_GET['stamp2']."')OR(endstamp>='".$_GET['stamp1']."' and endstamp<='".$_GET['stamp2']."')) order by stamp asc");
						$num_results = mysql_num_rows($result);	
					if($num_results==0){
					echo'<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          No existing Leave Entries for this period.</div>
      </div>';exit;
					}
					
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer" id="leave'.stripslashes($row['id']).'">';
	}else{
		echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" id="leave'.stripslashes($row['id']).'">';
	}	
									
									echo"
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['emp'])."</div>
									<div id=\"figure2\" style=\"width:25%\" >".stripslashes($row['name'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['branch'])."</div>
									<div id=\"figure2\" style=\"width:15%\" >".stripslashes($row['position'])."</div>";
									if(stripslashes($row['commstamp'])>= $_GET['stamp1'] && stripslashes($row['commstamp'])<=$_GET['stamp2']){
									echo"<div id=\"figure2\" style=\"width:10%; background:#f00\" >".stripslashes($row['commencedate'])."</div>";
									}else{echo"<div id=\"figure2\" style=\"width:10%;\" >".stripslashes($row['commencedate'])."</div>";}
									
									if(stripslashes($row['endstamp'])>= $_GET['stamp1'] && stripslashes($row['endstamp'])<=$_GET['stamp2']){
									echo"<div id=\"figure2\" style=\"width:10%; background:#0f6\" >".stripslashes($row['enddate'])."</div>";
									}else{echo"<div id=\"figure2\" style=\"width:10%;\" >".stripslashes($row['enddate'])."</div>";}
									echo"
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['days'])."</div>
									<div id=\"figure2\" style=\"width:10%\" >".stripslashes($row['shadow'])."</div>
									
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
							
							break;
							
					case 20:
					echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Take Attendace','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EMPLOYEE ATTENDANCE
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>
								</div>

								<div id="saveclose" style="width:80px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Sync Now" id="submit"  style="padding:5px 5px; border-color:#fff; background:#ff3; float:right; cursor:pointer;width:80px" class="in_field" onclick="syncattendance();"/>
								</div>

								</h3>
								</div>


							<div id="newstude" class="col-sm-12 " style="padding:1%">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							

			 <div id="title">
			 <div class="figure1" id="tdate" style="float:left;margin-left:0px;width:100%; border-bottom:1px solid #75c5cf">
			<b style="float:left;margin-top:5px">Date: </b>
			 <input id="datepicker3" name="doe" class="in_field" value="'.date('d/m/Y').'"  type="text" readonly="readonly" style="width:20%;float:left; margin-left:10px"> 
			 	   <img src="images/zoom.png" style="width:30px; height:30px; float:left; margin-left:10px; cursor:pointer" onclick="showattendance()" title="View Attendance">
				
			 
			</div>
			 </div>
			 
         
		 			<div id="title">
									<div id="figure1" style="margin-left:0px;width:20%">PF No</div>
									<div id="figure1" style="margin-left:0px;width:50%">Name</div>
									<div id="figure1" style="width:30%">Action</div>
					</div>
					<div id="display">';
					$result =mysql_query("select * from attendance where  month='".date('m_Y')."' order by pfno");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
	}	
									
									echo"
									<div id=\"figure2\" style=\"width:20%\" >".stripslashes($row['pfno'])."</div>
									<div id=\"figure2\" style=\"width:50%\" >".stripslashes($row['names'])."</div>";
									$empno=stripslashes($row['pfno']);
									$code=stripslashes($row['id']);
									$x=date('d').'c';
									$status=stripslashes($row[$x]);
									if($status=='0'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#f00\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\"  disabled=\"disabled\">Select</option>
									<option selected=\"selected\" value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									else if($status=='1'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#0f6\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\"  selected=\"selected\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									else if($status=='2'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#0ff\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  selected=\"selected\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									else if($status=='3'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  selected=\"selected\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}

									else if($status=='4'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  selected=\"selected\"   onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}

									else if($status=='5'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"   onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\" selected=\"selected\"   onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									
									
									else {
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px;\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\"  selected=\"selected\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									echo"
									</div>
									<div class=\"cleaner\"></div>";


									//check if employee on leave


									$resultx =mysql_query("select * from leaves where endstamp>='".date('Ymd')."' and commstamp<='".date('Ymd')."' and emp='".$empno."' and status=2");
									$num_resultsx = mysql_num_rows($resultx);	
									if($num_resultsx>0){

										echo "<script>
										$('#back".$code."').css({'background' : '#0ff'});
										$('#action".$code."').val(2);</script>";
										
									}
					}
		 
		 
       echo'<div class="cleaner_h60"></div></div> 
	  </div>';
	 
	
						
							break;
							
					case 21:
					$mon=$_GET['mon'];$date=$_GET['tdate'];	
					$tstamp=substr($mon,3,4).substr($mon,0,2).$date;
					$result =mysql_query("select * from attendance where month='".$mon."'  order by pfno");
					$num_results = mysql_num_rows($result);	
					if($num_results==0){
					echo'<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 	 No existing Attendance Log for this date.</div>
				  </div>';
				  exit;	
					}
					
					
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
	}	
									
									echo"
									<div id=\"figure2\" style=\"width:20%\" >".stripslashes($row['pfno'])."</div>
									<div id=\"figure2\" style=\"width:50%\" >".stripslashes($row['names'])."</div>";
									
									$x=$date.'c';
									$empno=stripslashes($row['pfno']);
									$code=stripslashes($row['id']);
									$status=stripslashes($row[$x]);
									if($status=='0'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#f00\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\"  disabled=\"disabled\">Select</option>
									<option selected=\"selected\" value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									else if($status=='1'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#0f6\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\"  selected=\"selected\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									else if($status=='2'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#0ff\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  selected=\"selected\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									else if($status=='3'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  selected=\"selected\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									else if($status=='4'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"   selected=\"selected\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}

									else if($status=='5'){
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px; background:#ff3\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"    onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  selected=\"selected\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									else {
									echo"<div class=\"figure2\" style=\"width:30%;padding:3px;\" id=\"back".stripslashes($row['id'])."\" >
									<select  style=\"margin:0;padding:0 \"id=\"action".stripslashes($row['id'])."\">
									<option value=\"0\"  selected=\"selected\" disabled=\"disabled\">Select</option>
									<option  value=\"0\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Absent</option>
									<option value=\"1\" onclick=\"checkatt(".stripslashes($row['id']).")\" >Present</option>
									<option  value=\"2\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >On Leave</option>
									<option  value=\"3\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Sick Leave</option>
									<option  value=\"4\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Off</option>
									<option  value=\"5\"  onclick=\"checkatt(".stripslashes($row['id']).")\" >Half Day Absent</option>
									</select></div>";	
									}
									
									echo"
									</div>
									<div class=\"cleaner\"></div>";




									
									$resultx =mysql_query("select * from leaves where commstamp<='".$tstamp."' and endstamp>='".$tstamp."' and  emp='".$empno."' and status=2");
									$num_resultsx = mysql_num_rows($resultx);	
									if($num_resultsx>0){

										
										echo "<script>
										$('#back".$code."').css({'background' : '#0ff'});
										$('#action".$code."').val(2);</script>";
										
									}
					
					}
		 			
		 			 echo'<div class="cleaner_h60"></div></div> 
	  </div>';
	 
							
							break;
							
							
								case 22:
			$result = mysql_query("insert into log values('','".$username." accesses New Payroll Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;padding:3%">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">New Payroll:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				
	<a class="labels" style="margin-left:5px">Month:<span>*</span></a>
		<input type="text" id="datepicker7"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; " readonly="readonly"/> 
	<div class="cleaner_h10"></div>
<a class="btn btn-sm btn-success" onclick="newpayroll()"><i class="fa fa-save"></i>SUBMIT</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;
							
							
								case 23:
							echo"<script>$('.hider').hide();$('.shower').width(63);</script>";		
							$mon=$_GET['mon'];	$branch='';					
							$result = mysql_query("insert into log values('','".$username." accesses  Payroll Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<input type="hidden" id="curmon" value="'.$mon.'"/>
					<input type="hidden" id="curbranch" value="'.$branch.'"/>
								<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">PAYROLL:'.$mon.'
												
								<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<img src="images/rightred.png" style="width:30px; height:30px; float:right; padding:2px 2px;margin-right:10px; cursor:pointer" onclick="commitpay()" title="Commit Payroll">
								 <img src="images/prev.png" style="width:30px; height:30px; float:right; padding:2px 2px;margin-right:10px; cursor:pointer" onclick="previewpay()" title="Preview Payroll">	
									 <img src="images/adduser.png" style="width:30px; height:30px; float:right; padding:2px 2px;margin-right:10px; cursor:pointer" onclick="addtopay()" title="Add to Payroll">	
								<div id="saveclose" style="width:130px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Show/Hide Columns" id="submit"  style="padding:5px 5px; border-color:#fff; background:#ff3; float:right; cursor:pointer;width:130px" class="in_field" onclick="togglecol();"/></div>
								<input type="hidden" value="0" id="togglecol"/>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 " style="padding:1%">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
							        <div id="title" style="width:100%">
									<div id="figure1"  style="width:4%; padding:1px">PF No.</div>
									<div id="figure1"  style="width:10%; padding:1px">Name</div>
									<div id="figure1" class="shower" style="width:4%; padding:1px">B.Sal.</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">H/Allow</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">Cash</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">Airtime</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">Car</div>
									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Leave</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Bonus</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">13th Month</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Notice</div>
									<div id="figure1"  class="hider" class="shower" style="width:2.4%; padding:1px">Ins Amount</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">OT hrs.</div>
									<div id="figure1" class="shower" style="width:2.4%; padding:1px">Rate.</div>

									<div id="figure1" class="hider" style="width:2.4%; padding:1px">OT.</div>
									<div id="figure1"  class="hider" style="width:4%; padding:1px">Gross Pay</div>
									<div id="figure1"  class="hider" style="width:4%; padding:1px">Taxable</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Tax</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Ins Relief</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Relief</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">Paye</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">NSSF.</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">NHIF.</div>
									<div id="figure1"  class="hider" style="width:2.4%; padding:1px">P Fund</div>

									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Adva.</div>
									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Helb.</div>
									<div id="figure1" class="shower"  style="width:2.4%; padding:1px">Sacco.</div>
									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Loans</div>
									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Medical</div>
									<div id="figure1"  class="shower" style="width:2.4%; padding:1px">Others.</div>
									<div id="figure1" class="shower"  style="width:4%; padding:1px">Total Ded.</div>
									<div id="figure1"  class="shower" style="width:5%; padding:1px">Net Pay</div>
									<div id="figure1" style="width:2%">Rem</div>
									<div id="figure1" style="width:2.4%">Save</div>
								
									
					</div>
					<div class="cleaner"></div>
					<div id="display" style="height:400px;overflow-y:auto;width:100%">';
					$result =mysql_query("select * from payroll where month='".$mon."'");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
								
		
		
									$sta=stripslashes($row['status']);
									$emp=stripslashes($row['emp']);
									$name=stripslashes($row['name']);
									$sal=stripslashes($row['sal']);
									$hallow=stripslashes($row['hallow']);
									$cash=stripslashes($row['cash']);
									$airtime=stripslashes($row['airtime']);
									$car=stripslashes($row['car']);
									$leave=stripslashes($row['leaveallow']);

									$bonus=stripslashes($row['bonus']);
									$notice=stripslashes($row['notice']);
									$thirteen=stripslashes($row['thirteen']);

									$hrs=stripslashes($row['othrs']);
									$rate=stripslashes($row['rateot']);
									$ot=stripslashes($row['totalot']);

									$gross=stripslashes($row['gross']);
									$insamount=stripslashes($row['insamount']);
									$insrelief=stripslashes($row['insrelief']);
									$taxable=stripslashes($row['taxablepay']);
									$tax=stripslashes($row['tax']);
									$relief=stripslashes($row['relief']);
									$paye=stripslashes($row['paye']);
									$nhif=stripslashes($row['nhif']);
									$nssf=stripslashes($row['nssf']);
									$adva=stripslashes($row['adva']);
									$helb=stripslashes($row['helb']);
									$others=stripslashes($row['otherdeds']);
									$pfund=stripslashes($row['pfund']);
									$sacco=stripslashes($row['sacco']);
									$loans=stripslashes($row['loans']);
									$medical=stripslashes($row['medical']);
									$totalded=stripslashes($row['totalded']);
								
									$net=stripslashes($row['net']);
									$days=stripslashes($row['days']);

									$resultx =mysql_query("select * from employee where emp='".$emp."'");
									$rowx=mysql_fetch_array($resultx);
									$clearance=stripslashes($rowx['clearance']);


									$q=0;
									/*
									$resultx =mysql_query("select * from ".$mon." where pfno='".$emp."'");
									$rowx=mysql_fetch_array($resultx);
						
									for ($x=1; $x<32; $x++) {
												$d=sprintf("%02d",$x);
												$d=$d.'c';
												if(stripslashes($rowx[$d])==1||stripslashes($rowx[$d])==2||stripslashes($rowx[$d])==3||stripslashes($rowx[$d])==4){
													$q++;
												}
									}
									*/

									$days=$q;
					

						if($_SESSION['level']>=$clearance){

								if($i%2==0){
							echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer" title="'.stripslashes($row['name']).'" id="pay'.stripslashes($row['serial']).'">';
							}else{
								echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" title="'.stripslashes($row['name']).'"  id="pay'.stripslashes($row['serial']).'">';}
															
									echo'
								<div id="figure2" style="font-size:9px;width:4%; height:22px;margin-left:0" >'.stripslashes($row['emp']).'</div>
								<div id="figure2"  style="font-size:9px;width:10%;overflow:hidden;height:22px;" >'.stripslashes($row['name']).'</div>
								<div id="figure2" class="shower" style="font-size:9px;width:4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$sal.'" id="sal'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$hallow.'" id="hallow'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$cash.'" id="cash'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$airtime.'" id="airtime'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$car.'" id="car'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$leave.'" id="leave'.$emp.'"/></div>

								<div id="figure2" class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$bonus.'" id="bonus'.$emp.'"/></div>
								<div id="figure2" class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$thirteen.'" id="thirteen'.$emp.'"/></div>
								<div id="figure2" class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$notice.'" id="notice'.$emp.'"/></div>


								<div id="figure2" class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$insamount.'" id="insamount'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$hrs.'" id="hrs'.$emp.'"/></div>
								<div id="figure2" class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%; " value="'.$rate.'" id="rate'.$emp.'"/></div>
								
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$ot.'" id="ot'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:4%; padding:1px" ><input type="text" disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$gross.'" id="gross'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:4%; padding:1px" ><input type="text" disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$taxable.'" id="taxable'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$tax.'" id="tax'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$insrelief.'" id="insrelief'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$relief.'" id="relief'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$paye.'" id="paye'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$nssf.'" id="nssf'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$nhif.'" id="nhif'.$emp.'"/></div>
								<div id="figure2"  class="hider" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$pfund.'" id="pfund'.$emp.'"/></div>
								
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text"  style="font-size:9px;width:100%" value="'.$adva.'" id="adva'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$helb.'" id="helb'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$sacco.'" id="sacco'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$loans.'" id="loans'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" value="'.$medical.'" id="medical'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:2.4%; padding:1px" ><input type="text" style="font-size:9px;width:100%" disabled value="'.$others.'" id="others'.$emp.'"/></div>
								<div id="figure2"  class="shower"  class="shower" style="font-size:9px;width:4%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00" value="'.$totalded.'" id="totalded'.$emp.'"/></div>
								<div id="figure2"  class="shower" style="font-size:9px;width:5%; padding:1px" ><input type="text"  disabled="disabled"  style="font-size:9px;width:100%; background:#fff; border-color:#f00; font-weight:bold" value="'.$net.'" id="net'.$emp.'"/></div>';
								echo"<div class=\"figure2\" id=\"rem".$emp."\" onclick=\"deletepayemp(".stripslashes($row['serial']).")\" style=\"width:2%;padding:1px;height:22px;\" ><img src=\"images/delete.png\" style=\"height:22px;width:22px\" /></div>
								<div class=\"figure2\" id=\"save".$emp."\" onclick=\"savepayemp('".$emp."','".$mon."')\" style=\"width:2.4%;padding:1px;height:22px;\" ><img src=\"images/right.png\" style=\"height:22px;width:22px\" /></div>";
									echo'</div><div class="cleaner"></div>';
										}
									}
		 
		echo"<script>$('#emp4').parent().find('input:first').focus().width(200);</script>";		 
       echo'</div> 
	
	<div id="empadd" style="display:none">   
			<div id="modalDiv"></div>
			<div id="alertDiv"  class="bounceIn appear" data-start="0" style="opacity:1000">
			<p class="title" style="margin-top:0">ADD TO PAYROLL<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv2()"></p>
			<div class="message" style="padding:5px 15px">
		
			<div class="ui_widget"  style="margin-right:8%;float:right; ">
				<select id="emp4" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
		
		
			</div>
			</div>
    </div>	
    <div class="cleaner_h60"></div>												

	</div>';


	
						
							break;
							
							case 24:
					echo"<script>$('.combos').parent().find('input:first').focus().width(130);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">EDIT PAYROLL:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
						<input type="hidden" id="ser" name="ser"  value=""/>
						<a class="labels" style="margin-left:5px">Month:<span>*</span></a>
				<div class="ui_widget"  style="margin-right:8%;float:right;">
				<select id="mon1" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister where status=1");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
<div class="cleaner_h5"></div>

						<a class="btn btn-sm btn-success" onclick="editpayroll()"><i class="fa fa-save"></i>SUBMIT</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;
							
							case 25:
								echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
$result = mysql_query("insert into log values('','".$username." accesses Payroll Settings','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">PAYROLL SETTINGS:
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
							
	 <ul class="nav nav-tabs">
        <li class="active"><a href="#nhifrates" data-toggle="tab" style="outline:0">NHIF RATES</a></li>
        <li><a href="#taxrates" data-toggle="tab" style="outline:0">TAX RATES</a></li>
        <li><a href="#nssfrates" data-toggle="tab" style="outline:0">NSSF RATES</a></li>
        <li><a href="#overtimerates" data-toggle="tab" style="outline:0">OVERTIME RATES</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="nhifrates">
			<div id="title">
									<div id="figure1" style="margin-left:0px;width:25%">Lower</div>
									<div id="figure1" style="width:25%">Upper</div>
									<div id="figure1" style="width:25%">Amount</div>
									<div id="figure1" style="width:25%">Save</div>
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result = mysql_query("SELECT * FROM  nhif");
									$num_results = mysql_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									$code=stripslashes($row['id']);
								
									if($i%2==0){
	echo'<div class="normal1" style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2"  style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
	}	
									
									echo'
			<div id="figure2" style="width:25%; padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['lower']).'" id="lower'.$code.'"/></div>
			<div id="figure2" style="width:25%;  padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['upper']).'" id="upper'.$code.'"/></div>
			<div id="figure2" style="width:25%;  padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['amount']).'" id="amount'.$code.'"/></div>';
									
									echo"<div class=\"figure2\" style=\"width:25%; padding:2px\" id=\"save".$code."\" onclick=\"savenhif(".$code.")\"><img src=\"images/tick.png\" style=\"width:22px;height:22px\"/></div>
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
		 
       echo'</div> 
	   <div class="cleaner_h50"></div> 
	   
	    </div>
        <div class="tab-pane fade" id="taxrates">
		
		<div id="title">
									<div id="figure1" style="margin-left:0px;width:25%">Lower</div>
									<div id="figure1" style="width:25%">Upper</div>
									<div id="figure1" style="width:25%">Ratio</div>
									<div id="figure1" style="width:25%">Save</div>
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result = mysql_query("SELECT * FROM  tax");
									$num_results = mysql_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									$code=stripslashes($row['id']);
								
									if($i%2==0){
	echo'<div class="normal1" style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2"  style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
	}	
									
									echo'
			<div id="figure2" style="width:25%; padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['lower']).'" id="taxlower'.$code.'"/></div>
			<div id="figure2" style="width:25%;  padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['upper']).'" id="taxupper'.$code.'"/></div>
			<div id="figure2" style="width:25%;  padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['tax']).'" id="taxpercent'.$code.'"/></div>';
									
									echo"<div class=\"figure2\" style=\"width:25%; padding:2px\" id=\"taxsave".$code."\" onclick=\"savetax(".$code.")\"><img src=\"images/tick.png\" style=\"width:22px;height:22px\"/></div>
									
									</div>
									<div class=\"cleaner\"></div>";
					}
		 
		 
       echo' </div> <div class="cleaner_h50"></div></div> 
	  
		  <div class="tab-pane fade" id="nssfrates">';
		$result = mysql_query("SELECT * FROM  nssf where id=1");
						$row=mysql_fetch_array($result);
						$employee=stripslashes($row['amount']);
						
				echo'<a class="labels" style="margin-left:15px" >Employee:</a>
						<input type="text" title="Rate in percent" id="employeenssf" class="input_field" value="'.$employee.'"  style="width:100px; margin-left:10px;float:left"/>
						<input class="in_field" type="button" value="Save" id="submit"  style="padding:5px 5px; border-color:#fff; background:#0f3; float:left; cursor:pointer;width:50px; margin-left:10px; border:1px solid #333" class="in_field" onclick="submnssf();"/>
						<div id="mes3" style="float:left;width:40px; height:40px; margin-left:10px"></div>
		
		
		<div class="cleaner_h50"></div>
		</div>
		
		
		 <div class="tab-pane fade" id="overtimerates">';
		$result = mysql_query("SELECT * FROM  overtime where id=1");
						$row=mysql_fetch_array($result);
						$amount=stripslashes($row['rate']);
				echo'<a class="labels" style="margin-left:15px" >Overtime Rate per Hour:</a>
						<input type="text" title="Rate per Hour" id="overtime" class="input_field" value="'.$amount.'"  style="width:100px; margin-left:10px;float:left"/>
						<input class="in_field" type="button" value="Save" id="submit"  style="padding:5px 5px; border-color:#fff; background:#0f3; float:left; cursor:pointer;width:50px; margin-left:10px; border:1px solid #333" class="in_field" onclick="submover();"/>
						<div id="mes4" style="float:left;width:40px; height:40px; margin-left:10px"></div>
		
		
		<div class="cleaner_h50"></div>
		</div>
		
		
      </div>
  
															

	</div>';
						break;
						
						case 26:
										
$result = mysql_query("insert into log values('','".$username." accesses  Employee Benefits Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'
					<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">EMPLOYEE BENEFITS:
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<img src="images/adduser.png" style="width:30px; height:30px; float:right; padding:2px 2px;margin-right:10px; cursor:pointer" onclick="addtopay()" title="Add to Benefits">	
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 " style="padding:1%">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
							<div id="title">
									<div id="figure1" style="width:5%">PF No.</div>
									<div id="figure1" style="width:20%">Name</div>
									<div id="figure1" style="width:8%">Phone Mins.</div>
									<div id="figure1" style="width:8%">Health Ins.</div>
									<div id="figure1" style="width:8%">Co. Vehicle.</div>
									<div id="figure1" style="width:8%">Co. Hse</div>
									<div id="figure1" style="width:8%">Entertainment</div>
									<div id="figure1" style="width:8%">Per Diem</div>
									<div id="figure1" style="width:8%">Others</div>
									<div id="figure1" style="width:9%">Total</div>
									<div id="figure1" style="width:5%">Rem</div>
									<div id="figure1" style="width:5%">Save</div>
								
									
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result =mysql_query("select * from benefits");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if($i%2==0){
	echo'<div class="normal1"  style="min-height:20px; border-left:1.5px solid #333; cursor:pointer" id="pay'.stripslashes($row['id']).'">';
	}else{
		echo'<div  class="normal2" style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer" id="pay'.stripslashes($row['id']).'">';}
		
		
									$sta=stripslashes($row['status']);
									$emp=stripslashes($row['pfno']);
									$name=stripslashes($row['names']);
									$phone=stripslashes($row['phone']);
									$health=stripslashes($row['health']);
									$vehicle=stripslashes($row['vehicle']);
									$house=stripslashes($row['house']);
									$entertainment=stripslashes($row['entertainment']);
									$perdiem=stripslashes($row['perdiem']);
									$others=stripslashes($row['others']);
									$total=stripslashes($row['total']);
					echo'
				<div id="figure2" style="width:5%; margin-left:0" >'.stripslashes($row['pfno']).'</div>
				<div id="figure2" style="width:20%" >'.stripslashes($row['names']).'</div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text" style="width:100%" value="'.$phone.'" id="phone'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text" style="width:100%" value="'.$health.'" id="health'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text" style="width:100%" value="'.$vehicle.'" id="vehicle'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text" style="width:100%; " value="'.$house.'" id="house'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text"style="width:100%; background:#fff; " value="'.$entertainment.'" id="entertainment'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text"  style="width:100%; background:#fff; " value="'.$perdiem.'" id="perdiem'.$emp.'"/></div>
				<div id="figure2" style="width:8%; padding:2px" ><input type="text"  style="width:100%; background:#fff; " value="'.$others.'" id="others'.$emp.'"/></div>
				<div id="figure2" style="width:9%; padding:2px" ><input type="text"  disabled="disabled"  style="width:100%; background:#fff; border-color:#f00; font-weight:bold" value="'.$total.'" id="total'.$emp.'"/></div>';
				echo"<div class=\"figure2\" id=\"rem".$emp."\" onclick=\"deletebenemp(".stripslashes($row['id']).")\" style=\"width:5%;padding:2px\" ><img src=\"images/delete.png\" style=\"height:22px;width:22px\" /></div>
				<div class=\"figure2\" id=\"save".$emp."\" onclick=\"savebenemp('".$emp."')\" style=\"width:5%;padding:2px\" ><img src=\"images/right.png\" style=\"height:22px;width:22px\" /></div>";
					echo'</div><div class="cleaner"></div>';
					}
		 
		echo"<script>$('#emp5').parent().find('input:first').focus().width(200);</script>";		 
       echo'</div> 
	
	<div id="empadd" style="display:none">   
			<div id="modalDiv"></div>
			<div id="alertDiv"  class="bounceIn appear" data-start="0" style="opacity:1000">
			<p class="title" style="margin-top:0">ADD TO BENEFITS
			<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv2()"></p>
			<div class="message" style="padding:5px 15px">
		
			<div class="ui_widget"  style="margin-right:8%;float:right; ">
				<select id="emp5" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
		
		
			</div>
			</div>
    </div>													

	</div>';
	
						
							break;
	
							
							case 27:
										
$result = mysql_query("insert into log values('','".$username." accesses  Company Details Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
$result =mysql_query("select * from company");
							$row=mysql_fetch_array($result);	
					echo'
					<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">COMPANY DETAILS
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							<div style="padding:1%; width:100%">
							
		<div id="block1" style="width:50%; background:#fff; margin:0 5px 5px 0; ">
	<div class="cleaner_h5"></div> 
	
	<a class="labels" style="margin-left:5px">Company Name:</a>
	<input type="text" id="cname" class="in_field"  style="width:250px;float:right; margin-right:50px; border:1px solid #f00" disabled="disabled" value="'.stripslashes($row['CompanyName']).'"/> 
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Address:</a>
	<input type="text" id="add" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Address']).'"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Telephone:</a>
	<input type="text" id="tel" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Tel']).'"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Website:</a>
	<input type="text" id="web" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Website']).'"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Email:</a>
	<input type="text" id="email" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Email']).'"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">TagLine:</a>
	<input type="text" id="motto" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Motto']).'"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Location Description:</a>
	<input type="text" id="loc" class="in_field"  style="width:250px;float:right; margin-right:50px;" value="'.stripslashes($row['Description']).'"/>
	<div class="cleaner_h5"></div>';
				echo"<img src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 200px; float:left\" title=\"Submit\" onclick=\"editcompany()\"/>";
				echo'<div id="res2" style="float:left;width:40px; height:40px; margin-left:10px"></div>
				
				
									<div class="cleaner_h5"></div> 
							<h5 style="text-align:right; margin-right:100px">Change Company Logo</h5>';
						echo'<div class="cleaner_h5"></div> 
	 						<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe" style="margin-right:50px">
      							 <dd class="custuploadblock_js">
								<input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe" style="float:right"  src="images/clogo.jpg">
								</iframe>
                               <input type="hidden" id="stamp" name="stamp" value=""/>
								<input type="hidden" id="id" name="id"  value="5"/>
								<div class="cleaner_h20"></div>
     							<input type="submit" value="upload" id="send"  
								style="margin-right:50px; width:100px;float:right; cursor:pointer; height:35px"class="in_field"/>
								</form>
										</div>
							<div class="cleaner_h50"></div>
							
							</div>
							</div>';
	
						
							break;
							
							case 28:									
$result = mysql_query("insert into log values('','".$username." accesses  System Users Manager Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
$result =mysql_query("select * from company");
							$row=mysql_fetch_array($result);	
					echo'
					<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">SYSTEM USERS
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
<div class="col-sm-3 mar" id="personal" >
	<div class="cleaner_h5"></div> 
	<h5 style="text-align:center; fonnt-weight:normal">Add New System User</h5>
	<div class="cleaner_h5"></div> ';
		$result =mysql_query("select * from users order by auto desc limit 0,1");
							$row=mysql_fetch_array($result);
							$name=stripslashes($row['name']);
							$a=substr($name,3,2);
							$a=$a+1;
							$b=sprintf("%03s",$a);
							
	echo'
	<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
	<a class="labels" style="margin-left:5px">User Name:<span>*</span></a>
	<input type="text"  id="name2" class="in_field"  style="width:50px;float:right; margin-right:10px; border-color:#f00" value="'.$b.'" maxlength="2" disabled="disabled"/> 
	<input type="text" id="name1" required="required" class="in_field"  style="width:40px;float:right; margin-right:10px;" value="" maxlength="2"/> 
	
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Full Names:</a>
	<div class="ui_widget"  style="margin-right:8%;float:right; ">
				<select id="emp6" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'</option>';
							}
		echo'
	</select>
	</div>
	
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Password:</a>
	<input type="text" id="pass1" class="in_field"  style="width:150px;float:right; margin-right:5px; text-transform:none" value="password"/>
	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:5px">Email:</a>
	<input type="text" id="email1" class="in_field"  style="width:200px;float:right; margin-right:5px; text-transform:none"/>
	<div class="cleaner_h5"></div>


	<a class="labels" style="margin-left:5px">Branch:</a>
	<div class="ui-widget" style="margin-right:8%; float:right">
					<select class="combos" id="branch1" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysql_query("select * from branchtbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
			echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo'</select>
							</div>
								<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Dept Name:</a>
	<div class="ui-widget" style="margin-right:8%; float:right">
					<select class="combos" id="dept1" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysql_query("select * from dept order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
			echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo'</select>
							</div>
								<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Position:</a>
	  <div class="ui-widget" style="margin-right:8%; float:right">
	<select class="combos" id="pos1" style="width:260px;float:right; ">
	<option value="">Select one...</option>
								<option value="Admin">Admin</option>
								<option value="HRM">HRM</option>
								<option value="HROfficer">HR Officer</option>
								<option value="BranchMan">Branch Manager</option>
								<option value="BranchUser">Branch User</option>
								<option value="HOD">HOD</option>
								<option value="Manager">Manager</option>
								<option value="Default">Default</option>
								
								
						</select>
						</div>
<div class="cleaner_h5"></div>';
				echo"<img src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:0px 0 0 100px; float:left\" title=\"Submit\" onclick=\"addnewuser()\"/>";
				echo'<div id="res1" style="float:left;width:40px; height:40px; margin-left:10px"></div>
							
		
							</div>
							
							
			<div class="col-sm-3 mar" id="personal" >
								<h5 style="text-align:center; fonnt-weight:normal">Edit System User</h5>
					<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:5px">User Name:</a>
	<div class="ui-widget" style="margin-right:8%; float:right">
	<select class="select" id="acname3"  style="width:260px;float:left; margin-right:10px;">
		<option value="">Select one...</option>';
							$result =mysql_query("select * from users order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$dept=stripslashes($row['dept']);
								$pos2=stripslashes($row['position']);
								$branch=stripslashes($row['branch']);
								$emp=stripslashes($row['pfno']);
								$auto=stripslashes($row['auto']);
								$email=stripslashes($row['email']);
								echo'<option value="'.$dept.'θ'.$pos2.'θ'.$branch.'θ'.$emp.'θ'.$auto.'θ'.$email.'">'.stripslashes($row['name']).'</option>';
							}
							echo'</select>	</div>
							<div class="cleaner_h5"></div>
<input type="hidden" id="stamper"/>
<a class="labels" style="margin-left:5px">Full Names:</a>
	<select id="fullname" style="width:150px; margin-right:10px; float:right" class="select">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'</option>';
							}
		echo'
	</select>

<div class="cleaner_h5"></div>

<a class="labels" style="margin-left:5px">Email:</a>
	<input type="text" id="email2" class="in_field"  style="width:200px;float:right; margin-right:5px; text-transform:none"/>
	<div class="cleaner_h5"></div>


<a class="labels" style="margin-left:5px">Branch:</a>
	<select class="select" id="branch2" style="margin-right:10px; float:right; width:150px">
						<option value="">Select one...</option>';
							$result =mysql_query("select * from branchtbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
			echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo'</select>
						
<div class="cleaner_h5"></div>
<a class="labels" style="margin-left:5px">Dept Name:</a>
	<div class="ui-widget" style="margin-right:10px; float:right">
					<select class="select" id="dept2" style="width:150px; margin-left:0px;">
						<option value="">Select one...</option>';
							$result =mysql_query("select * from dept order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
			echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo'</select>
							</div>
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:5px">Position:</a>
	<div class="ui-widget" style="margin-right:10px; float:right">
	<select class="select" id="pos2" style="width:150px;">
		<option value="">Select one...</option>
								<option value="Admin">Admin</option>
								<option value="HRM">HRM</option>
								<option value="HROfficer">HR Officer</option>
								<option value="BranchMan">Branch Manager</option>
								<option value="BranchUser">Branch User</option>
								<option value="HOD">HOD</option>
								<option value="Manager">Manager</option>
								<option value="Default">Default</option>
								
						</select>
	</div>					
	<div class="cleaner_h5"></div>
<input type="checkbox" value="1" name="respas" id="" style="float:left;margin:10px 0 0 10px">
		<a class="labels" style="margin-left:10px">Reset Password</a>
<div class="cleaner_h10"></div>';
				echo"<img src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 100px; float:left\" title=\"Submit\" onclick=\"edituser()\"/>";
				echo"<img src=\"images/delete.png\" width=\"50\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 20px; float:left\" title=\"Delete User\" onclick=\"deluser()\"/>";
				echo'<div id="res2" style="float:left;width:40px; height:40px; margin-left:10px"></div></div>
				</div>
					
							
							
							
							
							</div>';
	
						
							break;
							
							case 29:
					echo"<script>$('#dept9').parent().find('input:first').focus().width(250);</script>";	
					echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">SELECT A ROLE:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
	<div class="cleaner_h5"></div>
	
	 <div class="ui-widget" style="margin-right:8%">
	<select class="combos" id="dept9" style=" ">
	<option value="">Select one...</option>
								<option value="Admin">Admin</option>
								<option value="HRM">HRM</option>
								<option value="HROfficer">HR Officer</option>
								<option value="BranchMan">Branch Manager</option>
								<option value="BranchUser">Branch User</option>
								<option value="HOD">HOD</option>
								<option value="Manager">Manager</option>
								<option value="Default">Default</option>
						</select>
						</div>
	<div class="cleaner_h5"></div>
			
				</div>';	
							break;	
							
							case 30:
							$dep9=$_GET['dep9'];
						$result = mysql_query("insert into log values('','".$username." accesses User Access Rights Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'
				<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">USER ACCESS RIGHTS:'.strtoupper($dep9).'
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
			<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>';
		$result =mysql_query("select * from accesstbl order by Descrip");
									$num_results = mysql_num_rows($result);
									for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									$code=stripslashes($row['AccessCode']);
									if(stripslashes($row[$dep9])=='YES'){
	echo "<input type=\"checkbox\" name=\"access".$code."\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkaccess('".$code."','".$dep9."')\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">".stripslashes($row['Descrip'])."</a>	<div class=\"cleaner_h5\"></div>";	
									}
									else{
		echo "<input type=\"checkbox\"  name=\"access".$code."\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkaccess('".$code."','".$dep9."')\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">".stripslashes($row['Descrip'])."</a>	<div class=\"cleaner_h5\"></div>";										
										
									}
									
									}
				
				
							
										
									echo'	<div class="cleaner_h50"></div><div class="cleaner_h50"></div></div>';
						
							break;
							
								case 31:
					
						$result = mysql_query("insert into log values('','".$username." accesses Change Credentials  Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'
				<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">CHANGE LOGIN CREDENTIALS:'.strtoupper($username).'
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
			<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>';
			$result =mysql_query("select * from users where name='".$username."'");
							$row=mysql_fetch_array($result);
							$name=stripslashes($row['name']);
							$pos=stripslashes($row['position']);
							$photo=stripslashes($row['photo']);
							
							echo'<div style="padding:1%;width:30%" id="personal"> 
								<a class="labels">Old Pass:<span>*</span></a>
                                <input type="password" id="opass" name="name" class="in_field" value="" style="float:right;"/>
								<div class="cleaner_h5"></div>
								<a class="labels">New Pass:<span>*</span></a>
                                <input type="password" id="npass" name="name" class="in_field" value="" style="float:right;"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Confirm:<span>*</span></a>
                                <input type="password" id="cpass" name="name" class="in_field" value=""  style="float:right;"/>
								<div class="cleaner_h5"></div>';
								echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:150px; float:left; cursor:pointer;width:60px\" class=\"in_field\" onclick=\"postpass('".$username."');\"/>";
							echo'<div id="aresp" style="float:left; height:40px; margin-left:20px"></div>
							</div>
							<div class="cleaner_h20"></div>
							<div class="cleaner_h50"></div><div class="cleaner_h50"></div></div>';
						
							break;
							
							
								case 32:
					
						$result = mysql_query("insert into log values('','".$username." accesses System Variables Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'
				<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">UPDATE SYSTEM VARIABLES
												
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
			<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>';
			$result =mysql_query("select * from users where name='".$username."'");
							$row=mysql_fetch_array($result);
							$name=stripslashes($row['name']);
							$pos=stripslashes($row['position']);
							$photo=stripslashes($row['photo']);
							
							echo'<div style="padding:1%;width:30%" id="personal"> 
							<h5>Add System Variable</h5>
								<a class="labels">Category:<span>*</span></a>
							<select class="combos" id="sysvar" style="float:right; ">
									<option value="" selected="selected" disabled="disabled">Select one...</option>
								<option value="banktbl">BANK</option>
								<option value="branchtbl">BRANCH</option>
								<option value="dept">DEPARTMENT</option>
								<option value="positions">POSITION</option>
								<option value="courses">COURSE</option>
								<option value="hrmdocs">HRM DOCUMENTS</option>
								<option value="experience">EXPERIENCE</option>
								<option value="languages">LANGUAGES</option>
								<option value="tasks">TASKS</option>
								<option value="towns">LOCATION</option>
						</select>
						<div class="cleaner_h5"></div>
						<a class="labels">Name:<span>*</span></a>
                                <input type="text" id="vname" name="name" class="in_field" value="" style="float:right;"/>
								<div class="cleaner_h5"></div>
								';
								echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:150px; float:left; cursor:pointer;width:60px\" class=\"in_field\" onclick=\"postvariable();\"/>";
							echo'<div id="aresp" style="float:left; height:40px; margin-left:20px"></div>
						
							<div class="cleaner_h20"></div>
								<h5>Edit System Variable</h5>
									<a class="labels">Category:<span>*</span></a>
							<select class="combos" id="sysvar2" style="float:right; ">
									<option value="" selected="selected" disabled="disabled">Select one...</option>
								<option value="1θbanktbl">BANK</option>
								<option value="2θbranchtbl">BRANCH</option>
								<option value="3θdept">DEPARTMENT</option>
								<option value="4θpositions">POSITION</option>
								<option value="5θcourses">COURSE</option>
								<option value="6θhrmdocs">HRM DOCUMENTS</option>
								<option value="7θexperience">EXPERIENCE</option>
								<option value="8θlanguages">LANGUAGES</option>
								<option value="9θtasks">TASKS</option>
								<option value="10θtowns">LOCATION</option>
						</select>
						<div class="cleaner_h5"></div>
						<div id="opt1" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat1"  onchange="setvar(1)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from banktbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
						<div id="opt2" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat2"  onchange="setvar(2)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from branchtbl order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt3" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat3"  onchange="setvar(3)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from dept order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt4" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat4"  onchange="setvar(4)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from positions order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt5" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat5"  onchange="setvar(5)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from courses order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt6" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat6"  onchange="setvar(6)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from hrmdocs order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt7" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat7"  onchange="setvar(7)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from experience order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt8" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat8"  onchange="setvar(8)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from languages order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt9" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat9"  onchange="setvar(9)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from tasks order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
								<div id="opt10" style="display:none">
		<a class="labels">Variable:<span>*</span></a>
		<select class="select" style="float:right" id="syscat10"  onchange="setvar(10)">
		<option value="" selected="selected" disabled="disabled"Select one...</option>';
		$result =mysql_query("select * from town order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$bid=stripslashes($row['id']);
								$name=strtoupper(stripslashes($row['name']));
								echo"<option value=\"".$bid."θ".$name."\">".$name."</option>";
							}
		echo'
			</select>
			<div class="cleaner_h5"></div>
						</div>
						
						<a class="labels">Name:<span>*</span></a>
                          <input type="text" id="vname2" name="name" class="in_field" value="" style="float:right;"/>
								<div class="cleaner_h5"></div>';
								echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:130px; float:left; cursor:pointer;width:60px\" class=\"in_field\" onclick=\"editvariable();\"/>";
								echo"<input type=\"button\" value=\"Delete\" id=\"submit\" style=\"margin-left:20px; float:left; cursor:pointer;width:60px\" class=\"in_field\" onclick=\"deletevariable();\"/>";
							echo'<div id="bresp" style="float:left; height:40px; margin-left:20px"></div>
								
							<div class="cleaner_h50"></div><div class="cleaner_h50"></div></div>';
						
							break;
							
							
							case 33:
						echo"<script>$('#month1').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">MONTHLY REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
	<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month1" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
						
						</div>';
							break;
							case 34:
					
						echo"<script>$('#month14').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">MONTHLY REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month14" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
						
						</div>';
							break;
							case 35:
						echo"<script>$('.combos').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">INDIVIDUAL BANK REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Bank:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select class="combos" id="empbank" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from banktbl");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['id']).'">'.stripslashes($rowa['name']).'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Month:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="monthsum" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
			<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterindbank();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;
							
							case 36:
				echo"<script>$('#cus9').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">EMPLOYEE PAYROLL SUMMARY:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="cus9" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where ".$_SESSION['clearance']." ");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
					echo'
				</select>
				</div>
					<div class="cleaner_h10"></div>
					<a class="labels" style="margin-left:5px">From:<span>*</span></a>
					<input type="text" id="datepicker7"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; " readonly="readonly"/> 
					<div class="cleaner_h10"></div>

					<a class="labels" style="margin-left:5px">To:<span>*</span></a>
					<input type="text" id="datepicker9"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; " readonly="readonly"/> 
					<div class="cleaner_h10"></div>

					<a class="btn btn-sm btn-success" onclick="enteremployeesumm()"><i class="fa fa-save"></i>SUBMIT</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px "></div>	
					<div class="cleaner_h10"></div>
						
						</div>';
							break;

							case 36.1:
				echo"<script>$('#cus12').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">EMPLOYEE ATTENDANCE SUMMARY:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="cus12" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where ".$_SESSION['clearance']." ");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
						
						</div>';
							break;
							
								case 37:
						echo"<script>$('.combos').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">INDIVIDUAL PAY SLIPS:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Employee:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="cus19" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where ".$_SESSION['clearance']." ");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Month:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="monthsum" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
			<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterindpayslip();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;
							
							case 38:
						
				echo"<script>$('#month2').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">ALL PAY SLIPS:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month2" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
		</select>
		</div>
						
						</div>';
							break;	
							
						case 39:
						echo"<script>$('.combos').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">ATTENDANCE REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Branch:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select class="combos" id="branch" style="width:260px; margin-left:10px;">
		<option value="All">All Branches</option>';
		$resulta =mysql_query("select * from branchtbl");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['name']).'">'.stripslashes($rowa['name']).'</option>';
							}
		echo'
		
	</select>
	</div>
	<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Month:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="monthsum" style="width:260px; margin-left:10px;" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from attendancelog");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
							}
		echo'
	</select>
	</div>
			<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterattendance();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;	
					
							case 40:
						
				echo"<script>$('#month2').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">LEAVE REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">From:</a>
				<input id="datepicker3" name="doe" class="in_field" type="text"  style="width:80%;float:right; margin-right:10px"> 
				<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:5px">To:</a>
			 <input id="datepicker4" name="doe" class="in_field" v  type="text"  style="width:80%;float:right; margin-right:10px"> 
			 <div class="cleaner"></div>
					<input type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
			 	<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterleaverep();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;	

								case 40.1:
						
				echo"<script>$('#month2').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
				<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
				<h5 style="margin:0px; color:#333; padding:3px">LEAVE SUMMARY REPORT:';						
				echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>

				<a class="labels" style="margin-left:5px">Leave Type:<span>*</span></a>
				<div class="ui_widget"  style="margin-right:35px;float:right;">
				<select id="leavetype" style="width:260px; margin-left:10px;" class="combos">
				<option value="">Select one...</option>
				<option value="Work">Work leave</option>
				<option value="Sick">Sick leave</option>
				<option value="Maternity">Maternity leave</option>
				<option value="Paternity">Paternity leave</option>
				<option value="Compassionate">Compassionate leave</option>
				<option value="Annual">Annual leave</option>
				<option value="Exam">Exam leave</option>

				</select>
				</div>
				<div class="cleaner_h5"></div>


				<a class="labels" style="margin-left:5px">As at:</a>
				 <input id="datepicker4" name="doe" class="in_field"   type="text"  style="width:80%;float:right; margin-right:10px"> 
				<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterleavesumm();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;	
							
					
							
								case 41:
						
				echo"<script>$('#emp99').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">EMPLOYEES LIST';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="emp99" style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>
		<option value="1">Active Employees</option>
		<option value="0">Ex-Employees</option>
		<option value="2">All Employees</option>
	</select>
	</div>
						
						</div>';
							break;	
						
						case 42:
						
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">MAILS REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">From:</a>
				<input id="datepicker3" name="doe" class="in_field" type="text"  style="width:80%;float:right; margin-right:10px"> 
				<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:5px">To:</a>
			 <input id="datepicker4" name="doe" class="in_field" v  type="text"  style="width:80%;float:right; margin-right:10px"> 
			 <div class="cleaner"></div>
					<input type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
			 	<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="entermessages();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;	
							
								case 43:
				echo"<script>$('#user').parent().find('input:first').width(250).focus();</script>";			
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">ACTIVITY LOG REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">User Id:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-right:8%; float:right">
					
					<select  id="user" style="width:280px; margin-left:10px;" class="combos">
					<option value="">Select one...</option>';
							$result =mysql_query("select * from users order by name");
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
							echo'<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
							}
						echo'<option value="All">All Users</option></select>
						</div>
						<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">From:</a>
				<input class="in_field" style="width:90px;float:left; margin-left:10px" id="datepicker3" type="text">
				<a class="labels" style="margin-left:10px">Time:</a>
				<input class="in_field" style="float:left;width:35px; margin-left:10px" id="time1" onkeyup="timed1()" type="text" value="00" title="In 24 hr Format">
				<input class="in_field" style="float:left;width:35px; margin-left:5px" id="time2" type="text" value="00" title="In 24 hr Format">
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">To:</a>
				<input class="in_field" style="width:90px;float:left; margin-left:25px" id="datepicker4" type="text">
				<a class="labels" style="margin-left:10px">Time:</a>
				<input class="in_field" style="float:left;width:35px; margin-left:10px" id="time3" onkeyup="timed2()" type="text" value="00" title="In 24 hr Format">
				<input class="in_field" style="float:left;width:35px; margin-left:5px" id="time4" type="text" value="00" title="In 24 hr Format">				
					<div class="cleaner"></div>
					<input type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
					
					<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterlog(2);"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;


case 44:
							
						
$result = mysql_query("insert into log values('','".$username." accesses Leave Calendar Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
								<h3 style="color:#ffdd17; margin-top:3px">LEAVE CALENDAR								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
										<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>		
							<div id="newstude" class="col-sm-12 " style="padding:1%;max-height:450px">
										
								<div id="calendar" style=""></div>';


			$date=strtotime(date('Y-m-d'));
			$newdate=date('Y-m-d', strtotime('+1 month', $date));
			$a=substr($newdate,8,2);
			$b=substr($newdate,5,2);
			$c=substr($newdate,0,4);
			$date2=$a.'/'.$b.'/'.$c;
			$stamp2=$c.$b.$a;
			
					$arr=array();
					$result =mysql_query("select * from leaves where status=2 order by stamp asc");
					$num_results = mysql_num_rows($result);	

				

					for ($i=0; $i <$num_results; $i++) {
					$row=mysql_fetch_array($result);
					$arr1[]=stripslashes($row['commencedate']);
					$arr2[]=stripslashes($row['enddate']);
				    }

				    $arr1 = array_unique($arr1);
					$arr2 = array_unique($arr2);

				    $vector='';  

				    $result =mysql_query("select * from holidays");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
					$row=mysql_fetch_array($result);
					$a=substr(stripslashes($row['date']),0,2);
					$b=substr(stripslashes($row['date']),3,2);
					$c=substr(stripslashes($row['date']),6,4);
					$date=$c.'-'.$b.'-'.$a;
					$vector.="{title: '".stripslashes($row['name'])."',start: '".$date."'},";
					}
	

					

					
					
					 
					
					
					foreach ($arr1 as $key => $val) {
					$result =mysql_query("select * from leaves where status=2 and commencedate='".$val."'");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
					$row=mysql_fetch_array($result);
					$a=substr($val,0,2);
					$b=substr($val,3,2);
					$c=substr($val,6,4);
					$date=$c.'-'.$b.'-'.$a;
					$vector.="{title: 'Leave [".stripslashes($row['leavetype'])."] Start for ".stripslashes($row['name']).":".stripslashes($row['emp'])."-".stripslashes($row['position'])."',start: '".$date."'},";
					}
					}
					
					foreach ($arr2 as $key => $val) {
					
					$result =mysql_query("select * from leaves where status=2 and enddate='".$val."'");
					$num_results = mysql_num_rows($result);	
					for ($i=0; $i <$num_results; $i++) {
					$row=mysql_fetch_array($result);
					$a=substr($val,0,2);
					$b=substr($val,3,2);
					$c=substr($val,6,4);
					$date=$c.'-'.$b.'-'.$a;
					$vector.="{title: 'Leave [".stripslashes($row['leavetype'])."] End for ".stripslashes($row['name']).":".stripslashes($row['emp'])."-".stripslashes($row['position'])."',start: '".$date."'},";
					}
					}


					
					$len=strlen($vector);
					$a=$len-1;
					$vector=substr($vector,0,$a);

    
   echo" <script>

	$(document).ready(function() {
	$('#calendar').fullCalendar({
			theme: false,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '".date('Y-m-d')."',
			editable: false,
			weekNumbers: true,
			eventLimit: true,
			events: [".$vector."]
		});
		
	});

</script>
<div class='cleaner_h50'></div><div class='cleaner_h50'></div>
</div></div>";
							
							break;


							case 44.1:
			$result = mysql_query("insert into log values('','".$username." accesses Alter Leave Days Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				
			echo"<script>$('#emp57').parent().find('input:first').focus().width(200);</script>";	
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;padding:3%">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">Alter Leave Days:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">Employee:<span>*</span></a>
					<div class="ui_widget"  style="margin-right:10%;float:right;">
				<select id="emp57" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysql_query("select * from employee where status=1  and ".$_SESSION['clearance']." order by fname");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'θ'.stripslashes($rowa['leaveac']).'θ'.stripslashes($rowa['sickac']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h10"></div>
		<a class="labels" style="margin-left:5px">Current Work Leave Days:<span>*</span></a>
		<input type="text" id="oleaveac"  class="in_field" value="" style="width:50%;float:right;margin-right:10px; text-transform:none;border-color:#f00 " disabled="disabled"/> 
		<div class="cleaner_h5"></div>

		<a class="labels" style="margin-left:5px">Current Sick Leave Days:<span>*</span></a>
		<input type="text" id="osickac"  class="in_field" value="" style="width:50%;float:right;margin-right:10px; text-transform:none;border-color:#f00 " disabled="disabled"/> 
		<div class="cleaner_h5"></div>


		<a class="labels" style="margin-left:5px">New Work Leave Days:<span>*</span></a>
		<input type="text" id="leaveac"  class="in_field" value="" style="width:50%;float:right;margin-right:10px; text-transform:none; "/> 
		<div class="cleaner_h5"></div>

		<a class="labels" style="margin-left:5px">New Sick Leave Days:<span>*</span></a>
		<input type="text" id="sickac"  class="in_field" value="" style="width:50%;float:right;margin-right:10px; text-transform:none; "/> 
		<div class="cleaner_h5"></div>
					<a class="btn btn-sm btn-success" onclick="alterleavedays()"><i class="fa fa-save"></i>UPDATE</a>
					<a class="btn btn-sm btn-warning" href="#" onclick="hidediv()"><i class="fa fa-warning"></i>CLOSE</a>
					<div id="taskstud" style="float:right;height:20px;margin-right:10px  "></div>	
	<div class="cleaner_h10"></div>
				</div>';
				
							
							break;

								case '49.6':
				echo"<script>$('#category').parent().find('input:first').width(250).focus();</script>";			
				echo"<script>$('#month3').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">Monthly Allowances/Deductions Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Category:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="category" style="width:260px; margin-left:10px;">
					
					<option value="sal">BASIC SALARY</option>
					<option value="hallow">HOUSE ALLOWANCE</option>
					<option value="cash">CASH</option>
					<option value="airtime">AIRTIME</option>
					<option value="car">CAR ALLOWANCE</option>
					<option value="leaveallow">LEAVE ALLOWANCE</option>
					<option value="bonus">BONUS</option>
					<option value="thirteen">THIRTEENTH MONTH ALLOWANCE</option>
					<option value="notice">NOTICE ALLOWANCE</option>
					<option value="totalot">OVER TIME</option>

					<option value="paye">PAYE</option>
					<option value="sacco">WEC SACCO</option>
					<option value="loans">LOANS</option>
					<option value="medical">MEDICAL</option>
					<option value="nhif">NHIF</option>
					<option value="nssf">NSSF</option>
					<option value="pfund">PROVIDENT FUND</option>
					<option value="helb">HELB</option>
				</select>
				</div>


				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Month:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month3" style="width:260px; margin-left:10px;">
					<option value="">Select one...</option>';
					$resulta =mysql_query("select * from salregister");
										$num_resultsa = mysql_num_rows($resulta);	
										for ($i=0; $i <$num_resultsa; $i++) {
											$rowa=mysql_fetch_array($resulta);
											echo'<option value="'.stripslashes($rowa['month']).'">'.stripslashes($rowa['month']).'</option>';
										}
					echo'
				</select>
				</div>

				<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="entermonded();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;

					case '49.7':
				echo"<script>$('#empyear').parent().find('input:first').width(250).focus();</script>";
				echo"<script>$('#empname').parent().find('input:first').width(250).focus();</script>";
			echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">P9A Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Year:</a>';
				$arr=array();
				$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$arr[substr(stripslashes($rowa['month']),3,4)]=substr(stripslashes($rowa['month']),3,4);
							}
				echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="empyear" class="combos"  style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>';
					foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$key.'</option>';
							}
		echo'
	</select>
	</div>
	<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Employee:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="empname" class="combos" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
			$resulta =mysql_query("select * from employee");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'</option>';
							}
		echo'
	</select>
	</div>
			<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterpnine();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;
							case '49.8':
							
				echo"<script>$('#month4').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">P10 Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>';
				$arr=array();
				$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$arr[substr(stripslashes($rowa['month']),3,4)]=substr(stripslashes($rowa['month']),3,4);
							}
				echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month4" class="combos"  style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>';
					foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$key.'</option>';
							}
					echo'
				</select>
				</div>
						
						</div>';
							break;
							case '49.9':
							
				echo"<script>$('#month5').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">P10A Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>';
				$arr=array();
				$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$arr[substr(stripslashes($rowa['month']),3,4)]=substr(stripslashes($rowa['month']),3,4);
							}
				echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="month5" class="combos"  style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>';
					foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$key.'</option>';
							}
					echo'
				</select>
				</div>
						
						</div>';
				break;

				case 50:
				echo"<script>$('#emp3').parent().find('input:first').focus().width(250);</script>";
				$result = mysql_query("insert into log values('','".$username." accesses Leave Settings','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div style="width:100%; background:#272727; padding:3px 0 1px 0"  id="headclose">
						<h3 style="color:#ffdd17; margin-top:3px">LEAVE SETTINGS:
								
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:5px 5px; border-color:#fff; background:#f00; float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								</h3>
								</div>
							<div id="newstude" class="col-sm-12 ">
							<div class="cleaner" style="border-bottom:2px solid #75c5cf"></div>
							
							
	 <ul class="nav nav-tabs">
        <li class="active"><a href="#nhifrates" data-toggle="tab" style="outline:0">HOLIDAY DATES <img src="images/plus.png" style="width:20px; height:20px; float:right; cursor:pointer" onclick="addtopay()" title="Add New Holiday"></a></li>
        </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="nhifrates">
			<div id="title">
									<div id="figure1" style="margin-left:0px;width:40%">Name</div>
									<div id="figure1" style="width:20%">Date</div>
									<div id="figure1" style="width:20%">Save</div>
									<div id="figure1" style="width:20%">Delete</div>
					</div>
					<div id="display" style="overflow-x:hidden">';
					$result = mysql_query("SELECT * FROM  holidays");
									$num_results = mysql_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									$code=stripslashes($row['id']);
								
									if($i%2==0){
	echo'<div class="normal1" style="min-height:20px; border-left:1.5px solid #333; cursor:pointer">';
	}else{
		echo'<div  class="normal2"  style="min-height:20px;  border-left:1.5px solid #333;cursor:pointer">';
	}	
									
									echo'
			<div id="figure2" style="width:40%; padding:2px" ><input type="text" disabled style="border-color:#f00;width:100%" value="'.stripslashes($row['name']).'" id="name'.$code.'"/></div>
			<div id="figure2" style="width:20%;  padding:2px" ><input type="text" style="width:100%" value="'.stripslashes($row['date']).'" id="date'.$code.'" class="datepick"/></div>';
									
									echo"<div class=\"figure2\" style=\"width:20%; padding:2px\" id=\"save".$code."\" onclick=\"saveholiday(".$code.")\"><img src=\"images/tick.png\" style=\"width:22px;height:22px\"/></div>";
									//if(stripslashes($row['mandatory'])==0){
									echo "<div class=\"figure2\" style=\"width:20%; padding:2px\" id=\"delete".$code."\" onclick=\"deleteholiday(".$code.")\"><img src=\"images/delete.png\" style=\"width:22px;height:22px\"/></div>
									";	
									//}else{echo "<div class=\"figure2\" style=\"width:20%; padding:5px\">Cannot Delete</div>";}
									
									echo"</div>
									<div class=\"cleaner\"></div>";
					}
		 
		 
       echo'</div> 


       <div id="empadd" style="display:none">   
			<div id="modalDiv"></div>
			<div id="alertDiv"  class="bounceIn appear" data-start="0" style="opacity:1000; width:30%">
			<p class="title" style="margin-top:0">CREATE NEW HOLIDAY
			<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv2()"></p>
			<div class="message" style="padding:5px 15px">
		
			
		<a class="labels" style="margin-left:5px">Holiday Name:<span>*</span></a>
		<input type="text" id="holname"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; "/> 
		<div class="cleaner_h5"></div>

		<a class="labels" style="margin-left:5px">Holiday Date:<span>*</span></a>
		<input type="text" id="holdate"  class="in_field datepick" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; "/> 
		<div class="cleaner_h5"></div>
		
		';

		echo"<input class=\"in_field\" type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:5px 5px; border-color:#fff; background:#0f3; float:left; cursor:pointer;width:50px; margin-left:30%; border:1px solid #333\" onclick=\"savenewholiday()\" />";
				
			echo'
			<div id="mes3" style="float:right;width:40px; height:40px; margin-left:10px"></div>
  			<div class="cleaner_h10"></div> 
			</div>
			</div>
    <div class="cleaner_h50"></div> 
	   
	    </div>
       
	   </div>
  
															

	</div>';
						break;

							case 51:
				echo"<script>$('#category').parent().find('input:first').width(250).focus();</script>";			
				echo"<script>$('#empname').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">Employee Deductions Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>

				<a class="labels" style="margin-left:20px">Employee:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="empname" class="combos" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
			$resulta =mysql_query("select * from employee");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
				</div>

				<div class="cleaner_h5"></div>


				<a class="labels" style="margin-left:20px">Category:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="category" style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>
					<option value="pfund">PROVIDENT FUND</option>
					<option value="paye">PAYE</option>
					<option value="sacco">WEC SACCO</option>
					<option value="loans">LOANS</option>
					<option value="medical">MEDICAL</option>
					<option value="nhif">NHIF</option>
					<option value="nssf">NSSF</option>
					<option value="pfund">PROVIDENT FUND</option>
					<option value="helb">HELB</option>
					<option value="advance">Advance</option>
					<option value="sal">BASIC SALARY</option>
					<option value="hallow">H/ALLOWANCE</option>
					<option value="cash">CASH</option>
					<option value="airtime">AIRTIME</option>
					<option value="car">CAR ALLOWANCE</option>
					<option value="leaveallow">LEAVE ALLOWANCE</option>
					<option value="bonus">BONUS</option>
					<option value="thirteen">THIRTEENTH MONTH</option>
					<option value="notice">NOTICE</option>
					<option value="totalot">OVERTIME</option>
					

				</select>
				</div>


				<div class="cleaner_h5"></div>
				
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterempdeds();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;

							case 52:
				echo"<script>$('#category').parent().find('input:first').width(250).focus();</script>";			
				echo"<script>$('#empname').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">Employee Salary Tracking Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>

				<a class="labels" style="margin-left:20px">Employee:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="empname" class="combos" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
			$resulta =mysql_query("select * from employee");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
				</div>

				<div class="cleaner_h5"></div>


				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px;display:none">
				<select id="category" style="width:260px; margin-left:10px;">
				<option value="sal">BASIC SALARY</option>
				</select>
				</div>

				
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterempdeds();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;

							case 53:
				echo"<script>$('#category').parent().find('input:first').width(250).focus();</script>";			
				echo"<script>$('#empname').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">Employee Deductions Report
				<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>

				<a class="labels" style="margin-left:5px">Employee:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="empname" class="combos" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
			$resulta =mysql_query("select * from employee");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['emp']).'">'.stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['emp']).'</option>';
							}
		echo'
	</select>
				</div>

				<div class="cleaner_h5"></div>


				<a class="labels" style="margin-left:5px">Year:<span>*</span></a>
		<input type="text" id="datepicker8"  class="in_field" value="" style="width:60%;float:right;margin-right:10px; text-transform:none; " readonly="readonly"/> 
	<div class="cleaner_h10"></div>
				
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterleavestate();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;


							case 54:
						
				echo"<script>$('#allp9').parent().find('input:first').width(250).focus();</script>";
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">ALL P9A FORMS:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">';
				$arr=array();
				$resulta =mysql_query("select * from salregister");
							$num_resultsa = mysql_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysql_fetch_array($resulta);
								$arr[substr(stripslashes($rowa['month']),3,4)]=substr(stripslashes($rowa['month']),3,4);
							}
				echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<select id="allp9" class="combos"  style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>';
					foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$key.'</option>';
							}
						echo'
					</select>
				</div>
						
						</div>';
							break;	



						case 55:
						
				echo' <div id="modalDiv"></div>	
				<div id="alertDiv" style="min-height:70px; width:320px"  class="bounceIn appear" data-start="200" style="opacity:1000;">
					<div id="tit" style="width:318px; background:#75c5cf; padding:5px 10px;">
			<h5 style="margin:0px; color:#333; padding:3px">BIOMETRIC ATTENDANCE REPORT:';						
echo'<img src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">From:</a>
				<input id="datepicker3" name="doe" class="in_field" type="text"  style="width:80%;float:right; margin-right:10px"> 
				<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:5px">To:</a>
			 <input id="datepicker4" name="doe" class="in_field" v  type="text"  style="width:80%;float:right; margin-right:10px"> 
			<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterattendrep();"/>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;	




							
}




?>