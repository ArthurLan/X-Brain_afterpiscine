<?PHP
$_SESSION['login'] = null;
$_SESSION['logged_on'] = null;
$_SESSION['logged_admin'] = null;
header("Refresh: 3; url=index.php?home");
?>
<div class="center row"/>
	<div class="column">
		<p style="top: 10vw;">Vous avez été déconnecté avec succès</p>
	</div>
</div>
