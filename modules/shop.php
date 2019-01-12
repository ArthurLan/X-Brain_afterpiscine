<div class="center row"/>
	<div class="column" style="position: absolute">
		<div class="center back_pic" style=""/>
		</div>
	</div>
	<div class="column side shadow">
		<div class="cat"><a href="index.php?shop"><b>ALL</b></a></div>
		<div class="cat"><a href="index.php?shop&implant"><b>Implant</b></a></div>
		<div class="cat"><a href="index.php?shop&souvenir"><b>Souvenirs</b></a></div>
		<div class="cat"><a href="index.php?shop&physical"><b>Physical</b></a></div>
		<div class="cat"><a href="index.php?shop&culture"><b>Culture</b></a></div>
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

foreach ($list as $item)
{
	@$item_data = unserialize(file_get_contents($item));
//			print_r($item_data);
	if (!(isset(array_keys($_GET)[1])) || array_keys($_GET)[1] == $item_data['tags'])
	{
		echo "<div class=\"item\">";
		if (isset($item_data['desc']) && $item_data['desc'] != '-')
			echo "<p class=\"description\">".$item_data['desc']."</p>";
		echo "<p class=\"item_name\">".$item_data['name']."</p>";
		if (isset($item_data['img']) && $item_data['img'] != '-')
			echo "<img class=\"img_shop\" src=\"private/img/".$item_data['img']."\">";
		echo "<p>".$item_data['price']."</p>";
		echo "<form type=\"submit\" action=\"modules/to_cart.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"item_title\" value=\"".$item_data['name']."\" />";
		echo "<input type=\"hidden\" name=\"item_price\" value=\"".$item_data['price']."\" />";
		echo "<button id=\"add_to_cart\">add to cart</button></form></div>";
	}
}

	?>
	</div>
</div>
<!--
			<div class="item">
				<p><?php //echo $item_data['name'] ?></p>
				<p><?php //echo $item_data['price'] ?></p>
				<form type="submit" action="cart.php" method="post">
					<input type="hidden" name="item_title" value="<?php// echo $item_data['name'] ?>" />
					<input type="hidden" name="item_price" value="<?php// $item_data['price'] ?>" />
					<button id="add_to_cart">add to cart</button>
				</form>
			</div>
-->
