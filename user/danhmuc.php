<?php 
	include('../includes/connection.php');
	include('../repositories/danhmucRepo.php');
	include('../repositories/sanphamRepo.php');
	include('../repositories/Cart.php');
	$cart = new Cart();
	// lấy tên danh mục cho vào title
	$madm = $_GET['dm'];
	$danhmuc = getDanhMuc($conn, $madm)[0];
	$title = $danhmuc['tendm'];
	include('../includes/header.php');
?>
<div id="container">
	<?php 
		include('../includes/sidemenu.php');
	?>
	<div class="main">
		<p class="main-title"><strong>
			<?php 
				echo $title;
			?>
		</strong></p>
		<button class="grid" type="button"><img src="../images/grid.png" width="30px"></button>
		<button class="list" type="button"><img src="../images/list.png" width="30px"></button>
		<ul class="grid">
			<?php 
				$sanpham = getSanPhamDanhMuc($conn, $madm);
				foreach ($sanpham as $row) {
			?>
			<li>
				<a href="sanpham.php?sp=<?php echo $row['masp'] ?>">
				<img src="../images/<?php echo $row['hinhanh'] ?>">
				<div id='right-main'>
					<h3><?php echo $row['tensp'] ?></h3></a>
					<p><?php echo $row['tentg'] ?></p>
					<p>Giá: <?php echo $row['giaban'] ?> &#8363;</p>
				</div>
			</li>
			<?php 
				}
			?>
		</ul>
	</div>
</div>
<?php 
	include('../includes/footer.php');
?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../cssjs/script.js"></script>