<?php
	
if (isset($_GET['msg']) && !empty($_GET['msg'])) {
	
	echo $_GET['msg'];

} elseif (isset($_GET['stud_fname']) && !empty($_GET['stud_fname']) && isset($_GET['time']) && !empty($_GET['time'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$stud_fname	= $_GET['stud_fname'];
	$time		= date('Y-m-d H:i:s', strtotime($_GET['time']));
	
	echo $stud_fname." login success on ".date('Y-m-d H:i:s', strtotime($time));
	
} else {
		
	$msg = "Parameter invalid..";
	
	echo "$msg";
	
}

	
?>