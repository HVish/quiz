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
		$sql = "SELECT qid, que, op1, op2, op3, op4 FROM questions";
		$result = $db->query($sql);
		
		if ($result->num_rows > 0) {
			$Q_NO = 0;
		    while($row = $result->fetch_assoc()) {
		        $Q_SET[] = array($row['que'],$row['op1'],$row['op2'],$row['op3'],$row['op4']);
				$Q_NO++;
		    }
		} else {
		    echo "0 results";
		}
		$db->close();
		static $qno = 0;
		function ChangeQuestion(){
			global $qno;
			$qno++;
			echo $qno;
		}
		function printQNO(){
			
		}
		function printQUE(){
			
		}
		function printOPT($op){
			
		}
?>
<html>
	<head>
		<?php include 'head.php'?>
		<link href="css/index.css" rel="stylesheet">
		<title>QuizBitz</title>
	</head>
	<body>
		<header>
			<div class="row">
				<div class="logo col-4"> 
					<h1>QuizBitz</h1>
				</div>
				<div class="timer col-8">
					<div>
						<ul>
							<li><h3 id="hr10_v">0</h3></li>
							<li><h3 id="hr10_i">0</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3 id="hr_v">0</h3></li>
							<li><h3 id="hr_i">0</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3>:</h3></li>
							<li><h3>:</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3 id="min10_v">0</h3></li>
							<li><h3 id="min10_i">0</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3 id="min_v">0</h3></li>
							<li><h3 id="min_i">0</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3>:</h3></li>
							<li><h3>:</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3 id="sec10_v">0</h3></li>
							<li><h3 id="sec10_i">0</h3></li>
						</ul>
					</div>
					<div>
						<ul>
							<li><h3 id="sec_v">0</h3></li>
							<li><h3 id="sec_i">0</h3></li>
						</ul>
					</div>
				</div> 
			</div><!--row-->
			<div class="progress"></div>
		</header>
		<div class="container">
			<div class="window_box">
				<div class="row window_title">
					<h2>Question Number: <?php echo $qno;?></h2>
				</div>
				<div class="row que">
					<p>Q: <?php echo $Q_SET[$qno][0];?></p>
				</div>
				<div class="row options">
					<ul>
						<li><span><input type="radio" name="choice" value="1"></span><?php echo $Q_SET[$qno][1];?></li>
						<li><span><input type="radio" name="choice" value="1"></span><?php echo $Q_SET[$qno][2];?></li>
						<li><span><input type="radio" name="choice" value="1"></span><?php echo $Q_SET[$qno][3];?></li> 
						<li><span><input type="radio" name="choice" value="1"></span><?php echo $Q_SET[$qno][4];?></li>
					</ul>
				</div><!--options-->
				<div class="row response">
					<input type="submit" value="Previous">
					<input type="submit" value="Submit">
					<input type="submit" value="Next">
				</div>
			</div><!--qbox-->
		</div><!--container-->
		<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	    <script type="text/javascript" src="js/index.js"></script>
	</body>
</html>