<?php
    	include 'include/global.php';
    	include 'include/function.php';

	if (isset($_GET['action']) && $_GET['action'] == 'index') {
?>		
		<div class="row">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="stud_fname">Username</label>	
					<select class="form-control" onchange="login_selectuser()" id='select_scan'>
						<option selected disabled="disabled"> -- Select Username -- </option>
							<?php				
								$strSQL = "SELECT a.* FROM student_tbl AS a JOIN stud_thumb AS b ON a.stud_id=b.stud_id";
								$result = mysql_query($strSQL);
								
								while($row = mysql_fetch_array($result)){
									
									$value = base64_encode($base_path."verification.php?stud_id=".$row['stud_id']);
								
									echo "<option value=$value id='option' stud_id='".$row['stud_id']."' stud_fname='".$row['stud_fname']."'>$row[stud_fname]</option>";
								}				
							?>
					</select>
				</div>
				<a href="" id="button_login" type="submit" class="btn btn-success">Login</a>
			</div>
			<div class="col-md-4">

			</div>
		</div>
<?php	
	}
?>