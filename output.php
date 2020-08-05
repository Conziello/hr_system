<?php include('db_fns.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
include('functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>
<?php
$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
switch($id){
	case 1:
	$title='Wec Lines HR Payroll Bank Summary';
	break;
	case 2:
	$title='Wec Lines HR Individual Payroll Bank Summary';
	break;
	case 3:
	$title='Wec Lines HR Messages Reports';
	break;

	case 4:
	$title='Wec Lines HR Monthly Payroll Report';
	break;
	
	case 5:
	$title='Wec Lines HR Salaries Summary';
	break;
	
	case 6:
	$title='Wec Lines HR Individual Payroll Summary';
	break;
	
	case 7:
	$title='Wec Lines HR Payslips';
	break;
	
	case 8:
	$title='Wec Lines HR Employee Attendance Reports';
	break;
	
	
	case 9:
	$title='Wec Lines HR Leave Reports';
	break;
	
	case 10:
	$title='Wec Lines HR Employees List';
	break;
	
	case 11:
	$title='Wec Lines HR Activity Log Report';
	break;

	case 12:
	$title='Wec Lines HR Monthly Deductions Report';
	break;

	case 13:
	$title='Employee Attendance Summary';
	break;

	case 14:
	$title='Wec Lines HR Leave Summary Reports';
	break;

	case 15:
	$title='Wec Lines HR Employee Deductions Report';
	break;

	case 16:
	$title='Wec Lines HR Employee Leave Statement Report';
	break;

	case 17:
	$title='Wec Lines HR Employee Daily Attendance Report';
	break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
<title><?php echo $title ?></title>
<link id="favicon" href="favicon.png" rel="icon" type="image/png"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<script src="js/functions.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script src="js/excellentexport.js"></script>
<style>
p{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:12px; }
#title{position:relative; float:left;width:auto; background:#333; border:0px solid #ccc;font-size:10px}
#figure1{position:relative; float:left;width:141.0px; margin-right:2px; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#fff;  background:#333; text-align:center}
.figure2x,#figure2x,.figure2x,#figure2{position:relative; float:left;width:141.7px; border-right:1px solid #333; border-bottom:1px solid #333; margin:0; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#333;  background:none; text-align:center;min-height:16px}
.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }
.cleaner_h5 { clear: both; width:100%; height: 5px; }
.cleaner_h10 { clear: both; width:100%; height: 10px; }
.normal,#normal{position:relative; float:left;width:auto; background:#f0f0f0; border-left:1px solid #333; cursor:pointer}
.normal:hover,#normal:hover{background:#C0E4E7}
.put_field{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:12px; text-align:center}
@media print {
    footer {page-break-after: always;}
}
</style>
</head>

<body style="background:" id="body"> 

<?php 
switch($id){
case 1:

$reg=$_GET['reg'];
$fname='bank_summ_'.clean(strtolower($reg));

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PAYROLL BANK SUMMARY<br/><strong style="font-size:11px">Month:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;">Payee Ref</td>
        <td  style="width:15%;">Name</td>
        <td  style="width:10%;">Address</td>
        <td  style="width:10%;">RTGS/EFT Code</td>
        <td  style="width:10%;">Branch Name</td>
        <td  style="width:10%;">Bank</td>
   		<td  style="width:5%;">DTB Branch Code</td>
        <td  style="width:10%;">Account No</td>
        <td  style="width:5%;">Amount</td>
        <td  style="width:10%;">Payment Method</td>
        <td  style="width:10%;">Remarks</td>
        
        </tr>

<?php
$remarks=date('d M Y');
$result =mysql_query("select * from payroll where month='".$reg."' order by emp");
						$totalnet=0;$totaltax=0;
						$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
							$totalnet+=stripslashes($row['net']);
							$emp=stripslashes($row['emp']);



								
							
							if(stripslashes($row['status'])==0){
							echo"<script>
									$('#body').hide();
									$().customAlert();
									alert('Error!', '<p>Cannot Preview Payroll.Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									</script>";	
								exit;	
							}

						$resultx =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
						$rowx=mysql_fetch_array($resultx);
						if(stripslashes($row['bname'])=='Diamond Trust Bank'){
							$dtbcode='SMB';$method='Internal Funds Transfer';
						}else {$dtbcode='';$method='EFT';}
						

if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['name']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">P. O BOX <?php  echo stripslashes($rowx['phyadd']).' '.stripslashes($rowx['town']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['eftcode']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['branchname']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['bname']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $dtbcode ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">&nbsp;<?php  echo stripslashes($row['acno']) ?></td>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo round(stripslashes($row['net']),2) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $method ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $remarks ?></td>

</tr>
<?php } ?>

</tbody>
</table>

<?php
$arr=array();
$result =mysql_query("select * from payroll where month='".$reg."'");
$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
								$arr[stripslashes($row['bid'])]=stripslashes($row['bname']);
							}
$pro=array();							
foreach ($arr as $key => $val) {
	$tot=0;
	$result =mysql_query("select * from payroll where month='".$reg."' and bid='".$key."'");
	$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
							$tot+=stripslashes($row['net']);
							}
		$pro[$val]=stripslashes($tot);			
}

?>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
foreach ($pro as $key => $val) {
echo"<p style=\"text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px\">".$key.": <script>document.writeln((".$val.").formatMoney(2, '.', ','));</script></p>";	
}
?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total: <script>document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></p>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;
case 2:
$mon=$_GET['mon'];
$bank=$_GET['bank'];
$result =mysql_query("select * from banktbl where id='".$bank."'");
$row=mysql_fetch_array($result);
$bname=stripslashes($row['name']);
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INDIVIDUAL PAYROLL BANK SUMMARY<br/><strong style="font-size:11px">Month:<?php  echo $mon ?></strong><br/><strong style="font-size:11px">Bank:<?php  echo $bname ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:13%;">Emp.ID</td>
        <td  style="width:27%;">Employee Name</td>
        <td  style="width:34%;">Account No.</td>
        <td  style="width:24%;">Amount</td>
        
        </tr>

<?php
$result =mysql_query("select * from payroll where month='".$mon."' and bid='".$bank."' order by name");
						$totalnet=0;$totaltax=0;
						$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
								$totalnet+=stripslashes($row['net']);
								
							
							if(stripslashes($row['status'])==0){
							echo"<script>
							$('#body').hide();
										$().customAlert();
									alert('Error!', '<p>Cannot Preview Payroll.Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									e.preventDefault();
									</script>";	
								exit;	
							}


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:13%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
<td  style="width:27%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['name']) ?></td>
<td  style="width:34%;border-width:0.5px; border-color:#666; border-style:solid; ">&nbsp;<?php  echo stripslashes($row['acno']) ?></td>
<td  style="width:24%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></td>


</tr>
<?php } ?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total: <script>document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 3:
$reg=$username;
$fname='mails_reports';
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['code'])){
	$code=$_GET['code'];
}else $code=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL MESSAGES REPORT<br/><strong style="font-size:11px">User:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  $d2 ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Summary  Report</p>
<?php } ?>
<?php $d1=stampreverse($d1); $d2=stampreverse($d2);?>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:12%;">Date</td>
        <td  style="width:10%;">From</td>
       	<td  style="width:10%;">To</td>
       	<td  style="width:14%;">Message</td>
       	<td  style="width:14%;">Status</td>      
        </tr>

