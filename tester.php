<?php include('db_fns.php');

include('functions.php');





/*

$resulta =mysql_query("select * from employee");

							$num_resultsa = mysql_num_rows($resulta);	

							for ($i=0; $i <$num_resultsa; $i++) {

								$rowx=mysql_fetch_array($resulta);

								$emp=stripslashes($rowx['emp']);

								$parts=explode(' ',stripslashes($rowx['fname']));

								$fname=$parts[0];

								$lname=$parts[1];

								$mname=$parts[2];



								$resultm = mysql_query("update employee set fname='".$fname."',mname='".$mname."',lname='".$lname."' where emp='".$emp."'");



							



							}

							*/

							/*

							

							$resulta =mysql_query("select * from employee");

							$num_resultsa = mysql_num_rows($resulta);	

							for ($i=0; $i <$num_resultsa; $i++) {

								$rowx=mysql_fetch_array($resulta);

								$emp=stripslashes($rowx['emp']);

								

								$resultm = mysql_query("update payroll set dept='".stripslashes($rowx['dept'])."',branch='".stripslashes($rowx['branch'])."',bname='".stripslashes($rowx['bname'])."',branchname='".stripslashes($rowx['branchname'])."',eftcode='".stripslashes($rowx['eftcode'])."',acno='".stripslashes($rowx['acno'])."',status=1 where emp='".$emp."'");



							



							}

							*/

							/*

							$resulta =mysql_query("select * from banksheet");

							$num_resultsa = mysql_num_rows($resulta);	

							for ($i=0; $i <$num_resultsa; $i++) {

								$rowx=mysql_fetch_array($resulta);

								$emp=stripslashes($rowx['emp']);

								$eftcode=stripslashes($rowx['eftcode']);

								$acno=stripslashes($rowx['acno']);

								

								$resultm = mysql_query("update employee set eftcode='".$eftcode."' where acno='".$acno."'");



							



							}



							*/



							/*



							 //day register

						  	$cur=date('m_Y');

						    $today=date('d/m/Y');

							$from=date('Ym').'01';

							$to=date('Ym').'31';

							$dd=date('d').'c';

							$result =mysql_query("select * from backup  where name='".$today."'");

							$num_results = mysql_num_rows($result);	

							if($num_results==0){

								$result = mysql_query("insert into backup values('','".$today."')");





								$resultc =mysql_query("select * from leaves where status!=1 and ((".$to.">=commstamp and ".$from."<=commstamp) or (".$to.">=endstamp and ".$from."<=endstamp))");

								$num_resultsc = mysql_num_rows($resultc);

								echo $num_resultsc;

								for ($a=0; $a <$num_resultsc; $a++) {

								$rowb=mysql_fetch_array($resultc);

								$emp=stripslashes($rowb['emp']);

								$start=stripslashes($rowb['commstamp']);

								$end=stripslashes($rowb['endstamp']);

								$leavetype=stripslashes($rowb['leavetype']);



										while($start<=$end){



											 $start = new DateTime($start);

										     $start->modify('+1day');

										     $dd= $start->format('d').'c';

										     $start= $start->format('Ymd');

										     if($leavetype=='Sick'){$status=3;}else{$status=2;}



										     $resultx = mysql_query("update attendance set ".$dd."='".$status."' where pfno='".$emp."' and month='".$cur."'");



										}



								

								}

								

							}



							*/

							/*

							$resulta =mysql_query("select * from employee");

							$num_resultsa = mysql_num_rows($resulta);	

							for ($i=0; $i <$num_resultsa; $i++) {

								$rowx=mysql_fetch_array($resulta);

								$emp=stripslashes($rowx['emp']);

								$leaveac=stripslashes($rowx['leaveac']);

								$empname=stripslashes($rowx['fname']).' '.stripslashes($rowx['mname']).' '.stripslashes($rowx['lname']);

								

								$leaveac=$leaveac-2;

								

								$resulty = mysql_query("insert into leavetrack values('0','Annual','".$emp."','".$empname."','10_2017','2','".$leaveac."','cr','Deduction of Leave days erroneously awarded on 09/10/2017','".date('d/m/Y')."','".date('Ymd')."',1)") or die (mysql_error());

								$resultg = mysql_query("update employee set leaveac='".$leaveac."' where emp='".$emp."'");			

								



							}

							*/

