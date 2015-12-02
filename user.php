<?php
    	include 'include/global.php';
    	include 'include/function.php';

	if (isset($_GET['action']) && $_GET['action'] == 'index') {

		$user = getUser();

		if (count($user) > 0) {

			echo	"<div class='row'>"
					."<div class='col-md-12'>"
						."<table class='table table-bordered table-hover'>"
								."<thead>"
									."<tr>"
										."<th class='col-md-4'>User ID</th>"
										."<th class='col-md-4'>Username</th>"
										."<th class='col-md-2'>Template</th>"
										."<th class='col-md-2'>Action</th>"
									."</tr>"
								."</thead>"
								."<tbody>";

			foreach ($user as $row) {

				$finger 			= getUserFinger($row['stud_id']);
				$register			= '';
				$verification		= '';
				$url_register		= base64_encode($base_path."register.php?stud_id=".$row['stud_id']);
				$url_verification	= base64_encode($base_path."verification.php?stud_id=".$row['stud_id']);

				if (count($finger) == 0) {

					$register = "<a href='finspot:FingerspotReg;$url_register' class='btn btn-xs btn-primary' onclick=\"user_register('".$row['stud_id']."','".$row['stud_fname']."')\">Register</a>";

				} else {
					
					$verification = "<a href='finspot:FingerspotVer;$url_verification' class='btn btn-xs btn-success'>Login</a>";
					
				}

				echo		"<tr>"
				 					."<td>".$row['stud_id']."</td>"
				 					."<td>".$row['stud_fname']."</td>"
				 					."<td><code id='user_finger_".$row['stud_id']."'>".count($finger)."</code></td>"
				 					."<td>"
										."$register"
										."$verification"
									."</td>"
				 			."</tr>";
			}

			echo "</tbody>";
			echo "</table>";
			echo "</div>";
			echo "</div>";

		}

	}  elseif (isset ($_GET['action']) && $_GET['action'] == 'checkreg') {
		
		$sql1		= "SELECT count(finger_id) as ct FROM stud_thumb WHERE stud_id=".$_GET['stud_id'];
		$result1	= mysql_query($sql1);
		$data1 		= mysql_fetch_array($result1);
		
		if (intval($data1['ct']) > intval($_GET['current'])) {
			$res['result'] = true;			
			$res['current'] = intval($data1['ct']);			
		}
		else
		{
			$res['result'] = false;
		}
		echo json_encode($res);
		
	} else {

		echo "Parameter invalid..";

	}
?>