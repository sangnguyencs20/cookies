<?php
session_start();
require_once('../utils/utility.php');
require_once('../Database/dbhelper.php');

$action = getPost('action');
switch ($action) {
	case 'cart':
		addToCart();
		break;
	case 'update':
		updateCart();
		break;
	case 'checkout':
		completeCheckout();
		break;
}
function completeCheckout()
{
	if (!isset($_SESSION['cart']) || count($_SESSION) == 0) {
		return false;
	}
	$fullname = getPost('fullname');
	$email  = getPost('email');
	$phone_number = getPost('phone_number');
	$address = getPost('address');
	$note = getPost('note');
	$user = getUserToken();
	$userId = 0;
	if ($user != null) {
		$userId = $user['id'];
	}
	$orderDate = date('Y-m-d H:i:s');
	$totalMoney = 0;
	foreach ($_SESSION['cart'] as $item) {
		$totalMoney += ($item['discount'] * $item['num']);
	}
	$sql = "INSERT INTO
	`orders` (`fullname`, `user_id`, `email`, `phone_number`, `address`, `order_date`, `status`, `total_money`)
	VALUES ('$fullname','$userId','$email','$phone_number','$address','$orderDate',0,'$totalMoney')";
	execute($sql);


	$sql = "SELECT * from orders where order_date = '$orderDate'";
	$orderItem = executeResult($sql, true);
	$orderId = $orderItem['id'];
	foreach ($_SESSION['cart'] as $item) {
		$product_id = $item['id'];
		$price = $item['discount'];
		$num = $item['num'];
		$sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `num`) 
		VALUES ('$orderId','$product_id','$price','$num')";
		execute($sql);
	}
	execute($sql);
	unset($_SESSION['cart']);
};
function updateCart()
{
	$id = getPost('id');
	$num = getPost('num');

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}

	for ($i = 0; $i < count($_SESSION['cart']); $i++) {
		if ($_SESSION['cart'][$i]['id'] == $id) {
			$_SESSION['cart'][$i]['num'] = $num;
			if ($num <= 0) {
				array_splice($_SESSION['cart'], $i, 1);
			}
			break;
		}
	}
}
function addToCart()
{
	$id = getPost('id');
	$num = getPost('num');

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	// var_dump($_SESSION['cart']);
	$isFind = false;
	for ($i = 0; $i < count($_SESSION['cart']); $i++) {
		if ($_SESSION['cart'][$i]['id'] == $id) {
			$_SESSION['cart'][$i]['num'] += $num;
			$isFind = true;
			break;
		}
	}

	if (!$isFind) {
		$sql =  "SELECT product.*,category.name AS category_name 
		FROM product LEFT JOIN category 
		ON product.category_id = category.id 
		WHERE product.id = $id";

		$product = executeResult($sql, true);
		$product['num'] = $num;
		$_SESSION['cart'][] = $product;
	}
}
print_r($_SESSION['cart']);
// session_destroy();
