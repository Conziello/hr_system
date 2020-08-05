<?php 
require_once('db_fns.php');
if(isset($_GET['username'])){
$username = $_GET['username'];
}
if(isset($_GET['passwd'])){
$password = $_GET['passwd'];}


  $result = mysql_query("select * from users  where (name='".$username."' OR pfno='".$username."') and password = sha1('".$password."')");

$num_results = mysql_num_rows($result);


if($num_results>0){
	$row=mysql_fetch_array($result);
	$username=stripslashes($row['name']);
	$_SESSION['valid_user']=$username;
	$result = mysql_query("insert into log values('','".$username." logs into system','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

	echo 0;
}
else echo"<img src=\"images/delete.png\" style=\"margin-top:10px\"  width=\"30\" height=\"30\"/>";
     
	 ?>
        