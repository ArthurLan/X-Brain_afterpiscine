<?php
if (isset($_SESSION['login']))
	header("Refresh: 0; url=my_account.php");
if (isset($_POST['submit']))
{
	$error = 1;
	// create account
	if (isset($_POST['account_login']) && isset($_POST['account_passwd']) && $_POST['account_passwd'] != "")
    {
        $error = 0;

		$_POST['account_passwd'] = hash("whirlpool",  $_POST['account_passwd']);
		unset($_POST['submit']);
		$new_user = $_POST;
		$new_user['admin'] = 0;
		$new_user['phone'] = "";
		$new_user['mail'] = "";
		$new_user['address'] = "";
		$new_user['postal'] = "";
		$new_user['city'] = "";
		if (!file_exists("./user_base"))
		{
            mkdir("./user_base");
			$new_user['admin'] = 1;
		}
		$list = glob("user_base/*.user");
		foreach ($list as $existing_user)
		{
			$existing_user = str_replace("private/user_base/", "", $existing_user);
  			if ("{$_POST['account_login']}.user" == $existing_user)
       		{
           		echo "<div style=\"text-align: center;\"><span class=\"feedback\">User name already exisits, try to login?</span></div>\n";
           		$error = 1;
       		}
		}
	}
	if($error == 0 && file_put_contents("private/user_base/{$new_user['account_login']}.user", serialize($new_user)))
	{
			echo "<div style=\"text-align: center;\"><span class=\"feedback\">Your account has been created, now jumping to the homepage</span></div>\n";
			$_SESSION['logged_user'] = TRUE;
			$_SESSION['login'] = $_POST['account_login'];

			header("Refresh: 3; url=index.php?home");

			/*HERE: redirect user to the homepage with logged session*/
	}

}
?>


<div class="center row">
	<div class="log_in_container">
		<p style="float:right"><a href="index.php?login">Déjà inscrit ?</a></p>
		<p>Create Your account</p>
<br />
		<form method="post" action="index.php?create_account">
			<lable>Pseudo</lable>
				<input type="text" name="account_login" value="" placeholder="Pseudo" required>
			<lable>Prénom</lable>
				<input type="text" name="prenom" value="" placeholder="Prénom" required>
			<lable>Nom</lable>
				<input type="text" name="nom" value="" placeholder="Nom" required>
			<lable>Email</lable>
				<input type="text" name="email" value="" placeholder="Email" required>
			<lable>Password</lable>
				<input type="password" name="account_passwd" value="" placeholder="Mot de passe" required>
			<button class="center loginbtn" name="submit" type="submit" value="OK">Create Account</button>
		</form>
	</div>
</div>