<?php
if($code==1){
$result =mysql_query("select * from messages where name='".$reg."' or sender='".$reg."' limit 0,100");
}
else if($code==2){
$result =mysql_query("select * from messages where (name='".$reg."' or sender='".$reg."') and stamp>='".$d1."' and stamp<='".$d2."'");
}
else{
$result =mysql_query("select * from messages where name='".$reg."' or sender='".$reg."'");	
}
						$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['date']) ?></td>
<?php if(stripslashes($row['sender'])==$reg){
	echo"<td  style=\"width:10%;border-width:0.5px; border-color:#666; border-style:solid;\"></td>";
echo"<td  style=\"width:10%;border-width:0.5px; border-color:#666; border-style:solid; \">".stripslashes($row['name'])."</td>";
}else{
echo"<td  style=\"width:10%;border-width:0.5px; border-color:#666; border-style:solid;\">".stripslashes($row['sender'])."</td>";
echo"<td  style=\"width:10%;border-width:0.5px; border-color:#666; border-style:solid; \"></td>";	
}
?>
<td  style="width:52%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['message']) ?></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php if(stripslashes($row['status'])==1){echo 'Read'; } else {echo 'Not Read';}?></td>


</tr>
<?php } ?>

</tbody>
</table> 

							

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 4:
$reg=$_GET['reg'];
if(isset($_GET['branch'])){
	$branch=$_GET['branch'];
}else $branch=0;
$fname='payroll_'.clean(strtolower($reg));

?>
<div style="min-width:100%;min-height:260px; border:0px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL MONTHLY PAYROLL REPORT<br/><strong style="font-size:11px">Month:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:9px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:3%;">PF No.</td>
        <td  style="width:8%;">Name</td>
        <td  style="width:3%;">B. Salary</td>
        <td  style="width:3%;">H/Allow</td>
        <td  style="width:3%;">Cash</td>
        <td  style="width:3%;">Airtime</td>
        <td  style="width:3%;">Car</td>
        <td  style="width:3%;">Leave</td>
        <td  style="width:3%;">Bonus</td>
        <td  style="width:3%;">13th Month</td>
        <td  style="width:3%;">Notice</td>
        <td  style="width:3%;">Overtime</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Gross</td>
        <td  style="width:3%;">Taxable Pay</td>
        <td  style="width:3%;">Tax</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Paye</td>
        <td  style="width:3%;">NSSF</td>
        <td  style="width:3%;">NHIF</td>
        <td  style="width:3%;">Advance</td>
        <td  style="width:3%;">Sacco</td>
        <td  style="width:3%;">Loans</td>
         <td  style="width:3%;">Medical</td>
        <td  style="width:3%;">Helb</td>
        <td  style="width:3%;">P/Fund</td>
         <td  style="width:3%;">Others</td>
        <td  style="width:3%;">Total Deds.</td>
        <td  style="width:3%;">Net Pay</td>
        </tr>