/*

$names='prince munene';

$cusemail='princemunene@gmail.com';

$message='hello prince';

$result =mysql_query("select * from company");

$row=mysql_fetch_array($result);

$comname=strtoupper(stripslashes($row['CompanyName']));

$tel='Tel: '.stripslashes($row['Tel']);

$Add='P.O BOX '.stripslashes($row['Address']);

$web='Web: '.stripslashes($row['Website']);

$comemail='Email: '.stripslashes($row['Email']);

$logo=stripslashes($row['Logo']);

echo $comemail;









$mail = new PHPMailer;



  



//$mail->SMTPDebug = 3;                               // Enable verbose debug output



$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = 'princemunene@gmail.com';                 // SMTP username

$mail->Password = 'enenum123~';                           // SMTP password

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

$mail->Port = 587; 









                                    // TCP port to connect to



$mail->setFrom($comemail, 'Property Portal MIS');

$mail->addAddress($cusemail, $names);     // Add a recipient

//$mail->addAddress('ellen@example.com');               // Name is optional

$mail->addReplyTo($comemail, $comname);

//$mail->addCC('cc@example.com');

//$mail->addBCC('bcc@example.com');



//$mail->addAttachment('docs/'.$docname.'.pdf');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML









$mail->Subject = $comname.'-Email Notification';

$mail->Body    = '<table border="0" cellpadding="0" cellspacing="0" width="100%">    

        <tr>

            <td style="padding: 10px 0 30px 0;">

                <table align="center" border="0" cellpadding="0" cellspacing="0" width="1000" style="border: 1px solid #cccccc; border-collapse: collapse;">

                    <tr>

                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">

                           <b style="color:#fff">'.$comname.'</b>

                            <img src="http://qet.co.ke/'.$logo.'" alt="Logo" width="124" height="50" style="display: block;" />

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

                                       Hi '.$names.',

                                       <br/>

                                       '.$message.'

                                       <br/><br/>

                                       Best Regards,<br/>

                                       '.$comname.' Team

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

                                        &reg; '.$comname.' '.date('Y').'<br/>

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



if(!$mail->send()) {echo 'Success.Email sent!'; 

} else {

	echo 'Error.Email not sent.';

}



*/



			/*



			$mon='03_2018';

			$result =mysql_query("select * from attendance where  month='".$mon."' order by branch,pfno");

			$num_results = mysql_num_rows($result);

			for ($i=0; $i <$num_results; $i++) {

			$row=mysql_fetch_array($result);

			$rowid=stripslashes($row['id']);

			$empno=stripslashes($row['pfno']);

			$total=0;



			for($a=1;$a<32;$a++){

			$d=sprintf("%02d",$a);

			$tstamp='201803'.$d;

			$d=$d.'c';



			if(stripslashes($row[$d])==0){





				$resultx =mysql_query("select * from leaves where commstamp<='".$tstamp."' and endstamp>='".$tstamp."' and  emp='".$empno."' and status=2");

				$num_resultsx = mysql_num_rows($resultx);	

				if($num_resultsx>0){



					$resultx = mysql_query("update attendance set ".$d."='2' where id='".$rowid."'");



				}





			}





			}





		}



		*/

							/*



 							$cur=date('m_Y');

						    $today=date('d/m/Y');

							$from=date('Ym').'01';

							$to=date('Ym').'31';

							$dd=date('d').'c';

							$result =mysql_query("select * from backup  where name='".$today."'");

							$num_results = mysql_num_rows($result);	

							if($num_results!=0){

								$result = mysql_query("insert into backup values('','".$today."')");





								$resultc =mysql_query("select * from leaves where status=2 and ((".$to.">=commstamp and ".$from."<=commstamp) or (".$to.">=endstamp and ".$from."<=endstamp))");

								$num_resultsc = mysql_num_rows($resultc);

								

								for ($aa=0; $aa <$num_resultsc; $aa++) {

								$rowb=mysql_fetch_array($resultc);

								$emp=stripslashes($rowb['emp']);

								$start=stripslashes($rowb['commstamp']);

								$end=stripslashes($rowb['endstamp']);

								$leavetype=stripslashes($rowb['leavetype']);



							



										while($start<=$end){





											

											 $dd=substr($start,6,2).'c';

											 

										    if($leavetype=='Sick'){$status=3;}else{$status=2;}



										    $resultx = mysql_query("update attendance set ".$dd."='".$status."' where pfno='".$emp."' and month='".$cur."'") or die (mysql_error());



										     

										     $start = new DateTime($start);

										     $start->modify('+1day');

										     $start= $start->format('Ymd');



										 



										}



								

								}

								

							}



							











								$start='20180321';

								$start = new DateTime($start);

								$start->modify('+1day');

								$start= $start->format('Ymd');

								echo $start;



								*/



								/*



								function encrypt_decrypt($action, $string) {

								$output = false;

								$encrypt_method = "AES-256-CBC";

								$secret_key = 'This is my secret key';

								$secret_iv = 'This is my secret iv';

								// hash

								$key = hash('sha256', $secret_key);



								// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning

								$iv = substr(hash('sha256', $secret_iv), 0, 16);

								if ( $action == 'encrypt' ) {

								    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);

								    $output = base64_encode($output);

								} else if( $action == 'decrypt' ) {

								    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

								}

								return $output;



								}





								$serial=shell_exec('wmic DISKDRIVE GET SerialNumber 2>$1');

								echo $serial.'<br/>';

								$encrypted_txt = encrypt_decrypt('encrypt', $serial);

								echo $encrypted_txt;



								*/



								//echo sha1('password');

								/*

								$email='princemunene@gmail.com';

								$message='hallo prince';



								sendemail($email,$message);	



								echo $email;

							*/

