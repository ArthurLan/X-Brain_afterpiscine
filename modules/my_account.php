<?php
if (isset($_SESSION['login']))
{
		$login = $_SESSION['login'];
		$path = 'private/user_base/' . $login . "." . "user";
		if (file_exists($path))
		{
			$data = file_get_contents($path);
			$info = unserialize($data);
			//print_r($info);
			if (isset($_POST['submit']))
			{
				$old_pass = hash('whirlpool', $_POST['old_pass']);
				if ($info['account_passwd'] == $old_pass)
				{
					$new_info = $info;
					if (isset($_POST['prenom']))
						$new_info['prenom'] = $_POST['prenom'];
					if (isset($_POST['nom']))
						$new_info['nom'] = $_POST['nom'];
					if (isset($_POST['email']))
						$new_info['email'] = $_POST['email'];
					if (isset($_POST['phone']))
						$new_info['phone'] = $_POST['phone'];
					if (isset($_POST['address']))
						$new_info['address'] = $_POST['address'];
					if (isset($_POST['postal']))
						$new_info['postal'] = $_POST['postal'];
					if (isset($_POST['city']))
						$new_info['city'] = $_POST['city'];
					if (isset($_POST['new_pass']) && $_POST['new_pass'] != "")
						$new_info['account_passwd'] = $_POST['new_pass'];
					//print_r($new_info);
					if (file_put_contents("private/user_base/{$login}.user", serialize($new_info)))
					;//	echo "<div>Informations mises à jour\n</div>";
					header("Refresh: 1; url=index.php?my_account");
				}
			}
		}
}
?>


<div class="center row">
	<div class="log_in_container">
		<p>Modifier vos informations</p>
		<br />
		<p>Login : <?PHP echo ($info['account_login'])?></p>
		<form method="post" action="index.php?my_account">
		<br />
			<lable>Prénom</lable>
			<input type="text" name="prenom" value="<?PHP echo (@$info['prenom'])?>" placeholder="Prénom"/>
			<lable>Nom</lable>
			<input type="text" name="nom" value="<?PHP echo (@$info['nom'])?>" placeholder="Nom"/>
			<lable>Email</lable>
			<input type="text" name="email" value="<?PHP echo (@$info['email'])?>" placeholder="Email"/>
			<lable>Téléphone</lable>
			<input type="text" name="phone" value="<?PHP echo (@$info['phone'])?>" placeholder="Téléphone"/>
			<lable>Adresse</lable>
			<input type="text" name="address" value="<?PHP echo (@$info['address'])?>" placeholder="adresse (rue et numéro)"/>
			<lable>Code postal</lable>
			<input type="text" name="postal" value="<?PHP echo (@$info['postal'])?>" placeholder="Code postal"/>
			<lable>Ville</lable>
			<input type="text" name="city" value="<?PHP echo (@$info['city'])?>" placeholder="Ville"/>
			<lable>Modifier mot de passe</lable>
			<input type="password" name="new_pass" value="" placeholder="Nouveau mot de passe"/>
			<lable>Password</lable>
			<input type="password" name="old_pass" value="" placeholder="Mot de passe" required/>
			<button class="center loginbtn" name="submit" type="submit" value="OK">Modifier informations</button>
		</form>
	</div>
</div>
