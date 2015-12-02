<?php
	/*ini_set("display_errors", 0);
	error_reporting(0);*/

	$base_path		= "http://localhost/demo_flexcodesdk/";
	$db_name		= "fp_db";
	$db_user		= "root";
	$db_pass		= "";
	$db_host		= "127.0.0.1";
	$time_limit_reg = "20";
	$time_limit_ver = "10";

	$conn = mysql_connect($db_host, $db_user, $db_pass);
	if (!$conn) die("Connection for user $db_user refused!");
	mysql_select_db($db_name, $conn) or die("Can not connect to database!");
?>