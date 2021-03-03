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
		<table>
			<tr style="text-align: center; font-weight: bold;">
				<td>Mã danh mục</td>
				<td>Tên danh mục</td>
				<td>Số lượng</td>
				<td>Công cụ</td>
			</tr>
			<?php 
				$danhmuc = getDanhMuc($conn,"");
				foreach ($danhmuc as $row) {
					$soluong = count(getSanPhamDanhMuc($conn, $row['madm']));
			?>
			<tr>
				<td style='text-align: center'><?php echo $row['madm'] ?></td>
				<td><?php echo $row['tendm'] ?></td>
				<td style='text-align: center'><?php echo $soluong ?></td>
				<td>
					<a href="sua.php?madm=<?php echo $row['madm'] ?>"><img src="../images/edit.png" width="20px"></a>
					<a href="xoa.php?madm=<?php echo $row['madm'] ?>"><img src="../images/delete.png" width="20px"></a>
				</td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
	<input type="button" name="answer" value="Thêm danh mục mới" onclick="showDiv()" id="butt">
	<div id="addform" style="display:none;">
		<form action="them.php" method="POST" style="background-color: inherit; margin-left: 30%">
			<table>
				<tr>
					<td><label for="">Tên danh mục</label></td>
					<td><input type="text" name="tendm"></td>
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