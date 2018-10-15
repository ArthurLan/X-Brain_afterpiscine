<?PHP
session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != "")
	unset($_SESSION['logged_user'])
	echo "You're logged out";
	header("Refresh: 3; url=index.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>logout</title>
	</head>
	<body>
		<form method="get" action="logout.php">
			<button class="registerbtn" name="submit" type="submit" value="OK">logout</button>
		</form>
	</body>
</html>
