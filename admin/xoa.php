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
			<tr>
				<td style="height: 205px; background-color: white">
					<?php 
						$xoaDM = isset($_GET['madm']);
						$xoaSP = isset($_GET['masp']);
						if ($xoaDM) {
							// xóa danh mục
    					$target = '/quanlidm.php';	// lưu trang trước đó
							$tendm = getDanhMuc($conn, $_GET['madm'])[0]['tendm'];
							echo "Bạn có thực sự muốn xóa danh mục ".$tendm."?";
						} elseif ($xoaSP) {
							// xóa sản phẩm
    					$target = '/quanlisp.php';	// lưu trang trước đó
							$tensp = getSanPham($conn, $_GET['masp'])[0]['tensp'];
							echo "Bạn có thực sự muốn xóa sản phẩm ".$tensp."?";
						}
					?>
					<form method="POST">
						<input type="submit" name="submit" value="Có">
						<input type="submit" name="submit" value="Không">
					</form>
					<?php 
						if (isset($_POST['submit'])) {
							if ($_POST['submit'] == 'Có') {
								if ($xoaDM)
									xoaDanhMuc($conn, $tendm);
								elseif ($xoaSP)
									xoaSanPham($conn, $tensp);
							}
  						// quay ve trang truoc
  						header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).$target);
						}
					?>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php 
	include('../includes/adminfooter.php');
?>