<?php session_start();
	 $server='localhost';
	 $db = mysql_connect('localhost', 'root', '') or die(mysql_error());
     mysql_select_db('weclines',$db);
   
	 //$db = mysqli_connect($serve,"weclines_hr","hr@123+2019","weclines_hr");
	 

?>