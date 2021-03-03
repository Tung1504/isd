<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="../cssjs/style.css">
</head>
<body>
	<header>
		<a href="index.php"><img src="../images/logo.png" height="100%"></a>
		<span style="float: initial; vertical-align: bottom; font-size: 90px">My Book Store</span>
		<button type="button" onclick="window.location.href='giohang.php'">
			Giỏ hàng: <?php echo $cart->getTongSo() ?> sản phẩm
		</button>
	</header>
	<nav style="background-color:black">
		<ul>
			<li><a href="index.php">Trang chủ</a></li>
			<?php 
				$danhmuc = array('Tình cảm','Văn hóa xã hội','Chính trị',
						'Lịch sử Việt Nam','Sống đẹp','Truyện ngắn','Viễn tưởng');
				for ($i = 1; $i <= 7; $i++) { 
			?>
			<li><a href="danhmuc.php?dm=<?php echo $i ?>"><?php echo $danhmuc[$i-1] ?></a></li>
			<?php  
				}
			?>
		</ul>
	</nav>