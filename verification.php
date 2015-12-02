<?php

if (isset($_GET['stud_id']) && !empty($_GET['stud_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$stud_id 	= $_GET['stud_id'];
	$finger		= getUserFinger($stud_id);

	echo "$stud_id;".$finger[0]['finger_data'].";SecurityKey;".$time_limit_ver.";".$base_path."process_verification.php;".$base_path."getac.php".";extraParams";
		
}

?>