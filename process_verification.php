<?php

if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {
		
	include 'include/global.php';
	include 'include/function.php';
	
	$data 		= explode(";",$_POST['VerPas']);
	$stud_id	= $data[0];
	$vStamp 	= $data[1];
	$time 		= $data[2];
	$sn 		= $data[3];
	
	$fingerData = getUserFinger($stud_id);
	$device 	= getDeviceBySn($sn);
	$sql1 		= "SELECT * FROM student_tbl WHERE stud_id='".$stud_id."'";
	$result1 	= mysql_query($sql1);
	$data 		= mysql_fetch_array($result1);
	$stud_fname	= $data['stud_fname'];
		
	$salt = md5($sn.$fingerData[0]['finger_data'].$device[0]['vc'].$time.$stud_id.$device[0]['vkey']);
	
	if (strtoupper($vStamp) == strtoupper($salt)) {
		
		$log = createLog($stud_fname, $time, $sn);
		
		if ($log == 1) {
			echo $base_path."messages.php?stud_fname=$stud_fname&time=$time";
		
		} else {
			echo $base_path."messages.php?msg=$log";
		}
	
	} else {
		$msg = "Parameter invalid..";
		echo $base_path."messages.php?msg=$msg";
	}
}

?>