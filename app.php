<?php

	session_start();

	if(!(isset($_SESSION['logged_in'])))
	{
	header('Location: index.php');
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

<?php

	echo "<p>Hello ".$_SESSION['name'].'! <a href="logout.php">[Logout]</a><br />';
	echo "<p><b>Login</b>: ".$_SESSION['user'];
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];

?>
</body>
</html>