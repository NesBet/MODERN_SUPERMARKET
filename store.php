<!DOCTYPE html>
<html>
<head>
	<title>STORE Page</title>
		<link rel="stylesheet" type="text/css" href="store.css">
</head>
<body>
	<h1>KARIBU SUPERMARKET</h1>
	
	<form method="post" action="">
		<input type="submit" name="Login" value="SIGN IN">
		<input type="submit" name="Sign_up" value="SIGN UP">
	</form>

	<?php
		if(isset($_POST['Login'])) {
			header('Location: login.php');
			exit;
		} 
        elseif(isset($_POST['Sign_up'])) {
            header('Location: sign.php');
		} 
	?>
</body>
</html>