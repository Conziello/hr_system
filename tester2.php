<?php include('db_fns.php');
ini_set("include_path", '/home/weclines/php:' . ini_get("include_path") );

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






$to=$cusemail;
$textmessage=$message;




 require_once "Mail.php";

$from = "Weclines <info@weclineshr.co.ke>";
$to = "Prince Munene <princemunene@gmail.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "ssl://mail.weclineshr.co.ke";
$port = "465";
$username = "info@weclineshr.co.ke";
$password = "weclines123+";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>