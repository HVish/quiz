<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
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
			<div class="qbox">
				<div class="row qheader">
					<h2>Question Number: 00</h2>
				</div>
				<div class="row que">
					<p>Q: This is where your question will be displayed.</p>
				</div>
				<div class="row options">
					<ul>
						<li><span><input type="checkbox" name="choice" value="1"></span>Option1</li>
						<li><span><input type="checkbox" name="choice" value="1"></span>Option2</li>
						<li><span><input type="checkbox" name="choice" value="1"></span>Option3</li> 
						<li><span><input type="checkbox" name="choice" value="1"></span>Option4</li>
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
	    <script type="text/javascript" src="js/scripts.js"></script>
	</body>
</html>