<div class="center row"/>
	<div class="column" style="position: absolute">
		<div class="center back_pic" style=""/> 
		</div>
	</div>
	<div class="column side shadow">
		<div class="cat"><a href="index.php?admin"><b>ALL</b></a></div>
		<div class="cat"><a href="index.php?admin&user"><b>user</b></a></div>
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


$list = glob("private/product_base/*.product");
//print_r($list);

//foreach ($list as $item)
{
//	@$item_data = unserialize(file_get_contents($item));
//			print_r($item_data);
//	if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == $item_data['tags'])
//		echo "<div class=\"item\"><p>".$item_data['name']."</p><p>".$item_data['price']."</p></div>";
}

//	$i = 0;
//while ($i < 20)
//{
		echo "<div class=\"user_data\"><p>"."test"."</p><p>"."test"."</p></div>";
//	$i++;
//}
?>
<table class="user_data">
	<td class="tab_data">login<td>
	<td class="tab_data">login<td>
</table>
	</div>
</div>
