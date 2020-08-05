<?php include('db_fns.php');
/*
ini_set("include_path", '/home/weclines/php:' . ini_get("include_path") );
require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge
*/

include('functions.php');

if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

function getstamp($rdate){

						$x=substr($rdate,0,2);
						$y=substr($rdate,3,2);
						$z=substr($rdate,6,4);
						$rdate=$z.$y.$x;
						return $rdate;
}
 
 $id=$_GET['id'];
 switch($id){
	 
	case 1:
	
							
							$a=$_GET['a'];
							$emp=$_GET['emp'];
							
							
							
							if(isset($_SESSION['lan'])){
								$languages=implode(";",$_SESSION['lan']);
							}else $languages=NULL;
							if(isset($_SESSION['skl'])){
								$skills=implode(";",$_SESSION['skl']);
							}else $skills=NULL;
							if(isset($_SESSION['hobby'])){
								$hobbies=implode(";",$_SESSION['hobby']);
							}else $hobbies=NULL;
							if(isset($_SESSION['exp'])){
								$experience=implode(";",$_SESSION['exp']);
							}else $experience=NULL;
							if(isset($_SESSION['edu'])){
								$education=implode(";",$_SESSION['edu']);
							}else $education=NULL;
							
						
							if($a==1){
								
							$result =mysql_query("select * from employee where emp='".$emp."' or biomid='".$biomid."'");
							$num_results = mysql_num_rows($result);
									if($num_results>=1){
										echo"
												<script>
												$().customAlert();
												alert('Error!', '<p>Employee No/Biometric Id already exists in the database</p>');
												e.preventDefault();
												</script>";
										exit;
							}
							
							$resulta = mysql_query("insert into employee values('0','".$_GET['emp']."','".strtoupper($_GET['fname'])."','".strtoupper($_GET['mname'])."','".strtoupper($_GET['lname'])."','".strtoupper($_GET['dob'])."','".strtoupper($_GET['mar'])."','".strtoupper($languages)."','".strtoupper($_GET['gender'])."','".strtoupper($_GET['idno'])."','".strtoupper($_GET['phone'])."','".strtoupper($_GET['phone2'])."','".strtoupper($_GET['email'])."',
							'".strtoupper($_GET['phy'])."','".strtoupper($_GET['town'])."','".strtoupper($_GET['sal'])."','".$_GET['empcateg']."','".strtoupper($_GET['emptype'])."','".strtoupper($_GET['contfrom'])."','".strtoupper($_GET['contto'])."','".strtoupper($_GET['dept'])."','".strtoupper($_GET['branch'])."','".strtoupper($_GET['pos'])."','".mysql_real_escape_string(trim($_GET['jobdesc']))."','".$_GET['bgroup']."','".mysql_real_escape_string(trim($_GET['alergy']))."','".$_GET['ename']."','".$_GET['ephone']."','".$_GET['epostal']."','".$_GET['bid']."','".strtoupper($_GET['bname'])."','".strtoupper($_GET['branchname'])."','".strtoupper($_GET['eftcode'])."','".$_GET['acno']."','".$_GET['pinno']."','".$_GET['nssf']."','".$_GET['nhif']."','".strtoupper($education)."','".strtoupper($experience)."','".strtoupper($skills)."','".strtoupper($hobbies)."','images/employees/".$emp.".jpg','0','0','".$_GET['doe']."','','','".date('Ymd')."','".date('d/m/Y')."',1,'0','".$_GET['clearance']."',0,'".getstamp($_GET['doe'])."','".$_GET['biomid']."')") or die (mysql_error());
							
							$fnames=strtoupper($_GET['fname']). ' '.strtoupper($_GET['mname']).' '.strtoupper($_GET['lname']);
							$cur=date('m_Y');
							$resultb = mysql_query("insert into attendance  values('0','".$cur."','".$_GET['emp']."','".strtoupper($_GET['branch'])."','".$fnames."','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')") or die (mysql_error());
							
							}
							
							
							else{


								$result =mysql_query("select * from employee where emp!='".$emp."' and biomid='".$_GET['biomid']."'");
								$num_results = mysql_num_rows($result);
									if($num_results>=1){
										echo"
												<script>
												$().customAlert();
												alert('Error!', '<p>Employee No/Biometric Id already exists in the database</p>');
												e.preventDefault();
												</script>";
										exit;
								}


								
							$resulta = mysql_query("update employee set fname='".strtoupper($_GET['fname'])."',mname='".strtoupper($_GET['mname'])."',lname='".strtoupper($_GET['lname'])."',dob='".strtoupper($_GET['dob'])."',marital='".strtoupper($_GET['mar'])."',languages='".strtoupper($languages)."',gender='".strtoupper($_GET['gender'])."',idno='".strtoupper($_GET['idno'])."',phone='".strtoupper($_GET['phone'])."',phone2='".strtoupper($_GET['phone2'])."',email='".strtoupper($_GET['email'])."',phyadd='".strtoupper($_GET['phy'])."',town='".strtoupper($_GET['town'])."',salary='".strtoupper($_GET['sal'])."',empcateg='".$_GET['empcateg']."',emptype='".strtoupper($_GET['emptype'])."',contractfrom='".strtoupper($_GET['contfrom'])."',contractto='".strtoupper($_GET['contto'])."',dept='".strtoupper($_GET['dept'])."',branch='".strtoupper($_GET['branch'])."',position='".strtoupper($_GET['pos'])."',jobdesc='".mysql_real_escape_string(trim($_GET['jobdesc']))."',bgroup='".strtoupper($_GET['bgroup'])."',alergy='".mysql_real_escape_string(trim($_GET['alergy']))."',ename='".strtoupper($_GET['ename'])."',ephone='".strtoupper($_GET['ephone'])."',epostal='".strtoupper($_GET['epostal'])."',bid='".strtoupper($_GET['bid'])."',bname='".strtoupper($_GET['bname'])."',branchname='".strtoupper($_GET['branchname'])."',eftcode='".strtoupper($_GET['eftcode'])."',acno='".strtoupper($_GET['acno'])."',pinno='".strtoupper($_GET['pinno'])."',nssf='".strtoupper($_GET['nssf'])."',nhif='".strtoupper($_GET['nhif'])."',education='".strtoupper($education)."',experience='".strtoupper($experience)."',skills='".strtoupper($skills)."',hobbies='".strtoupper($hobbies)."',employdate='".strtoupper($_GET['doe'])."',clearance='".strtoupper($_GET['clearance'])."',doestamp='".getstamp($_GET['doe'])."',biomid='".$_GET['biomid']."' where emp='".$emp."'");
							$resultb =mysql_query("select * from payroll where status=1 and emp='".$emp."' order by serial desc limit 0,1");
							$row=mysql_fetch_array($resultb);
							$serial=stripslashes($row['serial']);
							$resultc = mysql_query("update payroll set bid='".strtoupper($_GET['bid'])."',bname='".strtoupper($_GET['bname'])."',acno='".strtoupper($_GET['acno'])."' where serial='".$serial."'");
								
							}
							
									if($resulta){
$resulta = mysql_query("insert into log values('0','".$username." inserts data into Employee database.PF No:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
									echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									if($a==1){
										echo'<script>setTimeout(function() {newemp();},500);</script>';
                                        }else{

                                        	echo'<script>setTimeout(function() {seeemp(5);},500);</script>';

                                        }
										exit;
									}
									else{
										echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';
										
									}
							
							break;
							
				case 2:
				$resulta = mysql_query("update documents set name='".$_GET['name']."',filedesc='".$_GET['desc']."' where id='".$_GET['param']."'");
					if($resulta){
$resulta = mysql_query("insert into log values('0','".$username." updates document info .ID:".$_GET['param']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
				break;
				
				case 3:
				$param=$_GET['param'];
				$resultd =mysql_query("select * from documents where id='".$param."'");
				$rowd=mysql_fetch_array($resultd);
				$image=stripslashes($rowd['image']);
				$base_directory = 'upload/'.$image.'';
				if(unlink($base_directory)){
					$result = mysql_query("DELETE from documents where id='".$param."'");
					$resulta = mysql_query("insert into log values('0','".$username." deletes document.Name:".stripslashes($rowd['name'])."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
   					echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>4
					<script>$("#photo'.$param.'").hide();
					hidediv();</script>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				break;
				
				case 4:
				$a=$_GET['a'];
				$b=$_GET['b'];
				$stamp=$_GET['sdate'];
				$x=substr($stamp,0,2);
				$y=substr($stamp,3,2);
				$z=substr($stamp,6,4);
				$stamp=$z.$y.$x;
				
				if($_GET['remind']==1){
					
						$rdate=$_GET['rdate'];
						$x=substr($rdate,0,2);
						$y=substr($rdate,3,2);
						$z=substr($rdate,6,4);
						$rdate=$z.$y.$x;
						
						$rtime=$_GET['rtime'];
						$x=substr($rtime,0,2);
						$y=substr($rtime,3,2);
						$z=substr($rtime,5,2);
						if($z=='pm'){$k=12;}else{$k=0;}
						$x=$x+$k;
						$rtime=$x.$y;
						
						$remstamp=$rdate.$rtime;

					
				}else{$remstamp='';}
				if($a==1){
				$resulta = mysql_query("insert into mytasks values('0','".$_GET['subject']."','".$_GET['category']."','".$_GET['status']."','".$_GET['priority']."','".$_GET['sdate']."','".$_GET['stime']."','".$_GET['remind']."','".$_GET['rdate']."','".$_GET['rtime']."','".$remstamp."','".$_GET['notes']."',1,'".$username."','".$stamp."')") or die (mysql_error());	
					
				}else{
				$resulta = mysql_query("update mytasks set Reason='".$_GET['subject']."',TaskStatus='".$_GET['status']."',Category='".$_GET['category']."',Priority='".$_GET['priority']."',StartDate='".$_GET['sdate']."',StartTime='".$_GET['stime']."',ReminderStatus='".$_GET['remind']."',ReminderDate='".$_GET['rdate']."',ReminderTime='".$_GET['rtime']."',ReminderStamp='".$remstamp."',Notes='".$_GET['notes']."',Stamp='".$stamp."' where Event_id='".$_GET['b']."'");
						
				}
				if($resulta){
$resulta = mysql_query("insert into log values('0','".$username." updates Mytasks info','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
				break;
				
				case 5:
				$resulta = mysql_query("update employee set terminationdate='".$_GET['dot']."',terminationreason='".$_GET['reason']."',status=0 where emp='".$_GET['emp']."'");
					if($resulta){
$resulta = mysql_query("insert into log values('0','".$username." terminates employment .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
				break;

				case 5.1:

					$resulta = mysql_query("insert into discipline  values('0','".$_GET['emp']."','".$_GET['measure']."','".$_GET['reason']."','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
					if($_GET['measure']=='Suspension without Pay'){
					$resulta = mysql_query("insert into suspended  values('0','".$_GET['emp']."')") or die (mysql_error());
					}		
					if($resulta){
$resulta = mysql_query("insert into log values('0','".$username." disciplines employee .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
				break;

				case 5.2:

					$resulta = mysql_query("DELETE from suspended where emp='".$_GET['emp']."'");		
					if($resulta){
					$resulta = mysql_query("insert into log values('0','".$username." reinstates employee .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>
									$().customAlert();
									alert('Success!', '<p>Employee reinstated.</p>');
									e.preventDefault();
									</script>";	
									exit;
									}
									else{
										echo"<script>
									$().customAlert();
									alert('Error!', '<p>Please try again.</p>');
									e.preventDefault();
									</script>";	}
				
				break;
				
				case 6:
				$emp=$_GET['emp'];
				$leavetype=$_GET['leavetype'];
				$leavestat=$_GET['leavestat'];

				$arr=array();
				$result =mysql_query("select * from holidays");
				$num_results = mysql_num_rows($result);	
				for ($i=0; $i <$num_results; $i++) {
				$row=mysql_fetch_array($result);
				$arr[]=stampreverse(stripslashes($row['date']));
				}



				$result =mysql_query("select * from employee where emp='".$emp."' and status=1");
				$num_results = mysql_num_rows($result);
				if($num_results==0){
						echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  The PF No. entered is incorrect</div>
					  </div>';
					  exit;
				}

				$row=mysql_fetch_array($result);
				$leaveac=stripslashes($row['leaveac']);
				$sickac=stripslashes($row['sickac']);
				$from=getstamp($_GET['from']);
				$to=getstamp($_GET['to']);
				$days=$_GET['days'];
				
				//check if person has another leave
				$resultx =mysql_query("select * from leaves where emp='".$emp."' and status!=1 and ((".$from.">=commstamp and ".$from."<=endstamp) or (".$to.">=commstamp and ".$to."<=endstamp))");
				$num_resultsx = mysql_num_rows($resultx);
				if($num_resultsx>0){

						/*
						echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  Another Leave application under your name exists in the selected period/dates!</div>
					  </div>';
					  exit;
					  */
				}

				
				
				//get diff days

				$diff=datediff($from,$to);
				$diff+=1;

				
				

				//check for saturdays,sundays and holidays
				$newdate=$from;



				while($newdate<=$to){

					 //weekends
				     
				     $date=datereverse2($newdate);
					 $off=isWeekend($date);
					 $diff-=$off;



				     //holidays
				     foreach ($arr as $key => $val) {

				     if($newdate==$val){
				     	//confirm if its weekend
				     	$date=datereverse2($newdate);
				     	$off=isWeekend($date);
					 	if($off==0){$off=1;}else{$off=0;}
					 	$diff-=$off;
				     }

				     }

				     $newdate = new DateTime($newdate);
				     $newdate->modify('+1day');
				     $newdate= $newdate->format('Ymd');

				}

				

				if($diff>=0.5){
					//greater than holiday
					if($leavestat==0.5){$diff=0.5;}
					//full day and not equal to weekend
					if($leavestat==1){$diff=1;}

				}

				

				
				if($leaveac<$diff&&$leavetype=='Annual'){
						echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						   Leave application not succesful. You only have '.$leaveac.' days left in your Annual leave account.</div>
					  </div>';
					  exit;
				}

				else if($sickac<$diff&&$leavetype=='Sick'){
						echo '<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						   Leave application not succesful. You only have '.$sickac.' days left in your Sick Leave account.</div>
					  </div>';
					  exit;
				}


				$empname=$name=stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']);
				$resulta = mysql_query("insert into leaves values('0','".$_GET['emp']."','".$name."','".stripslashes($row['branch'])."','".stripslashes($row['position'])."','".$_GET['from']."','".$_GET['to']."','".$diff."','".mysql_real_escape_string(trim($_GET['shadow']))."','".mysql_real_escape_string(trim($_GET['reason']))."','".date('d/m/Y')."','".date('Ymd')."',0,'".$username."','".getstamp($_GET['from'])."','".getstamp($_GET['to'])."','".$_GET['leavetype']."')") or die (mysql_error());
					
					if($resulta){

									$resulta =mysql_query("select * from users where position='HRM' or  position='Admin' OR position='HOD' OR position='HROfficer'");
									$num_resultsa = mysql_num_rows($resulta);	
									for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);  
										$message="Employee-PF No:".$_GET['emp']." (".$empname.") has requested for a ".$diff." day(s) ".$leavetype." leave  Commencing on ".stamptodate($from)." and ending on ".stamptodate($to).".";
										$resultb = mysql_query("insert into messages values('0','".stripslashes($rowa['name'])."','System','".$message."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
										$email=stripslashes($rowa['email']);
										if($email!=''){
											sendemail($email,$message,$empname);	
										}
										
									}
				
				$resulta = mysql_query("insert into log values('0','".$username." makes a leave application .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  Leave application  succesful.</div>
					  </div>';
									exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
				break;
				case 7:
				
				
				
				$lid=$_GET['a'];
				$result =mysql_query("select * from leaves where id='".$lid."'");
				$row=mysql_fetch_array($result);
				$emp=stripslashes($row['emp']);
				$cdate=stripslashes($row['commencedate']);
				$days=stripslashes($row['days']);
				$leavetype=stripslashes($row['leavetype']);
				$empname=stripslashes($row['name']);
				$month=substr($row['commencedate'],3,2).'_'.substr($row['commencedate'],6,4);
				$description='Leave Application: '.$leavetype.' ('.stripslashes($row['reason']).')';
				$resultb =mysql_query("select * from employee where emp='".$emp."'");
				$rowb=mysql_fetch_array($resultb);
				$leave=stripslashes($rowb['leaveac']);
				$sickac=stripslashes($rowb['sickac']);
				
				$action=$_GET['action'];
				if($action=='Approve'){
				$stat=2;$x='approved';
				}
				else{$stat=1;$x='denied';}


				if($action=='Approve'){

					$leaveb=0;
					if($leavetype=='Annual'){
					$leaveb=$leave=$leave-$days;	
					}
					else if($leavetype=='Sick'){
					$leaveb=$sickac=$sickac-$days;	
					}

					//into leavetrack

					$resulty = mysql_query("insert into leavetrack values('0','".$leavetype."','".$emp."','".$empname."','".$month."','".$days."','".$leaveb."','cr','".$description."','".$cdate."','".stampreverse($cdate)."',1)") or die (mysql_error());
				


				}
				
				$result =mysql_query("select * from users where pfno='".$emp."'");
				$row=mysql_fetch_array($result);
				$user=stripslashes($row['name']);
				
				$resulta = mysql_query("update leaves set status='".$stat."' where id='".$_GET['a']."'");
				
				
				$resultm = mysql_query("update employee set leaveac='".$leave."',sickac='".$sickac."' where emp='".$emp."'");	
			
				if($resulta){

				$resulta = mysql_query("insert into log values('0','".$username." authorizes leave .ID No:".$_GET['a']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				$resultb = mysql_query("insert into messages values('0','".$user."','System','Your Leave Request Commencing on ".$cdate." has been ".$x."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
				exit;
				}
								
				
				break;

				case 8:
				$rdate=$_GET['tdate'];
				$stamp=getstamp($rdate);
				$action=$_GET['action'];
				$aid=$_GET['a'];
				
				$x=substr($rdate,0,2);
				$y=substr($rdate,3,2);
				$z=substr($rdate,6,4);
				
				$mon=$y.'_'.$z;
				$k=$x.'c';
				
				$result =mysql_query("select * from attendance where id='".$aid."'");
				$row=mysql_fetch_array($result);
				$pfno=stripslashes($row['pfno']);

				
				
				//check if leave is valid
				
				if($action==2){
				
					
				$result =mysql_query("select * from leaves where endstamp>='".$stamp."' and emp='".$pfno."' and status=2");
				$num_results = mysql_num_rows($result);	
				if($num_results==0){
					echo 0;
					$action=0;
				  }
				}
				
					
				if($action==3){
					
				$q=0;

				$result =mysql_query("select * from employee where emp='".$pfno."' limit 0,1");
				$row=mysql_fetch_array($result);
				$sickac=stripslashes($row['sickac']);

				$resultx =mysql_query("select * from attendance where pfno='".$pfno."' and month LIKE '%".date('Y')."%'");
				$num_resultsx = mysql_num_rows($resultx);	
				for ($x=0; $x <$num_resultsx; $x++) {
				$rowx=mysql_fetch_array($resultx);
				$rid=stripslashes($rowx['id']);
				$result =mysql_query("select * from attendance where id='".$aid."'");
				$row=mysql_fetch_array($result);
					
					for ($i=1; $i <32; $i++) {
								$d=sprintf("%02d",$i);
								$d=$d.'c';
								if(stripslashes($row[$d])==3){
									$q++;
								}
					}

				}				
					if($q>=7){
					echo 0;
				  	$action=0;	
					}else{
						$sickac-=1;
						$resultx = mysql_query("update employee set sickac='".$sickac."' where emp='".$pfno."'");	
					}
				}//end case 3 if
				
				
				
				
				$resulta = mysql_query("update  attendance set ".$k."='".$action."' where id='".$_GET['a']."'");
				
				$resultb =mysql_query("select * from employee where emp='".$pfno."'");
				$rowb=mysql_fetch_array($resultb);
				$att=stripslashes($rowb['attendance']);
				$tot=stripslashes($rowb['totattendance']);
				
				if($action==0){
					$tot=$tot+1;
					
				}
				else if($action==5){
					$tot=$tot+1;
					$att=$att+0.5;
				}
				else{
					$tot=$tot+1;
					$att=$att+1;
				}
				
				
				$resultn = mysql_query("update employee set attendance='".$att."',totattendance='".$tot."' where emp='".$pfno."'");	
				
				break;
				
				case 9:
							$mon=$_GET['mon'];
							$resultb =mysql_query("select * from branchtbl limit 0,1");
							$rowb=mysql_fetch_array($resultb);
							$branch=stripslashes($rowb['name']);

							$query =mysql_query("select * from salregister where month='".$mon."'");
							$count = mysql_num_rows($query);
							if($count>0){
							echo"<script>
							$().customAlert();
							alert('Error!', '<p>Payroll for the Month thas already been created.</p>');
							e.preventDefault();
							</script>";	
								exit;
							}
						else{
							
								
								$aa=substr($mon,0,2);
								$bb=substr($mon,3,4);
								$monstamp=$bb.$aa;
									
									
								$resultb =mysql_query("select * from employee where status=1 order by emp");
								$num_results = mysql_num_rows($resultb);
								for ($i=0; $i <$num_results; $i++) {
								$rowb=mysql_fetch_array($resultb);
								$emp=stripslashes($rowb['emp']);
								$leave=stripslashes($rowb['leaveac']);
								$mainsalary=stripslashes($rowb['salary']);
								$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	


								//check if employeee is on suspended leave

									$query =mysql_query("select * from suspended where emp='".$emp."'");
									$count = mysql_num_rows($query);
									if($count==0){
										/*
										$q=0;
										$resultx =mysql_query("select * from attendance where pfno='".$emp."' and month='".$mon."'");
										$rowx=mysql_fetch_array($resultx);
					
										for ($x=1; $x<32; $x++) {
													$d=sprintf("%02d",$x);
													$d=$d.'c';
													if(stripslashes($rowx[$d])==1||stripslashes($rowx[$d])==2||stripslashes($rowx[$d])==3){
														$q++;
													}
										}
										*/

										//ignore attendance
										$q=30;
								
								
										$result =mysql_query("select * from payroll where status=1 and emp='".$emp."' and monstamp<'".$monstamp."' order by monstamp desc limit 0,1");
										$row=mysql_fetch_array($result);
										$resultc = mysql_query("insert into payroll values('0','".$mon."','".$emp."','".$names."','".stripslashes($rowb['dept'])."','".stripslashes($rowb['branch'])."','".$mainsalary."','".stripslashes($row['hallow'])."','','','".stripslashes($row['car'])."','','','','','','','','','".stripslashes($row['insamount'])."','".stripslashes($row['insrelief'])."','','','','','','','','".stripslashes($row['helb'])."','".stripslashes($row['pfund'])."','','','','','','',0,'".stripslashes($rowb['bid'])."','".stripslashes($rowb['bname'])."','".stripslashes($rowb['branchname'])."','".stripslashes($rowb['eftcode'])."','".stripslashes($rowb['acno'])."','".$q."','".$monstamp."')");

										

									}//end if


								}//end for loop
									if($result){
									$resulta = mysql_query("insert into log values('0','".$username." adds new payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									$result = mysql_query("insert into salregister values('".$mon."','".$branch."','".date('d/m/Y')."','".date('Ymd')."','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',1,'".$monstamp."')");
									
									


									echo "<script>
									payroll('".$mon."');
									</script>";
									exit;
									}
									else{
									echo "<script>
									$().customAlert();
									alert('Error!', '<p>Payroll not Created</p>');
									e.preventDefault();
									</script>";
									exit;
										}
										
									}
							break;
							
							
							case 10:
							$sal=$_GET['sal'];if($sal==''){$sal=0;}
							$emp=$_GET['emp'];
							$mon=$_GET['mon'];
							$rateot=$_GET['rate'];
							$days=30;
							$hallow=$_GET['hallow'];if($hallow==''){$hallow=0;}
							$cash=$_GET['cash'];if($cash==''){$cash=0;}
							$airtime=$_GET['airtime'];if($airtime==''){$airtime=0;}
							$car=$_GET['car'];if($car==''){$car=0;}
							$leave=$_GET['leave'];if($leave==''){$leave=0;}
							$insamount=$_GET['insamount'];if($insamount==''){$insamount=0;}
							$bonus=$_GET['bonus'];if($bonus==''){$bonus=0;}
							$thirteen=$_GET['thirteen'];if($thirteen==''){$thirteen=0;}
							$notice=$_GET['notice'];if($notice==''){$notice=0;}

							$sacco=$_GET['sacco'];if($sacco==''){$sacco=0;}
							$loans=$_GET['loans'];if($loans==''){$loans=0;}
							$medical=$_GET['medical'];if($medical==''){$medical=0;}
							$others=$_GET['others'];if($others==''){$others=0;}
							$adva=$_GET['adva'];if($adva==''){$adva=0;}
							$helb=$_GET['helb'];if($helb==''){$helb=0;}
							$othrs=$_GET['othrs'];if($othrs==''){$othrs=0;}
							$date= date('m_Y');
							$pf=$_GET['pfund'];
							$taxfigure=$_GET['tax'];

							$resultb =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
							$rowb=mysql_fetch_array($resultb);
							$empcateg=stripslashes($rowb['empcateg']);
							$doestamp=stripslashes($rowb['stamp']);

							if($pf<20000){$pfund=0.1*$sal;}else{$pfund=$_GET['pfund'];}

							//if($pfund>20000){$pfund=20000;}

							
							if($pf=='-'){$pfund=0;}

							//check if employee qualifies for pension fund
							 $next=date('Y-m-d', strtotime('-1 year')) ;
							 $next=preg_replace('~-~', '', $next);
							 if($doestamp>$next){
							 	$pfund=0;
							 }

							//calculate  overtime
							$totalot=$othrs*$rateot;
							
							//calculate gross income
							
							

							//calculate attendance deductions
							
							
							$q=0;
							$resultx =mysql_query("select * from attendance where pfno='".$emp."' and month='".$mon."'");
							$rowx=mysql_fetch_array($resultx);
							$totdays=cal_days_in_month(CAL_GREGORIAN, ''.substr($mon,0,2).'', ''.substr($mon,3,4).''); 

				
							for ($x=1; $x<=$totdays; $x++) {
										$d=sprintf("%02d",$x);
										$d=$d.'c';
										if(stripslashes($rowx[$d])==0){$q+=1;}
										if(stripslashes($rowx[$d])==5){$q+=0.5;}

							}

							//deduction
							$others=$sal*$q/$totdays;
							$others=round($others,0);
							//no deduction
							$others=0;
							
							
							
							$gross=$sal+$hallow+$totalot+$cash+$airtime+$car+$leave+$bonus+$thirteen+$notice;
							$nonpayables=$car+$airtime;
							//calculate nssf
							/*
							$resulta =mysql_query("select * from nssf where id=1");
							$rowa=mysql_fetch_array($resulta);
							$pnssf=stripslashes($rowa['amount']);
							
							if($gross<6000){$nssf=0;}
							else if($gross>=6000&&$gross<=18000){
								$nssf=$pnssf*$gross/100;
							}
							else if($gross>18000){$nssf=1080;}
							else{$nssf=0;}
							*/

							

							$nssf=200;
							if($empcateg=='NIL_NSSF'){$nssf=0;}
							$insrelief=0.15*$insamount;

							$taxpfund=$pfund+$nssf;
							if($taxpfund>20000){
								$taxpfund=20000;
							}
							
							//emp details

							
							
							
							
							//deduct nssf
							$net=$taxable=$taxnet=$gross-$taxpfund;

							//calculate nhif
							$resulta =mysql_query("select * from nhif where ".$gross.">=lower and ".$gross."<=upper");
							$rowa=mysql_fetch_array($resulta);
							$nhif=stripslashes($rowa['amount']);
							
							
						
							//calculate tax
							
							
							$resultx =mysql_query("select * from tax where id=1");
							$rowx=mysql_fetch_array($resultx);
							$u1=stripslashes($rowx['upper']);//10164
							$t1=stripslashes($rowx['tax']);//0
							
							$resultx =mysql_query("select * from tax where id=2");
							$rowx=mysql_fetch_array($resultx);
							$l2=stripslashes($rowx['lower']);//10164
							$u2=stripslashes($rowx['upper']);//19740
							$t2=stripslashes($rowx['tax']);//15
							
							$resultx =mysql_query("select * from tax where id=3");
							$rowx=mysql_fetch_array($resultx);
							$l3=stripslashes($rowx['lower']);
							$u3=stripslashes($rowx['upper']);
							$t3=stripslashes($rowx['tax']);
							
							$resultx =mysql_query("select * from tax where id=4");
							$rowx=mysql_fetch_array($resultx);
							$l4=stripslashes($rowx['lower']);
							$u4=stripslashes($rowx['upper']);
							$t4=stripslashes($rowx['tax']);
							
							$resultx =mysql_query("select * from tax where id=5");
							$rowx=mysql_fetch_array($resultx);
							$l5=stripslashes($rowx['lower']);
							$t5=stripslashes($rowx['tax']);
							
							
							
							
							$tax=0;$a=0;
						
							if($taxnet<=$u1){
							$tax+=$t1*$taxnet;
							}
								
							else if(($taxnet>=$l2)&&($taxnet<=$u2)){
							$tax+=$t1*$u1;
							$taxnet-=$u1;
							$a=$taxnet*$t2;
							$tax+=$a;
							
							}
							
							else if(($l3<=$taxnet&&$taxnet<=$u3)){
							$tax+=$t1*$u1;
							$tax+=$t2*($u2-$u1);
							$taxnet-=$u2;
							$a=$taxnet*$t3;
							$tax+=$a;
							}
							
							else if(($l4<=$taxnet&&$taxnet<=$u4)){
							$tax+=$t1*$u1;
							$tax+=$t2*($u2-$u1);
							$tax+=$t3*($u3-$u2);
							$taxnet-=$u3;
							$a=$taxnet*$t4;
							$tax+=$a;
							}
							
							else if(($taxnet>=$l5)){
							$tax+=$t1*$u1;
							$tax+=$t2*($u2-$u1);
							$tax+=$t3*($u3-$u2);
							$tax+=$t4*($u4-$u3);
							$taxnet-=$u4;
							$a=$taxnet*$t5;
							$tax+=$a;
							}
							else{}


							
							//minimum tax factor
							if($taxable<=24000){
								$tax=0;
							}


							//relief
							if($tax>2400){
							$relief=2400;
							}else {$relief=0;}

							$paye=$tax-$relief-$insrelief;

							$tax=round($tax,2);
							$paye=round($paye,2);

							$totalded=$nssf+$nhif+$adva+$paye+$helb+$pfund+$sacco+$loans+$medical+$others;
							//deduct nhif,tax,deductions,insurance,advance,scont,sloan
							if($empcateg=='NIL_PAYE'){
								//tax housing factor
								$totalded=$totalded-$paye;
								$paye=$paye*1.429;
							}



							$net=$gross-$totalded-$nonpayables;
							$net=round($net,0);

							

							
							$resulta = mysql_query("update payroll set sal='".$sal."',hallow='".$hallow."',cash='".$cash."',car='".$car."',airtime='".$airtime."',leaveallow='".$leave."',bonus='".$bonus."',thirteen='".$thirteen."',notice='".$notice."',insamount='".$insamount."',insrelief='".$insrelief."',rateot='".$rateot."',othrs='".$othrs."',totalot='".$totalot."',gross='".$gross."',taxablepay='".$taxable."',tax='".$tax."',relief='".$relief."',paye='".$paye."',adva='".$adva."',nhif='".$nhif."',nssf='".$nssf."',helb='".$helb."',pfund='".$pfund."',net='".$net."',sacco='".$sacco."',loans='".$loans."',medical='".$medical."',otherdeds='".$others."',totalded='".$totalded."', status=1 where emp='".$emp."' and month='".$mon."'") or die (mysql_error());
							
							if($resulta){
							$resulta = mysql_query("insert into log values('0','".$username." edits payroll.Month:".$mon.";Emp id:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<script>
							$('#sal' + '".$emp."').val('".$sal."');
							$('#nhif' + '".$emp."').val('".$nhif."');
							$('#nssf' + '".$emp."').val('".$nssf."');
							$('#tax' + '".$emp."').val('".$tax."');   
							$('#gross' + '".$emp."').val('".$gross."');  
							$('#insrelief' + '".$emp."').val('".$insrelief."');
							$('#taxable' + '".$emp."').val('".$taxable."');  
							$('#relief' + '".$emp."').val('".$relief."');
							$('#pfund' + '".$emp."').val('".$pfund."');
							$('#paye' + '".$emp."').val('".$paye."');  
							$('#rate' + '".$emp."').val('".$rateot."');
							$('#ot' + '".$emp."').val('".$totalot."');
							$('#others' + '".$emp."').val('".$others."');
							$('#net' + '".$emp."').val('".number_format($net)."');
							$('#totalded' + '".$emp."').val('".number_format($totalded)."');
							</script>";
									echo'<img src="images/tick.png"  width="22" height="22"/>';
									
									}
								else{
									echo'<img src="images/delete.png"  width="21.5" height="21.5"/>';
									}
								break;
								
				case 11:
									$mon=$_GET['mon'];
									$emp=$_GET['emp'];
									
									$query =mysql_query("select * from payroll where month='".$mon."' and emp='".$emp."'");
									$count = mysql_num_rows($query);

									$query =mysql_query("select * from suspended where emp='".$emp."'");
									$count2 = mysql_num_rows($query);
									if($count>0){
										
									
									echo"<script>
									$('#empadd').hide();
									$().customAlert();
									alert('Error!', '<p>Employee already exists in the payroll.</p>');
									e.preventDefault();
									</script>";
										
									exit;	
									}
									else if($count2>0){

									echo"<script>
									$('#empadd').hide();
									$().customAlert();
									alert('Error!', '<p>Employee is on suspended leave without pay.</p>');
									e.preventDefault();
									</script>";


									}
									else{
											$resultb =mysql_query("select * from employee where emp='".$emp."'");
											$rowb=mysql_fetch_array($resultb);
											$emp=stripslashes($rowb['emp']);
											$leave=stripslashes($rowb['leaveac']);
											$mainsalary=stripslashes($rowb['salary']);
											$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	
											
											$q=0;
											$resultx =mysql_query("select * from attendance where pfno='".$emp."' and month='".$mon."'");
											$rowx=mysql_fetch_array($resultx);
								
											for ($x=1; $x<32; $x++) {
														$d=sprintf("%02d",$x);
														$d=$d.'c';
														if(stripslashes($rowx[$d])==1||stripslashes($rowx[$d])==2||stripslashes($rowx[$d])==3||stripslashes($rowx[$d])==4){
															$q++;
														}
											}

								
											//ignore attendance
											$q=30;
										
											$resultd =mysql_query("select * from payroll where status=1 and emp='".$emp."' order by monstamp desc limit 0,1");
											$num_resultsd = mysql_num_rows($resultd);	
											$row=$rowd=mysql_fetch_array($resultd);
											$sal=stripslashes($rowd['sal']);
											$allow=stripslashes($rowd['allow']);
											


											$aa=substr($mon,0,2);
											$bb=substr($mon,3,4);
											$monstamp=$bb.$aa;

											$resultc = mysql_query("insert into payroll values('0','".$mon."','".$emp."','".$names."','".stripslashes($rowb['dept'])."','".stripslashes($rowb['branch'])."','".$mainsalary."','".stripslashes($row['hallow'])."','','','".stripslashes($row['car'])."','','','','','','','','','".stripslashes($row['insamount'])."','".stripslashes($row['insrelief'])."','','','','','','','','".stripslashes($row['helb'])."','".stripslashes($row['pfund'])."','','','','','','',0,'".stripslashes($rowb['bid'])."','".stripslashes($rowb['bname'])."','".stripslashes($rowb['branchname'])."','".stripslashes($rowb['eftcode'])."','".stripslashes($rowb['acno'])."','".$q."','".$monstamp."')");

											
											if($resultc){	
												$resulta = mysql_query("insert into log values('0','".$username." inserts new employee into payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
											echo "<script>$('#empadd').hide();
											payroll('".$mon."');</script>";
												
											}
									
									}
							break;
				
							case 12:
							$mon=$_GET['mon'];
							$branch=$_GET['branch'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							$query =mysql_query("select * from salregister where month='".$mon."' and status=1");
							$count = mysql_num_rows($query);
							if($count==0){
							echo"<script>
							$('#empdi').hide();
							$().customAlert();
							alert('Error!', '<p>Payroll for Month does not exist or has already been posted.</p>');
							e.preventDefault();
							</script>";	
								exit;
							}
							else{

								//check if all details have been saved

								$result =mysql_query("select * from payroll where month='".$mon."'");
								$num_results = mysql_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									if(stripslashes($row['status'])==0){
										echo"<script>
												$().customAlert();
												alert('Error!', '<p>Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
												e.preventDefault();
												</script>";	
											exit;	
										}


								}



							$result =mysql_query("select * from payroll where month='".$mon."'");
							$totalnet=0;$totalsal=0;$totalhallow=0;
							$totalcash=$totalairtime=$totalcar=$totalleave=$totalinsrelief=$totalgross=$totaltaxable=$totaltax=$totalrelief=$totalpaye=$totalhelb=$totalpfund=$totaladva=0;
							$totalins=0;$totaldeds=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;
							$totalsacco=0;$totalloans=0;$totalinsamount=0;$totalbonus=$totalthirteen=$totalnotice=$totalothers=$totalmedical=0;
                                                		$num_results = mysql_num_rows($result);
                                                        for ($i=0; $i <$num_results; $i++) {
                                                        $row=mysql_fetch_array($result);
                                                       			$emp=stripslashes($row['emp']);
                                                                $net=stripslashes($row['net']);
                                                                $sal=stripslashes($row['sal']);
                                                                $hallow=stripslashes($row['hallow']);
                                                                $cash=stripslashes($row['cash']);
                                                                $airtime=stripslashes($row['airtime']);
                                                                $car=stripslashes($row['car']);
                                                                $leave=stripslashes($row['leaveallow']);
                                                                
                                                                $bonus=stripslashes($row['bonus']);
                                                                $thirteen=stripslashes($row['thirteen']);
                                                                $notice=stripslashes($row['notice']);
                                                                $others=stripslashes($row['otherdeds']);

                                                                $othrs=stripslashes($row['othrs']);
                                                                $totalot=stripslashes($row['totalot']);

                                                                $insamount=stripslashes($row['insamount']);
                                                                $insrelief=stripslashes($row['insrelief']);
                                                                $gross=stripslashes($row['gross']);
                                                                $taxable=stripslashes($row['taxablepay']);
                                                                $tax=stripslashes($row['tax']);
                                                                $relief=stripslashes($row['relief']);
                                                                $paye=stripslashes($row['paye']);
                                                                $nssf=stripslashes($row['nssf']);
                                                                $nhif=stripslashes($row['nhif']);
                                                                $sacco=stripslashes($row['sacco']);
                                                                $loans=stripslashes($row['loans']);
                                                                $medical=stripslashes($row['medical']);
                                                              
                                                                $adva=stripslashes($row['adva']);

                                                                $helb=stripslashes($row['helb']);
                                                                $pfund=stripslashes($row['pfund']);
                                                                $deds=stripslashes($row['totalded']);
                                                                $net=stripslashes($row['net']);
                                                                
                                                                
                                                                $totalnet+=$net;
                                                                $totalsal+=$sal;
                                                                $totalhallow+=$hallow;
                                                                $totalcash+=$cash;
                                                                $totalairtime+=$airtime;
                                                                $totalcar+=$car;
                                                                $totalleave+=$leave;
                                                                $totalbonus+=$bonus;
                                                                $totalthirteen+=$thirteen;
                                                                $totalnotice+=$notice;
                                                                $totalinsamount+=$insamount;
                                                                $totalinsrelief+=$insrelief;
                                                                $totalgross+=$gross;
                                                                $totaltaxable+=$taxable;
                                                                $totaltax+=$tax;

                                                                $totalrelief+=$relief;
                                                                $totalpaye+=$paye;
                                                                $totalhelb+=$helb;
                                                                $totalpfund+=$pfund;
                                                                $totaladva+=$adva;
                                                                $totaldeds+=$deds;
                                                                $totalothrs+=$othrs;
                                                                $totalotal+=$totalot;
                                                                $totalnssf+=$nssf;
                                                                $totalnhif+=$nhif;
                                                                $totalsacco+=$sacco;
                                                                $totalloans+=$loans;
                                                                $totalothers+=$others;
                                                                $totalmedical+=$medical;

									
                                                                
							
									}
							
							
									$resultb = mysql_query("update salregister set sal='".$totalsal."',hallow='".$totalhallow."',cash='".$totalcash."',car='".$totalcar."',airtime='".$totalairtime."',leaveallow='".$totalleave."',bonus='".$totalbonus."',thirteen='".$totalthirteen."',notice='".$totalnotice."',insamount='".$totalinsamount."',insrelief='".$totalinsrelief."',totalot='".$totalotal."',gross='".$totalgross."',taxablepay='".$totaltaxable."',tax='".$totaltax."',relief='".$totalrelief."',paye='".$totalpaye."',adva='".$totaladva."',nhif='".$totalnhif."',nssf='".$totalnssf."',helb='".$totalhelb."',pfund='".$totalpfund."',net='".$totalnet."',sacco='".$totalsacco."',loans='".$totalloans."',medical='".$totalmedical."',otherdeds='".$totalothers."',totalded='".$totaldeds."', status=0 where month='".$mon."'") or die (mysql_error());
									$resulta =mysql_query("select * from users where position='HRM' or  position='Admin' OR position='HOD'");
									$num_resultsa = mysql_num_rows($resulta);	
									for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);  
									$result = mysql_query("insert into messages values('0','".stripslashes($rowa['name'])."','System','Payroll for Month: ".$mon." has been finalized.','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
									}

									if($resultb){	
									$resulta = mysql_query("insert into log values('0','".$username." commits payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo"<script>
									$().customAlert();
									alert('Success!', '<p>Payroll Submitted!</p>');
									e.preventDefault();
									</script>";	
										
									}
									
									}
								break;
								
							case 13:
									$code=$_GET['code'];
									$query =mysql_query("select * from nhif where id='".$code."'");
									$count = mysql_num_rows($query);
									
									if($count>0){
										
							$result = mysql_query("update nhif set lower='".$_GET['lower']."',upper='".$_GET['upper']."',amount='".$_GET['amount']."' where id='".$code."'");	
									}
									else{
										
								$result= mysql_query("insert into nhif values('".$code."','".$_GET['lower']."','".$_GET['upper']."','".$_GET['amount']."',1)");	
								}
								if($result){
						$resulta = mysql_query("insert into log values('0','".$username." edits nhif table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							
							case 14:
							$code=$_GET['code'];
							$result = mysql_query("update tax set lower='".$_GET['lower']."',upper='".$_GET['upper']."',tax='".$_GET['amount']."' where id='".$code."'");	
								
								if($result){
						$resulta = mysql_query("insert into log values('0','".$username." edits tax table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							case 15:
							$resulta = mysql_query("update nssf set amount='".$_GET['employee']."' where id=1");	
							if($resulta){
						$resulta = mysql_query("insert into log values('0','".$username." edits nssf table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							case 16:
							$resulta = mysql_query("update overtime set rate='".$_GET['amount']."' where id=1");	
							if($resulta){
						$resulta = mysql_query("insert into log values('0','".$username." edits overtime table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							case 17:
							$ser=$_GET['ser'];
							$result = mysql_query("DELETE from payroll where serial='".$ser."'");
							$resulta = mysql_query("insert into log values('0','".$username." deletes employee from payroll','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;
							
							case 18:
									$emp=$_GET['emp'];
									
									$query =mysql_query("select * from benefits where and pfno='".$emp."'");
									$count = mysql_num_rows($query);
									if($count>0){
										
									
									echo"<script>
									$('#empadd').hide();
									$().customAlert();
									alert('Error!', '<p>Employee already exists in the Benefits scheme.</p>');
									e.preventDefault();
									</script>";
										
									exit;	
									}
									else{
								$resultb =mysql_query("select * from employee where emp='".$emp."'");
								$rowb=mysql_fetch_array($resultb);
								$emp=stripslashes($rowb['emp']);
								$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	
								
					
								$resultc = mysql_query("insert into benefits values('0','".$emp."','".$names."','','','','','','','','','1')");				
										
										
									if($resultc){	
								$resulta = mysql_query("insert into log values('0','".$username." inserts new employee into benefits scheme.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo "<script>$('#empadd').hide();
									empben();</script>";
										
									}
									
									}
							break;
							
							case 19:
							$emp=$_GET['emp'];
							$phone=$_GET['phone'];if($phone==''){$phone=0;}
							$health=$_GET['health'];if($health==''){$health=0;}
							$vehicle=$_GET['vehicle'];if($vehicle==''){$vehicle=0;}
							$entertainment=$_GET['entertainment'];if($entertainment==''){$entertainment=0;}
							$house=$_GET['house'];if($house==''){$house=0;}
							$perdiem=$_GET['perdiem'];if($perdiem==''){$perdiem=0;}
							$others=$_GET['others'];if($others==''){$others=0;}
							$date= date('m_Y');  
							
							$total=$phone+$health+$vehicle+$entertainment+$house+$perdiem+$others;
		
		$resulta = mysql_query("update benefits set phone='".$phone."',
		health='".$health."',vehicle='".$vehicle."',house='".$house."',entertainment='".$entertainment."',perdiem='".$perdiem."',others='".$others."',total='".$total."',status=1 where pfno='".$emp."'");
		
		if($resulta){
	$resulta = mysql_query("insert into log values('0','".$username." edits Employee Benefits;Emp id:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	echo"<script>
	$('#total' + '".$emp."').val('".$total."');
	</script>";
									echo'<img src="images/tick.png"  width="22" height="22"/>';
									
									}
								else{
									echo'<img src="images/delete.png"  width="21.5" height="21.5"/>';
									}
								break;
								
							case 20:
							$eid=$_GET['a'];
							$result= mysql_query("update messages set status=1 where id=".$eid."");
							break;
							
							case 21:
							$b=substr($_GET['to'],0,1);
							
							$len=strlen($_GET['to']);
							$len-=1;
							$c=substr($_GET['to'],1,$len);
							
							if($b==1){
							$result = mysql_query("insert into messages values('0','".$c."','".$_GET['a']."','".$_GET['mess']."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");}
							if($b==2){
							$resulta =mysql_query("select * from users where dept='".$c."'");
							$num_resultsa = mysql_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);  
							$result = mysql_query("insert into messages values('0','".stripslashes($rowa['name'])."','".$_GET['a']."','".$_GET['mess']."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
								}
							}
							if($b==3){
							$resulta =mysql_query("select * from users");
							$num_resultsa = mysql_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysql_fetch_array($resulta);  
							$result = mysql_query("insert into messages values('0','".stripslashes($rowa['name'])."','".$_GET['a']."','".$_GET['mess']."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
								}
							}
							if($result){
								echo"<script>
										dashboard();</script>"	;
							}else{echo"
										<script>
										$().customAlert();
										alert('Failure!', '<p>Message not sent.</p>');
										e.preventDefault();
										</script>";}
							break;
							
							case 22:
							$cname=$_GET['cname'];
							$web=$_GET['web'];
							$loc=$_GET['loc'];
							$motto=$_GET['motto'];
							$email=$_GET['email'];
							$tel=$_GET['tel'];
							$add=$_GET['add'];
							
							
							$resultc = mysql_query("update company set CompanyName='".$cname."',Tel='".$tel."',Address='".$add."',Website='".$web."',Email='".$email."',Description='".$loc."',Motto='".$motto."'");
							
							if($resultc){
		$resulta = mysql_query("insert into log values('0','".$username." updates company details.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

										echo"<img src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							}
							else echo"<img src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 23:
							$user=strtoupper($_GET['user']);
							$name=$_GET['name'];
							$pos=$_GET['pos'];
							$pass=$_GET['pass'];
							$dept=$_GET['dept'];
							$emp=$_GET['emp'];
							$bra=$_GET['bra'];
							$email=$_GET['email'];
							$pass=sha1($pass);
							
							$result = mysql_query("insert into users values('".$user."','".$pos."','images/users/".$emp.".jpg','".$pass."','".$dept."','".$name."','".$emp."','".$bra."','','".$email."')");		
							if($result){
		$resulta = mysql_query("insert into log values('0','".$username." inserts new User into System.User Id:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
								echo"<script>setTimeout(function() {adduser();},500);</script>";
							}
							else echo"<img src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 24:
							
							$pos=$_GET['pos'];
							$bra=$_GET['bra'];
							$dept=$_GET['dept'];
							$emp=$_GET['emp'];
							$name=$_GET['name'];
							$auto=$_GET['auto'];
							$rec=$_GET['rec'];
							$email=$_GET['email'];
							
							
							
					if($rec==1){
						$resulta = mysql_query("update users set password = sha1('password') where auto='".$auto."'");
						}
							
				$result = mysql_query("update users set position='".$pos."',dept='".$dept."',branch='".$bra."',pfno='".$emp."',fullname='".$name."',email='".$email."' where auto='".$auto."'");
				
						if($result){
	$resulta = mysql_query("insert into log values('0','".$username." updates user data.PF No:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
								echo"<script>setTimeout(function() {adduser();},500);</script>";
							}
							else echo"<img src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 25:
							$b=$_GET['b'];
							$code=$_GET['code'];
							$dep=$_GET['dep'];
							$resultg = mysql_query("update accesstbl set ".$dep."='".$b."' where AccessCode=".$code."");
							break;
							
							case 26:
							
							$userid=$_GET['userid'];
							$opass=$_GET['opass'];
							$npass=$_GET['npass'];
							$cpass=$_GET['cpass'];
							$resultx =mysql_query("select * from users where name='".$userid."'");
							$row=mysql_fetch_array($resultx);
							$kpass=stripslashes($row['password']);
							$sopass=sha1($opass);
							
							if($sopass!=$kpass){
								echo"<script>$().customAlert();
		alert('Error!', '<p>Your old password is wrong!</p>');
		e.preventDefault();</script>";
								exit;
							}
							
							if($cpass!=$npass){
									echo"<script>$().customAlert();
		alert('Error!', '<p>Your New password does not match the confirmation detail!</p>');
		e.preventDefault();</script>";
								exit;
							}
							else if($opass==$npass){
									echo"<script>$().customAlert();
		alert('Error!', '<p>Your old password cannot be the same as your new password!</p>');
		e.preventDefault();</script>";
								exit;
							}
							else if((strlen($npass) > 16) || (strlen($npass) < 6)){
									echo"<script>$().customAlert();
		alert('Error!', '<p>Password length must be between 6 and 16 characters!</p>');
		e.preventDefault();</script>";
								exit;
							}
							else {
						$pass= sha1($npass);
						$result = mysql_query("update users set password='".$pass."' where name='".$userid."'");
					
						if($result){
								
	$resulta = mysql_query("insert into log values('0','".$username." changes password details.User Name:".$userid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
									
									}
								else{
									echo'<img src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							}
								break;
								
								case 27:
							
							$vname=$_GET['vname'];
							$sysvar=$_GET['sysvar'];
					$resulta = mysql_query("insert into ".$sysvar." values('0','".$vname."')");			
					
						if($result){
								
	$resulta = mysql_query("insert into log values('0','".$username." inserts a new system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
							echo'<script>setTimeout(function() {sysvar();},500);</script>';		
									}
								else{
									echo'<img src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							
								break;
								
							case 28:
							$vname=$_GET['vname'];
							$sysvar=$_GET['sysvar'];
							$bid=$_GET['bid'];
							
					$result = mysql_query("update ".$sysvar." set name='".$vname."' where id='".$bid."'");		
					
						if($result){
								
	$resulta = mysql_query("insert into log values('0','".$username." updates system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
								echo'<script>setTimeout(function() {sysvar();},500);</script>';	
									}
								else{
									echo'<img src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							
								break;
								
								case 29:
								$sysvar=$_GET['sysvar'];
								$bid=$_GET['bid'];
								$vname=$_GET['vname'];
								$result = mysql_query("DELETE from ".$sysvar." where id='".$bid."'");
								if($result){
								
						$resulta = mysql_query("insert into log values('0','".$username." deletes system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
						echo'<script>setTimeout(function() {sysvar();},500);</script>';
									
									}
								else{
									echo'<img src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							
								break;

								case 30:

								$emp=$_GET['emp'];
								$nleaveac=$_GET['leaveac'];
								$nsickac=$_GET['sickac'];
								$resultb =mysql_query("select * from employee where emp='".$emp."'");
								$rowb=mysql_fetch_array($resultb);
								$leaveac=stripslashes($rowb['leaveac']);
								$sickac=stripslashes($rowb['sickac']);
								$empname=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);
								
								$aa=$nleaveac-$leaveac;
								if($aa>0){$adtype='dr';}if($aa<0){$adtype='cr';$aa=abs($aa);}
								if($aa!=0){
									$resulty = mysql_query("insert into leavetrack values('0','Annual','".$emp."','".$empname."','".date('m_Y')."','".$aa."','".$nleaveac."','".$adtype."','Leave Balance Adjustment','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
								}

								$bb=$nsickac-$sickac;
								if($bb>0){$adtype='dr';}if($bb<0){$adtype='cr';$bb=abs($bb);}
								if($bb!=0){
									$resulty = mysql_query("insert into leavetrack values('0','Sick','".$emp."','".$empname."','".date('m_Y')."','".$bb."','".$nsickac."','".$adtype."','Leave Balance Adjustment','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());
								}
							    

								$resulta = mysql_query("update employee set leaveac='".$_GET['leaveac']."',sickac='".$_GET['sickac']."' where emp='".$_GET['emp']."'");			
								if($resulta){
								$resulta = mysql_query("insert into log values('0','".$username." alters leave days .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<img src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
								exit;
									}
									else{echo'<img src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';}
				
								break;

								case 31:
								$code=$_GET['code'];
									
							$result = mysql_query("update holidays set date='".$_GET['date']."' where id='".$code."'");	
								if($result){
							$resulta = mysql_query("insert into log values('0','".$username." edits holidays table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img src="images/tick.png" width="22px" height="22px"/>';
									}
							break;

							case 32:
							$user=$_GET['user'];
							$result = mysql_query("DELETE from users where auto='".$user."'");
							$resulta = mysql_query("insert into log values('0','".$username." deletes User from System.User:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<img src="images/tick.png" style="width:30px; height:30px; ">';
								echo'<script>
										setTimeout(function() {
											adduser();},500);
										</script>';
									}
									else{
										echo'<img src="images/delete.png" style="width:30px; height:30px;">';
										}
							break;


							case 33:
							
							$name=$_GET['name'];
							$date=$_GET['date'];
							$resulta = mysql_query("insert into holidays values('0','".$name."','".$date."',0)");			
					
							if($result){
								
							$resulta = mysql_query("insert into log values('0','".$username." inserts a new holiday.Name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
							echo'<img src="images/tick.png" style=" width:22px; height:22px; margin:0px 0 0 0px">';
							echo'<script>setTimeout(function() {leavesett();},500);</script>';		
									}
								else{
									echo'<img src="images/delete.png" style=" width:22px; height:22px; margin:-10px 0 0 0px">';
									}
							
								break;


							case 34:
							$code=$_GET['code'];
							$result = mysql_query("DELETE from holidays where id='".$code."'");
							$resulta = mysql_query("insert into log values('0','".$username." deletes holiday from System.code:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<img src="images/tick.png" style="width:22px; height:22px; ">';
								echo'<script>setTimeout(function() {leavesett();},500);</script>';
									}
									else{
										echo'<img src="images/delete.png" style="width:22px; height:22px;">';
										}
							break;




				
				
	 
	
 }
	 
	 

?>