/*

$textmessage='Dear {0},

 

You have successfully registered to attend the UK Universities Clearing Fair at Villa Rosa Kempinski. As soon as you receive your results on the 15th of August, you can head straight to Kempinski for on the Spot offers. If you already have your results already, kindly get in touch with SI-UK Kenya as soon as possible to begin Clearing and Adjustment process. Do not miss this opportunity to meet many UK Universities face to face.



Your registration ID is {1}.

Please make a note of your registration ID to confirm entry to the event.';

$message = '<html><body>';

$message.='<table border="0" cellpadding="0" cellspacing="0" width="100%">    

        <tr>

            <td style="padding: 10px 0 30px 0;">

                <table align="center" border="0" cellpadding="0" cellspacing="0" width="1000" style="border: 1px solid #cccccc; border-collapse: collapse;">

                    <tr>

                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">

                           <img src="images/unis/top-banner.jpg" style="width: 100%;">

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

                                       '.$textmessage.'

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

$message .= '</body></html>';



echo $message;



*/





 //$tstamp=date('Ymd');

/*

	$tstamp='20190101';

    if(isset($_GET['status'])){

    	$status=1;

    }else{$status=0;}





    $result =mysql_query("select * from bmlog_register order by name desc limit 0,1");

	$num_results = mysql_num_rows($result);

	if($num_results==0||$status==1){

		$resultm = mysql_query("insert into bmlog_register values('".$tstamp."')");

		$poststamp=date('Ymd');

	}else{



		$row=mysql_fetch_array($result);

		$poststamp=stripslashes($row['name']);

	}





	*/



	/*

	$poststamp='20190525';

	$tstamp=date('Ymd');

	$s = new DateTime($tstamp);

	$s->modify('+1day');

	$tomorrow= $s->format('Ymd');







	while($poststamp<$tomorrow){



	     



		



		if($poststamp<=$tstamp){



					



					$resultm = mysql_query("insert into bmlog_register values('".$poststamp."')");





					$resultc =mysql_query("select * from employee where status=1");

					$num_resultsc = mysql_num_rows($resultc);	

					for ($c=0; $c <$num_resultsc; $c++) {

						$rowc=mysql_fetch_array($resultc);

						$pfno=stripslashes($rowc['emp']);

						$biomid=stripslashes($rowc['biomid']);



						$resulta =mysql_query("select * from biometric_log where stamp='".$poststamp."' and pin='".$biomid."' order by id asc limit 0,1");

						$num_resultsa = mysql_num_rows($resulta);

						if($num_resultsa>0){



							$rowa=mysql_fetch_array($resulta);

							$time=preg_replace('~:~', '', stripslashes($rowa['timestamp']));

							$time = (int)$time;



							$status=0;

							if($time<=830){$status=1;}

							if($time>830){$status=5;}

							$dd=substr($poststamp,6,2).'c';

							$mon=substr($poststamp,4,2).'_'.substr($poststamp,0,4);



							$resultx = mysql_query("update attendance set ".$dd."='".$status."' where pfno='".$pfno."' and month='".$mon."'") or die (mysql_error());





						}	//end if



						







					}//end for



		}//end if





		$s = new DateTime($poststamp);

		$s->modify('+1day');

		$poststamp= $s->format('Ymd');







	}//end while



	*/
	/*

							$arr=array();

						$resulta =mysql_query("select * from leavetrack where month='01_2019' and description like '%Leave days awarded for Month%'");

						$num_resultsa = mysql_num_rows($resulta);	

						for ($i=0; $i <$num_resultsa; $i++) {

							$rowx=mysql_fetch_array($resulta);

							$emp=stripslashes($rowx['empno']);

							$id=stripslashes($rowx['id']);



							if(isset($arr[$emp])){



								$resultx = mysql_query("DELETE from leavetrack where id='".$id."'");



							}else{

								$arr[$emp]=$emp;

							}

							

							



						}

						*/


$cusemail='prince@qet.co.ke';
$names='prince munene';
$message='wossup';
$comname='qet';
$title='invoice';

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
$mail->addAddress($cusemail, $names);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@weclineshr.co.ke', 'WECLINES HRMIS');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('docs/'.$docname.'.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                 // Set email format to HTML

$mail->Subject = 'New Leave Application';
$mail->Body    = '<table border="0" cellpadding="0" cellspacing="0" width="100%">    
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0"  style="border: 1px solid #cccccc; border-collapse: collapse;100%">
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

?>



								