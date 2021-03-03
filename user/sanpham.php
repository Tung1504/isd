<?php 
	include('../includes/connection.php');
	include('../repositories/danhmucRepo.php');
	include('../repositories/sanphamRepo.php');
	include('../repositories/Cart.php');
	$cart = new Cart();
	// lấy tên sản phẩm cho vào title
	$masp = $_GET['sp'];
	$sanpham = getSanPham($conn, $masp)[0];
	$title = $sanpham['tensp'];
	include('../includes/header.php');
?>
<div id="container">
	<?php 
		include('../includes/sidemenu.php'); 
		if (isset($_COOKIE['action'])) {
			echo "<script>alert('Đã thêm vào giỏ hàng!')</script>";
			setcookie('action','',-1);
		}
	?>
	<div class="main">
		<p class="main-title"><strong>
			<?php 
				echo $title;
			?> 
		</strong></p>
		<table>
			<tr>
				<td><img src="../images/<?php echo $sanpham['hinhanh'] ?>" width=150px></td>
				<td>
					<h1><?php echo $sanpham['tensp'] ?></h1>
					<p style='font-size:20px'><?php echo $sanpham['tentg'] ?></p>
					<p>Số lượng: <?php echo $sanpham['soluong'] ?> quyển</p>
					<p>Giá bán: <?php echo $sanpham['giaban']?> &#8363;</p>
				</td>
			</tr>
		</table>
		<?php 
			echo $sanpham['mota'];
		?>
		<form action="themgiohang.php?masp=<?php echo $masp ?>" method="POST">
			<span style="margin-left: 350px; color: black">Số lượng:</span>
			<span>
				<input type="number" name="soluong" min="1" style="width: 40px" required>
			</span>
			<input type="submit" value="Thêm vào giỏ hàng">
			<img src="../images/cart.png" width="30px">
		</form>
	</div>
</div>
<?php 
	include('../includes/footer.php');
?>