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
	
	if(($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addque"]))){
		if(check_empty() == false){
			$que = test_input($que);
			$op1 = test_input($op1);
			$op2 = test_input($op2);
			$op3 = test_input($op3);
			$op4 = test_input($op4);
			
			$stmt = $db->prepare("INSERT INTO questions (que,op1,op2,op3,op4) VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $que, $op1, $op2, $op3, $op4);
		    if($stmt->execute() === TRUE){
				echo '<script>alert("Your question has been added");</script>';
				$er_que = $er_op1 = $er_op2 = $er_op3 = $er_op4 = "";
				$que = $op1 = $op2 = $op3 = $op4 = "";
			} else {
		    	echo "Error creating database: " . $db->error;
			}
			$stmt->close();
		}	
	} else {
		global $er_que,$er_op1,$er_op2,$er_op3,$er_op4;
		global $que,$op1,$op2,$op3,$op4;
		$er_que = $er_op1 = $er_op2 = $er_op3 = $er_op4 = "";
		$que = $op1 = $op2 = $op3 = $op4 = "";
	}
	$db->close();
	function check_empty(){
		global $er_que,$er_op1,$er_op2,$er_op3,$er_op4;
		global $que,$op1,$op2,$op3,$op4;
		
		$flag = false;
		
		$que = $_POST["que"];
		$op1 = $_POST["op1"];
		$op2 = $_POST["op2"];
		$op3 = $_POST["op3"];
		$op4 = $_POST["op4"];
		
		if(empty($_POST["que"])){
			$er_que = "Required Field";
			$flag = true;
		}
		if(empty($_POST["op1"])){
			$er_op1 = "Required Field";
			$flag = true;
		}
		if(empty($_POST["op2"])){
			$er_op2 = "Required Field";
			$flag = true;
		}
		if(empty($_POST["op3"])){
			$er_op3 = "Required Field";
			$flag = true;
		}
		if(empty($_POST["op4"])){
			$er_op4 = "Required Field";
			$flag = true;
		}
		return $flag;
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
		<legend>Add a question</legend>
		Question:<br>
		<textarea name="que" id="" cols="30" rows="4" placeholder="Your question comes here..."><?php echo $que;?></textarea>
		<div class="error"><?php echo $er_que;?></div>
		<br>Answers:<br>
		<input type="text" placeholder="Correct Answer" name="op1" value="<?php echo $op1;?>">
		<div class="error"><?php echo $er_op1;?></div>
		<input type="text" placeholder="Wrong Answer1" name="op2" value="<?php echo $op2;?>">
		<div class="error"><?php echo $er_op2;?></div>
		<input type="text" placeholder="Wrong Answer2" name="op3" value="<?php echo $op3;?>">
		<div class="error"><?php echo $er_op3;?></div>
		<input type="text" placeholder="Wrong Answer3" name="op4" value="<?php echo $op4;?>">
		<div class="error"><?php echo $er_op4;?></div>
		<input type="submit" name="addque" value="Submit Question">
	</fieldset>
</form>