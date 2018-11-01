<div class="center row"/>
	<div class="column" style="position: absolute">
		<div class="center back_pic" style=""/> 
		</div>
	</div>
	<div class="column side shadow">
		<div class="cat"><a href="index.php?admin"><b>ALL</b></a></div>
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
	$list = glob("user_base/*.user");
	//print_r($list);

			echo "<table class=\"user_data\">";
			echo "<td class=\"tab_data\">account_login<td>";
			echo "<td class=\"tab_data\">name<td>";
			echo "<td class=\"tab_data\">address<td>";
			echo "<td class=\"tab_data\">mail<td></table>";
	foreach ($list as $user)
	{
		@$user_data = unserialize(file_get_contents($user));
			//	print_r($user_data);
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

	//	$i = 0;
	//while ($i < 20)
	//{
	//		echo "<div class=\"user_data\"><p>"."test"."</p><p>"."test"."</p></div>";
	//	$i++;
	//}
}
else if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == "item")
{
	$list = glob("private/product_base/*.product");
	//print_r($list);

	foreach ($list as $item)
	{
		@$item_data = unserialize(file_get_contents($item));
				print_r($item_data);
	}
}
?>
	</div>
</div>
