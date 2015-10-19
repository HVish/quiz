<html>
	<head>
		<?php include 'head.php'?>
		<link href="css/admin.css" rel="stylesheet">
		<title>Admin</title>
	</head>
	<body>
		<?php include 'header.php'?>
		<div class="window_box">
			<div class="row window_title">
				<h2>Login</h2>
			</div>
			<div class="window_body">
				<form class="row login" action="dashboard.php" method="post">
					<input type="text" placeholder="Username"><br>
					<input type="password" placeholder="Password"><br>
					<input type="submit" value="Login"><br>
				</form>
			</div>
		</div>
	</body>
</html>