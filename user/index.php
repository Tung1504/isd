<?php 
	include('../includes/connection.php');
	include('../repositories/danhmucRepo.php');
	include('../repositories/sanphamRepo.php');
	include('../repositories/Cart.php');
	$cart = new Cart();
	$title = "Home";			// title của homepage
	include('../includes/header.php');
?>
<div id="container">
	<?php 
		include('../includes/sidemenu.php');
	?>
	<div class="main">
		<p class="main-title"><strong>Sách mới</strong></p>
		<table>
			<?php 
				$latest = getSachMoi($conn);
				foreach ($latest as $row) {
			?>
			<tr>
				<td>
					<a href="sanpham.php?sp=<?php echo $row['masp'] ?>">
						<img src="../images/<?php echo $row['hinhanh'] ?>" width=150px>
					</a>
				</td>
				<td>
					<a href="sanpham.php?sp=<?php echo $row['masp'] ?>">
						<h1><?php echo $row['tensp'] ?></h1>
					</a>
					<p style='font-size:20px'><?php echo $row['tentg'] ?></p>
					<p>&nbsp; > <?php echo $row['giaban']?> &#8363;</p>
				</td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
</div>
<?php 
	include('../includes/footer.php');
?>