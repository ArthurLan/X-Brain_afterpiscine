<?php
if (isset($_SESSION['login']))
	header("Refresh: 0; url=my_account.php");
if (isset($_POST['submit']))
{
	$error = 1;
	// login
	if (isset($_POST['login'], $_POST['passwd']) AND !empty($_POST['login']) AND !empty($_POST['passwd']))
	{
		#convert $_POST into local variables
		$login = $_POST['login'];
		$passwd = hash('whirlpool', $_POST['passwd']);
		$path = 'private/user_base/' . $login . "." . "user";
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
						header("Refresh: 3; url=index.php?admin");
				}
				else
				{
					$_SESSION['logged_user'] = TRUE;
					$_SESSION['login'] = $_POST['login'];
					echo "<div style=\"text-align: center;\"><span class=\"feedback\">You're logged in, now redirecting to the home page</span></div>\n";
					header("Refresh: 3; url=index.php?home");
				}
			}
			else 
				echo "<div style=\"text-align: center;\"><span class=\"feedback\">Did you forget Your Password? You're fucked then</span></div>\n";
		}
		else
			echo "<div style=\"text-align: center;\"><span class=\"feedback\">User Account doesn't exsist, want to create an account?</span></div>\n";
	}
}
?>


<div class="center row">
	<div class='log_in_container'>
		<p style="float:right"><a href="index.php?create_account">Create account</a></p>
		<p>Login</p>
		<form method="post" action="index.php?login">
			<lable>Username</lable>
			<br />
				<input type="text" name="login" value="" required placeholder="your name">
			<lable>Password</lable>
			<br />
				<input type="password" name="passwd" value="" required placeholder="your password">
			<button class="center loginbtn" name="submit" type="submit" value="OK">Login</button>
		</form>
	</div>
</div>
