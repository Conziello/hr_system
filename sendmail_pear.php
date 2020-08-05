function sendemail($email,$textmessage){




$to=$email;
$subject = 'New Leave Application';
$from=$reply="info@weclineshr.co.ke";
$cname='WECLINES HRMIS';

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
$text = $textmessage;


$message = '<html><body>';
$message.='<table border="0" cellpadding="0" cellspacing="0" width="100%">    
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
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

$html=$message;
 
// attachment
//$file = 'stomach.png';
$crlf = "\n";
 
$mime = new Mail_mime(array('eol' => $crlf));
$mime->setTXTBody($text);
$mime->setHTMLBody($html);
//$mime->addAttachment($file, 'text/plain');
 
$body = $mime->get();
$headers = $mime->headers($headers);
 
$host = "ssl://mail.weclineshr.co.ke";
$port = "465";
$username = "info@weclineshr.co.ke";
$password = "weclines123+";
 
$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,'port' => $port,
 'username' => $username,'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
   // echo("<p>" . $mail->getMessage() . "</p>");
}
else {
   // echo("<p>Message successfully sent!</p>");
}


