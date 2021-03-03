<?php 
	include('../includes/connection.php');
	include('../repositories/sanphamRepo.php');
	include('../repositories/Cart.php');
	$cart = new Cart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Thanh toán đơn hàng</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../cssjs/checkout.css">
</head>
<body>
	<h1 style="margin-left: 100px"><a href="index.php">My Book Store</a></h1>
	<h2 style="color: black; margin-left: 100px;">Thông tin mua hàng</h2>
	<div id="checkoutform">
		<form action="">
			<table>
			<tr><td><input type="text" placeholder="Họ tên"></td></tr>
			<tr><td><input type="text" placeholder="Số điện thoại"></td></tr>
			<tr><td><input type="text" placeholder="Địa chỉ"></td></tr>
			<tr><td><select>
				<option value="">-- Chọn tỉnh thành --</option>
				<option value="">Hà Nội</option>
				<option value="">Huế</option>
				<option value="">Thành phố Hồ Chí Minh</option>
			</select></td></tr>
			<tr><td><select name="">
				<option value="">-- Chọn quận huyện --</option>
			</select></td></tr>
			<tr><td><textarea placeholder="Ghi chú"></textarea></td></tr>
			</table>
		</form>
		<form action="" id="method">
			<table>
				<tr><td><input type="radio" name="a" style="width:10px" checked >Chuyển khoản ngân hàng</td></tr>
				<tr><td><input type="radio" name="a" style="width:10px" >Thanh toán khi giao hàng (COD)</td></tr>
			</table>
			<p></p><a href="giohang.php">< Quay về giỏ hàng</a>
		</form>
	</div>
	<div id="cart">
		<table border="1">
			<tr style="font-weight: bold;">
				<td>Hình ảnh</td>
				<td>Tên sản phẩm</td>
				<td>Đơn giá</td>
				<td>Số lượng</td>
			</tr>
			<tr>
				<?php 
					$giohang = $cart->getSanPham();
					$total = 0;		// tổng số tiền
					foreach ($giohang as $masp => $soluong) {
						$sanpham = getSanPham($conn, $masp)[0];
				?>
				<td><img src="../images/<?php echo $sanpham['hinhanh'] ?>" width="35px"></td>
				<td><?php echo $sanpham['tensp'] ?></td>
				<td><?php echo $sanpham['giaban'] ?> &#8363;</td>
				<td><?php echo $soluong ?></td>
			</tr>
				<?php 
						$total += $sanpham['giaban'] * $soluong;
					} 
				?>
		</table><p></p>
		<span style="margin-top: 10%; margin-left: 40%">Tổng: <?php echo $total; ?> &#8363;</span>
		<button type="button" onclick="alert('Thanh toán thành công!')">
			<span style="color: black; font-size: 15px;">Đặt hàng</span>
		</button>
	</div>
</body>
</html>