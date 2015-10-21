<html>
	<head>
		<?php include 'head.php'?>
		<title>Dashboard</title>
		<link href="css/dashboard.css" rel="stylesheet">
	</head>
	<body>
		<?php include 'header.php'?>
		<div class="row wrapper">
			<div class="col-2 row tab">
				<ul>
					<li class="th_active">Add Questions</li>
					<li>List of Questions</li>
					<li>Marking Schemes</li>
					<li>Results</li>
				</ul>
			</div>
			<div class="col-10 tab_container">
				<div class="tc_active">
					<?php include 'addquestions.php'?>
				</div>
				<div>
					<?php include 'listofquestions.php'?>
				</div>
				<div>
					<?php include 'markingscheme.php'?>
				</div>
				<div>
					<?php include 'results.php'?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	    <script type="text/javascript" src="js/dashboard.js"></script>
	</body>
</html>