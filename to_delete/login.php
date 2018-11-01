<?PHP
session_start();
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
			$_SESSION['logged_user'] = TRUE;
			echo "you're logged in";
		}
		else {

			echo "<div style=\"text-align: center;\"><span class=\"feedback\">Did you forget Your Password? You're fucked then</span></div>\n";
		}

	}
	else
	{
		echo "<div style=\"text-align: center;\"><span class=\"feedback\">User Account doesn't exsist, want to create an account?</span></div>\n";
			// header(Location: index.php);
	}
}
?>
