<?PHP
session_start()
//if (isset($_SESSION["loggued_user"]))
//{
//	echo "Hello\n";
//}
?>

<html>
	<head>
		<title>X-BRAIN</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<header class="center shadow">
			<h1 id="home_page_title">X-Brain - ADMIN</h1>
			<div id="nav_list">
				<span class="pad_nav"><a href="admin.php"><b>ADMIN_HOME</b></a></span>
				<span class="pad_nav"><a href="index.php?home"><b>WEBSITE</b></a></span>
			</div>
		</header>
		<?PHP
			if (isset(array_keys($_GET)[0]) && file_exists("modules/".array_keys($_GET)[0].".php"))
			{
				include("modules/".array_keys($_GET)[0].".php");
			}
		?>
	</body>
</html>
