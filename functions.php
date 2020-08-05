<?php 
/*
ini_set("include_path", '/home/weclines/php:' . ini_get("include_path") );
include_once 'Mail.php';
include_once 'Mail/mime.php';
*/	

require 'PHPMailerAutoload.php';

function dateprint($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function stampreverse($date){
$a=substr($date,0,2);
$b=substr($date,3,2);
$c=substr($date,6,4);
$d=$c.$b.$a;
return $d;	
}
function clean($string){
	$string=str_replace('', '', $string);
	$string=str_replace('-', '', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
function stamptodate($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function timeconvert($y,$x){
	$x=preg_replace('~:~', '', $x);
	$y=preg_replace('~:~', '', $y);
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($y, 2, 2);
	
	
	if($a>$b){
		$b=$b+24;
		$y=$b.$c;
	}
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($x, 2, 2);
	$d=substr($y, 2, 2);
	
	$e=$b-$a;
	$f=$e * 60;
	$g=$d-$c;
	
	$h=$f+$g;
	return $h;
}
function datereverse2($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$a.'-'.$b.'-'.$c;

return $d;	
}

function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    if($weekDay==0){return 1;}
    else if($weekDay==6){return 0.5;}
    else{return 0;}
}

function getuser($user){
	$resulta =mysql_query("select * from users where name='".$user."' limit 0,1");
	$row=mysql_fetch_array($resulta);
	return stripslashes($row['fullname']);
}
function sendemail($cusemail,$message,$cusname){

$comname='WECLINES HRMIS';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'ssl://mail.weclineshr.co.ke';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@weclineshr.co.ke';                 // SMTP username
$mail->Password = 'weclines123+';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('info@weclineshr.co.ke', 'WECLINES HRMIS');
$mail->addAddress($cusemail, $cusname);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@weclineshr.co.ke', 'WECLINES HRMIS');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('docs/'.$docname.'.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                 // Set email format to HTML

$mail->Subject = 'New Leave Application';
$mail->Body    = '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">    
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0"  style="border: 1px solid #cccccc; border-collapse: collapse;width:100%">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                           <b style="color:#fff">WECLINES HRMIS</b>
                           </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>Greetings!</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                       '.$message.'
                                    	 <br/><br/>
                                       Best Regards,<br/>
                                       WECLINES HRMIS
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg; WECLINES HRMIS '.date('Y').'<br/>
                                      </td>
                                    <td align="right" width="25%">
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';
$mail->AltBody = 'Mail from '.$comname;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email has been sent';
}



							
}

function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a');
}

function datediff($x,$y){
$to_time = strtotime(datereverse2($y));
$from_time =strtotime(datereverse2($x));
$seconds=abs($to_time - $from_time);
$days=secondsToTime($seconds);
return $days;
}

function recent($a,$b){		
							echo'</div>
							</div>
							<div id="recentstude">
							<h5 style="margin-left:10px">Recent Searches</h5>';
							if(isset($_SESSION['recent'])){
								if(is_array($_SESSION['recent'])){
								$max=count($_SESSION['recent']);
								$least=0;
								if($max>=10){$least=$max-10;}
									
									for($i=$max-1;$i>=$least;$i--){
									$param=$_SESSION['recent'][$i][0];
									$des=$_SESSION['recent'][$i][1];
									$regn=$_SESSION['recent'][$i][2];
									if($des==$a){  
									echo"
<p style=\"font-size:11px; text-align:left; color:#333; margin-left:10px; cursor:pointer;\" onclick=\"paginate('".$b."','".$regn."')\">";
				echo"<img src=\"images/bullet.png\" style=\"width:12px; height:12px; margin:0 3px -2px 0\" onclick=\"paginate('".$b."','".$regn."')\">".$param."</p>";
									
										}
									}
							}
							}
							echo'</div>
							</div>';
}

function footemp($result,$param,$a){	
									
									$num_results = mysql_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="title">
									<div id="figure1" style="margin-left:0px;width:15%">PF No.</div>
									<div id="figure1" style="width:25%">Name</div>
									<div id="figure1" style="width:15%">Department</div>
									<div id="figure1" style="width:15%">Position</div>
									<div id="figure1" style="width:15%">Contact</div>
									<div id="figure1" style="width:15%">ID No</div>
									</div>';
									
									for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									$emp=stripslashes($row['emp']);
									$name=stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']);
									$dept=stripslashes($row['dept']);
									$pos=stripslashes($row['position']);
									$phone=stripslashes($row['phone']);
									$idno=stripslashes($row['idno']);
									
									echo"
									<div id=\"normal\" title=\"View Employee File\"  style=\"width:100%\" onclick=\"empchart('".$emp."')\">
									<div id=\"figure2\" style=\"width:15%;overflow:hidden\" >".$emp."</div>
									<div id=\"figure2\" style=\"width:25%;overflow:hidden\" >".$name."</div>
									<div id=\"figure2\" style=\"width:15%;overflow:hidden\" >".$dept."</div>
									<div id=\"figure2\" style=\"width:15%;overflow:hidden\" >".$pos."</div>
									<div id=\"figure2\" style=\"width:15%;overflow:hidden\" >".$phone."</div>
									<div id=\"figure2\" style=\"width:15%;overflow:hidden\" >".$idno."</div>
									</div><div class=\"cleaner\"></div>";
									
									
									}
									
									if($param!='default'){
									addsearch($name,$a,$emp);
									}
									}
}


