<?php
include('db_fns.php');
if(isset($_POST['stamp'])){
$stamp =$_POST['stamp'];
}else $stamp=NULL;
if(isset($_POST['regno'])){
$regno =$_POST['regno'];
}else $regno=NULL;
$id =$_POST['id'];
 
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
  <script>
$('#lei2').html('<iframe name="leiframe2" id="leiframe" class="leiframe" src="" style="margin-right:40px"></iframe>');
	</script>	 

  <?php
 switch($id){
	case 1: //newemployee
	$stamp=preg_replace('~/~', '', $stamp);
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/employees/'.$stamp.'.jpg');
	echo '<img style="width:100%; height:100%;"  src="images/employees/'.$stamp.'.jpg?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>
	<p style="display:none" id="stamp">'.$stamp.'</p>';
	
	break;
	
	case 2: //editemployee
	$stamp=preg_replace('~/~', '', $stamp);
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/employees/'.$stamp.'.jpg');
	echo '<img style="width:100%; height:100%;"  src="images/employees/'.$stamp.'.jpg?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>';
echo'<p style="display:none" id="stamp">'.$stamp.'</p>';
	
	break;
	
	case 3: //newuser
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/users/'.$stamp.'.jpg');
	echo '<img style="width:100%; height:100%;"  src="images/users/'.$stamp.'.jpg?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>
	<p style="display:none" id="stamp">'.$stamp.'</p>';
	
	break;
	
	case 4: //edituser
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/users/'.$stamp.'.jpg');
	echo '<img style="width:100%; height:100%;"  src="images/users/'.$stamp.'.jpg?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>
	<p style="display:none" id="stamp">'.$stamp.'</p>';
	
	
	break;
	
	
	case 5: //editcompany
	move_uploaded_file($_FILES['image']['tmp_name'], 'images/clogo.jpg');
	echo '<img style="width:100%; height:100%;"  src="images/clogo.jpg?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>
	';
	break;

	case 6: //discipline document
	$stamp =$_POST['emp55'];
	$name='DIS'.$stamp.'_'.$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$name);
	$resulta = mysql_query("insert into documents values('','".$stamp."','','','".$name."','".date('d/m/Y')."','".date('Ymd')."','1')");	
	echo '<img style="width:100%; height:100%;"  src="images/adobe.png?v='.rand(0,1000).' // rand() prevents the browser from displaying a previously cached image"/>
	<p style="display:none" id="stamp">'.$stamp.'</p>';
	
	
	break;
	
	
	
	
	
}
	
	?>
  </body>
</html>