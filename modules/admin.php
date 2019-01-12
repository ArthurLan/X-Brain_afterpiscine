<div class="center row"/>
	<div class="column" style="position: absolute">
		<div class="center back_pic" style=""/> 
		</div>
	</div>
	<div class="column side shadow">
		<!-- <div class="cat"><a href="index.php?admin"><b>ALL</b></a></div> -->
		<div class="cat"><a href="index.php?admin&user"><b>user</b></a></div>
		<div class="cat"><a href="index.php?admin&item"><b>item</b></a></div>
		<div class="cat"><a href="index.php?admin&order"><b>order</b></a></div>
	</div>
	<div class="column middle shadow" style="display: inline-block:">
<?PHP

// << Creating serialized data for a new item >>
//$new_item['name'] = "africa";
//$new_item['price'] = "200€";
////$new_item['img'] = "img";
//$new_item['tags'] = "souvenir";
//file_put_contents("private/product_base/".$new_item['name'].".product", serialize($new_item))

if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == "user")
{
	$list = glob("private/user_base/*.user");
	//print_r($list);

			echo "<table class=\"user_data\">";
			echo "<td class=\"tab_data\"><b>account_login</b><td>";
			echo "<td class=\"tab_data\"><b>name</b><td>";
			echo "<td class=\"tab_data\"><b>address</b><td>";
			echo "<td class=\"tab_data\"><b>mail</b><td></table>";
	foreach ($list as $user)
	{
		@$user_data = unserialize(file_get_contents($user));
				// print_r($user_data);
		if (isset($user_data['account_login']))
		{
			if (!isset($user_data['name']))
				$user_data['name'] = "empty";
			if (!isset($user_data['address']))
				$user_data['address'] = "empty";
			if (!isset($user_data['mail']))
				$user_data['mail'] = "empty";

			echo "<table class=\"user_data\">";
			echo "<td class=\"tab_data\">".$user_data['account_login']."<td>";
			echo "<td class=\"tab_data\">".$user_data['name']."<td>";
			echo "<td class=\"tab_data\">".$user_data['address']."<td>";
			echo "<td class=\"tab_data\">".$user_data['mail']."<td></table>";
		}
	}
}
else if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == "item")
{
	$list = glob("private/product_base/*.product");
	//print_r($list);

	foreach ($list as $item)
	{
		@$item_data = unserialize(file_get_contents($item));
				// print_r($item_data);
		echo "<form method=\"post\">";// action=\"index.php?admin&item\">";
		echo "<table class=\"user_data\">";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"name\" value=\"".$item_data['name']."\"/><td>";
		if (isset($item_data['img']))
			echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"img\" value=\"".$item_data['img']."\"/><td>";
		else
			echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"img\" value=\"-\"/><td>";
		if (isset($item_data['desc']))
			echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"desc\" value=\"".$item_data['desc']."\"/><td>";
		else
			echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"desc\" value=\"-\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"price\" value=\"".$item_data['price']."\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"tags\" value=\"".$item_data['tags']."\"/><td>";
		echo "<button style=\"margin-top:0px; width: 100px;\" class=\"tab_data_item loginbtn\" name=\"submit_".$item_data['name']."\" type=\"submit\" value=\"OK\">Modifier</button>";
		echo "<button style=\"margin-top:0px; width: 100px;\" class=\"tab_data_item loginbtn\" name=\"delete_".$item_data['name']."\" type=\"submit\" value=\"OK\">Supprimer</button></table>";
		echo "</form>";
		// echo "<td class=\"tab_data\">".$item_data['mail']."<td></table>";
		if (isset($_POST['submit_'.$item_data['name']]))
		{
			$new_info = $item_data;
			if (isset($_POST['name']))
				$new_info['name'] = $_POST['name'];
			if (isset($_POST['img']))
				$new_info['img'] = $_POST['img'];
			if (isset($_POST['desc']))
				$new_info['desc'] = $_POST['desc'];
			if (isset($_POST['price']))
				$new_info['price'] = $_POST['price'];
			if (isset($_POST['tags']))
				$new_info['tags'] = $_POST['tags'];
			//print_r($new_info);
			if (file_put_contents("private/product_base/{$item_data['name']}.product", serialize($new_info)))
			;//	echo "<div>Informations mises à jour\n</div>";
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			// header("Refresh: 0; url=index.php?admin&item");
		}
		if (isset($_POST['delete_'.$item_data['name']]))
		{
			unlink("private/product_base/{$item_data['name']}.product");
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			// header("Refresh: 0; url=index.php?admin&item");
		}
	}
		echo "<form method=\"post\">";// action=\"index.php?admin&item\">";
		echo "<table class=\"user_data\">";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"name\" value=\"New item\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"img\" value=\"Item img\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"desc\" value=\"Item desc\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"price\" value=\"Item price\"/><td>";
		echo "<td class=\"tab_data_item\"><input type=\"admin_modif\" name=\"tags\" value=\"Item tag\"/><td>";
		echo "<button style=\"margin-top:0px; width: 100px;\" class=\"tab_data_item loginbtn\" name=\"submit_new_item\" type=\"submit\" value=\"OK\">Créer</button>";
		echo "</form>";
		if (isset($_POST['submit_new_item']))
		{
			if (isset($_POST['name']))
				$new_item['name'] = $_POST['name'];
			if (isset($_POST['img']))
				$new_info['img'] = $_POST['img'];
			if (isset($_POST['price']))
				$new_item['price'] = $_POST['price'];
			if (isset($_POST['tags']))
				$new_item['tags'] = $_POST['tags'];
			//print_r($new_info);
			if (file_put_contents("private/product_base/{$new_item['name']}.product", serialize($new_item)))
				echo "<div>Informations mises à jour\n</div>";
			echo "<meta http-equiv=\"refresh\" content=\"0\">";
			// header("Refresh: 1; url=index.php?admin&item");
		}
}
?>
	</div>
</div>
