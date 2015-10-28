<?php	
	$sname = "localhost";
	$sqluser = "root";
	$sqlpasswd = "";
	
	// Create connection
	$db = new mysqli($sname, $sqluser, $sqlpasswd,'QuizBitz');
	
	// Check connection
	if ($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	}
	
	if(($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["markscheme"]))){
		if(check_empty1() == false){			
			$sql = "UPDATE marking_scheme SET p_marks={$pn},n_marks={$nn},hr={$hr},min={$min},sec={$sec},min_pass={$mpm} WHERE id=1";
		    if($db->query($sql) === TRUE){
				echo '<script>alert("Your scheme has been updated");</script>';
				$er_pn = $er_nn = $er_hr = $er_min = $er_sec = $er_mpm = "";
				$pn = $nn = $hr = $min = $sec = $mpm = "";
			} else {
		    	echo "Error creating database: " . $db->error;
			}
		}
	} else {
		global $er_pn,$er_nn,$er_hr,$er_min,$er_sec,$er_mpm;
		global $pn,$nn,$hr,$min,$sec,$mpm;
		$er_pn = $er_nn = $er_hr = $er_min = $er_sec = $er_mpm = "";
		$pn = $nn = $hr = $min = $sec = $mpm = "";
	}
	$db->close();
	function check_empty1(){
		global $er_pn,$er_nn,$er_hr,$er_min,$er_sec,$er_mpm;
		global $pn,$nn,$hr,$min,$sec,$mpm;
		
		$pn = $_POST['pn'];
		$nn = $_POST['nn'];
		$hr = $_POST['hr'];
		$min = $_POST['min'];
		$sec = $_POST['sec'];
		$mpm = $_POST['mpm'];
		
		$flag = false;
		if($_POST['pn'] !== '0' && empty($_POST['pn'])){
			$er_pn = "Required Field";
			$flag = true;
		}
		if($_POST['nn'] !== '0' && empty($_POST['nn'])){
			$er_nn = "Required Field";
			$flag = true;
		}
		if($_POST['hr'] !== '0' && empty($_POST['hr'])){
			$er_hr = "Required Field";
			$flag = true;
		}
		if($_POST['min'] !== '0' && empty($_POST['min'])){
			$er_min = "Required Field";
			$flag = true;
		}
		if($_POST['sec'] !== '0' && empty($_POST['sec'])){
			$er_sec = "Required Field";
			$flag = true;
		}
		if($_POST['mpm'] !== '0' && empty($_POST['mpm'])){
			$er_mpm = "Required Field";
			$flag = true;
		}
		return $flag;
	}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
		<legend>Marking Scheme</legend>
		Marks:<br>
		<input type="number" min="1" max="4" name="pn" placeholder="Positive Marks" value="<?php echo $pn;?>">
		<div class="error"><?php echo $er_pn;?></div>
		<input type="number" min="0" max="4" name="nn" placeholder="Negative Marks" value="<?php echo $nn;?>"><br>
		<div class="error"><?php echo $er_nn;?></div>
		Maximum Time:<br>
		<input type="number" min="0" name="hr" placeholder="Hours" value="<?php echo $hr;?>">
		<div class="error"><?php echo $er_hr;?></div>
		<input type="number" min="0" max="59" name="min" placeholder="Minutes" value="<?php echo $min;?>">
		<div class="error"><?php echo $er_min;?></div>
		<input type="number" min="0" max="59" name="sec" placeholder="Seconds" value="<?php echo $sec;?>"><br>
		<div class="error"><?php echo $er_sec;?></div>
		Passing Marks:<br>
		<input type="number" name="mpm" placeholder="Minimum Passing Marks" value="<?php echo $mpm;?>"><br>
		<div class="error"><?php echo $er_mpm;?></div>
		<input type="submit" name="markscheme" value="Submit">
	</fieldset>
</form>