<?php
	case 5:
          
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
  
  $param=0;$_SESSION['housediv']=array();
  if(!isset($_GET['keyy'])){$_SESSION['links'][]=$id.'-'.$param;end($_SESSION['links']); $keyy= key($_SESSION['links']);}
  else{$keyy=$_GET['keyy'];}echo "<script> $('#thekey').val('".$keyy."');</script>";
  $result = mysql_query("insert into log values('','".$username." accesses New Employee File Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
  
  $prescid=date('YmdHi').RAND(10,99);
  
  
  echo '<div class="vd_container" id="container">
  <div class="vd_content clearfix" style="">
  <h3 style="color:#676e69; margin-top:3px; margin-left:2px">EDIT EMPLOYEE INFORMATION
              
              
              </h3>
      <div class="vd_content-section clearfix">
  <div class="row" id="form-basic">
    <div class="col-md-6">
      <div class="panel widget">
        <div class="panel-heading vd_bg-grey">
        
          <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Edit Employee Personal Details</h3>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" action="#" role="form">
            <div class="form-group">
              <label style="float:left" class="col-sm-4">PF No:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="emp" name="emp" class="in_field" value="'.$emp.'" style="border-color:#f00" disabled="disabled"/> 
              </div>
            </div>
  
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">Biometric Id:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="biomid" name="biomid" class="in_field" value="'.stripslashes($rowx['biomid']).'"/>
              </div>
            </div>
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">First Name<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="fname" name="field" class="in_field"onkeyup="validatealp(\'fname\')" value="'.stripslashes($rowx['fname']).'"/>
              </div>
            </div>
            <div class="form-group">
            <label style="float:left" class="col-sm-4">Middle Name<span style="color:#f00">*</span></label>
            <div class="col-sm-8 controls">
            <input type="text" id="mname" name="field" class="in_field" value="'.stripslashes($rowx['mname']).'"/> 
            </div>
          </div>
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">Last Name<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="lname" name="field" class="in_field"  value="'.stripslashes($rowx['lname']).'"/> 
              </div>
            </div>
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">DOB:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input id="dob" name="dob" class="in_field" placeholder="" type="text" readonly="readonly" value="'.stripslashes($rowx['dob']).'">
              </div>
            </div>
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">Marital status:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <select class="select" id="mar" name="mar" style="float:right; text-transform:uppercase">
								 <option value="'.stripslashes($rowx['marital']).'" selected="selected">'.stripslashes($rowx['marital']).'</option>
								<option value="Single">Single</option>
								<option value="Engaged">Engaged</option>
								<option value="Married">Married</option>
								<option value="Divorced">Divorced</option>
								<option value="Widowed">Widowed</option>
								</select> 
              </div>
            </div>
  
  
            <div class="form-group">
              <label style="float:left" class="col-sm-4">Languages:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
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
            </div>
  
  
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">Gender:</label>
              <div class="col-sm-8 controls">
              if(stripslashes($rowx['gender'])=='MALE'){
			 echo'<input  id="maleGender" name="gender" type="radio" checked="checked" value="male" class="radio"/><label for="maleGender">Male</label>
		<input  id="femaleGender" name="gender" type="radio" value="female" class="radio"/><label for="femaleGender">Female</label>';
								 }
							 else{
          echo'<input  id="maleGender" name="gender" type="radio" value="male" class="radio"/><label for="maleGender">Male</label>
		<input  id="femaleGender" name="gender" type="radio" value="female"  checked="checked" class="radio"/><label for="femaleGender">Female</label>';}
		echo'
              </div>
            </div>
  
             <div class="form-group">
              <label style="float:left" class="col-sm-4">ID No:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="idno" name="field" class="in_field" onkeyup="validatenum(\'idno\')"  value="'.stripslashes($rowx['idno']).'"/>
            </div>
              </div>
  
              <div class="form-group">
              <label style="float:left" class="col-sm-4">Phone No:<span style="color:#f00">*</span></label>
              <div class="col-sm-8 controls">
              <input type="text" id="phone" name="phone" class="in_field"  value="'.stripslashes($rowx['phone']).'" onkeyup="validatenum(\'phone\')"/> 
            </div>
            </div>
  
            <div class="form-group">
            <label style="float:left" class="col-sm-4">Phone No[2]:<span style="color:#f00">*</span></label>
            <div class="col-sm-8 controls">
            <input type="text" id="phone2" name="phone2" class="in_field"  value="'.stripslashes($rowx['phone2']).'" onkeyup="validatenum(\'phone2\')"/> 
          </div>
          </div>
  
          <div class="form-group">
          <label style="float:left" class="col-sm-4">Email Address:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
          <input type="text" id="emailadd" name="emailadd"  value="'.stripslashes($rowx['email']).'" class="in_field" style="text-transform:lowercase"/> 
        </div>
          </div>
  
          <div class="form-group">
          <label style="float:left" class="col-sm-4">Physical address:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
          <input type="text" id="phyadd" name="phyadd"  value="'.stripslashes($rowx['phyadd']).'" class="in_field"/> 
        </div>
          </div>
  
          <div class="form-group">
          <label style="float:left" class="col-sm-4">Location:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
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
          </div>
       
  
  
  
          
      </form>
        </div>
      </div>
      <!-- Panel Widget --> 
   
  
      <div class="col-sm-6 mar" id="personal">
								<div class="panel widget">
								<div class="panel-heading vd_bg-grey">
								<h5 class="panel-title"><span class="menu-icon"> <i class="fa fa-th-list"></i> </span>EMPLOYMENT DETAILS</h5>
								</div>
								
								<div class="panel body">
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Basic Sal:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								<input type="text" id="sal" name="sal" class="in_field" onkeyup="validatenum(\'sal\')"  value="'.stripslashes($rowx['salary']).'" />
								</div>
								</div>
								<br/>
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Emp Category:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
                                <select class="select" id="empcateg" name="empcateg" style="float:right; text-transform:uppercase">
                                <option value="'.stripslashes($rowx['empcateg']).'" selected="selected">'.stripslashes($rowx['empcateg']).'</option>
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
								<input id="datepicker2" name="doe" class="in_field"  type="text" readonly="readonly"   value="'.stripslashes($rowx['employdate']).'" >
							 </div>
								</div>
								<br/>
								<br/>
							 <div class="form-group">
                        <label style="float:left" class="col-sm-4">Emp. Type:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
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
		echo'	</div>
		</div>
		</div>
		<br/><br/>
			
								<div id="contract" style="display:none">
									 <div class="form-group">
                        <label style="float:left" class="col-sm-4">From:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<input type="text" id="from" name="from" class="in_field"  value="'.stripslashes($rowx['contractfrom']).'"/>
								</div>
								</div>
								<br/>
								
								 <div class="form-group">
                        <label style="float:left" class="col-sm-4">To:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								<input type="text" id="to" name="to" class="in_field" value="'.stripslashes($rowx['contractto']).'"/>
									</div>
								</div>
								</div>
								<br/>
								
								<div class="form-group">
                        <label style="float:left" class="col-sm-4">Branch:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
								<div class="ui-widget" >
	<select id="branch" class="combos"><option value="" selected="selected" disabled="disabled">Select One...</option>
	<option value="'.stripslashes($rowx['branch']).'" selected="selected">'.stripslashes($rowx['branch']).'</option>							';
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
								
                                <div class="ui-widget" >
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
</div>

</div>
<br/>

										<div class="form-group">
                        <label style="float:left" class="col-sm-4">Position:<span style="color:#f00">*</span></label>
                        <div class="col-sm-8 controls">
								
                               		<div class="ui-widget">
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
</div>
</div>
<br/>
<br/>
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
								<br/>
								<br/>
								</div>
								</div>
								<div class="cleaner"></div>
								</div>
								</div>
								</div>
							
  <div class="col-md-6">
  <div class="panel widget">
    <div class="panel-heading vd_bg-grey">
    
      <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Emergency Contact Details</h3>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="#" role="form">
        <div class="form-group">
          <label style="float:left" class="col-sm-4">Name:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
          <input id="ename" name="ename" class="in_field" placeholder="" type="text"  onkeyup="validatealp(\'ename\')">
          </div>
        </div>
  
  
         <div class="form-group">
          <label style="float:left" class="col-sm-4">Phone:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
          <input id="ephone" name="dob" class="in_field" placeholder="" type="text"  onkeyup="validatenum(\'ephone\')">
          </div>
        </div>
  
         <div class="form-group">
          <label style="float:left" class="col-sm-4">Postal Address:<span style="color:#f00">*</span></label>
          <div class="col-sm-8 controls">
          <input id="epostal" name="dob" class="in_field" placeholder="" type="text"  onkeyup="validatealp(\'fname\')">
          </div>
        </div>
       
  
  
      
  </form>
    </div>
  </div>
  <!-- Panel Widget --> 
  
  
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Medical  Details</h3>
  </div>
  <div class="panel-body">
  <div class="form-group">
  <label style="float:left" class="col-sm-4">B.Group:</label>
  <div class="col-sm-8 controls">
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
          </div>
          
           <div class="form-group">
  <label style="float:left" class="col-sm-4">Known Health Problems/Alergies:<span style="color:#f00">*</span></label>
  <div class="col-sm-8 controls">
      
          
  <textarea class="textarea" id="alergy">'.stripslashes($rowx['alergy']).'</textarea>
          
  
          </div>
          </div>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> EMERGENCY CONTACT DETAILS</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div class="form-group">
        <label style="float:left" class="col-sm-4">Name:<span style="color:#f00">*</span></label>
  
        <div class="col-sm-8 controls">
      <input id="ename" name="ename" class="in_field" placeholder=""  value="'.stripslashes($rowx['ename']).'" type="text"  onkeyup="validatealp(\'ename\')">>
        </div>
      
      </div>
  
              
  </form>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  
  
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Experience Details</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div class="form-group">
        <label style="float:left" class="col-sm-4">Experience:<span style="color:#f00">*</span></label>
  
        <div class="col-sm-8 controls">
        <select id="experience"  class="combos">
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
      
      </div>
  
              
  </form>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Payslip Details</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div class="form-group">
        <label style="float:left" class="col-sm-4">Bank:<span style="color:#f00">*</span></label>
  
        <div class="col-sm-8 controls">
        <select id="bank"  class="combos">
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
      
      </div>
      
      <div class="form-group">
      <label style="float:left" class="col-sm-4">Branch Name:<span style="color:#f00">*</span></label>
      <div class="col-sm-8 controls">
      <input type="text" id="branchname" name="field" class="in_field" value="'.stripslashes($rowx['branchname']).'" /> 
      </div>
    </div>
  
     <div class="form-group">
      <label style="float:left" class="col-sm-4">EFT Code:<span style="color:#f00">*</span></label>
      <div class="col-sm-8 controls">
      <input type="text" id="eftcode" name="field" class="in_field" value="'.stripslashes($rowx['eftcode']).'" /> 
      </div>
    </div>
    <div class="form-group">
    <label style="float:left" class="col-sm-4">A/C No:<span style="color:#f00">*</span></label>
    <div class="col-sm-8 controls">
    <input type="text" id="acno" name="field" class="in_field" value="'.stripslashes($rowx['acno']).'" /> 
    </div>
  </div>
  
  <div class="form-group">
  <label style="float:left" class="col-sm-4">Pin No:<span style="color:#f00">*</span></label>
  <div class="col-sm-8 controls">
  <input type="text" id="pinno" name="field" class="in_field" value="'.stripslashes($rowx['no']).'" /> 
  </div>
  </div>
  
     <div class="form-group">
      <label style="float:left" class="col-sm-4">NHIF No:<span style="color:#f00">*</span></label>
      <div class="col-sm-8 controls">
      <input type="text" id="nhif" name="field" class="in_field" value="'.stripslashes($rowx['nhif']).'" /> 
      </div>
    </div>
  
     <div class="form-group">
      <label style="float:left" class="col-sm-4">NSSF No:<span style="color:#f00">*</span></label>
      <div class="col-sm-8 controls">
      <input type="text" id="nssf" name="field" class="in_field" value="'.stripslashes($rowx['nssf']).'" /> 
      </div>
    </div>
  
  
  
              
  </form>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span> Skills:</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div class="form-group">
        <label style="float:left" class="col-sm-4">Skills:<span style="color:#f00">*</span></label>
  
        <div class="col-sm-8 controls">
        <input style=" text-transform:uppercase" type="text" id="skill" name="field" class="in_field" placeholder="Type a Skill Press and Enter..."/> 
        
       
        </div>
      
      </div>
  
              
  </form>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  <div class="panel widget">
  <div class="panel-heading vd_bg-grey">
  
    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-th-list"></i> </span>Hobbies:</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="#" role="form">
      <div class="form-group">
        <label style="float:left" class="col-sm-4">Hobbies:<span style="color:#f00">*</span></label>
  
        <div class="col-sm-8 controls">
        <input type="text" id="hobby" name="field" class="in_field" placeholder="Type a Hobby Press and Enter..."/> 	
          </div>
      
      </div>
  
              
  </form>
  </div>
  </div>
  <!-- Panel Widget --> 
  
  
  
  
  
  
  </div>
  <!-- col-md-6 --> 
  
  
  
  </div>
  <!-- col-md-6 --> 
  
  
  
  
  
       <div class="col-md-6">
      <div class="panel widget">
      
        <div class="panel-body">
      
  
       <div class="form-group form-actions">
          <div class="col-sm-4"> </div>
          <div class="col-sm-7">
            <button class="btn vd_btn vd_bg-green vd_white" type="button" onclick="addnewemp(1)"><i class="icon-ok"></i> Save</button>
            <button class="btn vd_btn" type="button" onclick="hidenewstude()">Cancel</button>
            <div id="message" style="width:40px;height:40px;float:right"></div>
          </div>
        </div>
  
  
        </div>
      </div>
      <!-- Panel Widget --> 
    </div>
    <!-- col-md-12 -->
  
  
  
  
  
  </div>
  <!-- row --> 
    </div>
  
  
  
  
  </div>
  <!-- .vd_content-section --> 
  
  </div>
  <!-- .vd_content --> 
  </div>
  <!-- .vd_container --> ';
  
  echo "<script>  $( '#datepicker-normal' ).datepicker({ dateFormat: 'dd/mm/yy'}); $( '#datepicker-date' ).datepicker({ dateFormat: 'dd'});$( '#pendate' ).datepicker({ dateFormat: 'dd'});$( '#waivermonth' ).datepicker({ dateFormat: 'mm_yy'}); </script>";
  
  
  break;
  ?>