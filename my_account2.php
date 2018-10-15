<?php
session_start();
if (isset($_POST['submit']))
{
	$error = 1;
	// login
	if (isset($_POST['login'], $_POST['passwd']) AND !empty($_POST['login']) AND !empty($_POST['passwd']))
	{
		#convert $_POST into local variables
		$login = $_POST['login'];
		$passwd = hash('whirlpool', $_POST['passwd']);
		$path = 'user_base/' . $login . "." . "user";
		if (file_exists($path))
		{
			$data = file_get_contents($path);
			$info = unserialize($data);
			// print_r($info);
			if ($info['account_passwd'] == $passwd)
			{
			 	if ($info['admin'] == 1)
				{
						$_SESSION['logged_admin'] = TRUE;
						$_SESSION['login'] = $_POST['login'];
						echo "<div style=\"text-align: center;\"><span class=\"feedback\">You have the DARK POWER!!!!! now redirecting to the home page</span></div>\n";
						header("Refresh: 3; url=admin.php");
				}
				else
				{
					$_SESSION['logged_user'] = TRUE;
					$_SESSION['login'] = $_POST['login'];
					echo "<div style=\"text-align: center;\"><span class=\"feedback\">You're logged in, now redirecting to the home page</span></div>\n";
					header("Refresh: 3; url=index.php?home");
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
		<link rel ="stylesheet" href="css/main.css">
		<title>form</title>
	</head>
	<body>
	<div class="row">
		<div class='log_in_container' style="float:none; margin:auto; ">
			<p>Mon compte -
<?PHP
echo $_SESSION['login'];
?>
</p>
			<form method="post" action="account.php">
				<lable>Username</lable>
				<br />
					<input type="text" name="login" value="" required placeholder="your name">
				<lable>Password</lable>
				<br />
					<input type="password" name="passwd" value="" required placeholder="your password">
				<button class="loginbtn" name="submit" type="submit" value="OK">Enregistrer</button>
			</form>
		</div>
	</div>
	</body>
</html>
