<?php 
	include('../repositories/Cart.php');

	$cart = new Cart();
	$masp = $_GET['masp'];
	$cart->add($masp, $_POST['soluong']);
	setcookie('action','added');
	header('Location: sanpham.php?sp='.$masp);
?>