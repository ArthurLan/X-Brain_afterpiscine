<?PHP
session_start();
if (isset($_POST['item_title']) && isset($_POST['item_price']) && isset($_SESSION['login']))
{
	$item_title = $_POST['item_title'];
	$item_price = $_POST['item_price'];
	$_SESSION['cart'][] = array($item_title, $item_price);
	header('Location: index.php');
	// $product_path = 'private/product_base/' . $item_title . "." . "product";
	// if(file_exists($product_path))
	// {
	// 	$data = file_get_contents($product_path);
	// 	$info = unserialize($data);
	// 	$info['quantity'] = 1;
	// 	print_r($info);
	// 	$cart_path = 'private/cart_base/' . $_SESSION['login'] . "." . "cart";
	// 	if(!(file_exists($cart_path)))
	// 	{
	// 		$cart[] = $info;
	// 		file_put_contents("private/cart_base/".$_SESSION['login'].".cart", serialize($cart));
	//
	// 		echo "first cart\n";
	// 	}
	// 	else {
	// 		echo "append cart\n";
	// 		$cart = unserialize(file_get_contents($cart_path));
	// 		$cart[] = $info;
	// 		file_put_contents("private/cart_base/".$_SESSION['login'].".cart", serialize($cart));
	// 	}
	// 	var_dump($cart_path);
	// }
}
?>
