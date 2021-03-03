<?php 
	include('../includes/connection.php');
	include('../repositories/sanphamRepo.php');
	include('../repositories/Cart.php');

	$cart = new Cart();
	$title = "Giỏ hàng";
	$action = '';
	$id = 0;
	if (isset($_GET['action'])) 
		$action = $_GET['action'];
	if (isset($_GET['id']))
		$id = $_GET['id'];

	switch ($action) {
		case 'remove':
			$cart->remove($id);
			break;
		case 'empty':
			$cart->clear();
			break;
	}

	include('../includes/header.php');
?>
	<div id="container">
		<table id="cart">
			<tr style="font-weight: bold;">
				<td>Hình ảnh</td>
				<td>Tên sản phẩm</td>
				<td>Đơn giá</td>
				<td>Số lượng</td>
				<td>Xóa</td>
			</tr>
			<tr>
				<?php 
					$giohang = $cart->getSanPham();
					$total = 0;		// tổng số tiền
					foreach ($giohang as $masp => $soluong) {
						$sanpham = getSanPham($conn, $masp)[0];
				?>
				<td>
					<a href="sanpham.php?sp=<?=$sanpham['masp']?>">
					<img src="../images/<?php echo $sanpham['hinhanh'] ?>" width="60px">
					</a>
				</td>
				<td><?php echo $sanpham['tensp'] ?></td>
				<td><?php echo $sanpham['giaban'] ?> &#8363;</td>
				<td><?php echo $soluong ?></td>
				<td><a href="?action=remove&id=<?php echo $masp ?>">[ X ]</a></td>
			</tr>
				<?php 
						$total += $sanpham['giaban'] * $soluong;
					}
				?>
			<tr>
				<td></td><td></td><td></td><td></td>
				<td>
					<button type="button" onclick="window.location.href='?action=empty'">
						<span style="color: black; font-size: 15px">Xóa toàn bộ</span>
					</button>
				</td>
			</tr>
		</table>
		<p style="padding-left: 750px;">Tổng: <?php echo $total; ?> &#8363;</p>
		<button type="button" onclick="window.location.href='giohang.php'" style="margin-left: 700px">
			<span style="color: black; font-size: 15px">Cập nhật</span>
		</button>
		<?php if ($cart->getTongSo() == 0) { ?>
		<button type="button" onclick="alert('Không có sản phẩm nào.')">
		<?php } else { ?>
		<button type="button" onclick="window.location.href='thanhtoan.php'">
		<?php } ?>
			<span style="color: black; font-size: 15px">Thanh toán</span>
		</button>
		<h3><a href="index.php">< Tiếp tục mua hàng</a></h3>
	</div>
</body>
</html>