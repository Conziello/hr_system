<?php include('db_fns.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
include('functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$per_page = 10;
$page=$_GET['page'];
$id=$_GET['ser'];
$param=$_GET['param'];

$start = ($page-1)*$per_page;

switch($id){
					case 1:
					
								$result =mysql_query("select * from employee where status=1 and ".$_SESSION['clearance']."");
								$count = mysql_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysql_query("select * from employee  where status=1  and ".$_SESSION['clearance']." limit ".$start.",".$per_page."");
									$num_results = mysql_num_rows($result);
									footemp($result,$param,1);
									if($count>0){
									page($param,$count,$id,$page,'emp');
									}
									break;
						case 2:
						
								if(isset($_GET['cat'])){
									$cat=$_GET['cat'];
								}else {$cat='emp';}
								
								if($cat=='emp'||$cat=='marital'||$cat=='gender'){
								$result =mysql_query("SELECT * FROM employee WHERE ".$cat."='".$param."' and status=1 and ".$_SESSION['clearance']."");
								$count = mysql_num_rows($result);
								$result = mysql_query("SELECT * FROM employee WHERE ".$cat."='".$param."' and status=1 and ".$_SESSION['clearance']." limit ".$start.",".$per_page."");	
								}
								else{
								$result =mysql_query("SELECT * FROM employee WHERE ".$cat." LIKE '%".$param."%' and status=1 and ".$_SESSION['clearance']."");
								$count = mysql_num_rows($result);
								$result = mysql_query("SELECT * FROM employee WHERE ".$cat." LIKE '%".$param."%' and status=1 and ".$_SESSION['clearance']." limit ".$start.",".$per_page."");	
								}
								
									echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									$num_results = mysql_num_rows($result);
									footemp($result,$param,1);
									if($count>0){
									page($param,$count,$id,$page,$cat);
									}
									break;
									
						case 3:
								$cat='emp';
								$result =mysql_query("select * from employee where status=0 and ".$_SESSION['clearance']."");
								$count = mysql_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysql_query("select * from employee  where status=0 and ".$_SESSION['clearance']." limit ".$start.",".$per_page."");
									$num_results = mysql_num_rows($result);
									footemp($result,$param,2);
									if($count>0){
									page($param,$count,3,$page,$cat);
									}
									break;
						case 4:
								$cat='emp';
								$result =mysql_query("SELECT * FROM employee WHERE emp='".$param."' and status=0 and ".$_SESSION['clearance']."");
								$count = mysql_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									
									$result = mysql_query("SELECT * FROM employee WHERE emp='".$param."' and status=0  and ".$_SESSION['clearance']." limit ".$start.",".$per_page."");
									$num_results = mysql_num_rows($result);
									footemp($result,$param,2);
									if($count>0){
									page($param,$count,4,$page,$cat);
									}
									break;

						case 5:
					
								$result =mysql_query("select * from payroll where emp='".$param."' order by monstamp desc");
								$count = mysql_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysql_query("select * from payroll where emp='".$param."'  order by monstamp desc limit ".$start.",".$per_page."");
								$num_results = mysql_num_rows($result);
								footpay($result,$param,3);
								if($count>0){
								page($param,$count,$id,$page,'pay');
								}
									break;
						
									
}