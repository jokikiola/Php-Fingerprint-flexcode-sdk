<?php
	
if (isset($_GET['stud_id']) && !empty($_GET['stud_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';

	$stud_id 	= $_GET['stud_id'];

	echo "$stud_id;SecurityKey;".$time_limit_reg.";".$base_path."process_register.php;".$base_path."getac.php";
	
}

?>