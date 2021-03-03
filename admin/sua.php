<?php 
	include('../includes/connection.php');
	include('../includes/adminheader.php');
 	include('../repositories/danhmucRepo.php');
 	include('../repositories/sanphamRepo.php');
?>
<div id="container">
	<?php 
		include('../includes/adminsidemenu.php');
	?>
	<div class="main">
		<?php 
			if (isset($_GET['madm'])) {
				// sửa danh mục
    		$target = '/quanlidm.php';	// lưu trang trước đó
		?>
		<div id="editdm">
			<table style="border: none;">
				<tr><td>
					<form action="" method="POST">
						<input type="text" name="tenmoi" placeholder="Tên danh mục mới">
						<input type="submit" name="submitdm" value="Sửa">
					</form>
				</td></tr>
			</table>
			<?php
				if (isset($_POST['submitdm'])) {
					suaDanhMuc($conn, $_GET['madm'], $_POST['tenmoi']);
  				// quay về trang trước
  				header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).$target);
				}
			} elseif (isset($_GET['masp'])) {
				// sửa sản phẩm
    		$target = '/quanlisp.php';	// lưu trang trước đó
			?>
		<div id="editsp">
			<form action="" method="POST" enctype="multipart/form-data" 
				style="background-color: inherit; margin-left: 30%">
					<table>
					<tr>
						<td><label for="">Tên sách</label></td>
						<td><input type="text" name="tensp" required></td>
					</tr>
					<tr>
						<td><label for="">Mã danh mục</label></td>
						<td><input type="text" name="madm" required></td>
					</tr>
					<tr>
						<td><label for="">Giá</label></td>
						<td><input type="text" name="giaban" required></td>
					</tr>
					<tr>
						<td><label for="">Tác giả</label></td>
						<td><input type="text" name="tentg" required></td>
					</tr>
					<tr>
						<td><label for="">Năm xuất bản</label></td>
						<td><input type="text" name="namxb" required></td>
					</tr>
					<tr>
						<td><label for="">Số lượng</label></td>
						<td><input type="number" min="1" name="soluong" required></td>
					</tr>
					<tr>
						<td><label for="">Mô tả</label></td>
						<td><textarea name="mota" required></textarea></td>
					</tr>
					<tr>
						<td><label for="">Ngày đăng</label></td>
						<td><input type="date" name="ngaydang" required></td>
					</tr>
					<tr><td><input type="file" name="hinhanh" required></td></tr>
				</table>
				<input type="submit" name="submitsp" value="Sửa">
			</form>
			<?php
				if (isset($_POST['submitsp'])) {
					suaSanPham($conn, $_GET['masp'], 
									$_POST['tensp'], $_POST['madm'], $_POST['giaban'], 
									$_POST['tentg'], $_POST['namxb'], $_POST['soluong'], 
									$_POST['mota'], $_POST['ngaydang'], $_FILES['hinhanh']['name']);
  				// quay về trang trước
  				header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).$target);
				}
			}
			?>
		</div>
	</div>
</div>
<?php 
	include('../includes/adminfooter.php');
?>