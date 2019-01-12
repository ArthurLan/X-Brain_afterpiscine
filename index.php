<?PHP
session_start();
//if (isset($_SESSION["loggued_user"]))
//{
//	echo "Hello\n";
//}
?>

<html lang="en">
	<head>
		<title>X-BRAIN</title>
		<link rel="stylesheet" type="text/css" href="index.css">
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
	</head>
	<body>
		<header class="center shadow">
			<h1 id="home_page_title">X-Brain</h1>
			<div id="nav_list">
				<span class="pad_nav"><a href="index.php?home"><b>HOME</b></a></span>
				<span class="pad_nav"><a href="index.php?shop"><b>SHOP<b></a></span>
				<span class="pad_nav"><a href="index.php?technology"><b>TECHNOLOGY<b></a></span>
<?PHP
if (isset($_SESSION['logged_admin']))
	echo "<span class=\"pad_nav\"><a href=\"index.php?admin\"><b>ADMIN<b></a></span>";
//	echo "<span class=\"pad_nav\">><b>ADMIN<b></a></span>";
?>
			</div>
<div class="">
<?PHP
	include("modules/"."cart.php");
	if (isset($_SESSION['login']))
	{
		echo "<span class=\"pad_nav account_but\"><a href=\"index.php?my_account\"><b>".$_SESSION['login']."</b></a></span>";
		echo "<span class=\"pad_nav disconnect_but\"><a href=\"index.php?disconnect\"><b>Se déconnecter</b></a></span>";

	}
	else
		echo "<span class=\"pad_nav account_but\"><a href=\"index.php?login\"><b>Me connecter</b></a></span>";
?>
</div>
		</header>
		<?PHP
			if (isset(array_keys($_GET)[0]) && file_exists("modules/".array_keys($_GET)[0].".php"))
			{
				include("modules/".array_keys($_GET)[0].".php");
			}
			else
				include("modules/home.php");
		?>
	</body>
</html>
