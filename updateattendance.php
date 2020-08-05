<?php include('db_fns.php');

    $tstamp=date('Ymd');
    if(isset($_GET['status'])){
    	$status=1;
    }else{$status=0;}


    $result =mysql_query("select * from bmlog_register order by name desc limit 0,1");
	$num_results = mysql_num_rows($result);
	if($num_results==0||$status==1){
		$resultm = mysql_query("insert into bmlog_register values('".date('Ymd')."')");
		$poststamp=date('Ymd');
	}else{

		$row=mysql_fetch_array($result);
		$poststamp=stripslashes($row['name']);
	}



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



	//update leaves on attendance table

	$cur=date('m_Y');
    $today=date('d/m/Y');
	$from=date('Ym').'01';
	$to=date('Ym').'31';
	$dd=date('d').'c';
	$result =mysql_query("select * from backup  where name='".$today."'");
	$num_results = mysql_num_rows($result);	
	if($num_results==0){
		$result = mysql_query("insert into backup values('','".$today."')");


		$resultc =mysql_query("select * from leaves where status=2 and ((".$to.">=commstamp and ".$from."<=commstamp) or (".$to.">=endstamp and ".$from."<=endstamp))");
		$num_resultsc = mysql_num_rows($resultc);
		for ($a=0; $a <$num_resultsc; $a++) {
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

?>