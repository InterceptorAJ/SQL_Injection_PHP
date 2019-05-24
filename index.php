<?php

	session_start();

	if((isset($_SESSION['logged_in']))&&($_SESSION['logged_in'])==true)
	{
		header('Location: app.php');
		exit();
	}

?>	

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Login Panel</title>
</head>

<body>
	Login Panel<br /> <br />
	<form action="login.php" method="post">
		Login <br /> <input type="text" name="login" /> <br />
		Password: <br /> <input type="password" name="password" /> <br /> <br />
		<input type="submit" value="Log in" />
	</form>

<?php
	if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>

</body>
</html>


