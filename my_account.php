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
			if ($info['account_passwd'] == $passwd)
			{
			 	if ($info['admin'] == 1)
				{
						$_SESSION['logged_admin'] = TRUE;
						$_SESSION['login'] = $_POST['login'];
				}
				else
				{
					$_SESSION['logged_user'] = TRUE;
					$_SESSION['login'] = $_POST['login'];
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
		<link rel ="stylesheet" href="index.css">
		<title>form</title>
	</head>
	<body>
		<header class="center shadow">
			<h1 id="home_page_title">X-Brain</h1>
			<div id="nav_list">
				<span class="pad_nav"><a href="index.php?home"><b>HOME</b></a></span>
				<span class="pad_nav"><a href="index.php?shop"><b>SHOP<b></a></span>
				<span class="pad_nav"><a href="index.php?technology"><b>TECHNOLOGY<b></a></span>
			</div>
<div class="">
<?PHP
	include("modules/"."cart.php");
	if (isset($_SESSION['login']))
		echo "<span class=\"pad_nav account_but\"><a href=\"my_account.php\"><b>".$_SESSION['login']."</b></a></span>";
	else
		echo "<span class=\"pad_nav account_but\"><a href=\"account.php\"><b>Me connecter</b></a></span>";
?>
</div>
		</header>
	<div class="row">
		<div class='log_in_container' style="float:none; margin:auto; ">
			<p>Mon compte -
<?PHP
echo $_SESSION['login'];
?>
</p>
			<form method="post" action="account.php">
				<lable>Mail</lable>
				<br />
					<input type="text" name="login" value="" required placeholder="your mail">
				<lable>Address</lable>
				<br />
					<input type="text" name="login" value="" required placeholder="your address">
				<button class="loginbtn" name="submit" type="submit" value="OK">Enregistrer</button>
			</form>
		</div>
	</div>
	</body>
</html>
