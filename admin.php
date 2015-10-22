<?php
	$user = "";
	$passwd = "";
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = test_input($_POST["user"]);
		$passwd = test_input($_POST["passwd"]);
		if( $user == "admin" && $passwd == "admin"){
			header('location:'.'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/dashboard.php');
		}
		else{
			$error = "Wrong username or password!";
		}
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>
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
				<form class="row login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input type="text" name="user" placeholder="Username" value=<?php echo $user;?>><br>
					<input type="password" name="passwd" placeholder="Password"><br>
					<div class="error"><?php echo $error; ?></div>
					<input type="submit" value="Login"><br>
				</form>
			</div>
		</div>
	</body>
</html>