<?php
$result =mysql_query("select * from payroll where month='".$reg."'");
$totalnet=0;$totalsal=0;$totalhallow=0;
$totalcash=$totalairtime=$totalcar=$totalleave=$totalinsrelief=$totalgross=$totaltaxable=$totaltax=$totalrelief=$totalpaye=$totalhelb=$totalpfund=$totaladva=0;
$totalins=0;$totaldeds=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;$totalmedical=0;
$totalsacco=0;$totalloans=0;$totalbonus=$totalthirteen=$totalnotice=$totalothers=0;
                                                $num_results = mysql_num_rows($result);
                                                        for ($i=0; $i <$num_results; $i++) {
                                                        $row=mysql_fetch_array($result);
                                                                $net=stripslashes($row['net']);
                                                                $sal=stripslashes($row['sal']);
                                                                $hallow=stripslashes($row['hallow']);
                                                                $cash=stripslashes($row['cash']);
                                                                $airtime=stripslashes($row['airtime']);
                                                                $car=stripslashes($row['car']);
                                                                $leave=stripslashes($row['leaveallow']);
                                                                $othrs=stripslashes($row['othrs']);
                                                                $totalot=stripslashes($row['totalot']);

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


                                                                $bonus=stripslashes($row['bonus']);
                                                                $thirteen=stripslashes($row['thirteen']);
                                                                $notice=stripslashes($row['notice']);
                                                                $others=stripslashes($row['otherdeds']);


                                                                $totalbonus+=$bonus;
                                                                $totalthirteen+=$thirteen;
                                                                $totalnotice+=$notice;
                                                                $totalothers+=$others;
                                                                
                                                                
                                                                $totalnet+=$net;
                                                                $totalsal+=$sal;
                                                                $totalhallow+=$hallow;
                                                                $totalcash+=$cash;
                                                                $totalairtime+=$airtime;
                                                                $totalcar+=$car;
                                                                $totalleave+=$leave;
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
                                                                $totalmedical+=$medical;

                                                                
                                                                

if($i%2==0){
                echo'
        <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
        }else{
                echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
<td  style="width:8%;border-width:0.4px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['name']) ?></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['hallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['cash']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['airtime']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['car']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['leaveallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['bonus']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['thirteen']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['notice']) ?>).formatMoney(2, '.', ','));</script></td>

<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['insrelief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['gross']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['taxablepay']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['relief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['paye']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['sacco']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['loans']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['medical']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['helb']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['pfund']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['otherdeds']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalded']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></td>


</tr>
<?php } ?>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:3%;"></td>
        <td  style="width:8%;"></td>
        <td  style="width:3%;"><script>document.writeln(( <?php  echo $totalsal?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhallow ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcash ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalairtime ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcar ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalleave ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalbonus ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalthirteen ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnotice ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalotal ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalinsrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalgross ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltaxable ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltax ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpaye ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnssf ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnhif ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaladva ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalsacco ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalloans ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalmedical ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhelb ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpfund ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalothers ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaldeds ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></td>
    </tr>

</tbody>
</table>





<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 5:

$fname='salaries_summary';

?>
<div style="width:100%;min-height:260px; border:0px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL SALARIES SUMMARY<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:9px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   	    <td  style="width:12%;">Month</td>
        <td  style="width:3%;">B. Salary</td>
        <td  style="width:3%;">H/Allow</td>
        <td  style="width:3%;">Cash</td>
        <td  style="width:3%;">Airtime</td>
        <td  style="width:3%;">Car</td>
        <td  style="width:3%;">Leave</td>
        <td  style="width:3%;">Bonus</td>
        <td  style="width:3%;">13th Month</td>
        <td  style="width:3%;">Notice</td>
        <td  style="width:3%;">Overtime</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Gross</td>
        <td  style="width:3%;">Taxable Pay</td>
        <td  style="width:3%;">Tax</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Paye</td>
        <td  style="width:3%;">NSSF</td>
        <td  style="width:3%;">NHIF</td>
        <td  style="width:3%;">Advance</td>
        <td  style="width:3%;">Sacco</td>
        <td  style="width:3%;">Loans</td>
        <td  style="width:3%;">Medical</td>
        <td  style="width:3%;">Helb</td>
        <td  style="width:3%;">P/Fund</td>
         <td  style="width:3%;">Others</td>
        <td  style="width:3%;">Total Deds.</td>
        <td  style="width:3%;">Net Pay</td>
        </tr>



<?php
$result =mysql_query("select * from salregister");

$totalnet=0;$totalsal=0;$totalhallow=0;
$totalcash=$totalairtime=$totalcar=$totalleave=$totalinsrelief=$totalgross=$totaltaxable=$totaltax=$totalrelief=$totalpaye=$totalhelb=$totalpfund=$totaladva=0;
$totalins=0;$totaldeds=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;
$totalsacco=0;$totalloans=0;$totalbonus=$totalthirteen=$totalnotice=$totalothers=0;$totalmedical=0;
                                                $num_results = mysql_num_rows($result);
                                                        for ($i=0; $i <$num_results; $i++) {
                                                        $row=mysql_fetch_array($result);
                                                                $net=stripslashes($row['net']);
                                                                $sal=stripslashes($row['sal']);
                                                                $hallow=stripslashes($row['hallow']);
                                                                $cash=stripslashes($row['cash']);
                                                                $airtime=stripslashes($row['airtime']);
                                                                $car=stripslashes($row['car']);
                                                                $leave=stripslashes($row['leaveallow']);
                                                                $othrs=stripslashes($row['othrs']);
                                                                $totalot=stripslashes($row['totalot']);

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
                                                                $adva=stripslashes($row['adva']);

                                                                $helb=stripslashes($row['helb']);
                                                                $pfund=stripslashes($row['pfund']);
                                                                $deds=stripslashes($row['totalded']);
                                                                $net=stripslashes($row['net']);


                                                                $bonus=stripslashes($row['bonus']);
                                                                $thirteen=stripslashes($row['thirteen']);
                                                                $notice=stripslashes($row['notice']);
                                                                $others=stripslashes($row['otherdeds']);
                                                                $medical=stripslashes($row['medical']);

                                                                $totalbonus+=$bonus;
                                                                $totalthirteen+=$thirteen;
                                                                $totalnotice+=$notice;
                                                                $totalothers+=$others;
                                                                
                                                                
                                                                $totalnet+=$net;
                                                                $totalsal+=$sal;
                                                                $totalhallow+=$hallow;
                                                                $totalcash+=$cash;
                                                                $totalairtime+=$airtime;
                                                                $totalcar+=$car;
                                                                $totalleave+=$leave;
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
                                                                $totalmedical+=$medical;

if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:12%;border-width:0.4px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['month']) ?></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['hallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['cash']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['airtime']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['car']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['leaveallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['bonus']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['thirteen']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['notice']) ?>).formatMoney(2, '.', ','));</script></td>

<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['insrelief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['gross']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['taxablepay']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['relief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['paye']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['sacco']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['loans']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['medical']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['helb']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['pfund']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['otherdeds']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalded']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>
<?php } ?>
<tr style="width:100%; height:20px;color:#fff; background:#444; padding:0">
        <td  style="width:12%;"></td>
        <td  style="width:3%;"><script>document.writeln(( <?php  echo $totalsal?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhallow ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcash ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalairtime ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcar ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalleave ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalbonus ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalthirteen ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnotice ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalotal ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalinsrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalgross ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltaxable ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltax ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpaye ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnssf ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnhif ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaladva ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalsacco ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalloans ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalmedical ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhelb ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpfund ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalothers ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaldeds ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></td>
    </tr>
</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 6:
$reg=$_GET['reg'];
$from=$_GET['from'];
$to=$_GET['to'];
$fname='emp_summ_'.clean(strtolower($reg));
$result =mysql_query("select * from payroll where emp='".$reg."' order by serial desc limit 0,1");
$row=mysql_fetch_array($result);
$names=stripslashes($row['name']);
?>
<div style="width:100%;min-height:260px; border:0px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INDIVIDUAL PAYROLL SUMMARY<br/><strong style="font-size:11px"><?php  echo $names ?></strong><br/><strong style="font-size:11px">PF No:<?php  echo $reg ?></strong><br/>
<strong style="font-size:11px">From:<?php  echo $from ?> To:<?php  echo $to ?></strong><br/>
	<strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<?php 
$from=substr($from,3,4).substr($from,0,2);
$to=substr($to,3,4).substr($to,0,2);
 ?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:9px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   	    <td  style="width:12%;">Month</td>
         <td  style="width:3%;">B. Salary</td>
        <td  style="width:3%;">H/Allow</td>
        <td  style="width:3%;">Cash</td>
        <td  style="width:3%;">Airtime</td>
        <td  style="width:3%;">Car</td>
        <td  style="width:3%;">Leave</td>
        <td  style="width:3%;">Bonus</td>
        <td  style="width:3%;">13th Month</td>
        <td  style="width:3%;">Notice</td>
        <td  style="width:3%;">Overtime</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Gross</td>
        <td  style="width:3%;">Taxable Pay</td>
        <td  style="width:3%;">Tax</td>
        <td  style="width:3%;">Relief</td>
        <td  style="width:3%;">Paye</td>
        <td  style="width:3%;">NSSF</td>
        <td  style="width:3%;">NHIF</td>
        <td  style="width:3%;">Advance</td>
        <td  style="width:3%;">Sacco</td>
        <td  style="width:3%;">Loans</td>
        <td  style="width:3%;">Medical</td>
        <td  style="width:3%;">Helb</td>
        <td  style="width:3%;">P/Fund</td>
         <td  style="width:3%;">Others</td>
        <td  style="width:3%;">Total Deds.</td>
        <td  style="width:3%;">Net Pay</td>
        </tr>
<?php
$result =mysql_query("select * from payroll where emp='".$reg."' and monstamp>='".$from."' and monstamp<='".$to."'");
$totalnet=0;$totalsal=0;$totalhallow=0;
$totalcash=$totalairtime=$totalcar=$totalleave=$totalinsrelief=$totalgross=$totaltaxable=$totaltax=$totalrelief=$totalpaye=$totalhelb=$totalpfund=$totaladva=0;
$totalins=0;$totaldeds=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;
$totalsacco=0;$totalloans=0;$totalbonus=$totalthirteen=$totalnotice=$totalothers=0;$totalmedical=0;
                                                $num_results = mysql_num_rows($result);
                                                        for ($i=0; $i <$num_results; $i++) {
                                                        $row=mysql_fetch_array($result);
                                                                $net=stripslashes($row['net']);
                                                                $sal=stripslashes($row['sal']);
                                                                $hallow=stripslashes($row['hallow']);
                                                                $cash=stripslashes($row['cash']);
                                                                $airtime=stripslashes($row['airtime']);
                                                                $car=stripslashes($row['car']);
                                                                $leave=stripslashes($row['leaveallow']);
                                                                $othrs=stripslashes($row['othrs']);
                                                                $totalot=stripslashes($row['totalot']);

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


                                                                $bonus=stripslashes($row['bonus']);
                                                                $thirteen=stripslashes($row['thirteen']);
                                                                $notice=stripslashes($row['notice']);
                                                                $others=stripslashes($row['otherdeds']);


                                                                $totalbonus+=$bonus;
                                                                $totalthirteen+=$thirteen;
                                                                $totalnotice+=$notice;
                                                                $totalothers+=$others;
                                                                
                                                                
                                                                $totalnet+=$net;
                                                                $totalsal+=$sal;
                                                                $totalhallow+=$hallow;
                                                                $totalcash+=$cash;
                                                                $totalairtime+=$airtime;
                                                                $totalcar+=$car;
                                                                $totalleave+=$leave;
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
                                                                $totalmedical+=$medical;

								if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>


<td  style="width:12%;border-width:0.4px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['month']) ?></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['hallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['cash']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['airtime']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['car']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['leaveallow']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['bonus']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['thirteen']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['notice']) ?>).formatMoney(2, '.', ','));</script></td>

<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['insrelief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['gross']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['taxablepay']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['relief']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['paye']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['sacco']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['loans']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['medical']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['helb']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['pfund']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['otherdeds']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['totalded']) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:3%;border-width:0.4px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></td>

</tr>
<?php } ?>
<tr style="width:100%; height:20px;color:#fff; background:#444; padding:0">
        <td  style="width:12%;"></td>
       <td  style="width:3%;"><script>document.writeln(( <?php  echo $totalsal?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhallow ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcash ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalairtime ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalcar ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalleave ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalbonus ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalthirteen ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnotice ?>).formatMoney(2, '.', ','));</script></td>


        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalotal ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalinsrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalgross ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltaxable ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaltax ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalrelief ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpaye ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnssf ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnhif ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaladva ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalsacco ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalloans ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalmedical ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalhelb ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalpfund ?>).formatMoney(2, '.', ','));</script></td>
         <td  style="width:3%;"><script>document.writeln((<?php  echo $totalothers ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totaldeds ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:3%;"><script>document.writeln((<?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></td>
    </tr>
</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 7:

function payslp($result){
$row=mysql_fetch_array($result);
$emp=stripslashes($row['emp']);
$date=date('d/m/Y');
$result =mysql_query("select * from company");
$rowx=mysql_fetch_array($result);
$comname=stripslashes($rowx['CompanyName']);
$tel=stripslashes($rowx['Tel']);
$Add=stripslashes($rowx['Address']);
$web=stripslashes($rowx['Website']);
$email=stripslashes($rowx['Email']);
$logo=stripslashes($rowx['Logo']);

$resultd =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
$rowd=mysql_fetch_array($resultd);



?>
<div id="container" style="width:800px;min-height:900px; border:1px solid #333; float:left; position:relative; margin-bottom:20px">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<div style="width:300px;float:right;margin-right:10px">
<p style="text-align:right;font-size:22px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:right;font-size:12px; font-weight:right;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
</div>
<div style="clear:both;margin-bottom:20px;width:100%"></div>


<div style="float:left; border-top:1.5px solid #333;border-right:1px solid #333;border-left:1px solid #333;width:300PX;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:100%;  float:left;border-bottom:0px solid #333">
<p style="padding-top:5px;text-align:center;font-size:15px; font-weight:bold;margin:0 0 0 0px">PAY ADVICE</p>
</div>
</div>
<div style="clear:both;"></div>

<div style="float:left; border-top:1.5px solid #333;border-LEFT:0px solid #333; border-left:1px solid #333;border-right:1px solid #333;width:300px;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:25%; border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding:3px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px">Month</p>
</div>
<div style="background:#fff;width:25%; border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding:3px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"> <?php  echo stripslashes($row['month']) ?></p>
</div>
<div style="background:#99CCFF;width:25%; border-right:1.5px solid #333; float:left;border-bottom:1px solid #333">
<p style="padding:3px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px">Currency</p>
</div>
<div style="background:#fff; border-right:0px solid #333;border-bottom:1px solid #333">
<p style="padding:3px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">KES</p>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:14px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase"><?php echo stripslashes($row['name']) ?></p>
<div style="clear:both; margin-bottom:20px"></div>

<div style="float:left; border-top:1.5px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Internal Nr.</p>
</div>
<div style="background:#fff;height:20px; border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php echo stripslashes($row['emp']) ?></p>
</div>
</div>
<div style="clear:both;"></div>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Org. Unit</p>
</div>
<div style="background:#fff;height:20px; border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;text-transform:uppercase"><?php echo stripslashes($row['branch']) ?>-<?php echo stripslashes($row['dept']) ?></p>
</div>
</div>
<div style="clear:both;"></div>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Category</p>
</div>
<div style="background:#fff;width:30%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"></p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Level</p>
</div>
<div style="background:#fff; height:20px;border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;text-transform:uppercase"></p>
</div>
</div>
<div style="clear:both;"></div>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">NSSF No.</p>
</div>
<div style="background:#fff;width:30%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo stripslashes($rowd['nssf']) ?></p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">PIN No.</p>
</div>
<div style="background:#fff; height:20px;border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;text-transform:uppercase"><?php  echo stripslashes($rowd['pinno']) ?></p>
</div>
</div>
<div style="clear:both;"></div>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Comp. Bank</p>
</div>
<div style="background:#fff;height:20px; border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;text-transform:uppercase"></p>
</div>
</div>
<div style="clear:both;"></div>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Emp. Bank</p>
</div>
<div style="background:#fff;width:30%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px"><?php  echo stripslashes($row['bname']) ?></p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Account No.</p>
</div>
<div style="background:#fff; height:20px;border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;text-transform:uppercase"><?php  echo stripslashes($row['acno']) ?></p>
</div>
</div>
<div style="clear:both;"></div>


<div style="clear:both;width:100%;margin-bottom:30px"></div>

<div style="float:left; border-top:1.5px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">ITEM</p>
</div>
<div style="background:#99CCFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:bold;margin:0 10px 0 0px">BENEFITS</p>
</div>
<div style="background:#99CCFF;height:20px; border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:bold;margin:0 10px 0 0px">DEDUCTIONS</p>
</div>
</div>

<div style="clear:both;"></div>
<?php if(stripslashes($row['sal'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">BASIC PAY</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>

<?php } if(stripslashes($row['hallow'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">HOUSE ALLOWANCE</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['hallow']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['car'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">CAR BENEFIT</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['car']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['cash'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">CASH BENEFITS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['cash']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['airtime'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">AIRTIME BENEFITS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['airtime']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['leaveallow'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">LEAVE ALLOWANCE</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['leaveallow']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['bonus'])>0){ ?>


<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">BONUS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['bonus']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['thirteen'])>0){ ?>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">13TH MONTH BENEFIT</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['thirteen']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['notice'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">NOTICE BENEFIT</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['notice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;BORDER-BOTTOM:1PX SOLID #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['paye'])>0){ ?>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">PAYE</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['paye']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['nssf'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">NSSF</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['nhif'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">NHIF</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>


<?php } if(stripslashes($row['adva'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">ADVANCES</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>

<?php } if(stripslashes($row['sacco'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">SACCO</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['sacco']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>

<?php } if(stripslashes($row['loans'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">LOANS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['loans']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>

<?php } if(stripslashes($row['medical'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">MEDICAL</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['medical']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>

<?php } if(stripslashes($row['helb'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">HELB</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['helb']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['pfund'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">PROVIDENCE FUND</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['pfund']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>
<?php } if(stripslashes($row['otherdeds'])>0){ ?>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:50%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">OTHER DEDUCTIONS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['otherdeds']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>
<?php }  ?>


<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:30%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;border-LEFT:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">TOTALS</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:bold;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['gross']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;border-bottom:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:bold;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['totalded']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;"></div>

<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:30%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;border-LEFT:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">NET PAY (KES)</p>
</div>
<div style="background:#FFF;width:25%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:normal;margin:0 10px 0 0px"></p>
</div>
<div style="background:#FFF;height:20px; border-right:1px solid #333;border-bottom:1px solid #333;">
<p style="padding:1px;text-align:right;font-size:11px; font-weight:bold;margin:0 10px 0 0px"><script>document.writeln(( <?php echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both;margin-bottom:20px"></div>



<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">ABSENCES</p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">HOURS</p>
</div>
<div style="background:#99CCFF;width:20%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">DAYS</p>
</div>
<div style="background:#99CCFF;width:15%; height:20px; float:left;border-bottom:0px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">D WORK</p>
</div>
<div style="background:#99CCFF;height:20px; border-right:1px solid #333;border-bottom:1px solid #333">
<p style="padding:1px;text-align:center;font-size:11px; font-weight:normal;margin:0 0 0 0px;">MONTH</p>
</div>
</div>
<div style="float:left; border-top:0px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:20%; height:20px; float:left;border-bottom:1px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#FFF;width:20%; height:20px; float:left;border-bottom:1px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#FFF;width:20%; height:20px; float:left;border-bottom:1px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#FFF;width:15%; height:20px; float:left;border-bottom:1px solid #333;border-right:0px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
<div style="background:#FFF;height:20px;border-bottom:1px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
</div>
<div style="clear:both;margin-bottom:20px"></div>

<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:100%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">OTHER AMOUNTS</p>
</div>
</div>
<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:100%; height:20px; float:left;border-bottom:1px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
</div>
<div style="clear:both;margin-bottom:20px"></div>

<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#99CCFF;width:100%; height:20px; float:left;border-bottom:0px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px">MESSAGES</p>
</div>
</div>
<div style="float:left; border-top:1px solid #333;border-right:0px solid #333;border-left:1px solid #333;width:95%;border-bottom:0px solid #333;margin-left:20px">
<div style="background:#FFF;width:100%; height:20px; float:left;border-bottom:1px solid #333;border-right:1px solid #333;">
<p style="padding:1px;text-align:left;font-size:11px; font-weight:normal;margin:0 0 0 10px"></p>
</div>
</div>
<div style="clear:both;margin-bottom:20px"></div>


<div style="clear:both;margin-bottom:20px"></div>
<footer class="footer"></footer>
</div>
</div>

<?php

}
$code=$_GET['code'];
$mon=$_GET['mon'];
	if($code==1){
	$emp=$_GET['emp'];
	$result =mysql_query("select * from payroll where month='".$mon."' and emp='".$emp."'");
	payslp($result);
	}
	else{
		$query =mysql_query("select * from  payroll where month='".$mon."'");
	$count = mysql_num_rows($query);
	for ($i=0; $i <$count; $i++) {
	$row=mysql_fetch_array($query);
	$emp=stripslashes($row['emp']);
	$result =mysql_query("select * from  payroll where month='".$mon."' and emp='".$emp."'");
	payslp($result);

	}
	}

break;

case 8:
$mon=$_GET['mon'];
$branch=$_GET['branch'];
$fname='att_rep_'.clean(strtolower($branch));

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE ATTENDANCE REPORT<br/><strong style="font-size:11px">Month:<?php  echo $mon ?></strong><br/><strong style="font-size:11px">Branch:<?php  echo $branch ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;">PF No</td>
        <td  style="width:20%;">Employee Name</td>
        <?php
		for($a=1;$a<32;$a++){
		$d=sprintf("%02d",$a);
		echo'<td  style="width:2%;">'.$d.'</td>';
		}
		?>
        <td  style="width:10%;">Total</td>
        </tr>

<?php
if($branch=='All'){
	$result =mysql_query("select * from attendance where  month='".$mon."' order by branch,pfno");
}else{
$result =mysql_query("select * from   attendance where  month='".$mon."' and branch='".$branch."' order by pfno");	
}

$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$rowid=stripslashes($row['id']);
$empno=stripslashes($row['pfno']);
$total=0;


$resultx =mysql_query("select * from employee where emp='".$empno."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$biomid=stripslashes($rowx['biomid']);

if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['pfno']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['names']) ?></td>
<?php
for($a=1;$a<32;$a++){
$d=sprintf("%02d",$a);
$stamp=substr($mon,3,4).substr($mon,0,2).$d;

//get biometric and leaves data

	$status=0;

  	$resulta =mysql_query("select * from biometric_log where pin='".$biomid."' and stamp='".$stamp."' order by id asc limit 0,1");
	$num_resultsa = mysql_num_rows($resulta);
	if($num_resultsa>0){
		$rowa=mysql_fetch_array($resulta);
		$status=1;
		$time=preg_replace('~:~', '', stripslashes($rowa['timestamp']));
		$time = (int)$time;
		if($time>830){$status=5;}
		
	}else{

		//check if employee is on leave
		$xx='-';$col='#f00';

		$resultx =mysql_query("select * from leaves where endstamp>='".$stamp."' and commstamp<='".$stamp."' and emp='".$empno."' and status=2");
		$num_resultsx = mysql_num_rows($resultx);	
		if($num_resultsx>0){

			$rowx=mysql_fetch_array($resultx);
			$leavetype=stripslashes($rowx['leavetype']);
			if($leavetype=='Sick'){$status=3;}else{$status=2;}
			
		}

		
	}








	$d=$d.'c';
	if($status==1){
	$total+=1;
	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#0f6 \">PR</td>";
	}
	else if($status==2){
	$total+=1;

	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#0ff \">WL</td>";
	}
	else if($status==3){
	$total+=1;
	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#ff3 \">SL</td>";
	}
	else if($status==4){
	$total+=1;
	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#ff4dff \">OF</td>";
	}
	else if($status==5){
	$total+=0.5;
	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#FF8C00 \">HD</td>";
	}
	elseif($status==0){
	echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#F00 \">AB</td>";
	}

}
?>

<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $total ?></td>


</tr>
<?php } ?>

</tbody>
</table>
						



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 9:
$code=$_GET['code'];
$fname='leave_report';
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE LEAVE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  $d2 ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Summary  Report</p>
<?php } ?>
<?php $d1=stampreverse($d1);$d2=stampreverse($d2);?>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:7%;">Emp ID</td>
        <td  style="width:15%;">Employee Name</td>
       	<td  style="width:10%;">Branch</td>
       	<td  style="width:10%;">Position</td>
       	<td  style="width:10%;">Start Date</td>
       	<td  style="width:10%;">End Date</td>
       	<td  style="width:7%;">No. of Days</td>
       	<td  style="width:8%;">Pending Leave</td>
       	<td  style="width:7%;">Shadow</td>
       	<td  style="width:10%;">Reason</td>
        </tr>


<?php
if($code==1){
	$result =mysql_query("select * from leaves  where status=2 order by stamp asc");
}else{
$result =mysql_query("select * from leaves where status=2 and  ((commstamp>='".$d1."' and commstamp<='".$d2."')OR(endstamp>='".$d1."' and endstamp<='".$d2."')) order by stamp asc");
}
							$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
							$emp=stripslashes($row['emp']);


							$resultb =mysql_query("select * from employee where emp='".$emp."' order by serial asc limit 0,1");
							$rowb=mysql_fetch_array($resultb);


		if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['name']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['branch']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['position']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['commencedate']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['enddate']) ?></td>
<td  style="width:7%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['days']) ?></td>
<td  style="width:8%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($rowb['leaveac']) ?></td>
<td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['shadow']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['reason']) ?></td>
</tr>
<?php } ?>
</tbody>
</table>




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 10:
$reg=$_GET['reg'];
$date=date('Y/m/d');
$stamp=date('Ymd');
$fname='employees_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">EMPLOYEES LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;"> No</td>
   		<td  style="width:10%;">PF No</td>
   		<td  style="width:10%;">Biom Id</td>
        <td  style="width:20%;">Employee Name</td>
       	<td  style="width:10%;">Position</td>
       	<td  style="width:14%;">Phone No</td>
       	<td  style="width:14%;">Attendance</td>
       	<td  style="width:14%;">Salary</td>
       
        </tr>

	<?php
	$aa=0;
	if($reg==2){
		$result =mysql_query("select * from employee");
	}else{
		$result =mysql_query("select * from employee where status=".$reg."");
	}
	
	$num_results = mysql_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysql_fetch_array($result);
	$aa+=1;


		if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>

		<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?>.</td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>

		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['biomid']) ?></td>

		<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['fname']).' '. stripslashes($row['mname']).' '. stripslashes($row['lname'])?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['position']) ?></td>
		<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['phone']) ?></td>
		 <?php
		if(stripslashes($row['totattendance'])!=0){
        $a=stripslashes($row['attendance']) / stripslashes($row['totattendance']);
		$a=round($a,2)*100;
		$a=$a.'%';
		}else $a='0%';
		?>
		<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $a ?></td>
		<td  style="width:17%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row['salary']) ?>).formatMoney(2, '.', ','));</script></td>
		</tr>
		<?php } ?>
		</tbody>
		</table>

	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 
break;


case 11:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$user=$_GET['user'];
$fname='activity_log';
if($user=='All'){$code=1;}

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">SYSTEM ACTIVITY LOG<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>

<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo preg_replace('~/~', '', $d1);  ?>&nbsp;&nbsp;To:&nbsp;<?php  echo preg_replace('~/~', '', $d2);  ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>
<?php $d1=stampreverse($d1).'0000'; $d2=stampreverse($d2).'0000';?>
<div style="clear:both"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:12%;">Date</td>
        <td  style="width:12%;">Time</td>
       	<td  style="width:12%;">Username</td>
       	<td  style="width:63%;">Activity</td>
        </tr>


<?php


	if($code==1){
				if($d1==0){
				$result =mysql_query("select * from log where status=1");
				}
				else{
				$result =mysql_query("select * from log  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
				}
	
	}
	else if($code==2){
			if($d1==0){
			$result =mysql_query("select * from log where status=1 and username='".$user."'");
			}
			else{
			$result =mysql_query("select * from log  where stamp>='".$d1."' and stamp<='".$d2."' and status=1 and username='".$user."'");
			}
	}
	$num_results = mysql_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysql_fetch_array($result);
	
	

	if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>

		<td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['date']) ?></td>
		<td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['time']) ?></td>
		<td  style="width:12%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['username']) ?></td>
		<td  style="width:63%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['activity']) ?></td>
		</tr>
		<?php } ?>
		</tbody>
		</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;



case 12:
$reg=$_GET['reg'];
$category=$_GET['category'];
$fname=$category.'_'.$reg;
$reftitle='Ref No';$refno='';
if($category=='paye'){$reftitle='PIN NO';}
if($category=='nssf'){$reftitle='NSSF NO';}
if($category=='nhif'){$reftitle='NHIF NO';}

?>
<div style="width:70%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL MONTHLY <?php  echo strtoupper($category) ?> ALLOWANCE/DEDUCTION REPORT<br/><strong style="font-size:11px">Month:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:15%;">PF No</td>
   		<td  style="width:15%;">ID No</td>
   		<td  style="width:35%;">Employee Name</td>
   		<td  style="width:15%;"><?php echo $reftitle ?></td>
        <td  style="width:20%;">Amount</td>
         </tr>


<?php
$result =mysql_query("select * from payroll where month='".$reg."'");
$totaltax=0;
$totalscont=0;$totalsloan=0;
						$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
							$emp=stripslashes($row['emp']);
								
								$tax=stripslashes($row[$category]);
								$totaltax+=$tax;


						$resultx =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
						$rowx=mysql_fetch_array($resultx);
						$idno=stripslashes($rowx['idno']);
						if($category=='paye'){$refno=stripslashes($rowx['pinno']);}
						if($category=='nssf'){$refno=stripslashes($rowx['nssf']);}
						if($category=='nhif'){$refno=stripslashes($rowx['nhif']);}
							
				

if($i%2==0){
echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
}else{
	echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  stripslashes($row['emp']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $idno ?></td>
<td  style="width:35%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['name']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $refno ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row[$category]) ?>).formatMoney(2, '.', ','));</script></td>



</tr>
<?php } ?>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<td  style="width:15%;"></td>
		<td  style="width:15%;"></td>
   		<td  style="width:35%;">Totals</td>
   		<td  style="width:15%;"></td>
        <td  style="width:20%;"><script>document.writeln(( <?php  echo $totaltax?>).formatMoney(2, '.', ','));</script></td>
         </tr>

</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 13:
$reg=$_GET['reg'];
$resulta =mysql_query("select * from employee where emp='".$reg."'");
$rowa=mysql_fetch_array($resulta);
$names=stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']);
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE ATTENDANCE SUMMARY REPORT<br/><strong style="font-size:11px">NAME:<?php  echo $names ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:25%;">Month</td>
        <?php
		for($a=1;$a<32;$a++){
		$d=sprintf("%02d",$a);
		echo'<td  style="width:2%;">'.$d.'</td>';
		}
		?>
        <td  style="width:10%;">Total</td>
        </tr>

<?php
	

	$result =mysql_query("select * from  attendancelog order by id");
	$num_results = mysql_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysql_fetch_array($result);
	$mon=stripslashes($row['month']);

	$resulta =mysql_query("select * from  attendance where month='".$mon."' and pfno='".$reg."' order by pfno");	
	$num_resultsa = mysql_num_rows($resulta);
			for ($a=0; $a <$num_resultsa; $a++) {
			$rowa=mysql_fetch_array($resulta);
			$total=0;


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $mon ?></td>
<?php
for($a=1;$a<32;$a++){
$d=sprintf("%02d",$a);
$d=$d.'c';
if(stripslashes($rowa[$d])==1){
$total+=1;
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#0f6 \">PR</td>";
}
else if(stripslashes($rowa[$d])==2){
$total+=1;
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#0ff \">WL</td>";
}
else if(stripslashes($rowa[$d])==3){
$total+=1;
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#ff3 \">SL</td>";
}
else if(stripslashes($rowa[$d])==4){
$total+=1;
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#ff4dff \">OF</td>";
}
else if(stripslashes($rowa[$d])==5){
$total+=0.5;
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#FF8C00 \">HD</td>";
}
elseif(stripslashes($rowa[$d])==0){
echo "<td  style=\"width:2%;border-width:0.5px; border-color:#666; border-style:solid;background:#F00 \">AB</td>";
}

}
?>

<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $total ?></td>


</tr>
<?php } 

}?>

</tbody>
</table>
						



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 14:
$code=$_GET['code'];
$fname='leave_summary_report';
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$type=$_GET['type'];

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE LEAVE SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d2!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">As at:&nbsp;<?php  echo  $d2 ?>
	
	Type:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo  $type ?>
</p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Summary  Report</p>
<?php } ?>
<?php $d2=stampreverse($d2);
$d1=substr($d2,0,4).'0101';
?>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;">No.</td>
   		<td  style="width:10%;">PF No</td>
        <td  style="width:25%;">Employee Name</td>
       	<td  style="width:10%;">Position</td>
       	<td  style="width:10%;">Phone No</td>
       	<td  style="width:10%;">Opening Balance</td>
       	<td  style="width:10%;">Days Earned</td>
       	<td  style="width:10%;">Days Taken</td>
       	<td  style="width:10%;">Leave Balance</td>
       	 </tr>

	<?php
	$aa=0;
	$leavebal=0;
	$result =mysql_query("select * from employee where status=1");
	$num_results = mysql_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysql_fetch_array($result);
	$aa+=1;
	$days=0;
	if($type=='Annual'){$leavebal=stripslashes($row['leaveac']);}
	if($type=='Sick'){$leavebal=stripslashes($row['sickac']);}
	$resultx =mysql_query("select * from leaves where emp='".stripslashes($row['emp'])."' and stamp>='".$d1."'  and stamp<='".$d2."' and status=2 and leavetype='".$type."'");
	$num_resultsx = mysql_num_rows($resultx);
	for ($x=0; $x <$num_resultsx; $x++) {
	$rowx=mysql_fetch_array($resultx);
	$days+=stripslashes($rowx['days']);

	}

	//echo $d1.'-'.$d2;

	$resultb =mysql_query("select SUM(days) as total from leavetrack where drcr='dr' and description like '%Leave days awarded for Month%' and empno='".stripslashes($row['emp'])."' and stamp>='".$d1."'  and stamp<='".$d2."' and leavetype='".$type."'" );
	$rowb=mysql_fetch_array($resultb);
	$earned=round($rowb['total'],2);

	$opening=$leavebal+$days-$earned;

		if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>
		<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $aa ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
		<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['fname']).' '. stripslashes($row['mname']).' '. stripslashes($row['lname'])?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['position']) ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['phone']) ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $opening ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $earned ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $days ?></td>
		<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo $leavebal ?></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;


case 15:
$emp=$reg=$_GET['reg'];
$category=$_GET['category'];
$fname=$category.'_'.$reg;
$reftitle='Ref No';$refno='';

$result =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
$rowa=mysql_fetch_array($result);
$empname=stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']);


?>
<div style="width:70%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE <?php  echo strtoupper($category) ?> REPORT<br/><strong style="font-size:11px">Employee:<?php  echo $empname ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">No.</td>
   		<td  style="width:30%;">Month</td>
   		<td  style="width:30%;">Amount</td>
   		<td  style="width:30%;">Running Balance</td>
         </tr>


<?php
$result =mysql_query("select * from payroll where emp='".$reg."'");
$total=0;$aa=0;
						$num_results = mysql_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysql_fetch_array($result);
							$emp=stripslashes($row['emp']);
								
								$amount=stripslashes($row[$category]);
								$total+=$amount;

								$aa+=1;
							
				

if($i%2==0){
echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
}else{
	echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  $aa ?>.</td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['month']) ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo stripslashes($row[$category]) ?>).formatMoney(2, '.', ','));</script></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>



</tr>
<?php } ?>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<td  style="width:10%;"></td>
		<td  style="width:30%;"></td>
   		<td  style="width:30%;">Totals</td>
        <td  style="width:30%;"><script>document.writeln(( <?php  echo $total?>).formatMoney(2, '.', ','));</script></td>
         </tr>

</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;




case 16:
$emp=$reg=$_GET['reg'];
$year=$_GET['year'];
$fname=$year.'_'.$reg;
$reftitle='Ref No';$refno='';

$result =mysql_query("select * from employee where emp='".$emp."' limit 0,1");
$rowa=mysql_fetch_array($result);
$empname=stripslashes($rowa['fname']).' '.stripslashes($rowa['mname']).' '.stripslashes($rowa['lname']);


?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE LEAVE STATEMENT REPORT<br/><strong style="font-size:11px">Employee:<?php  echo $empname ?></strong><br/>
<strong style="font-size:11px">Year:<?php  echo $year ?></strong><br/>
	<strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;">No.</td>
   		<td  style="width:15%;">Leave Type</td>
   		<td  style="width:10%;">Month</td>
   		<td  style="width:10%;">Date</td>
   		<td  style="width:40%;">Description</td>
   		<td  style="width:10%;">Days</td>
   		<td  style="width:10%;">Balance</td>
        </tr>


<?php
$result =mysql_query("select * from leavetrack where empno='".$reg."' and month like '%".$year."%'");
$total=0;$aa=0;
$num_results = mysql_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysql_fetch_array($result);
$aa+=1;
							
				

if($i%2==0){
echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
}else{
	echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo  $aa ?>.</td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['leavetype']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['month']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['date']) ?></td>
<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['description']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['days']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['leavebal']) ?></td>
</tr>
<?php } ?>

</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 17:
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['code'])){
	$code=$_GET['code'];
}else $code=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='attendance_report';

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EMPLOYEE BIOMETRIC LOGIN ATTENDANCE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  $d2 ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Summary  Report</p>
<?php } ?>
<?php $d1=stampreverse($d1); $d2=stampreverse($d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>


<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:5%;">PF No</td>
        <td  style="width:20%;">Employee Name</td>
        <?php

        while($d1<=$d2){

        	echo'<td  style="width:5%;">'.substr($d1,6,2).'/'.substr($d1,4,2).'</td>';
			$s = new DateTime($d1);
			$s->modify('+1day');
			$d1= $s->format('Ymd');


        }
		?>
        </tr>

<?php

$result =mysql_query("select * from employee where status=1 order by emp");
$num_results = mysql_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysql_fetch_array($result);
	$biomid=stripslashes($row['biomid']);
	$empno=stripslashes($row['emp']);
	$total=0;


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['emp']) ?></td>
<td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']) ?></td>
<?php
$d1=$_GET['d1'];
$d1=stampreverse($d1);
 while($d1<=$d2){

	        $resulta =mysql_query("select * from biometric_log where pin='".$biomid."' and stamp='".$d1."' order by id asc limit 0,1");
	        $num_resultsa = mysql_num_rows($resulta);
	        if($num_resultsa>0){
	        	$rowa=mysql_fetch_array($resulta);
	        	$col='#0f6';
	        	$time=preg_replace('~:~', '', stripslashes($rowa['timestamp']));
				$time = (int)$time;
				if($time>830){$col='#ff3';}
	        	echo "<td  style=\"width:5%;border-width:0.5px; border-color:#666; border-style:solid;background:".$col." \">".stripslashes($rowa['timestamp'])."</td>";
	        
	        }else{

	        	//check if employee is on leave
	        	$xx='-';$col='#f00';

	        	$resultx =mysql_query("select * from leaves where endstamp>='".$d1."' and commstamp<='".$d1."' and emp='".$empno."' and status=2");
				$num_resultsx = mysql_num_rows($resultx);	
				if($num_resultsx>0){

					$xx='LEAVE';$col='#0ff';
					
				}

	        	echo "<td  style=\"width:5%;border-width:0.5px; border-color:#666; border-style:solid;background:".$col." \">".$xx."</td>";
	        }
			
			

		
			$s = new DateTime($d1);
			$s->modify('+1day');
			$d1= $s->format('Ymd');


 }


?>


</tr>
<?php } ?>

</tbody>
</table>
						



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

}



?>									
</body>
</html>