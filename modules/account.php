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
	// create account
	if (isset($_POST['account_login']) && isset($_POST['account_passwd']) && $_POST['account_passwd'] != "")
    {
        $error = 0;

		$_POST['account_passwd'] = hash("whirlpool",  $_POST['account_passwd']);
		unset($_POST['submit']);
		$new_user = $_POST;
		$new_user['admin'] = 0;
		if (!file_exists("./user_base"))
		{
            mkdir("./user_base");
			$new_user['admin'] = 1;
		}
		$list = glob("user_base/*.user");
		foreach ($list as $existing_user)
		{
			$existing_user = str_replace("user_base/", "", $existing_user);
  			if ("{$_POST['account_login']}.user" == $existing_user)
       		{
           		echo "<div style=\"text-align: center;\"><span class=\"feedback\">User name already exisits, try to login?</span></div>\n";
           		$error = 1;
       		}
		}
	}
	if($error == 0 && file_put_contents("user_base/{$new_user['account_login']}.user", serialize($new_user)))
	{
			echo "<div style=\"text-align: center;\"><span class=\"feedback\">Your account has been created, now jumping to the homepage</span></div>\n";
			$_SESSION['logged_user'] = TRUE;
			$_SESSION['login'] = $_POST['account_login'];

			header("Refresh: 3; url=index.php?home");

			/*HERE: redirect user to the homepage with logged session*/
	}

}
?>


	<div class="row">
		<div class="register_container">
			<p>Create Your account</p>
			<form method="post" action="account.php">
				<lable>Username</lable>
				<br />
					<input type="text" name="account_login" value="" placeholder="your name" required>
				<lable>Password</lable>
				<br />
					<input type="password" name="account_passwd" value="" placeholder="Password" required>
				<button class="registerbtn" name="submit" type="submit" value="OK">Create Account</button>
			</form>
		</div>
		<div class='log_in_container'>
			<p>Login</p>
			<form method="post" action="account.php">
				<lable>Username</lable>
				<br />
					<input type="text" name="login" value="" required placeholder="your name">
				<lable>Password</lable>
				<br />
					<input type="password" name="passwd" value="" required placeholder="your password">
				<button class="loginbtn" name="submit" type="submit" value="OK">Login</button>
			</form>
		</div>
	</div>
