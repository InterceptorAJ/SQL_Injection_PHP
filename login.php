<?php

	session_start();

	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$connect = @new mysqli($host, $db_user, $db_password, $db_name);
	if($connect->connect_errno!=0)
	{
		echo "Errpr: ".$connect->connect_errno."Opis: ".$connect->connect_error;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

		if($result = @$connect->query($sql))
		{
			$how_many_users = $result->num_rows;
			if($how_many_users>0)
			{
				$_SESSION['logged_in'] = true;

				$row = $result->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['user'] = $row['user'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];

				unset($_SESSION['blad']);
				$result->free_result();
				header('Location: app.php');

			}
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Incorrect login or password!</span>';
				header('Location: index.php');
			}
		}

		$connect->close();
	}

	

?>

