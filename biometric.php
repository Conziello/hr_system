<?php include('db_fns.php');


	$stamp=substr($_POST['time'],0,4).substr($_POST['time'],5,2).substr($_POST['time'],8,2);
	$date=substr($_POST['time'],8,2).'/'.substr($_POST['time'],5,2).'/'.substr($_POST['time'],0,4);
	$time=substr($_POST['time'],11,5);
    $result = mysql_query("insert into biometric_log values('".$_POST['id']."','".$_POST['time']."','".$_POST['pin']."','".$_POST['card_no']."','".$_POST['device_id']."','".$_POST['device_sn']."','".$_POST['device_name']."','0','".$stamp."','".$date."','".$time."')");
    if($result){
    	echo 1;
    }


?>