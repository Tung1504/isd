<?php 
	include('../includes/connection.php');
	include('../includes/adminheader.php');
  include('../repositories/sanphamRepo.php');
?>
<div id="container">
	<?php 
		include('../includes/adminsidemenu.php');
	?>
	<div class="main">
		<table style="table-layout: fixed; width: 110%">
			<tr style="text-align: center; font-weight: bold">
				<td>Mã sản phẩm</td>
				<td>Mã danh mục</td>
				<td style="width: 300px; word-wrap: break-word;">Tên sách</td>
				<td>Giá bán</td>
				<td>Hình ảnh</td>
				<td style="width: 100px; word-wrap: break-word;">Tác giả</td>
				<td>Năm xuất bản</td>
				<td>Số lượng</td>
				<td>Ngày đăng</td>
				<td>Công cụ</td>
			</tr>
			<?php 
				$sanpham = getSanPham($conn,"");
				foreach ($sanpham as $row) {
			?>
			<tr>
				<td style='text-align: center'><?php echo $row['masp'] ?></td>
				<td style='text-align: center'><?php echo $row['madm'] ?></td>
				<td><?php echo $row['tensp'] ?></td>
				<td><?php echo $row['giaban'] ?></td>
				<td><img src="../images/<?php echo $row['hinhanh'] ?>" width="40px"></td>
				<td><?php echo $row['tentg'] ?></td>
				<td style='text-align: center'><?php echo $row['namxb'] ?></td>
				<td style='text-align: center'><?php echo $row['soluong'] ?></td>
				<td><?php echo $row['ngaydang'] ?></td>
				<td>
					<a href="sua.php?masp=<?php echo $row['masp'] ?>"><img src="../images/edit.png" width="20px"></a>
					<a href="xoa.php?masp=<?php echo $row['masp'] ?>"><img src="../images/delete.png" width="20px"></a>
				</td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
	<input type="button" name="answer" value="Thêm sách mới" onclick="showDiv()" id="butt">
	<div id="addform" style="display:none;">
		<form action="them.php" method="POST" enctype="multipart/form-data" 
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
				<tr>
					<td><input type="file" name="hinhanh" required></td>
				</tr>
			</table>
			<input type="submit" value="Thêm">
		</form>
	</div>
</div>
<?php 
	include('../includes/adminfooter.php');
?>
<script src="../cssjs/script.js"></script>