function footpay($result,$param,$a){	
									
									$num_results = mysql_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="title">
									<div id="figure1" style="margin-left:0px;width:25%">Month</div>
									<div id="figure1" style="width:25%">Gross</div>
									<div id="figure1" style="width:25%">Deductions</div>
									<div id="figure1" style="width:25%">Net</div>
									</div>';
									
									for ($i=0; $i <$num_results; $i++) {
									$row=mysql_fetch_array($result);
									//if commited
									$query =mysql_query("select * from salregister where month='".stripslashes($row['month'])."' and status=1");
									$count = mysql_num_rows($query);
									if($count==0){
								
									echo'<div id="normal" title="View Pay Slip"  style="width:100%" onclick="window.open(\'output.php?id=7&code=1&mon='.stripslashes($row['month']).'&emp='.stripslashes($row['emp']).'\')">';
									echo"<div id=\"figure2\" style=\"width:25%;overflow:hidden\" >".stripslashes($row['month'])."</div>
									<div id=\"figure2\" style=\"width:25%;overflow:hidden\" >".number_format($row['gross'], 2, ".", "," )."</div>
									<div id=\"figure2\" style=\"width:25%;overflow:hidden\" >".number_format($row['totalded'], 2, ".", "," )."</div>
									<div id=\"figure2\" style=\"width:25%;overflow:hidden\" >".number_format($row['net'], 2, ".", "," )."</div>
									</div><div class=\"cleaner\"></div>";

									}
									
									
									}
									
									
									}
}


function addsearch($param,$des,$regn){
		
		
		if(isset($_SESSION['recent'])){
				if(is_array($_SESSION['recent'])){
				$max=count($_SESSION['recent']);
				$_SESSION['recent'][$max]=array($param,$des,$regn,);
				$_SESSION['recent'] = array_unique($_SESSION['recent'], SORT_REGULAR);
					}
			}
		
		else{
			$_SESSION['recent']=array(array());
			$_SESSION['recent'][0]=array($param,$des,$regn,);
			$_SESSION['recent'] = array_unique($_SESSION['recent'], SORT_REGULAR);
							
			
		}
	
}
function page($param,$count,$z,$page,$cat){
									//pagination
										$per_page = 10;
                    					$pages = ceil($count/$per_page);
										$b=$page;
								echo'</div>
								<div class="cleaner_h10"></div>
								<ul id="pagination">';
										$c=$pages-5;
										if($b<=$c){
										$b=$page+5;
										}
										else{
											$b=$pages;
											}
										if($page>6){
											$f=$page-5;
											echo'<a style="font-size:30px; float:left; margin-right:5px"> ...</a>';
										}
										else{
											$f=1;
											}
										for($i=$f; $i<=$page-1; $i++){
										echo "<li id=\"".$i."\" onclick=\"paginateteach('".$z."','".$param."',".$i.",'".$cat."')\">".$i."</li>";
										}
										

		echo "<li id=\"onspot\" onclick=\"paginateteach('".$z."','".$param."',".$page.",'".$cat."')\" style=\"color:#FF0084; border:1px solid #999\">".$page."</li>";		
                 						for($i=$page+1; $i<=$b; $i++){
										echo "<li id=\"".$i."\" onclick=\"paginateteach('".$z."','".$param."',".$i.",'".$cat."')\">".$i."</li>";
										}
										if($b!=$pages){echo'<p style="font-size:30px"> ...</p>';}
					 					echo '</ul>';
	
}
?>